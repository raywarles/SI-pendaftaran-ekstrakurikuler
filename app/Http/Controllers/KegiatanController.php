<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kegiatan;
use App\Models\Ekstrakurikuler;
use App\Models\Semester;
use App\Models\User;
use App\Models\Prestasi;
use Session;
use Redirect;
class KegiatanController extends Controller
{
    public function index()
    {
        $user = User::find(Session::get('id'));
        $ekskul = Ekstrakurikuler::find($user->ekstrakurikuler_id);
        $kegiatan = Kegiatan::where('ekstrakurikuler_id',$user->ekstrakurikuler_id)->get();
        $sem = Semester::all();
        $title = 'Data Kegiatan : '.$ekskul->nama_ekskul;
        return view('kegiatan.index',compact('user','title','sem','ekskul','kegiatan'));

    }
    public function store(Request $request)
    {
        $kegiatan = new kegiatan;
        $input = $kegiatan->create($request->all());
        if($input){
            return Redirect::back()->with('simpan','Kegiatan Berhasil Dibuat');
        }
        else{
            return Redirect::back()->with('hapus','Kegiatan Gagal Dibuat');
        }
    }
    public function delete($id)
    {
        $keg = Kegiatan::find($id);
        $keg->delete();
        return Redirect::back()->with('hapus','1 Kegiatan Dihapus');
    }
    public function update(Request $request,$id)
    {
        $keg = Kegiatan::find($id);
        $keg->update($request->all());
        return Redirect::back()->with('edit','1 Kegiatan Diedit');
    }

    public function indexPrestasi()
    {
        $user = User::find(Session::get('id'));
        $ekskul = Ekstrakurikuler::find($user->ekstrakurikuler_id);
        $prestasi = Prestasi::where('ekstrakurikuler_id',$user->ekstrakurikuler_id)->get();
        $title = 'Data Prestasi : '.$ekskul->nama_ekskul;
        return view('prestasi.index',compact('user','title','ekskul','prestasi'));

    }
    public function storePrestasi(Request $request)
    {
        $prestasi = new Prestasi;
        $input = $prestasi->create($request->all());
        if($input){
            return Redirect::back()->with('simpan','Prestasi Berhasil Dibuat');
        }
        else{
            return Redirect::back()->with('hapus','Prestasi Gagal Dibuat');
        }
    }
    public function deletePrestasi($id)
    {
        $keg = Prestasi::find($id);
        $keg->delete();
        return Redirect::back()->with('hapus','1 Prestasi Dihapus');
    }
    public function updatePrestasi(Request $request,$id)
    {
        $keg = Prestasi::find($id);
        $keg->update($request->all());
        return Redirect::back()->with('edit','1 Prestasi Diedit');
    }
}
