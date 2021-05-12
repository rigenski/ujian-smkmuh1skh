<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Unduh Kartu Ujian</title>
  <!-- Favicon -->
  <link rel="icon" href="{{ asset('assets/img/brand/favicon.png') }}" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="{{ asset('assets/vendor/nucleo/css/nucleo.css') }}" type="text/css">
  <link rel="stylesheet" href="{{ asset('assets/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}" type="text/css">
  <!-- Argon CSS -->
  <link rel="stylesheet" href="{{ asset('assets/css/argon.css?v=1.2.0') }}" type="text/css">
  <link rel="stylesheet" href="{{ asset('assets/vendor/datatables.net/css/jquery.dataTables.min.css') }}" type="text/css">
</head>

<body class="@yield('bg-body')">

    @yield('app')

<!-- Argon Scripts -->
<!-- Core -->
<script src="{{ asset('assets/vendor/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/vendor/js-cookie/js.cookie.js') }}"></script>
<script src="{{ asset('assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js') }}"></script>
<script src="{{ asset('assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js') }}"></script>
<!-- Argon JS -->
<script src="{{ asset('assets/js/argon.js?v=1.2.0') }}"></script>
<script src="{{ asset('assets/vendor/datatables.net/js/jquery.dataTables.min.js') }}"></script>
{{-- <script>
  $(document).ready(function() {
    $('#example').DataTable();
} );
</script> --}}
<script>
  $(document).ready(function(){
  
  $('input#submit').click(function(e){
     e.preventDefault();
     var text = $('#mytext').val();
     var url = 'your url' //we were using Link/addlink in the other example
  
    $.ajax({
     type: "POST",
     url: url,
     data: { mytext: text },
     success: function(){
          //Probably add the code to close your modal box here if successful
          $('#linkSettings').hide();
     },
     });
   });
  });
  </script>
</body>

</html>