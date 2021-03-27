@extends('layouts.app')

@section('title', 'Guru')

@section('main')
<div class="card shadow mb-4">
  <div class="card-header py-3 d-flex justify-content-between">
    <a href="/admin/teacher/create" class="btn btn-primary">Tambah Data Guru</a>
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
    @foreach($teachers as $teacher)
      <tr>
          <th>{{$loop->iteration}}</th>
          <td>{{$teacher->nis}}</td>
          <td>{{$teacher->name}}</td>
          <td>{{$teacher->class->name}}</td>
          <td style="text-align:center">
                <a href="/admin/teacher/{{$teacher->id}}/edit" class="btn btn-success btn-sm mb-2" style="width:60px">Edit</a>
                <a href="/admin/teacher/{{$teacher->user_id}}/delete" class="btn btn-danger btn-sm mb-2" style="width:60px">
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