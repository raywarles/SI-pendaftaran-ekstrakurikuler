<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Models\Ekstrakurikuler;
use App\Models\Anggota;
use App\Models\Semester;
use App\Models\Riwayat;
use App\Models\Kegiatan;
class LaporanController extends Controller
{
    public function index()
    {
        $title = 'Laporan';
        $semester = Semester::all();
        $ekskul = Ekstrakurikuler::all();
        return view('laporan.index',compact('title','semester','ekskul'));
    }
    public function laporanAnggota(Request $request)
    {
        $eks = Ekstrakurikuler::find($request->ekstrakurikuler_id);
         $sem = Semester::find($request->semester_id);
        $anggota = Riwayat::where('ekstrakurikuler_id',$request->ekstrakurikuler_id)->where('semester_id',$request->semester_id)->get();
        return view('laporan.anggota',compact('anggota','eks','sem'));
    }
    public function laporanKegiatan(Request $request)
    {
        $eks = Ekstrakurikuler::find($request->ekstrakurikuler_id);
         $sem = Semester::find($request->semester_id);
        $kegiatan = Kegiatan::where('ekstrakurikuler_id',$request->ekstrakurikuler_id)->where('semester_id',$request->semester_id)->get();
        return view('laporan.kegiatan',compact('kegiatan','eks','sem'));
    }
    public function laporanJumlah(Request $request)
    {
        $eks = Ekstrakurikuler::all();
        $sem = Semester::find($request->semester_id);
        $semid = $request->semester_id;
        if($request->semester_id == null){
            $get_ekstrakurikuler= Ekstrakurikuler::all('nama_ekskul');
            $get_ekstrakurikulerid = Ekstrakurikuler::all();
            foreach($get_ekstrakurikuler as $gets){
                $label[] = $gets->nama_ekskul;
            }
            foreach($get_ekstrakurikulerid as $idnya){
                $cek[] = Riwayat::where('ekstrakurikuler_id',$idnya->id)->count();
            }
        }
        else{
            $get_ekstrakurikuler= Ekstrakurikuler::all('nama_ekskul');
            $get_ekstrakurikulerid = Ekstrakurikuler::all();
            foreach($get_ekstrakurikuler as $gets){
                $label[] = $gets->nama_ekskul;
            }
            foreach($get_ekstrakurikulerid as $idnya){
                $cek[] = Riwayat::where('ekstrakurikuler_id',$idnya->id)->where('semester_id',$semid)->count();
            }
        }
        
        
        return view('laporan.jumlah',compact('eks','sem','label','cek'));
    }
    public function laporanPrestasi(Request $request)
    {
        $eks = Ekstrakurikuler::all();
        $get_ekstrakurikuler= Ekstrakurikuler::all('nama_ekskul');
        $get_ekstrakurikulerid = Ekstrakurikuler::all();
        foreach($get_ekstrakurikuler as $gets){
            $label[] = $gets->nama_ekskul;
        }
        foreach($get_ekstrakurikulerid as $idnya){
            $cek[] = Riwayat::where('ekstrakurikuler_id',$idnya->id)->count();
        }
        return view('laporan.prestasioverall',compact('label','cek','eks'));

        /*
        $eks = Ekstrakurikuler::all();
        if ($request->semester_id == 'semua') {
               
            return view('laporan.prestasioverall',compact('eks'));
        }
        else{
            $sem = Semester::find($request->semester_id);
            return view('laporan.prestasisemester',compact('eks','sem'));
        }
        */
    }

}
