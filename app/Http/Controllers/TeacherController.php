<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Teacher;
use App\User;
use App\Kelas;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers = Teacher::all();
        return view('admin.teacher.index', compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kelas = Kelas::all();
        return view('admin.teacher.create', compact('kelas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'nis' => 'required',
            'class' => 'required',
        ]);

        $user = User::create([
            "name" => $request->name,
            "role" => "guru",
            "nis" => $request->nis,
            "password" => bcrypt($request->nis)
        ]);

        Teacher::create([
            'name' => $request->name,
            'nis' => $request->nis,
            'class_id' => $request->class,
            'user_id' => $user->id,
        ]);

        return redirect('/admin/teacher')->with('status', 'Guru Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $teacher = Teacher::find($id);
        $kelas = Kelas::where('id', '!=', $teacher->class->id)->get();
        return view('admin.teacher.update', compact('teacher', 'kelas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'class_id' => 'required',
        ]);
        Teacher::find($id)->update($request->all());
        return redirect('/admin/teacher')->with('status', 'Data Berhasil Diubah');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        teacher::where('user_id', $id)->delete();
        User::find($id)->delete();
        return redirect('/admin/teacher/')->with('status', 'Data Berhasil Dihapus !');
    }
}
