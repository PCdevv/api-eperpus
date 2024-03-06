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

        $path = $photo->storeAs('public/fotoPengumuman', uniqid().'.'.$photo->extension(),['disk'=> 'public']);

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
        

    public function update(Request $request, $id_pengumuman){
        $pengumuman=Pengumuman::findOrFail($request->$id_pengumuman);
        $pengumuman->update([
            'judul' => $request->judul,          
            'isi' => $request->isi,    
        ]);
        return response()->json([
            'message' => 'Pengumuman berhasil diubah'
        ]);
    }

    public function destroy(Pengumuman $pengumuman){
        $pengumuman->delete();
         return response()->json([
            'message'=>'Pengumuman Berhasil Dihapus!'
         ]);
    }
}


