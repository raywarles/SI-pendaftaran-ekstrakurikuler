<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\EkskulController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SemesterController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LaporanController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('/home',[HomeController::class,'index'])->name('home.index');
Route::get('/login',[HomeController::class,'login'])->name('login');
Route::get('/registrasi-pembina',[HomeController::class,'registrasi_pembina'])->name('registrasi-pembina');
Route::post('/registrasi-pembina/store',[HomeController::class,'pembinaStore'])->name('pembina.store');
Route::get('/logout',[UserController::class,'logout'])->name('logout');
Route::post('/store-login',[UserController::class,'loginValidate'])->name('login.store');
Route::get('/ekskul',[EkskulController::class,'index'])->name('ekskul.index');
Route::get('/read-prestasi/{id}',[HomeController::class,'readPrestasi'])->name('prestasi.read');
Route::get('/read-galeri/{id}',[HomeController::class,'readGaleri'])->name('galeri.read');

//CRUD USER
Route::get('/list-user',[UserController::class,'index'])->name('users');
Route::get('/create-user',[UserController::class,'create'])->name('users.create');
Route::post('/store-user',[UserController::class,'store'])->name('users.store');
Route::get('/delete-user/{id}',[UserController::class,'delete'])->name('users.delete');

//CRUD EKSKUL
Route::get('/list-ekskul',[EkskulController::class,'index'])->name('ekskul');
Route::get('/sunting-ekskul',[EkskulController::class,'settingEkskul'])->name('sunting.ekskul');
Route::get('/read-ekskul/{slug}',[EkskulController::class,'read'])->name('ekskul.read');
Route::get('/create-ekskul',[EkskulController::class,'create'])->name('ekskul.create');
Route::get('/delete-ekskul/{id}',[EkskulController::class,'delete'])->name('ekskul.delete');
Route::get('/edit-ekskul/{id}',[EkskulController::class,'edit'])->name('ekskul.edit');
Route::post('/update-ekskul/{id}',[EkskulController::class,'update'])->name('ekskul.update');
Route::post('/update-ekskul/pembina/{id}',[EkskulController::class,'pembinaUpdate'])->name('pembina.update');
Route::post('/store-ekskul',[EkskulController::class,'store'])->name('ekskul.store');

//CRUD Semester
Route::get('/list-semester',[SemesterController::class,'index'])->name('semester');
Route::get('/create-semester',[SemesterController::class,'create'])->name('semester.create');
Route::post('/store-semester',[SemesterController::class,'store'])->name('semester.store');
Route::get('/delete-semester/{id}',[SemesterController::class,'delete'])->name('semester.delete');
Route::get('/nonaktif-semester/{id}',[SemesterController::class,'setnonAktif'])->name('semester.nonaktif');
Route::get('/aktif-semester/{id}',[SemesterController::class,'setAktif'])->name('semester.aktif');

//ANGGOTA
Route::get('/anggota-dashboard',[AnggotaController::class,'dashboardSiswa'])->name('dash.siswa');
Route::get('/registrasi-anggota',[AnggotaController::class,'index'])->name('registrasi');
Route::post('/store-anggota',[AnggotaController::class,'store'])->name('anggota.store');
Route::post('/daftar-ulang',[AnggotaController::class,'daftarUlang'])->name('daftar.ulang');
Route::get('/semester-list',[AnggotaController::class,'indexVerifikasi'])->name('verifikasi.index');
Route::get('/pendaftaran-list/{id}',[AnggotaController::class,'listVerifikasi'])->name('verifikasi.list');

Route::get('/anggota-list/{id}',[AnggotaController::class,'anggota'])->name('anggota.list');
Route::get('/verifikasi/{id}',[AnggotaController::class,'verifikasi'])->name('verifikasi.verif');
Route::get('/verifikasi-delete/{id}',[AnggotaController::class,'hapus'])->name('verifikasi.delete');
Route::post('/verifikasi-semua',[AnggotaController::class,'verifikasiSemua'])->name('verifikasi.semua');
Route::post('/cetak-semua',[AnggotaController::class,'cetakSemua'])->name('cetak.semua');

Route::post('/input-nilai',[AnggotaController::class,'inputNilai'])->name('input.nilai');
Route::get('/anggota-nilai/{id}/{sem}',[AnggotaController::class,'nilai'])->name('anggota.nilai');
Route::post('/anggota-nilai/simpan',[AnggotaController::class,'storeNilai'])->name('nilai.simpan');
Route::get('/show-nilai/{id}',[AnggotaController::class,'showNilai'])->name('nilai.show');


Route::get('/informasi-ekskul/{semester}/{ekskul}',[AnggotaController::class,'informasiEkskul'])->name('informasi.ekskul');
Route::post('/anggota-ganti-password',[AnggotaController::class,'gantiPassword'])->name('anggota.gantipass');
Route::post('/anggota-ganti-profil',[AnggotaController::class,'gantiProfil'])->name('anggota.gantiProfil');

//KEGIATAN
Route::get('/list-kegiatan',[KegiatanController::class,'index'])->name('kegiatan');
Route::get('/delete-kegiatan/{id}',[KegiatanController::class,'delete'])->name('kegiatan.delete');
Route::post('/update-kegiatan/{id}',[KegiatanController::class,'update'])->name('kegiatan.update');
Route::post('/store-kegiatan',[KegiatanController::class,'store'])->name('kegiatan.store');

//PRESTASI
Route::get('/list-prestasi',[KegiatanController::class,'indexPrestasi'])->name('prestasi');
Route::get('/delete-prestasi/{id}',[KegiatanController::class,'deletePrestasi'])->name('prestasi.delete');
Route::post('/update-prestasi/{id}',[KegiatanController::class,'updatePrestasi'])->name('prestasi.update');
Route::post('/store-prestasi',[KegiatanController::class,'storePrestasi'])->name('prestasi.store');

//GALERI
Route::get('/list-galeri',[GaleriController::class,'index'])->name('galeri');
Route::get('/delete-galeri/{id}',[GaleriController::class,'delete'])->name('galeri.delete');
Route::post('/update-galeri/{id}',[GaleriController::class,'update'])->name('galeri.update');
Route::post('/store-galeri',[GaleriController::class,'store'])->name('galeri.store');

//FOTO
Route::get('/delete-foto/{id}',[GaleriController::class,'deleteFoto'])->name('foto.delete');
Route::post('/update-foto/{id}',[GaleriController::class,'updateFoto'])->name('foto.update');
Route::post('/store-foto',[GaleriController::class,'storeFoto'])->name('foto.store');

//JADWAL
Route::post('/update-jadwal/{id}',[EkskulController::class,'updateJadwal'])->name('jadwal.update');
Route::post('/store-jadwal',[EkskulController::class,'storeJadwal'])->name('jadwal.store');

Route::post('export-anggota', [EkskulController::class, 'exportAnggota'])->name('export.anggota');
Route::post('export-absensi', [EkskulController::class, 'exportAbsen'])->name('export.absen');
Route::post('export-nilai', [EkskulController::class, 'exportNilai'])->name('export.nilai');

//LAPORAN
Route::get('/laporan',[LaporanController::class,'index'])->name('laporan');
Route::post('/laporan/anggota',[LaporanController::class,'laporanAnggota'])->name('laporan.anggota');
Route::post('/laporan/jumlah',[LaporanController::class,'laporanJumlah'])->name('laporan.jumlah');
Route::post('/laporan/prestasi',[LaporanController::class,'laporanPrestasi'])->name('laporan.prestasi');
Route::post('/laporan/kegiatan',[LaporanController::class,'laporanKegiatan'])->name('laporan.kegiatan');