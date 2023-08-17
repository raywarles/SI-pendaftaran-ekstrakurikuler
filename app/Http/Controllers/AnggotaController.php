<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota;
use App\Models\User;
use App\Models\Riwayat;
use Session;
use App\Models\Semester;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Ekstrakurikuler;
use App\Models\Jadwal;
use App\Models\Kegiatan;
use App\Models\Soal;
use App\Models\Jawaban;
use Redirect;

class AnggotaController extends Controller
{
    
        public function index()
        {
            $title = "Registrasi Anggota";
            $ekskul = Ekstrakurikuler::all();
            $semester = Semester::where('status','1')->get();
            return view('anggota.registrasi',compact('title','ekskul','semester'));
        }
        public function store(Request $request)
        {

            $request->validate([
             'nama' => 'required',
             'nis' => 'required|unique:anggotas',
             'email' => 'required|email|unique:anggotas',
             'password' =>'required|min:8',
             'ekstrakurikuler_id' => 'required',
             'semester_id' => 'required',
            ]);

            $input =  Anggota::create([
                'nama' => $request->nama,
                'nis' => $request->nis,
                'email' => $request->email,
                'kelas' => $request->kelas,
                'jurusan' => $request->jurusan,
                'jk' => $request->jk,
                'password' => Hash::make($request->password),
                'level' => 'Anggota',
                'status' => 'Aktif',
            ]);

            $eksul_id = $request->ekstrakurikuler_id;

            foreach($eksul_id as $idnya) {
                $riwayat =  Riwayat::create([
                    'anggota_id' => $input->id,
                    'ekstrakurikuler_id' => $idnya,
                    'semester_id' => $request->semester_id,
                    'status_pendaftaran' => 'Belum Diverifikasi',
                    'alasan' => $request->alasan,
                    
                ]);
            }
            

            if($input && $riwayat){
                return redirect()->route('login')->with('simpan','Registrasi Berhasil, Silahkan Tunggu verifikasi akun oleh pembina');
            }
            else{
                return redirect()->route('registrasi')->with('hapus','Registrasi Gagal');
            }
            
        }
        public function indexVerifikasi()
        {
            $sem = Semester::all();
            $title = 'Pilih Perioade Ajar';
            return view('anggota.indexverifikasi',compact('title','sem'));

        }
        public function listVerifikasi($id)
        {
            $data = User::find(Session::get('id'));
            $anggota = Riwayat::where('ekstrakurikuler_id',$data->ekstrakurikuler_id)->where('status_pendaftaran','Belum Diverifikasi')->where('semester_id',$id)->get();
            $eks = Ekstrakurikuler::find($data->ekstrakurikuler_id);
            $sem = Semester::find($id);
            $title = 'Verifikasi Anggota';
            return view('anggota.verifikasi',compact('data','anggota','title','eks','sem'));
        }
        public function verifikasi($id)
        {
            $data = Riwayat::find($id);
            $data->status_pendaftaran = 'Diverifikasi';
            $data->save();
            return Redirect::back()->with('simpan','1 Pendaftaran Anggota Diverifikasi');
        }
        public function hapus($id)
        {
            $data = Riwayat::find($id);
            $data->delete();
            return Redirect::back()->with('hapus','1 Pendaftaran Anggota Dihapus');
        }
        public function semester($value='')
        {
            // code...
        }
        public function verifikasiSemua(Request $request)
        {
            $semester = $request->semester_id;
            $ekskul = $request->ekstrakurikuler_id; 
            $data = Riwayat::where('semester_id',$semester)->where('ekstrakurikuler_id',$ekskul)->where('status_pendaftaran','Belum Diverifikasi')->get();
            $jmlh = count($data);
            foreach ($data as $dat) {
                $dat->status = "Aktif";
                $dat->save();
            }
            return Redirect::back()->with('simpan',$jmlh . ' Pendaftaran Anggota Diverifikasi');
        }
        public function anggota($id)
        {
            $data = User::find(Session::get('id'));
            $anggota = Riwayat::where('ekstrakurikuler_id',$data->ekstrakurikuler_id)->where('status_pendaftaran','Diverifikasi')->where('semester_id',$id)->get();
            $eks = Ekstrakurikuler::find($data->ekstrakurikuler_id);
            $sem = Semester::find($id);
            $title = 'Daftar Anggota';
            return view('anggota.anggota',compact('data','anggota','title','eks','sem'));
        }
        public function inputNilai(Request $request)
        {
            $cek = Riwayat::where('anggota_id',$request->anggota_id)->where('ekstrakurikuler_id',$request->ekstrakurikuler_id)->where('semester_id',$request->semester_id)->first();
            $cek->nilai = $request->nilai;
            $cek->save();
            return Redirect::back()->with('simpan','Berhasil Input Nilai');

        }

        public function dashboardSiswa()
        {
            $data = Anggota::find(Session::get('id'));
            $riwayat = Riwayat::where('anggota_id',$data->id)->get();
            $semester = Semester::where('status','1')->get();
            $ekskuls = Ekstrakurikuler::all();
            $title = 'Dashboard Siswa';
            return view('anggota.dashboard',compact('data','riwayat','title','semester','ekskuls'));
        }
        public function informasiEkskul($semester,$ekskul)
        {
            $data = Anggota::find(Session::get('id'));
            $ekskul = Ekstrakurikuler::find($ekskul);
            $jadwal = Jadwal::where('ekstrakurikuler_id',$ekskul->id)->first();
            $semester = Semester::find($semester);
            $kegiatan = Kegiatan::where('ekstrakurikuler_id',$ekskul->id)->get();
            $title = 'Panel Siswa';
            return view('anggota.ekskul',compact('data','ekskul','jadwal','kegiatan','title','semester'));
        }
        public function daftarUlang(Request $request)
        {
            $cek = Riwayat::where('anggota_id',$request->anggota_id)->where('semester_id',$request->semester_id)->first();
            if($cek){
                return Redirect::back()->with('hapus','Anda Sudah Mendaftar Ekstrakurikuler Pada Periode Tersebut, Hubungi Pembina Untuk Menghapus Data Pendaftaran Sebelumnya');
            }
            else{
                $riwayat =  Riwayat::create([
                'anggota_id' => $request->anggota_id,
                'ekstrakurikuler_id' => $request->ekstrakurikuler_id,
                'semester_id' => $request->semester_id,
                'status_pendaftaran' => 'Belum Diverifikasi',
                'alasan' => $request->alasan,
                
                ]);

                if($riwayat){
                    return Redirect::back()->with('simpan','Daftar Ulang Berhasil, Tunggu Verifikasi Dari Pembina');
                }
                else{
                    return Redirect::back()->with('hapus','Daftar Ulang Gagal');
                }
            }
        }
        public function gantiPassword(Request $request)
        {
            
            $id = $request->anggota_id;
            $cari = Anggota::find($id);
            if(isset($request->old_pass)){
                if(Hash::check($request->old_pass , $cari->password)){
                    if ($request->hasFile('avatar')) {
                        $fileNameToStore = $request->file('avatar')->getClientOriginalName();
                        $logoPath = $request->file('avatar')->storeAs('public/ekskul/avatar', $fileNameToStore);
                        if ($cari->avatar) {
                            Storage::delete('storage/ekskul/avatar/' . basename($cari->avatar));
                            $avatar = 'storage/ekskul/avatar/'.$fileNameToStore;
                        }
                        $avatar = 'storage/ekskul/avatar/'.$fileNameToStore;
                    }
                    else{
                        $avatar = $cari->avatar;
                    }

                    $cari->password = Hash::make($request->new_pass);
                    $cari->avatar = $avatar;
                    $cari->save();
                    return Redirect::back()->with('simpan','Password Berhasil Diubah');

                }        
                else{
                    return Redirect::back()->with('hapus','Password yang diinputkan salah');
                }
            }
            else{
                if ($request->hasFile('avatar')) {
                        $fileNameToStore = $request->file('avatar')->getClientOriginalName();
                        $logoPath = $request->file('avatar')->storeAs('public/ekskul/avatar', $fileNameToStore);
                        if ($cari->avatar) {
                            Storage::delete('storage/ekskul/avatar/' . basename($cari->avatar));
                            $avatar = 'storage/ekskul/avatar/'.$fileNameToStore;
                        }
                        $avatar = 'storage/ekskul/avatar/'.$fileNameToStore;
                        $cari->avatar = $avatar;
                        $cari->save();
                        return Redirect::back()->with('simpan','Avatar Berhasil Diubah');
                }
                else{
                        return Redirect::back()->with('edit','Tidak Ada Data Yang Diubah');
                }
            }
        }
        public function gantiProfil(Request $request)
        {
            //Fungsi untuk mengganti profil siswa
            $id = $request->anggota_id;

            $cari = Anggota::find($id);

            $cari -> nis = $request->old_nis;
            $cari -> nama = $request->old_name;
            $cari -> email = $request->old_email;
            $cari -> jk = $request->old_jk;
            $cari->save();
            return Redirect::back()->with('simpan','Profil Berhasil Diubah');
        }
        public function nilai($id,$sem)
        {
            $title= "Form Penilaian Anggota";
            $siswa= Anggota::find($id);
            $pem = Session::get('id');
            $pembina = User::find($pem);
            $riwayat = Riwayat::where('anggota_id',$siswa->id)->where('ekstrakurikuler_id',$pembina->ekstrakurikuler_id)->where('status_pendaftaran','Diverifikasi')->where('semester_id',$sem)->first();

            $soals = Soal::all();
            return view('anggota.form_nilai',compact('siswa','pembina','soals','riwayat','title'));
        }
        public function storeNilai(Request $request)
        {
            $rid = $request->riwayat_id;
            $jawaban = $request->jawaban;
            
            $soal = Soal::all();
            foreach($soal as $sol){
                $jawab = new Jawaban;
                $jawab->riwayat_id = $rid;
                $jawab->soal_id = $sol->id;
                $jawab->jawaban = $jawaban[$sol->id];
                $jawab->save();
            }
            return Redirect::back();
        }
        public function showNilai($id)
        {
            $riwayat = Riwayat::find($id);
            $cari = Jawaban::where('riwayat_id',$id)->get();
            $anggota = Anggota::find($riwayat->anggota_id);
            $semester = Semester::find($riwayat->semester_id);
            $eskul = Ekstrakurikuler::find($riwayat->ekstrakurikuler_id);
            $soals = Soal::all();
            $title = "Penilaian Siswa";

            return view('anggota.lihat_nilai',compact('riwayat','title','anggota','semester','eskul','soals'));

        }
    
}
