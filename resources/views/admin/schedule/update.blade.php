@extends('layouts.app')

@section('title', 'Ubah Jadwal')

@section('main')
<div class="card shadow mb-4">
  <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Jadwal / Ubah Jadwal</h6>
  </div>
  <div class="card-body">
    <form action="/admin/schedule/{{$schedules->id}}/update" method="POST">
    @method('patch')
      @csrf
          <div class="form-group">
          <label for="course_id">Mata Pelajaran : </label>
          <select class="form-control @error('course_id') is-invalid @enderror" name="course_id" id="course_id">
          <option value="{{ $schedules->course->id }}">{{ $schedules->course->name }}</option>
            @foreach($courses as $course)
            <option value="{{$course->id}}">{{$course->name}}</option>
            @endforeach
          </select>
          @error('course_id') 
            <div class="invalid-feedback">{{$message}}</div>
          @enderror
          </div>
      
          <div class="form-group">
          <label for="start_time">Waktu Mulai : </label>
                  <input type="time" class="form-control @error('start_time') is-invalid @enderror" id="start_time" name="start_time" value="{{$schedules->start_time}}">
                  @error('start_time') 
                    <div class="invalid-feedback">{{$message}}</div>
                  @enderror
          </div>

          <div class="form-group">
          <label for="end_time">Waktu Selesai : </label>
                  <input type="time" class="form-control @error('end_time') is-invalid @enderror" id="end_time" name="end_time" value="{{$schedules->end_time}}">
                  @error('end_time') 
                    <div class="invalid-feedback">{{$message}}</div>
                  @enderror
          </div>
          <button type="submit" class="btn btn-primary">Ubah Data</button>
      </form>
  </div>
</div>
@endsection