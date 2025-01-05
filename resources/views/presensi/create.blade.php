{{-- Halaman presensi/create ini adalah untuk melakukan absen masuk dan pulang
    konfigurasi gambar, notifikasi, lokasi dll diatur disini
--}}

@extends('layouts.presensi')

@section('header')
<!-- App Header -->
<div class="appHeader" style="background: rgb(8, 233, 16); color: white;">
    <div class="left">
        <a href="javascript:;" class="headerButton goBack">
            <ion-icon name="chevron-back-outline"></ion-icon>
        </a>
    </div>
    <div class="pageTitle">Silahkan Melakukan Absensi</div>
    <div class="right"></div>
</div>

<style>
    /* ini adalah untuk mengatur camera, dari ukuran, lebar, tinggi dll */
    .webcam-capture,
    .webcam-capture video {
        display: inline-block;
        width: 100% !important;
        margin: auto;
        height: auto !important;
        border-radius: 15px;
    }
    /* ini css untuk mengatur jarak dari map */
    #map {
        height: 200px; /* Ensure the map has a height */
    }
</style>
{{-- ini link css untuk leaflet menampilkan lokasi --}}
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css">
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
@endsection

@section('content')
<div class="row" style="margin-top: 70px">
    <div class="col">
        <input type="hidden" id="lokasi">
        <div class="webcam-capture"></div>
    </div>
</div>
<div class="row">
    <div class="col">
        {{-- untuk mengecek jika lebih dari 1 melakukan absen maka berubah menjadi absen pulang --}}
        @if ($cek > 0)    
        <button id="takeabsen" class="btn btn-danger btn-block"><ion-icon name="camera-outline"></ion-icon>Absen Pulang</button>
        @else
        <button id="takeabsen" class="btn btn-block" style="background: #0f2e64; color: white;"><ion-icon name="camera-outline"></ion-icon>Absen Masuk</button>
        @endif
    </div>
</div>
<div class="row mt-2">
    <div class="col">
        <div id="map"></div>
    </div>
</div>
{{-- Notifikasi ketika melakukan absen --}}
<audio id="notifikasi_in">
    <source src="{{ asset('assets/sound/notifikasi_in.mp3') }}" type="audio/mpeg">
</audio>
<audio id="notifikasi_out">
    <source src="{{ asset('assets/sound/notifikasi_out.mp3') }}" type="audio/mpeg">
</audio>
<audio id="radius_sound">
    <source src="{{ asset('assets/sound/radius.mp3') }}" type="audio/mpeg">
</audio>
@endsection

@push('myscript')
<script>
    // ini untuk mengatur code notifikasi
    var notifikasi_in = document.getElementById('notifikasi_in');
    var notifikasi_out = document.getElementById('notifikasi_out');
    var radius_sound = document.getElementById('radius_sound');

    // ini untuk mengatur Webcam
    Webcam.set({
        height: 480,
        width: 640,
        image_format: 'jpeg',
        jpeg_quality: 80
    });

    // webcam.attach ketika diklik maka akan membaca lokasi kita berada
    Webcam.attach('.webcam-capture');

    // ini untuk mengambil value lokasi kita berada
    var lokasi = document.getElementById('lokasi');

    // ini pengaturan untuk lokasi jika berhasil
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(successCallback, errorCallback);
    } else {
        alert("Geolocation is not supported by this browser.");
    }

    function successCallback(position) {
        lokasi.value = position.coords.latitude + "," + position.coords.longitude;
        var map = L.map('map').setView([position.coords.latitude, position.coords.longitude], 13);
        var marker = L.marker([position.coords.latitude, position.coords.longitude]).addTo(map);
        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);
        }

    function errorCallback() {
        alert("Unable to retrieve your location.");
    }

    // ini konfigurasi ketika kita click absen masuk maka akan mengirim data dibawah
    $("#takeabsen").click(function(e) {
        Webcam.snap(function(uri) {
            image = uri;
        });
        var lokasi = $("#lokasi").val();
        $.ajax({
            type: 'POST',
            url: '/presensi/store',
            data: {
                _token: "{{ csrf_token() }}",
                image: image,
                lokasi: lokasi
            },
            cache: false,
            success: function(respond) {
                var status = respond.split("|");
                if (status[0] == "success") {
                    if (status[2] == "in") {
                        notifikasi_in.play();
                    } else {
                        notifikasi_out.play();
                    }
                    Swal.fire({
                        title: 'Berhasil !',
                        text: status[1],
                        icon: 'success'
                    });
                    setTimeout(function() {
                        location.href = '/dashboard';
                    }, 4000);
                } else {
                    if (status[2] == "radius") {
                        radius_sound.play();
                    }
                    Swal.fire({
                        title: 'Error !',
                        text: status[1],
                        icon: 'error'
                    });
                }
            }
        });
    });
</script>
@endpush