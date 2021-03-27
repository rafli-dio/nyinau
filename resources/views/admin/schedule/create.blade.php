@extends('layouts.app')

@section('title', 'Tambah Jadwal')

@section('main')
<div class="card shadow mb-4">
  <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Jadwal / Tambah Jadwal</h6>
  </div>
  <div class="card-body">
    <form action="/admin/schedule/store" method="POST">
      @csrf
          <div class="form-group">
          <label for="course">Mata Pelajaran : </label>
          <select class="form-control @error('course') is-invalid @enderror" name="course" id="course">
            <option value="">Masukan Mata Pelajaran</option>
            @foreach($courses as $course)
            <option value="{{$course->id}}" {{old('course') == $course->id ? 'selected' : null}}>{{$course->name}}</option>
            @endforeach
          </select>
          @error('course') 
            <div class="invalid-feedback">{{$message}}</div>
          @enderror
          </div>
      
          <div class="form-group">
          <label for="day">Hari : </label>
          <select class="form-control @error('course') is-invalid @enderror" name="day" id="day">
            <option value="">Masukan Hari</option>
            @foreach($days as $day)
            <option value="{{$day->id}}" {{old('day') == $day->id ? 'selected' : null}}>{{$day->name}}</option>
            @endforeach
          </select>
          @error('day') 
            <div class="invalid-feedback">{{$message}}</div>
          @enderror
          </div>

          <div class="form-group">
          <label for="start_time">Waktu Mulai : </label>
                  <input type="time" class="form-control @error('start_time') is-invalid @enderror" id="start_time" name="start_time" value="{{ old('start_time') }}">
                  @error('start_time') 
                    <div class="invalid-feedback">{{$message}}</div>
                  @enderror
          </div>

          <div class="form-group">
          <label for="end_time">Waktu Selesai : </label>
                  <input type="time" class="form-control @error('end_time') is-invalid @enderror" id="end_time" name="end_time" value="{{ old('end_time') }}">
                  @error('end_time') 
                    <div class="invalid-feedback">{{$message}}</div>
                  @enderror
          </div>
          <button type="submit" class="btn btn-primary">Tambah Data</button>
      </form>
  </div>
</div>
@endsection