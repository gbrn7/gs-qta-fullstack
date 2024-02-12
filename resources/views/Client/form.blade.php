<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>GS Qta | Form Reservasi</title>
    <meta name="csrf-token" content="{{csrf_token()}}" />

    <!-- Icon -->
    <link rel="shortcut icon"
        href="{{asset((isset($logo) ? 'storage/image/'.$logo->gambar : 'Assets/Img/logo-1.png'))}}"
        type="image/x-icon" />

    {{-- Bootrsrap Css --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />

    <!-- Remix icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.6.0/remixicon.css"
        integrity="sha512-GL7EM8Lf8kU23I3kTio2kRWt8YRDVIQcSZjRVtVRfk05kB/QvkyafuTC94Ev0X6qk7Z0r5s06c1lsP1p/ezDYw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Jquery -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

    <!-- Link Css -->
    <link rel="stylesheet" href="{{asset('Assets/Css/form.css')}}" />
</head>

<body>
    <div
        class="loading-wrapper d-none h-100 w-100 position-fixed bg-transparent d-flex justify-content-center align-items-center top-0 ">
        <div class="dot-spinner">
            <div class="dot-spinner__dot"></div>
            <div class="dot-spinner__dot"></div>
            <div class="dot-spinner__dot"></div>
            <div class="dot-spinner__dot"></div>
            <div class="dot-spinner__dot"></div>
            <div class="dot-spinner__dot"></div>
            <div class="dot-spinner__dot"></div>
            <div class="dot-spinner__dot"></div>
        </div>
    </div>
    <section class="form-section vh-100">
        <div class="container h-100 d-flex flex-column justify-content-center">
            <div class="row justify-content-center align-content-center">
                <div class="col-12 text-center">
                    <a href="{{route('client.index')}}">
                        <img src="{{asset(($logo ? 'storage/image/'.$logo->gambar : 'Assets/Img/logo-1.png'))}}"
                            class="img-fluid img-logo" />
                    </a>
                </div>
                <div class="col-12 mt-4">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama-pasien" placeholder="Masukkan nama anda"
                            name="nama_pasien" required />
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Alamat</label>
                        <input type="text" class="form-control" id="alamat-pasien" placeholder="Masukkan alamat anda"
                            name="alamat" />
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">No Telepon</label>
                        <input type="text" class="form-control" id="no-telepon-pasien"
                            placeholder="Masukkan no telepon anda" name="no_telepon" />
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Tanggal Reservasi</label>
                        <input type="date" class="form-control" id="tanggal-reservasi"
                            placeholder="Masukkan tanggal reservasi" name="tanggal_reservasi" required readonly />
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Pilih Klinik</label>
                        <select class="form-select" id="klinik-select" required name="id_cabang"
                            aria-label="Default select example" required>
                            @forelse ($branchs as $branch)
                            @if ($loop->first)
                            <option selected value="">
                                Klik untuk memilih Klinik
                            </option>
                            @endif
                            <option value="{{$branch->id}}">{{$branch->nama.' - '.$branch->alamat}}</option>
                            @empty
                            <option value="">Cabang klinik tidak tersedia</option>
                            @endforelse
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Pilih Jadwal Jam Praktik</label>
                        <select class="form-select jam-praktik-select" name="id_jam_praktik" required
                            aria-label="Default select example">
                            <option value="" class="jadwalPraktikDefault">
                                Pilih klinik terlebih dahulu
                            </option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Keluhan Utama</label>
                        <input type="text" class="form-control" id="keluhan" placeholder="Masukkan Keluhan utama anda"
                            name="keluhan" />
                    </div>
                    <button class="btn py-2 w-100 btn-submit">
                        Kirim Reservasi
                    </button>
                </div>
            </div>
        </div>
    </section>
</body>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    const preloader = document.querySelector(".loading-wrapper");
    const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 1500,
    timerProgressBar: true,
    });

    function startLoading() {
    preloader.classList.remove('d-none');
    document.querySelector("html").style.cursor = "wait";
    }


    function endLoading() {
    preloader.classList.add("d-none");
    document.querySelector("html").style.cursor = "default";
}

    $(function () {
            $('input[name="tanggal_reservasi"]').daterangepicker(
                {
                    singleDatePicker: true,
                    showDropdowns: true,
                    locale: {
                        format: "YYYY-MM-DD",
                        cancelLabel: "Clear",
                    },
                },
                function (start, end, label) {}
            );
    });

    $('#klinik-select').change(function (e) {
        branchID = this.value;
        tanggalReservasi = $('#tanggal-reservasi').val();

        startLoading();

        if(!branchID || !tanggalReservasi){
            $('select[name="id_jam_praktik"]').empty().append(`<option value="">Pilih klinik terlebih dahulu</option>`);

        }else{
            $.ajax({
            url: "{{route('client.getJamPraktik')}}",
            type: "GET",
            data: {
                "_token": "{{ csrf_token() }}",
                "branchId": branchID,
                "tanggalReservasi": tanggalReservasi
            },
            success: function(res, status) {
                // handle success
                if(res.data.length > 0){
                    $('select[name="id_jam_praktik"]').empty();
                    res.data.forEach(e => {
                        $('.jam-praktik-select').append(`<option value="${e.id}">${e.jam_mulai} - ${e.jam_selesai} WIB</option>`);
                    });
                }else{
                    $('select[name="id_jam_praktik"]').empty().append(`<option value="">Kuota tidak tersedia, silahkan pilih tanggal atau cabang klinik yang lain</option>`);;
                }
               
            },
            error: function(xhr) {
                // handle error
                console.log(xhr);
            }
            })
            .always(function (dataOrjqXHR, textStatus, jqXHRorErrorThrown) { 
                endLoading();
            });
        }
                endLoading();
        
    });


    $('.btn-submit').click(function (e) { 
        e.preventDefault();

        namaPasien = $('#nama-pasien').val();
        alamat = $('#alamat-pasien').val();
        noTelepon = $('#no-telepon-pasien').val();
        tanggalReservasi = $('#tanggal-reservasi').val();
        branchId = $('#klinik-select').val();
        jamPraktikId = $('.jam-praktik-select').val();
        keluhan = $('#keluhan').val();

        jamPraktikText = $('.jam-praktik-select option:selected').text();
        klinikText = $('#klinik-select option:selected').text();

        startLoading();

        if(!namaPasien || !tanggalReservasi | !branchId | !jamPraktikId ){
            Toast.fire({
                icon: 'warning',
                title: 'Warning',
                text: 'Lengkapi data reservasi'
            })
        }else{
                $.ajax({
                    url: "{{route('client.storeTransaction')}}",
                    type: "POST",
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data: {
                        "id_cabang": branchId,
                        "id_jam_praktik": jamPraktikId,
                        "nama_pasien": namaPasien,
                        "alamat": alamat,
                        "no_telepon": noTelepon,
                        "tanggal_reservasi": tanggalReservasi,
                        "keluhan": keluhan
                    },
                    success: function(res, status) {
                        // handle success
                        console.log(res.nama_pasien);
                        
                        const url = `https://api.whatsapp.com/send?phone={{$noTelepon}}&text=Halo%20Admin%20saya%20ingin%20reservasi%20ke%20klinik%20GS%20Qta%20dengan%20rincian%20seperti%20berikut%20%3A%20%0ANama%20%3A%20*${res.nama_pasien}*%0AAlamat%20%3A%20*${res.alamat}*%0ATanggal%20Reservasi%20%3A%20*${res.tanggal_reservasi}*%0AKlinik%20%3A%20*${klinikText}*%0AJam%20Praktik%20%3A%20*${jamPraktikText}*%20WIB%0AKeluhan%20Utama%20%3A%20*${res.keluhan}*`

                        window.open(url);
                    },
                    error: function(xhr) {
                        // handle error 
                        errors = xhr?.responseJSON?.errors;
                        
                        Toast.fire({
                        icon: 'warning',
                        title: 'Warning',
                        text: 'Internal Server Error'
                        })
                        console.log(xhr, xhr?.responseJSON?.errors);
                    }
                })
        };
        endLoading();

    });
</script>
<!-- Boostrap Js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>

</html>