<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="csrf-token" content="{{csrf_token()}}" />
  <title>Sehat Qta</title>

  <!-- Icon -->
  <link rel="shortcut icon" href="{{asset('Assets/Img/logo-1.png')}}" type="image/x-icon" />

  {{-- Bootrsrap Css --}}
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />

  {{-- Style css --}}
  <link rel="stylesheet" href="{{asset('Assets/Css/style.css')}}" />
  @yield('extraStyle')

  {{-- Font Awesome --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

  {{-- Box Icon --}}
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />

  {{-- Date Picker CSS --}}
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

  <!-- Remix icon -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.6.0/remixicon.css"
    integrity="sha512-GL7EM8Lf8kU23I3kTio2kRWt8YRDVIQcSZjRVtVRfk05kB/QvkyafuTC94Ev0X6qk7Z0r5s06c1lsP1p/ezDYw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

  {{-- jquery --}}
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  {{-- Moment --}}
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>

  {{-- Date Picker js --}}
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

</head>

<body>
  {{-- Sweet alert --}}
  @include('sweetalert::alert')

  {{-- Pre Load Start --}}
  @include('layouts.preloader')
  {{-- Pre Load End --}}

  <div class="wrapper">
    {{-- Content Start --}}
    <div class="main-container d-flex">
      @include('layouts.sidebar')
      <div class="content">
        @include('layouts.navbar')
        <div class="content-right px-4 pt-4 ">
          @yield('content')
        </div>
      </div>
    </div>
    {{-- Content End --}}

    <!-- Footer Start -->
    @include('layouts.footer')
    <!-- Footer End -->

  </div>
</body>
<!-- Boostrap Js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

<!-- jquery Table -->
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>

{{-- Javascripts --}}
{{-- js --}}
<script src="{{asset('Assets/Js/script.js')}}"></script>
@stack('js')

{{-- Sweetalert JS --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</html>