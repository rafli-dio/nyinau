@extends('layouts.app')

@section('title', 'Ubah Kelas')

@section('main')
<div class="card shadow mb-4">
  <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Kelas / Ubah Kelas</h6>
  </div>
  <div class="card-body">
    <form action="/admin/class/{{$class->id}}/update" method="POST">
      @method('patch')
      @csrf
          <div class="form-group">
          <label for="name">Nama : </label>
                  <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Masukan nama" id="name" name="name" value="{{ $class->name}}">
                  @error('name') 
                    <div class="invalid-feedback">{{$message}}</div>
                  @enderror
          </div>
          <button type="submit" class="btn btn-primary">Ubah Data</button>
      </form>
  </div>
</div>
@endsection