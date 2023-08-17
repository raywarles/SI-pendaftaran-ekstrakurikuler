<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Session;
use Carbon;
use App\Models\Anggota;
use App\Models\Ekstrakurikuler;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        $title = 'Daftar User';
        return view('user.index',compact('users','title'));
    }
    public function create()
    {
         $title = 'Tambah User';
         $ekskul = Ekstrakurikuler::all();
        return view('user.create',compact('title','ekskul'));
    }
    public function store(Request $request)
    {
         
        $request->validate([
             'name' => 'required',
             'email' => 'required|email',
             'password' =>'required|min:8',
             'level' => 'required',
        ]);

        if($request->level != 'Pembina'){
            $eks = null;
        }
        elseif($request->level == 'Pembina'){
            $eks = $request->ekstrakurikuler_id;
        }
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'level' => $request->level,
            'ekstrakurikuler_id' => $eks,
            'status' => 'Aktif',
        ]);
        return redirect()->route('users')->with('simpan','User Berhasil Dibuat');
    }
    public function delete($id)
    {
           $data = User::find($id);
        $data->delete();
         return redirect()->route('users')->with('hapus','User Berhasil Dihapus');
    }   
    public function loginValidate(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        $cek_user = User::where('email',$email)->first();
        $cek_anggota = Anggota::where('email',$email)->first();

        if($cek_user){
            if(Hash::check($password , $cek_user->password)){

                if($cek_user->status_pendaftaran == 'SUKSES') {
                    Session::put('id',$cek_user->id);
                    Session::put('login',TRUE);
                    Session::put('level',$cek_user->level);
                    Session::put('nama',$cek_user->name);
                    return redirect('/');
                }else{
                    return redirect('/login')->with('hapus','Akun Anda Belum Aktif, Hubungi Admin Untuk Aktivasi');
                }
                
            }        
            else{
                return redirect('/login')->with('hapus','Password yang diinputkan salah');
            }
        }
        elseif($cek_anggota){
            if(Hash::check($password , $cek_anggota->password)){
                if($cek_anggota->status == 'Aktif') {
                    Session::put('id',$cek_anggota->id);
                    Session::put('login',TRUE);
                    Session::put('level',$cek_anggota->level);
                    Session::put('nama',$cek_anggota->name);
                    return redirect('/');
                }else{
                    return redirect('/login')->with('hapus','Akun Anda Belum Aktif, Hubungi Pembina Untuk Aktivasi');
                }
            }        
            else{
                return redirect('/login')->with('hapus','Password yang diinputkan salah');
            }
        }
        else{
            return redirect('/login')->with('hapus','Email Yang Anda Inputkan Salah Atau Tidak Terdaftar');
        }
    }
    public function logout()
    {
        Session::flush();
        return redirect('/')->with('simpan','Anda Telah Logout');
    }
}
