<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\PengumumanResource;
use Illuminate\View\View;

class PengumumanController extends Controller
{
    public function index(){
        $pengumuman = Pengumuman::all();
        return response()->json(['data'=>$pengumuman]);    
    }

    public function store(Request $request){
        $photo = $request->file('foto');

        $path = $photo->storeAs('/app/public', uniqid().'.'.$photo->extension(),['disk'=> 'public']);

        $link = Storage::url($path);

        $pengumuman = Pengumuman::create([
            'judul'=>$request->judul,
            'foto'=>$link,
            'isi'=>$request->isi
        ]);

        return response()->json([
            'data'=>$pengumuman,
            'message'=>'Pengumuman Berhasil dibuat',
            ]);      
        }

        public function show($id_pengumuman) {
            $pengumuman = Pengumuman::where('id_pengumuman', $id_pengumuman)->first();
        
            if (empty($pengumuman)) {
                return response()->json(['message' => 'Data Tidak Ditemukan'], 404);
            } else {
                return response()->json(['data' => $pengumuman], 200);
            }
        }
        

    public function update(Request $request, Pengumuman $pengumuman){
        $pengumuman=Pengumuman::findOrFail($request->$id_pengumuman);
        $pengumuman->update([
             $pengumuman->judul=> $request->judul,        
            $pengumuman->isi=> $request->isi,             
            $pengumuman->save(),    
        ]);
       return response()->json([
                'data' => $pengumuman
    ]);
    }

    public function destroy(Pengumuman $pengumuman){
        $pengumuman->delete();
         return response()->json([
            'message'=>'Pengumuman Berhasil Dihapus!'
         ]);
    }
}


