@extends('layouts.app')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-sm-12">
                <div class="home-tab">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Total Pengguna</h5>
                                    <p class="card-text fs-1 fw-bold">1.250</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Pesanan Baru</h5>
                                    <p class="card-text fs-1 fw-bold">40</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Produk Terjual</h5>
                                    <p class="card-text fs-1 fw-bold">320</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Laporan Masuk</h5>
                                    <p class="card-text fs-1 fw-bold">8</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="home-tab">
                    <div class="row">
                        <div class="col-lg-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Jumlah Keluarga Per Bulan</h4>
                                    <canvas id="jumlahKeluargaChart" height="120"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Jumlah Rumah</h4>
                                    <canvas id="jumlahRumahChart" height="120"></canvas>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Jumlah Warga</h4>
                                    <canvas id="jumlahWargaChart" height="120"></canvas>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Keluarga Penerima Bantuan</h4>
                                    <canvas id="penerimaBantuanChart" height="180" style="max-height: 180px;"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Status Ekonomi Keluarga</h4>
                                    <canvas id="statusEkonomiChart" height="180" style="max-height: 180px;"></canvas>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Pertumbuhan Penduduk</h4>
                                    <canvas id="pertumbuhanPendudukChart" height="120"></canvas>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Perkembangan Pemukiman</h4>
                                    <canvas id="perkembanganPemukimanChart" height="120"></canvas>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const ctx = document.getElementById('jumlahKeluargaChart').getContext('2d');

        const data = {
            labels: [
                "Jan", "Feb", "Mar", "Apr", "Mei", "Jun",
                "Jul", "Agu", "Sep", "Okt", "Nov", "Des"
            ],
            datasets: [{
                label: 'Jumlah Keluarga',
                data: [150, 160, 155, 170, 180, 175, 190, 200, 210, 205, 220, 230],
                backgroundColor: "hsl(212 91% 55%)",
                borderRadius: 6,
                barThickness: 26
            }]
        };

        const jumlahKeluargaChart = new Chart(ctx, {
            type: 'bar',
            data: data,
            options: {
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                return context.raw + " KK";
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: false,
                        min: 140
                    }
                }
            }
        });
    </script>

    <script>
        const rumahCtx = document.getElementById('jumlahRumahChart').getContext('2d');

        new Chart(rumahCtx, {
            type: 'bar',
            data: {
                labels: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agu", "Sep", "Okt", "Nov", "Des"],
                datasets: [{
                    label: "Jumlah Rumah",
                    data: [140, 150, 155, 160, 165, 170, 175, 180, 185, 190, 195,
                        200
                    ], // sesuaikan dengan data kamu
                    backgroundColor: "hsl(150 60% 40%)",
                    borderRadius: 6,
                    barThickness: 24,
                }]
            },
            options: {
                scales: {
                    y: {
                        min: 135,
                        ticks: {
                            color: "hsl(215 15% 45%)"
                        }
                    },
                    x: {
                        ticks: {
                            color: "hsl(215 15% 45%)"
                        }
                    }
                },
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: (ctx) => `${ctx.raw} unit`
                        }
                    }
                }
            }
        });
    </script>

    <script>
        const wargaCtx = document.getElementById('jumlahWargaChart').getContext('2d');

        new Chart(wargaCtx, {
            type: 'line',
            data: {
                labels: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agu", "Sep", "Okt", "Nov", "Des"],
                datasets: [{
                    label: "Jumlah Warga",
                    data: [550, 560, 575, 590, 600, 615, 630, 650, 670, 690, 710, 730], // sesuaikan
                    borderColor: "hsl(215 60% 40%)",
                    backgroundColor: "hsl(215 60% 40%)",
                    tension: 0.4,
                    borderWidth: 2.5,
                    pointRadius: 4,
                    pointHoverRadius: 6
                }]
            },
            options: {
                scales: {
                    y: {
                        min: 550,
                        ticks: {
                            color: "hsl(215 15% 45%)"
                        }
                    },
                    x: {
                        ticks: {
                            color: "hsl(215 15% 45%)"
                        }
                    }
                },
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: (ctx) => `${ctx.raw} orang`
                        }
                    }
                }
            }
        });
    </script>

    <script>
        const bantuanCtx = document.getElementById('penerimaBantuanChart').getContext('2d');

        // ==== DUMMY DATA ====
        const totalKeluarga = 100;
        const penerima = 30;
        const tidakMenerima = totalKeluarga - penerima;
        // =====================

        new Chart(bantuanCtx, {
            type: 'doughnut',
            data: {
                labels: ["Penerima", "Tidak Menerima"],
                datasets: [{
                    data: [penerima, tidakMenerima],
                    backgroundColor: [
                        "hsl(35 90% 55%)",
                        "hsl(215 15% 95%)"
                    ],
                }]
            },
            options: {
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: (ctx) => {
                                let value = ctx.raw;
                                let pct = ((value / totalKeluarga) * 100).toFixed(1);
                                return `${value} KK (${pct}%)`;
                            }
                        }
                    }
                }
            }
        });
    </script>

    <script>
        const ekonomiCtx = document.getElementById("statusEkonomiChart").getContext("2d");

        const dataStatusEkonomi = [{
                nama: "Mampu",
                value: 120
            },
            {
                nama: "Tidak Mampu",
                value: 80
            }
        ];

        new Chart(ekonomiCtx, {
            type: "doughnut",
            data: {
                labels: dataStatusEkonomi.map(i => i.nama),
                datasets: [{
                    data: dataStatusEkonomi.map(i => i.value),
                    backgroundColor: [
                        "hsl(210 90% 55%)",
                        "hsl(10 75% 55%)"
                    ],
                    borderWidth: 2,
                    borderColor: "#fff"
                }]
            },
            options: {
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: (ctx) => {
                                const total = dataStatusEkonomi.reduce((a, b) => a + b.value, 0);
                                const val = ctx.raw;
                                return `${val} KK (${((val / total) * 100).toFixed(1)}%)`;
                            }
                        }
                    },
                    legend: {
                        position: "bottom",
                        labels: {
                            color: "#333",
                            font: {
                                size: 12
                            }
                        }
                    }
                }
            }
        });
    </script>

    <script>
        const pendudukCtx = document.getElementById("pertumbuhanPendudukChart").getContext("2d");

        const dataPertumbuhanPenduduk = [{
                tahun: "2018",
                lahir: 20,
                meninggal: 5,
                pindah: 8,
                datang: 12
            },
            {
                tahun: "2019",
                lahir: 25,
                meninggal: 10,
                pindah: 7,
                datang: 15
            },
            {
                tahun: "2020",
                lahir: 22,
                meninggal: 7,
                pindah: 6,
                datang: 14
            },
            {
                tahun: "2021",
                lahir: 30,
                meninggal: 12,
                pindah: 10,
                datang: 20
            }
        ];

        new Chart(pendudukCtx, {
            type: "bar",
            data: {
                labels: dataPertumbuhanPenduduk.map(i => i.tahun),
                datasets: [{
                        label: "Lahir",
                        data: dataPertumbuhanPenduduk.map(i => i.lahir),
                        backgroundColor: "hsl(200 70% 55%)",
                        borderRadius: 6
                    },
                    {
                        label: "Meninggal",
                        data: dataPertumbuhanPenduduk.map(i => i.meninggal),
                        backgroundColor: "hsl(0 70% 55%)",
                        borderRadius: 6
                    },
                    {
                        label: "Pindah",
                        data: dataPertumbuhanPenduduk.map(i => i.pindah),
                        backgroundColor: "hsl(280 70% 55%)",
                        borderRadius: 6
                    },
                    {
                        label: "Datang",
                        data: dataPertumbuhanPenduduk.map(i => i.datang),
                        backgroundColor: "hsl(140 70% 55%)",
                        borderRadius: 6
                    }
                ]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            color: "hsl(215 15% 45%)"
                        }
                    },
                    x: {
                        ticks: {
                            color: "hsl(215 15% 45%)"
                        }
                    }
                },
                plugins: {
                    legend: {
                        position: "bottom",
                        labels: {
                            color: "#333",
                            font: {
                                size: 12
                            }
                        }
                    }
                }
            }
        });
    </script>

    <script>
        const perkembanganCtx = document.getElementById('perkembanganPemukimanChart').getContext('2d');

        // === Dummy data (sama seperti versi React) ===
        const perkembanganPemukimanData = [{
                tahun: "2019",
                rumah: 120,
                renovasi: 15
            },
            {
                tahun: "2020",
                rumah: 130,
                renovasi: 18
            },
            {
                tahun: "2021",
                rumah: 150,
                renovasi: 22
            },
            {
                tahun: "2022",
                rumah: 170,
                renovasi: 25
            },
            {
                tahun: "2023",
                rumah: 200,
                renovasi: 30
            },
        ];

        const labelsPemukiman = perkembanganPemukimanData.map(i => i.tahun);
        const dataRumah = perkembanganPemukimanData.map(i => i.rumah);
        const dataRenovasi = perkembanganPemukimanData.map(i => i.renovasi);

        new Chart(perkembanganCtx, {
            type: "line",
            data: {
                labels: labelsPemukiman,
                datasets: [{
                        label: "Total Rumah",
                        data: dataRumah,
                        borderColor: "hsl(212 85% 55%)",
                        backgroundColor: "hsl(212 85% 55%)",
                        tension: 0.4,
                        borderWidth: 3,
                        pointRadius: 4,
                        pointHoverRadius: 6,
                    },
                    {
                        label: "Renovasi",
                        data: dataRenovasi,
                        borderColor: "hsl(35 85% 55%)",
                        backgroundColor: "hsl(35 85% 55%)",
                        tension: 0.4,
                        borderWidth: 3,
                        pointRadius: 4,
                        pointHoverRadius: 6,
                    }
                ]
            },
            options: {
                plugins: {
                    legend: {
                        position: "bottom",
                        labels: {
                            color: "hsl(215 15% 45%)",
                            font: {
                                size: 12
                            }
                        }
                    },
                    tooltip: {
                        backgroundColor: "white",
                        bodyColor: "#333",
                        borderColor: "#eee",
                        borderWidth: 1,
                        callbacks: {
                            label: function(ctx) {
                                return `${ctx.dataset.label}: ${ctx.raw}`;
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: false,
                        ticks: {
                            color: "hsl(215 15% 45%)"
                        }
                    },
                    x: {
                        ticks: {
                            color: "hsl(215 15% 45%)"
                        }
                    }
                }
            }
        });
    </script>
@endsection
