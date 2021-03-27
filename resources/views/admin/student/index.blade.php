@extends('layouts.app')

@section('title', 'Siswa')

@section('main')
<div class="card shadow mb-4">
  <div class="card-header py-3 d-flex justify-content-between">
    <a href="/admin/student/create" class="btn btn-primary">Tambah Data Siswa</a>
    <!-- message -->
    @if(session('status'))
    <div class="alert alert-success m-0 alert-dismissable center" style="width:40em;">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
          {{ session('status') }}
      </div>
    @endif
  </div>
  <div class="card-body">
   <!-- end message -->
   <table class="table table-bordered table-striped mt-4">
    <thead class="bg-primary text-white">
        <tr>
        <th>Nomor</th>
        <th>Nis</th>
        <th>Nama</th>
        <th>Kelas</th>
        <th style="text-align:center;">Aksi</th>
        </tr>
    </thead>
    <tbody>
    @foreach($students as $student)
      <tr>
          <th>{{$loop->iteration}}</th>
          <td>{{$student->nis}}</td>
          <td>{{$student->name}}</td>
          <td>{{$student->class->name}}</td>
          <td style="text-align:center">
                <a href="/admin/student/{{$student->id}}/edit" class="btn btn-success btn-sm mb-2" style="width:60px">Edit</a>
                <a href="/admin/student/{{$student->user_id}}/delete" class="btn btn-danger btn-sm mb-2" style="width:60px">
                  Hapus
                </a>
            </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  </div>
</div>

 
@endsection