<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Aplikasi Data Warga </title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('template/src/assets/vendors/feather/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('template/src/assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/src/assets/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('template/src/assets/vendors/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/src/assets/vendors/typicons/typicons.css') }}">
    <link rel="stylesheet"
        href="{{ asset('template/src/assets/vendors/simple-line-icons/css/simple-line-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('template/src/assets/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet"
        href="{{ asset('template/src/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css') }}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet"
        href="{{ asset('template/src/assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('template/src/assets/js/select.dataTables.min.css') }}">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('template/src/assets/css/style.css') }}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset('template/src/assets/images/favicon.png') }}" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">


    {{-- <script>
            // Inisialisasi peta dan pusatkan di lokasi default (misal: Kota Surakarta)
            // Parameter: [latitude, longitude], zoom level
            var map = L.map('map').setView([-7.5563, 110.8318], 13);

            // Tambahkan tile layer dari OpenStreetMap
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            // Variabel global untuk menyimpan marker agar bisa dihapus saat marker baru dibuat
            var marker;

            // Fungsi ini akan dipanggil saat tombol "view" di klik
            function showMap(button) {
                // Ambil semua data dari atribut data-* tombol yang di-klik
                const lat = button.getAttribute('data-lat');
                const lng = button.getAttribute('data-lng');
                const nama = button.getAttribute('data-nama');
                const statusBantuan = button.getAttribute('data-status');

                // Validasi: pastikan latitude dan longitude ada
                if (!lat || !lng) {
                    alert('Data koordinat untuk warga ini tidak tersedia.');
                    return;
                }

                // Hapus marker lama jika ada
                if (marker) {
                    map.removeLayer(marker);
                }

                // Pindahkan view peta ke lokasi baru dengan zoom yang lebih dekat
                map.setView([lat, lng], 17);

                // Buat marker baru di lokasi tersebut dan tambahkan ke peta
                marker = L.marker([lat, lng]).addTo(map);

                // Siapkan teks dan badge untuk status bantuan
                let statusBadgeHtml = (statusBantuan == 1)
                    ? '<span class="badge bg-success">Menerima Bantuan</span>'
                    : '<span class="badge bg-danger">Tidak Menerima</span>';

                // Buat konten untuk popup
                let popupContent = `<b>${nama}</b><br>${statusBadgeHtml}`;

                // Ikatkan popup ke marker dan langsung buka
                marker.bindPopup(popupContent).openPopup();

                // (Opsional) Scroll ke peta agar pengguna bisa langsung melihatnya
                document.getElementById('map').scrollIntoView({ behavior: 'smooth' });
            }
        </script> --}}
</head>

<body class="with-welcome-text">
    <div class="container-scroller">
        @include('layouts.navbar')
        <div class="container-fluid page-body-wrapper">
            @include('layouts.sidebar')
            <div class="main-panel">
                @yield('content')
                <footer class="footer">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Premium <a
                                href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from
                            BootstrapDash.</span>
                        <span class="float-none float-sm-end d-block mt-1 mt-sm-0 text-center">Copyright © 2023. All
                            rights
                            reserved.</span>
                    </div>
                </footer>
            </div>
        </div>
    </div>
    {{-- Jangan lupa sertakan library Leaflet di <head> atau sebelum script ini --}}
    {{-- <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" /> --}}
    {{-- <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script> --}}


    <!-- container-scroller -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Deklarasikan variabel di scope yang lebih luas
            let map = null;
            let marker = null;

            // Ambil elemen-elemen modal
            const mapModal = document.getElementById('mapModal');
            const closeMapBtn = document.getElementById('closeMapBtn');
            const mapTitle = document.getElementById('mapTitle');

            // ==========================================================
            //          PERBAIKAN UTAMA ADA DI SINI
            // ==========================================================
            // 1. Gunakan querySelectorAll untuk mendapatkan SEMUA tombol
            const viewMapButtons = document.querySelectorAll('.js-view-map-btn');

            // 2. Lakukan perulangan (forEach) untuk setiap tombol
            viewMapButtons.forEach(button => {
                // 3. Tambahkan event listener ke SETIAP tombol satu per satu
                button.addEventListener('click', function() {
                    // 'this' akan merujuk ke tombol spesifik yang baru saja diklik
                    const lat = this.dataset.lat;
                    const lng = this.dataset.lng;
                    const nama = this.dataset.nama;
                    const status = this.dataset.status;

                    // Validasi data koordinat
                    if (!lat || !lng || lat === '' || lng === '') {
                        alert('Data koordinat untuk warga ini tidak tersedia.');
                        return;
                    }

                    const statusText = status === '1' ? 'Menerima' : 'Tidak Menerima';

                    // Tampilkan modal
                    mapModal.style.display = 'flex';
                    mapTitle.innerText = `Lokasi: ${nama}`;

                    // Inisialisasi peta jika ini adalah kali pertama modal dibuka
                    if (map === null) {
                        map = L.map('map').setView([lat, lng], 15);
                        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                        }).addTo(map);
                    } else {
                        map.setView([lat, lng], 15);
                    }

                    if (marker) {
                        map.removeLayer(marker);
                    }
                    marker = L.marker([lat, lng]).addTo(map);

                    const popupContent = `<b>${nama}</b><br>Status: ${statusText}`;
                    marker.bindPopup(popupContent).openPopup();

                    // Render ulang peta setelah modal tampil
                    setTimeout(function() {
                        map.invalidateSize();
                    }, 100);
                });
            });

            // Event listener untuk tombol close (x)
            closeMapBtn.addEventListener('click', function() {
                mapModal.style.display = 'none';
            });

            // Juga tutup modal jika pengguna mengklik di luar kontennya
            window.addEventListener('click', function(event) {
                if (event.target == mapModal) {
                    mapModal.style.display = 'none';
                }
            });
        });
    </script>
    <script src="{{ asset('template/src/assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('template/src/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{ asset('template/src/assets/vendors/chart.js/chart.umd.js') }}"></script>
    <script src="{{ asset('template/src/assets/vendors/progressbar.js/progressbar.min.js') }}"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('template/src/assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('template/src/assets/js/template.js') }}"></script>
    <script src="{{ asset('template/src/assets/js/settings.js') }}"></script>
    <script src="{{ asset('template/src/assets/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('template/src/assets/js/todolist.js') }}"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="{{ asset('template/src/assets/js/jquery.cookie.js" type="text/javascript') }}"></script>
    <script src="{{ asset('template/src/assets/js/dashboard.js') }}"></script>
    <!-- <script src="assets/js/Chart.roundedBarCharts.js"></script> -->
    <!-- End custom js for this page-->
</body>

</html>
