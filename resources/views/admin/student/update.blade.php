@extends('layouts.app')

@section('title', 'Ubah Siswa')

@section('main')
<div class="card shadow mb-4">
  <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Siswa / Edit Siswa</h6>
  </div>
  <div class="card-body">
    <form action="/admin/student/{{$student->id}}/update" method="POST">
      @method('patch')
      @csrf
          <div class="form-group">
          <label for="name">Nama : </label>
                  <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Masukan nama" id="name" name="name" value="{{ $student->name }}">
                  @error('name') 
                    <div class="invalid-feedback">{{$message}}</div>
                  @enderror
          </div>
      
          <div class="form-group">
          <label for="">Kelas : </label>
          <select class="form-control @error('class_id') is-invalid @enderror" name="class_id" id="class_id">
            <option value="{{ $student->class->id }}">{{ $student->class->name }}</option>
            @foreach($kelas as $class)
            <option value="{{$class->id}}">{{$class->name}}</option>
            @endforeach
          </select>
          @error('class_id') 
            <div class="invalid-feedback">{{$message}}</div>
          @enderror
        </div>
          <button type="submit" class="btn btn-primary">Ubah Data</button>
      </form>
  </div>
</div>

@endsection