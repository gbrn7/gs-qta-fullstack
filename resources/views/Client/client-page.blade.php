<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>GS Qta | HomePage</title>

    <!-- Icon -->
    <link rel="icon" href="{{asset((isset($logo) ? 'storage/image/'.$logo->gambar : 'Assets/Img/logo-1.png'))}}"
        type="image/x-icon" />

    {{-- Bootrsrap Css --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />

    {{-- jquery --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    {{-- Box Icon --}}
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />

    <!-- Remix icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.6.0/remixicon.css"
        integrity="sha512-GL7EM8Lf8kU23I3kTio2kRWt8YRDVIQcSZjRVtVRfk05kB/QvkyafuTC94Ev0X6qk7Z0r5s06c1lsP1p/ezDYw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- Css --}}
    <link rel="stylesheet" href="{{asset('Assets/Css/landing-page.css')}}" />
</head>

<body>
    <!-- Navbar Start -->
    <nav class="navbar position-absolute w-100 navbar-expand-md navbar-light">
        <div class="container py-1">
            <div class="text-center">
                <a href="{{route('client.index')}}">
                    <img src="{{asset(($logo ? 'storage/image/'.$logo->gambar : 'Assets/Img/logo-1.png'))}}"
                        class="img-fluid img-logo" />
                </a>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse nav-collapse rounded-2 mt-3 p-3 navbar-collapse justify-content-end toggle"
                id="navbarNav">
                <a href="https://wa.me/{{$noTelepon}}"
                    class="ms-2 d-flex justify-content-center align-items-center align-content-center text-center text-decoration-none text-white bg-success px-2 py-1 rounded-2">
                    <div class="m-0 d-flex gap-2 align-content-center">
                        <i class="ri-whatsapp-line icon-wa mt-0"></i>
                        <span class="m-0 d-md-none d-flex">Whatsapp</span>
                    </div>
                </a>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->

    <!-- Home Start -->
    <section class="home" id="home"
        style="background: url({{(isset($homeBg) ? asset('storage/image/'.$homeBg->gambar) : asset('Assets/Img/relax-686392_1920.jpg'))}})">
        <div class="container home-wrapper h-100">
            <div class="row align-content-center justify-content-center h-100">
                <div class="col-12 mt-md-0">
                    <div class="tagline-wrapper">
                        <div class="header-wrapper header-text text-center text-white">
                            {{$headerContent->judul}}
                        </div>
                        <div class="body-wrapper mt-2 mt-md-0 text-center">
                            <h1 class="text-white tagline text-capitalize">
                                {!! $headerContent->tagline !!}
                            </h1>
                            <p class="text-white desc-text">
                                {!!$headerContent->deskripsi !!}
                            </p>
                        </div>
                        <div class="footer-wrapper text-center">
                            <a href="{{route('client.form')}}"
                                class="btn btn-cta py-2 px-3 rounded-1 text-white bg-black">
                                <span class="cta-text">
                                    {{$headerContent->teks_btn}}
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="custom-shape-divider-bottom-1706349415">
            <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120"
                preserveAspectRatio="none">
                <path
                    d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z"
                    opacity=".25" class="shape-fill"></path>
                <path
                    d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z"
                    opacity=".5" class="shape-fill"></path>
                <path
                    d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z"
                    class="shape-fill"></path>
            </svg>
        </div>
    </section>
    <!-- Home End -->

    <div class="service mt-3">
        <div class="col-12 text-center">
            <span class="text-header p-2 rounded-2">{{$judulkontenPelayanan->judul}}</span>
        </div>

        @foreach ($kontenPelayanan as $item)
        @if ($loop->even)
        <section class="service-wrapper p-5">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-12 col-md-6 text-content">
                        <div class="title text-center">
                            {{$item->judul}}
                        </div>
                        <div class="desc mt-2 text-center">
                            {{$item->deskripsi}}
                        </div>
                    </div>
                    <div class="col-12 col-md-6 d-flex flex-column justify-content-center mt-3 mt-md-0">
                        <img src="{{asset('storage/image/'.$item->thumbnail)}}"
                            class="img-fluid img-service rounded-3" />
                    </div>
                </div>
            </div>
        </section>
        @else
        <section class="service-wrapper mt- p-5">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-12 col-md-6 d-flex flex-column justify-content-center">
                        <img src="{{asset('storage/image/'.$item->thumbnail)}}"
                            class="img-fluid img-service rounded-3" />
                    </div>
                    <div class="col-12 col-md-6 text-content mt-3 mt-md-0" id="">
                        <div class="title text-center">
                            {{$item->judul}}
                        </div>
                        <div class="desc mt-2 text-center">
                            {{$item->deskripsi}}
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @endif
        @endforeach
    </div>

    <!-- Footer Start -->
    <section class="footer bg-white">
        <div class="container footer-wrapper bg-white py-3">
            <div class="row row-1">
                <div class="col-6">
                    <div class="mb-3">
                        <a href="{{route('client.index')}}">
                            <img src="{{asset(($logo ? 'storage/image/'.$logo->gambar : 'Assets/Img/logo-1.png'))}}"
                                class="img-fluid img-logo" />
                        </a>
                    </div>
                    <div class="">
                        <a href=" {{route('signIn')}}" class="text-decoration-none">
                            <div class="my-0 text-black fw-light">
                                Copyright ©{{date("Y")}} GS Qta
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-6">
                    <div class="text-end mb-3">
                        <a href="{{route('signIn')}}" class="text-black text-decoration-none ">Admin</a>
                    </div>
                    <div class="text-end">
                        @foreach ($sosmed as $item)
                        <a target="_blank" href="{{$item->link}}" class="text-decoration-none">
                            <img src="{{'storage/image/'.$item->icon}}" class="img-footer" alt="Sosmed" />
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer End -->
    <div class="modal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Modal body text goes here.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

</body>

<!-- Modal -->
<div class="modal infoModal " tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{$informasi->judul}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>{{$informasi->deskripsi}}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
<!-- Boostrap Js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>

<script>
    $(document).ready(function () {
        @isset($informasi)
            @if($informasi->status)
                $('.infoModal').modal('show')
            @endif
        @endisset
    
    });
</script>


</html>