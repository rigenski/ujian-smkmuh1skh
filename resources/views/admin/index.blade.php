@extends('layouts.dashboard')

@section('content')

<div class="card-header border-0">
    {{-- <h3 class="mb-0">Daftar Siswa</h3> --}}
    <div class="row justify-content-between">
        <h6 class="h2 d-inline-block mb-0">Daftar Siswa</h6>
      <div class="d-flex">
        <form action="{{route('admin')}}" method="get" class="form-inline mr-sm-3 w-100" id="navbar-search-main">
            <div class="form-group mb-0">
              <div class="input-group input-group-alternative input-group-merge">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-search"></i></span>
                </div>
                <input class="form-control" placeholder="Cari Nama, NIS atau Kelas" type="text" name="query">
              </div>
            </div>
          </form>
        <button type="button" class="btn btn-neutral d-none d-sm-block" data-toggle="modal" data-target="#staticBackdrop">
          IMPORT
        </button>
      </div>
    </div>
  </div>
  <div class="table-responsive">
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col" class="sort" >NIS</th>
          <th scope="col" class="sort" >Nama</th>
          <th scope="col" class="sort" >Kelas</th>
          <th scope="col" class="sort" >Status</th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
        @foreach($students as $student)
        <tr>
          <td>
            {{ $student->nis }}
          </td>
          <th>
            {{ $student->nama }}
          </th>
          <td>
            {{ $student->kelas }}
          </td>
          <td class="d-flex">
            @if( $student->enable == 1 )
            <a href="/admin/student/{{ $student->id }}/enable" class="btn btn-sm btn-success" onclick="return confirm('Yakin NON-AKTIF kan {{ $student->nama }} - {{$student->kelas}} ...?')">
              <svg xmlns="http://www.w3.org/2000/svg" width="8" height="8" fill="currentColor" class="bi bi-circle-fill mr-2 " style="margin-top: -2px;" viewBox="0 0 16 16">
                <circle cx="8" cy="8" r="8"/>
              </svg>
              AKTIF
            </a>
            @else
            <a href="/admin/student/{{ $student->id }}/enable" class="btn btn-sm btn-danger" onclick="return confirm('Yakin AKTIF kan {{ $student->nama }} - {{$student->kelas}} ...?')">
              <svg xmlns="http://www.w3.org/2000/svg" width="8" height="8" fill="currentColor" class="bi bi-circle-fill mr-2 " style="margin-top: -2px;" viewBox="0 0 16 16">
                <circle cx="8" cy="8" r="8"/>
              </svg>
              OFF
            </a>
            @endif
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    <div class="d-flex justify-content-end mr-0 mr-sm-4">
      {{$students->links()}}
    </div>
  </div>

  <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Import Data Excel</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{route('import')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <input type="file" class="form-control-file" id="excel" name="students_data" accept=".xlsx, .xls">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
            <button type="submit" class="btn btn-primary">Import</button>
          </form>
        </div>
      </div>
    </div>
  </div>

@endsection