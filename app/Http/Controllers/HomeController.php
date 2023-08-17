<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ekstrakurikuler;
use App\Models\Galeri;
use App\Models\Prestasi;
use App\Models\Foto;
use App\Models\User;
use Hash;
use Redirect;
class HomeController extends Controller
{
    //
    public function index()
    {
        $title = 'Ekstrakurikuler - SMAN 1 Solok';
        $ekskul = Ekstrakurikuler::all();
        $galeri = Galeri::all();
          
        return view('home.index',compact('title','ekskul','galeri'));
    }
    public function login()
    {
        return view('login');
    }
    public function registrasi_pembina()        
    {
        $title = 'Tambah User';
         $ekskul = Ekstrakurikuler::all();
        return view('registrasi',compact('title','ekskul'));
    }
    public function pembinaStore(Request $request)
    {
        $request->validate([
             'name' => 'required',
             'email' => 'required|email',
             'password' =>'required|min:8',
             
        ]);

        
        $eks = $request->ekstrakurikuler_id;
        
     
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'level' => $request->level,
            'ekstrakurikuler_id' => $eks,
            'status' => 'Aktif',
            'level' => 'Pembina',
            'status_pendaftaran' => $request->status_pendafataran,
        ]);
        return Redirect::back()->with('simpan','User Berhasil Dibuat');
    }
    public function readPrestasi($id)
    {
        $eks = Ekstrakurikuler::find($id);
        $prestasi = Prestasi::where('ekstrakurikuler_id',$id)->get();
        $title = 'Prestasi '.$eks->nama_ekskul;
        return view('home.prestasi',compact('prestasi','title','eks'));
    }

    public function readGaleri($id)
    {
        $galeri = Galeri::find($id);
        $fotos = Foto::where('galeri_id',$id)->get();
        $title = "Dokumentasi";
        return view('home.foto',compact('title','galeri','fotos'));
    }
}
