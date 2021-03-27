@extends('layouts.app')

@section('title', 'Daftar Mata Pelajaran')

@section('main')
<div class="card shadow mb-4">
  <div class="card-header py-3 d-flex justify-content-between">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#formModal">
      Tambah Data Mata Pelajaran
    </button>
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
                    <th>No</th>
                    <th>Nama</th>
                    <th style="text-align:center;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($courses as $course)
                  <tr>
                      <th>{{$loop->iteration}}</th>
                      <td>{{$course->name}}</td>
                      <td style="text-align:center">
                        <a href="/admin/course/{{$course->id}}/edit" class="btn btn-success btn-sm mb-2 px-4">Edit</a>
                        <a  href="/admin/course/{{$course->id}}/delete" class="btn btn-danger btn-sm mb-2 px-4">
                          Hapus
                        </a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
  </div>
</div>
    <!-- Modal -->
  <div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="judulModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="judulModal">Tambah Mata Pelajaran</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/admin/course/store" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nama Mata Pelajaran</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Tambah Mata Pelajaran" id="name" name="name" value="{{ old('name') }}">
            @error('name')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Tambah Data</button>
        </form>
      </div>
    </div>
  </div>
</div>



@endsection