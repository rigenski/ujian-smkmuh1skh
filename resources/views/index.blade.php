@extends('layouts.app')

@section('bg-body', 'bg-default')

@section('app')
<!-- Navbar -->
<nav id="navbar-main" class="navbar navbar-horizontal navbar-transparent navbar-main navbar-expand-lg navbar-light">
    <div class="container">
      <a class="navbar-brand" href="dashboard.html">
        <img src="../assets/img/brand/white.png">
      </a>
      </div>
    </div>
  </nav>
  <div class="main-content">
    <!-- Header -->
    <div class="header bg-gradient-primary py-7 py-lg-8 pt-lg-9">
      <div class="container">
        <div class="header-body text-center mb-7">
          <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-6 col-md-8 px-5">
              <h1 class="text-white">Welcome!</h1>
              <p class="text-lead text-white">Masukkan <b>NIS</b> dan <b>Password</b> dengan benar untuk mengunduh kartu ujianmu.</p>
            </div>
          </div>
        </div>
      </div>
      <div class="separator separator-bottom separator-skew zindex-100">
        <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
          <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
        </svg>
      </div>
    </div>
    <!-- Page content -->
    <div class="container mt--8 pb-5">
      <!-- Table -->
      <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
          <div class="card bg-secondary border-0">
            <div class="card-body px-lg-5 py-lg-5">
              <form role="form" method="post" action="{{route('exportPDF')}}">
                @csrf
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                    </div>
                    <input class="form-control" required placeholder="NIS" type="text" name="nis">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input class="form-control" required   placeholder="Password" type="password" name="password">
                  </div>
                </div>
                <div class="text-center">
                  <button type="submit" id="check" class="btn btn-primary my-4 px-5" name="submit">Kirim</button>
                </div>
              </form>
              @if(session('mess'))
              <div class="alert alert-success" role="alert">
                {{ session('mess') }}
              </div>
              @endif
              @if(session('fail'))
              <div class="alert alert-danger" role="alert">
                {{ session('fail') }}
              </div>
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  <!-- Footer -->
  <footer class="py-5" id="footer-main">
    <div class="container">
      <div class="row align-items-center justify-content-xl-between">
        <div class="col-xl-6">
          <div class="copyright text-center text-xl-left text-muted">
            Made by <a href="#" class="font-weight-bold  ml-1">Mutuharjo IT Team</a>
          </div>
        </div>
      </div>
    </div>
  </footer>

  <!-- Modal -->
  {{-- <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" style="top: 10em;">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Download Kartu</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <table class="table">
                <tr>
                  <th>NIS :</th>
                  <td>11123</td>
                </tr>
                <tr>    
                  <th>Nama :</th>
                  <td>Rigen Maulana</td>
                </tr>
                <tr>
                  <th>Kelas:</th>
                  <td>XI RPL</td>
                </tr>
              </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
          <button type="button" class="btn btn-primary">Unduh</button>
        </div>
      </div>
    </div>
  </div> --}}
  @endsection