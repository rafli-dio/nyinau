@extends('layouts.app')

@section('title', 'Tambah Guru')

@section('main')
<div class="card shadow mb-4">
  <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Guru / Tambah Guru</h6>
  </div>
  <div class="card-body">
    <form action="/admin/teacher/store" method="POST">
      @csrf
          <div class="form-group">
          <label for="name">Nama : </label>
                  <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Masukan nama" id="name" name="name" value="{{ old('name') }}">
                  @error('name') 
                    <div class="invalid-feedback">{{$message}}</div>
                  @enderror
          </div>
      
          <div class="form-group">
          <label for="nis">Nis : </label>
                  <input type="text" class="form-control @error('nis') is-invalid @enderror" placeholder="Masukan Nis" id="nis" name="nis" value="{{ old('nis') }}">
                  @error('nis') 
                    <div class="invalid-feedback">{{$message}}</div>
                  @enderror
          </div>
      
          <div class="form-group">
          <label for="class">Kelas : </label>
          <select class="form-control @error('class') is-invalid @enderror" name="class" id="class">
            <option value="">Masukan Kelas</option>
            @foreach($kelas as $class)
            <option value="{{$class->id}}" {{old('class') == $class->id ? 'selected' : null}}>{{$class->name}}</option>
            @endforeach
          </select>
          @error('class') 
            <div class="invalid-feedback">{{$message}}</div>
          @enderror
        </div>
      
          <button type="submit" class="btn btn-primary">Tambah Data</button>
      </form>
  </div>
</div>
@endsection