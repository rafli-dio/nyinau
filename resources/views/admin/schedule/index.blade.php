@extends('layouts.app')

@section('title', 'Jadwal')

@section('main')
</form>
<div class="card shadow mb-4">
  <div class="card-header py-3 d-flex justify-content-between">
    <a href="/admin/schedule/create" class="btn btn-primary">Tambah Data Jadwal</a>
    <!-- message -->
    @if(session('status'))
    <div class="alert alert-success m-0 alert-dismissable center" style="width:40em;">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
          {{ session('status') }}
      </div>
    @endif
  </div>

  <div class="card-body">
  @foreach($days as $day)
  <h2>{{$day->name}}</h2>
   <table class="table table-bordered table-striped mt-4">
 
    <thead class="bg-primary text-white">
        <tr>        
        <th>Mata Pelajaran</th>
        <th>Jam Mulai</th>
        <th>Jam Akhir</th>
        <th style="text-align:center;">Aksi</th>
        </tr>
    </thead>
   
    <tbody>
    @foreach($day->schedule as $schedules)
      <tr>
      <td>{{$schedules->course->name}}</td>
          <td>{{$schedules->start_time}}</td>
          <td>{{$schedules->end_time}}</td>
          
          <td style="text-align:center">
                <a href="/admin/schedule/{{$schedules->id}}/edit" class="btn btn-success btn-sm mb-2" style="width:60px">Edit</a>
                <a href="/admin/schedule/{{$schedules->id}}/delete" class="btn btn-danger btn-sm mb-2" style="width:60px">
                  Hapus
                </a>
            </td>   
      </tr>
     @endforeach
    
    </tbody>
  </table>
  @endforeach 
  </div>
</div>

 
@endsection