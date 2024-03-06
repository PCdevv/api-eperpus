<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function index(){
        $wishlist=Wishlist::all();
        return response()->json(['wishlist'=>$wishlist]);
    }

    public function store(Request $request){
        $buku=Buku::findOrFail($request->id_buku);
        $currentUser=Auth::Anggota();

        $wishlist=Wishlist::create([
        'id_buku'=>$request->$buku,
        'id_anggota'=>$request->$currentUser
        ]);
        return response()->json($wishlist);
    }

    public function show(Wishlist $wishlist){
        $wishlist = Wishlist::with('writer:id_buku, id_anggota');
        return response()->json(['data'=>$wishlist]);

    }

    public function destroy(Wishlist $wishlist){
        $wishlist->delete();
         return response()->json([
            'message'=>'Wishlist Berhasil Dihapus!'
         ]);

    }
}
