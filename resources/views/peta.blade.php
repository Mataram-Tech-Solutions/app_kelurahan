<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peta Kampung di Surakarta</title>
    <style>
        /* Pastikan div peta memiliki tinggi */
        #map {
            height: 600px; /* Saya buat sedikit lebih tinggi */
            width: 100%;
            background-color: #eee;
        }
    </style>
</head>
<body>
    <h1>Peta Lokasi Rumah di Surakarta</h1>
    <p>Ini adalah contoh peta yang berpusat di area Kampung Baluwarti. Klik pada penanda (marker) rumah untuk melihat detail.</p>

    <div id="map"></div>

    <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&callback=initMap" async defer></script>

    <script>
        function initMap() {
            // === 1. TENTUKAN LOKASI PUSAT ===
            // Ganti koordinat ini dengan lokasi kampung Anda.
            // (Contoh: Area Baluwarti, Surakarta)
            const pusatKampung = { lat: -7.5714, lng: 110.8275 };

            // Buat objek Peta (Map)
            const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 17, // Zoom lebih tinggi (mis: 17-19) agar terlihat jelas level kampung
                center: pusatKampung,
                mapTypeId: 'satellite' // Gunakan 'satellite' atau 'hybrid' untuk melihat atap rumah
            });

            // === 2. SIAPKAN DATA MARKER (RUMAH) ===
            // Ganti data ini dengan data Anda yang sebenarnya
            const daftarRumah = [
                {
                    posisi: { lat: -7.5710, lng: 110.8270 }, // Ganti dengan koordinat rumah 1
                    namaKK: "Keluarga Bapak Budi Hartono",
                    infoTambahan: "Rumah No. 12, RT 01 / RW 05"
                },
                {
                    posisi: { lat: -7.5718, lng: 110.8280 }, // Ganti dengan koordinat rumah 2
                    namaKK: "Keluarga Ibu Siti Aminah",
                    infoTambahan: "Warung Sembako, RT 02 / RW 05"
                }
            ];

            // Buat satu InfoWindow. Kontennya akan kita ubah setiap kali marker diklik.
            const infoWindow = new google.maps.InfoWindow();

            // === 3. BUAT MARKER UNTUK SETIAP RUMAH ===
            daftarRumah.forEach(rumah => {
                // Buat objek Marker
                const marker = new google.maps.Marker({
                    position: rumah.posisi, // Tentukan posisinya
                    map: map,               // Tampilkan di peta yang mana
                    title: rumah.namaKK     // Teks yang muncul saat mouse hover
                });

                // Tambahkan event 'click' pada setiap marker
                marker.addListener('click', () => {
                    // Konten HTML untuk InfoWindow (Label)
                    const contentString = 
                        '<div style="font-family: Arial, sans-serif;">' +
                        '<h3 style="margin:0; padding:0;">' + rumah.namaKK + '</h3>' +
                        '<p style="margin-top: 5px;">' + rumah.infoTambahan + '</p>' +
                        '</div>';

                    // Set konten dan buka InfoWindow
                    infoWindow.setContent(contentString);
                    infoWindow.open(map, marker);
                });
            });
        }
    </script>
</body>
</html>