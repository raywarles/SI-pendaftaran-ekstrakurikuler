<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kegiatan;
use App\Models\Ekstrakurikuler;
use App\Models\Semester;
use App\Models\Galeri;
use App\Models\User;
use App\Models\Prestasi;
use App\Models\Foto;
use Session;
use Redirect;
use Illuminate\Support\Facades\Storage;
class GaleriController extends Controller
{
    public function index()
    {
        $user = User::find(Session::get('id'));
        $ekskul = Ekstrakurikuler::find($user->ekstrakurikuler_id);
        $galeri = Galeri::where('ekstrakurikuler_id',$user->ekstrakurikuler_id)->get();
        $title = 'Data Galeri : '.$ekskul->nama_ekskul;
        return view('galeri.index',compact('user','title','ekskul','galeri'));

    }
    public function store(Request $request)
    {

        $request->validate([
             'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:3999',
        ]);

        $fileNameToStore = $request->file('thumbnail')->getClientOriginalName();
        $logoPath = $request->file('thumbnail')->storeAs('public/galeri/thumbnail', $fileNameToStore);
       
        $gambar = 'storage/galeri/thumbnail/' . $fileNameToStore;
        $simpan = Galeri::create([
            'nama_galeri' => $request->nama_galeri,
            'ekstrakurikuler_id' => $request->ekstrakurikuler_id,
            'thumbnail' => $gambar,
        ]);

        if($simpan){
            return Redirect::back()->with('simpan','Galeri Berhasil Dibuat');
        }
        else{
            return Redirect::back()->with('hapus','Galeri Gagal Dibuat');
        }
    }
    public function delete($id)
    {
        $keg = Galeri::find($id);
        $foto = Foto::where('galeri_id',$keg->id)->get();
        $jml  = count($foto);
        foreach ($foto as $fot) {
            $fot->delete();
        }
        $keg->delete();
        return Redirect::back()->with('hapus','1 Galeri Dihapus dan '.$jml.' Dihapus');
    }
    public function update(Request $request,$id)
    {
            $data = Galeri::find($id);
            if ($request->hasFile('thumbnail')) {
                $fileNameToStore = $request->file('thumbnail')->getClientOriginalName();
                $logoPath = $request->file('thumbnail')->storeAs('public/galeri/thumbnail', $fileNameToStore);
                if ($data->thumbnail) {
                    Storage::delete('storage/galeri/thumbnail/' . basename($data->thumbnail));
                    $thumbnail = 'storage/galeri/thumbnail/'.$fileNameToStore;
                }
                $thumbnail = 'storage/galeri/thumbnail/'.$fileNameToStore;
            }
            else{
                $thumbnail = $data->thumbnail;
            }
            $data->update(
            [
                'nama_galeri' => $request->nama_galeri,
                'thumbnail' => $thumbnail

            ]
            );
           return redirect()->route('galeri')->with('edit','1 Galeri Berhasil Diedit');
    }
    public function storeFoto(Request $request)
    {
        $request->validate([
             'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:3999',
        ]);

        $fileNameToStore = $request->file('foto')->getClientOriginalName();
        $logoPath = $request->file('foto')->storeAs('public/galeri/foto', $fileNameToStore);
       
        $gambar = 'storage/galeri/foto/' . $fileNameToStore;

        $simpan = Foto::create([
            'keterangan' => $request->keterangan,
            'galeri_id' => $request->galeri_id,
            'foto' => $gambar,
        ]);

        if($simpan){
            return Redirect::back()->with('simpan','1 Foto Ditambahkan ke Galeri');
        }
        else{
            return Redirect::back()->with('hapus','1 Foto Dihapus dari Galeri');
        }
    }
    public function deleteFoto($id)
    {
        $keg = Foto::find($id);
        $keg->delete();
        return Redirect::back()->with('hapus','1 Foto Dihapus dari Galeri ');
    }
}
