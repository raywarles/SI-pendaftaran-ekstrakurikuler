<?php

namespace App\Http\Controllers;

use App\Models\Semester;
use Illuminate\Http\Request;
use Redirect;
class SemesterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $semester = Semester::all();
        $title = 'Data Semester';
        return view('semester.list',compact('semester','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        $title = 'Buat Semester';
        return view('semester.create',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = new Semester;
        $input->create($request->all());
        return redirect('list-semester');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Semester  $semester
     * @return \Illuminate\Http\Response
     */
    public function show(Semester $semester)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Semester  $semester
     * @return \Illuminate\Http\Response
     */
    public function edit(Semester $semester)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Semester  $semester
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Semester $semester)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Semester  $semester
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $data = Semester::find($id);
        $data->delete();
        return redirect('list-semester');
    }
    public function setnonAktif($id)
    {
        $data = Semester::find($id);
        $data->status = '0';
        $data->save();
        return redirect('list-semester');
    }
    public function setAktif($id)
    {
        $cek = Semester::where('status','1')->first();
        if (!$cek) {
            $data = Semester::find($id);
            $data->status = '1';
            $data->save();
            return redirect('list-semester');
        }
        else{
            return redirect('list-semester')->with('errors','Tidak dapat memiliki 2 semester Aktif secara bersamaan!');
        }
    }
}
