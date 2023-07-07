<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peserta;

class PesertaController extends Controller {

    public function index() {
        return view('datapeserta', [
            'users' => Peserta::all(), 
            'title' => 'Data peserta'
        ]);
    }
    
    public function add() {
        return view('adddatapeserta',[
            'title' => 'Tambah Data peserta'
        ]);
    }
    public function edit($id){
        
        $peserta = Peserta::where('id', $id)->first();

        return view('editdatapeserta', [
            'peserta' => $peserta,
            'title' => 'Edit Data peserta'
        ]);

    }

    public function update(Request $request, $id) {
        $kode_alternatif = $request->input('kode_alternatif');
        $nama_peserta      = $request->input('nama_peserta');
        $alamat   = $request->input('alamat');
        
        $peserta = Peserta::where('id', $id)->first();
        $peserta->kode_alternatif    = $kode_alternatif;
        $peserta->nama_peserta    = $nama_peserta;
        $peserta->alamat = $alamat;

        $peserta->save();

        return redirect()->to('/peserta');
    }


    public function dashboard(){
        $peserta= Peserta::count();

        return view('main', compact('peserta'));

    }

    public function store(Request $request) {
        $kode_alternatif = $request->input('kode_alternatif');
        $nama_peserta      = $request->input('nama_peserta');
        $alamat   = $request->input('alamat');

        $peserta           = new Peserta;
        $peserta->kode_alternatif    = $kode_alternatif;
        $peserta->nama_peserta    = $nama_peserta;
        $peserta->alamat = $alamat;

        $peserta->save();

        return redirect()->to('/peserta');
    }
    public function delete($id) {
        $peserta = Peserta::where('id', $id)->first();
        $peserta->delete();
        return redirect()->back();
    }

    public function search(Request $request){
        if($request->has('search')){
            $peserta = Peserta::where('kode_alternatif','nama','alamat','%',$request->search.'%')->get();
        }else{
            $peserta = Peserta::all();
        }
        return view('datapeserta',['Peserta' => $peserta]);
    }
}
