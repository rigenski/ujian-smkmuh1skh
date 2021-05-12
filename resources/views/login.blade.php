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
      <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7">
          <div class="card bg-secondary border-0 mb-0">
            <div class="card-body px-lg-5 py-lg-5">
                <div class="text-center  mb-4">
                    <h1>Login!</h1>
              <p class="text-lead ">Masukkan data dengan benar</p>
                  </div>
              <form role="form" action="/postLogin" method="post">
                @csrf
                <div class="form-group mb-3">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-address-card"></i></span>
                    </div>
                    <input class="form-control" required placeholder="Username" name="username" type="text">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input class="form-control" required name="password" placeholder="Password" type="password">
                  </div>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary my-4">Masuk</button>
                </div>
              </form>
              @if(session('mess'))
              <div class="alert alert-danger" role="alert">
                {{ session('mess') }}
              </div>
              @endif
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
  @endsection