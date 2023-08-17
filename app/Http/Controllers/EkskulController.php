<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Models\Ekstrakurikuler;
use App\Models\Jadwal;
use App\Models\User;
use App\Exports\AbsenExport;
use App\Exports\AnggotaExport;
use App\Exports\NilaiExport;
use Maatwebsite\Excel\Facades\Excel;
use Session;
class EkskulController extends Controller
{
    //
    public function index()
    {
        // code...  
        $title = 'Manajemen Ekstrakurikuler';
        $ekskuls = Ekstrakurikuler::all();
        return view('ekskul.list',compact('title','ekskuls'));
    }
    public function create()
    {
        $title = 'Tambah Ekstrakurikuler';
        return view('ekskul.crate',compact('title'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'nama_ekskul' => 'required',
             'deskripsi' => 'required',
             'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:3999',
        ]);
        $slug = Str::slug($request->nama_ekskul, '-');
        $fileNameToStore = $request->file('gambar')->getClientOriginalName();
        $logoPath = $request->file('gambar')->storeAs('public/ekskul/gambar', $fileNameToStore);
       
        $gambar = 'storage/ekskul/gambar/' . $fileNameToStore;
        $simpan = Ekstrakurikuler::create([
            'nama_ekskul' => $request->nama_ekskul,
            'deskripsi' => $request->deskripsi,
            'slug' => $slug,
            'gambar' => $gambar,
        ]);
        if($simpan){
            return redirect()->route('ekskul')->with('simpan','Ekstrakurikuler Berhasil Disimpan');
        }
        else{
            return redirect()->route('ekskul')->with('hapus','Ekstrakurikuler Gagal Disimpan');
        }  
    }
    public function delete($id)
    {
        $data = Ekstrakurikuler::find($id);
        $data->delete();
         return redirect()->route('ekskul')->with('hapus','Ekstrakurikuler Berhasil Dihapus');
    }
    public function edit($id)
    {
        $data = Ekstrakurikuler::find($id);
        $title = 'Edit Ekstrakurikuler';
        return view('ekskul.edit',compact('title','data'));
    } 
    public function update(Request $request,$id)
      {
            $data = Ekstrakurikuler::find($id);
            if ($request->hasFile('gambar')) {
                $fileNameToStore = $request->file('gambar')->getClientOriginalName();
                $logoPath = $request->file('gambar')->storeAs('public/ekskul/gambar', $fileNameToStore);
                if ($data->gambar) {
                    Storage::delete('storage/ekskul/gambar/' . basename($data->gambar));
                    $gambar = 'storage/ekskul/gambar/'.$fileNameToStore;
                }
                $gambar = 'storage/ekskul/gambar/'.$fileNameToStore;
            }
            else{
                $gambar = $data->gambar;
            }
            $slug = Str::slug($request->nama_ekskul, '-');
            $data->update(
            [
                'nama_ekskul' => $request->nama_ekskul,
                'deskripsi' => $request->deskripsi,
                'slug' => $slug,
                'gambar' => $gambar

            ]
            );
           return redirect()->route('ekskul')->with('edit','Ekstrakurikuler Berhasil Diedit');
    }
    public function read($slug)
    {     

          $ambil = Ekstrakurikuler::where('slug',$slug)->first();
          $lain = Ekstrakurikuler::where('id','!=',$ambil->id)->limit(5)->get();
          $title = $ambil->slug;
          return view('ekskul.read',compact('title','ambil','lain'));
    }

    public function settingEkskul()
    {
         $pbn = User::find(Session::get('id'));
         $eks = Ekstrakurikuler::find($pbn->ekstrakurikuler_id);
         $jadwal = Jadwal::where('ekstrakurikuler_id',$eks->id)->first();
         $title = 'Manajemen Ekstrakurikuler '.$eks->nama_ekskul;
         return view('ekskul.pembina',compact('pbn','eks','jadwal','title'));
    }
    public function storeJadwal(Request $request)
    {
        $request->validate([
             'berkas' => 'mimes:rar,zip,pdf,png,jpg,gif,svg|max:3999',
        ]);

        if ($request->hasFile('berkas')) {
            $fileNameToStore = $request->file('berkas')->getClientOriginalName();
            $logoPath = $request->file('berkas')->storeAs('public/ekskul/berkas', $fileNameToStore);
           
            $berkas = 'storage/ekskul/berkas/' . $fileNameToStore;
            $simpan = Jadwal::create([
                'hari' => $request->hari,
                'ekstrakurikuler_id' => $request->ekstrakurikuler_id,
                'jam' => $request->jam,
                'pengumuman' => $request->pengumuman,
                'berkas' => $berkas,
            ]);
        }
        else{
            $simpan = Jadwal::create([
                'hari' => $request->hari,
                'ekstrakurikuler_id' => $request->ekstrakurikuler_id,
                'jam' => $request->jam,
                'pengumuman' => $request->pengumuman,
            ]);
        }

        if($simpan){
            return redirect()->route('sunting.ekskul')->with('simpan','Informasi Ekstrakurikuler Disimpan');
        }
        else{
            return redirect()->route('sunting.ekskul')->with('hapus','Informasi Ekstrakurikuler Gagal Disimpan');
        }
    }
    public function updateJadwal(Request $request,$id)
    {
       $data = Jadwal::find($id);
            if ($request->hasFile('berkas')) {
                $fileNameToStore = $request->file('berkas')->getClientOriginalName();
                $logoPath = $request->file('berkas')->storeAs('public/ekskul/berkas', $fileNameToStore);
                if ($data->berkas) {
                    Storage::delete('storage/ekskul/berkas/' . basename($data->berkas));
                    $berkas = 'storage/ekskul/berkas/'.$fileNameToStore;
                }
                $berkas = 'storage/ekskul/berkas/'.$fileNameToStore;
            }
            else{
                $berkas = $data->berkas;
            }
           
            $data->update(
            [
                'hari' => $request->hari,
                'jam' => $request->jam,
                'pengumuman' => $request->pengumuman,

            ]
            );
           return redirect()->route('sunting.ekskul')->with('edit','Informasi Ekstrakurikuler Berhasil Diedit');
    }

    public function pembinaUpdate(Request $request,$id)
      {
            $data = Ekstrakurikuler::find($id);
            if ($request->hasFile('gambar')) {
                $fileNameToStore = $request->file('gambar')->getClientOriginalName();
                $logoPath = $request->file('gambar')->storeAs('public/ekskul/gambar', $fileNameToStore);
                if ($data->gambar) {
                    Storage::delete('storage/ekskul/gambar/' . basename($data->gambar));
                    $gambar = 'storage/ekskul/gambar/'.$fileNameToStore;
                }
                $gambar = 'storage/ekskul/gambar/'.$fileNameToStore;
            }
            else{
                $gambar = $data->gambar;
            }
            $slug = Str::slug($request->nama_ekskul, '-');
            $data->update(
            [
                'nama_ekskul' => $request->nama_ekskul,
                'deskripsi' => $request->deskripsi,
                'slug' => $slug,
                'gambar' => $gambar

            ]
            );
           return redirect()->route('sunting.ekskul')->with('edit','Ekstrakurikuler Berhasil Diedit');
    }

    
    public function exportAnggota(Request $request)
    {
        $ekstrakurikuler_id = $request->ekstrakurikuler_id;
        $semester_id = $request->semester_id;
        return (new AnggotaExport)->forYear($ekstrakurikuler_id,$semester_id)->download('Anggota.xlsx');

    }
    public function exportNilai(Request $request)
    {
        $ekstrakurikuler_id = $request->ekstrakurikuler_id;
        $semester_id = $request->semester_id;
        return (new NilaiExport)->forYear($ekstrakurikuler_id,$semester_id)->download('Nilai.xlsx');

    }
    public function exportAbsen(Request $request)
    {
        $ekstrakurikuler_id = $request->ekstrakurikuler_id;
        $semester_id = $request->semester_id;
        return (new AbsenExport)->forYear($ekstrakurikuler_id,$semester_id)->download('Absen.xlsx');

    }

}
