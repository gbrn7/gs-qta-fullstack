<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>GS Qta | HomePage</title>

    <!-- Icon -->
    <link rel="icon" href="{{asset('Assets/Img/logo-1.png')}}" type="image/x-icon" />

    {{-- Bootrsrap Css --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />

    {{-- Box Icon --}}
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />

    <!-- Remix icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.6.0/remixicon.css"
        integrity="sha512-GL7EM8Lf8kU23I3kTio2kRWt8YRDVIQcSZjRVtVRfk05kB/QvkyafuTC94Ev0X6qk7Z0r5s06c1lsP1p/ezDYw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


    <link rel="stylesheet" href="{{asset('Assets/Css/landing-page.css')}}" />
</head>

<body>
    <!-- Navbar Start -->
    <nav class="navbar position-absolute w-100 navbar-expand-md navbar-light">
        <div class="container py-1">
            <div class="text-center">
                <a href="{{route('client.index')}}">
                    <img src="{{asset('Assets/Img/logo-1.png')}}" class="img-fluid img-logo" />
                </a>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse nav-collapse rounded-2 mt-3 p-3 navbar-collapse justify-content-end toggle"
                id="navbarNav">
                <ul class="navbar-nav text-center text-lg-start mt-4 mb-4 mb-lg-0 mt-lg-0 d-flex align-items-center">
                    <li class="nav-item mt-3 mt-lg-0">
                        <a class="text-white nav-link nav-link-1 nav-link-active" href="#home">Home</a>
                    </li>
                    <li class="nav-item mt-3 mt-lg-0">
                        <a class="text-white nav-link nav-link-2" href="#Akupuntur">Akupuntur</a>
                    </li>
                    <li class="nav-item mt-3 mt-lg-0">
                        <a class="text-white nav-link nav-link-4" href="#Fisioterapi">Fisioterapi</a>
                    </li>
                    <li class="nav-item mt-3 mt-lg-0">
                        <a class="text-white nav-link nav-link-4" href="#Pelangsingan">Kecantikan</a>
                    </li>
                </ul>

                <a href="https://wa.me/{{$noTelepon ? $noTelepon : '628118850501'}}"
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
    <section class="home" id="home">
        <div class="container home-wrapper h-100">
            <div class="row align-content-center justify-content-center h-100">
                <div class="col-12 mt-md-0">
                    <div class="tagline-wrapper">
                        <div class="header-wrapper header-text text-center text-white">
                            Griya Sehat Qta
                        </div>
                        <div class="body-wrapper mt-2 mt-md-0 text-center">
                            <h1 class="text-white tagline text-capitalize">
                                Relaksasi dan penyembuhan alami <br />
                                untuk tubuh dan pikiran Anda
                            </h1>
                            <p class="text-white desc-text">
                                Kami menawarkan pelayanan kesehatan yang
                                alami dan efektif
                                <br />
                                untuk membantu Anda mencapai keseimbangan
                                tubuh dan pikiran.
                            </p>
                        </div>
                        <div class="footer-wrapper text-center">
                            <a href="{{route('client.form')}}"
                                class="btn btn-cta py-2 px-3 rounded-1 text-white bg-black">
                                <span class="cta-text">
                                    Reservasi Sekarang
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

    <div class="first-service mt-3">
        <div class="col-12 text-center">
            <span class="text-header p-2 rounded-2">Pelayanan Pengobatan</span>
        </div>
        <!-- Akupuntur service Start-->
        <section class="akupuntur service-wrapper p-5">
            <div class="container akupuntur-wrapper">
                <div class="row justify-content-between">
                    <div class="col-12 col-md-6 text-content" id="Akupuntur">
                        <div class="title text-center">
                            Pengobatan Akupuntur yang Aman dan Efektif
                        </div>
                        <div class="desc mt-2 text-center">
                            Kami menawarkan layanan akupuntur yang aman dan
                            efektif untuk membantu Anda meredakan berbagai
                            jenis sakit dan ketidaknyamanan. Selain itu
                            Akupuntur dapat membantu Anda meredakan
                            ketegangan dan merilekskan pikiran dan tubuh
                            Anda
                        </div>
                    </div>
                    <div class="col-12 col-md-6 d-flex flex-column justify-content-center mt-3 mt-md-0">
                        <img src="{{asset('Assets/Img/acupuncture-5849146_1920.jpg')}}"
                            class="img-fluid img-service rounded-3" />
                    </div>
                </div>
            </div>
        </section>
        <!-- Akupuntur service end -->

        <!-- Fisioterapi service Start-->
        <section class="fisioterapi service-wrapper mt- p-5">
            <div class="container fisioterapi-wrapper">
                <div class="row justify-content-between">
                    <div class="col-12 col-md-6 d-flex flex-column justify-content-center">
                        <img src="{{asset('Assets/Img/sincerely-media-ohMu8-iQfmY-unsplash.jpg')}}"
                            class="img-fluid img-service rounded-3" />
                    </div>
                    <div class="col-12 col-md-6 text-content mt-3 mt-md-0" id="Fisioterapi">
                        <div class="title text-center">
                            Sembuhkan Cedera Anda dengan Fisioterapi yang
                            Tepat
                        </div>
                        <div class="desc mt-2 text-center">
                            Kami menawarkan layanan fisioterapi yang tepat
                            untuk membantu pasien mencapai kesehatan yang
                            optimal. Tim kami terdiri dari fisioterapis
                            berpengalaman yang siap membantu pasien dalam
                            memulihkan kondisi fisik mereka.
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Fisioterapi service end -->
    </div>

    <!-- Beauty Treatment Start-->
    <section class="beauty-section position-relative">
        <div class="custom-shape-divider-top-1706349475">
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
        <!-- SlimTreatment service Start-->
        <section class="slimTreatment service-wrapper">
            <div class="container slimTreatment-wrapper">
                <div class="row justify-content-between card-wrapper">
                    <div class="col-12 text-center mb-4">
                        <span class="p-2 rounded-2 text-header">Pelayanan Kecantikan</span>
                    </div>
                    <div class="col-12 col-lg-5 text-content" id="Pelangsingan">
                        <div class="title text-center">
                            Kurangi Berat Badan Anda dengan Treatment
                            Pelangsing yang Aman dan Efektif
                        </div>
                        <div class="desc mt-2 text-center">
                            Kami memahami bahwa kelebihan berat badan dapat
                            memengaruhi kesehatan dan kepercayaan diri Anda.
                            Oleh karena itu, kami menawarkan treatment
                            pelangsing yang aman dan efektif untuk membantu
                            Anda mencapai tubuh impian Anda.
                        </div>
                    </div>

                    <div class="col-12 col-lg-5 mt-3 mt-lg-0 text-content">
                        <div class="title text-center">
                            Perawatan Estetik
                        </div>
                        <div class="desc mt-2 text-center">
                            Kami menawarkan kepada anda pelayanan perawatan
                            estetik atau perawatan kecantikan, termasuk
                            perawatan tubuh, dan lain-lain
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- SlimTreatment service end -->
    </section>
    <!-- Beuty Treatment End -->

    <!-- Footer Start -->
    <section class="footer">
        <div class="container footer-wrapper py-3">
            <div class="row row-1">
                <div class="col-12 text-center">
                    <div class="text-center">
                        <div class="my-0 text-black">
                            Copyright ©{{date("Y")}} GS Qta
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer End -->
</body>
<!-- Boostrap Js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>

<!-- Main Js -->
<script src="{{asset('Assets/Js/Index script/script.js')}}"></script>

</html>