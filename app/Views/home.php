<style>
/* Custom Hero Fullscreen Styling */
.hero-header {
    height: 100vh;
    width: 100%;
    position: relative;
    padding: 0;
    margin: 0;
    overflow: hidden;
}
.header-carousel, .header-carousel .owl-stage-outer, .header-carousel .owl-stage, .header-carousel .owl-item, .header-carousel-item {
    height: 100vh;
    width: 100%;
}
.hero-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    position: absolute;
    top: 0;
    left: 0;
    z-index: 1;
}
.hero-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.4);
    z-index: 2;
}
.hero-content {
    position: relative;
    z-index: 3;
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    text-align: center;
    padding: 0 15px;
}
.hero-title {
    font-family: 'Bebas Neue', sans-serif;
    font-size: 5rem;
    font-weight: 400;
    color: white;
    margin-bottom: 10px;
    letter-spacing: 2px;
}
.hero-subtitle {
    font-family: 'Poppins', sans-serif;
    font-size: 1.5rem;
    color: rgba(255,255,255,0.9);
    max-width: 800px;
    margin: 0 auto;
    line-height: 1.6;
}
@media (max-width: 768px) {
    .hero-title { font-size: 3rem; }
    .hero-subtitle { font-size: 1.1rem; }
}

/* Floating Stats Pill */
.floating-pill-container {
    position: absolute;
    bottom: 50px;
    left: 50%;
    transform: translateX(-50%);
    z-index: 10;
    width: 90%;
    max-width: 1000px;
}
.floating-pill {
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(10px);
    border-radius: 50px;
    box-shadow: 0 15px 35px rgba(0,0,0,0.2);
    padding: 10px 25px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}
.pill-item {
    display: flex;
    align-items: center;
    padding: 0 20px;
}
.pill-item:not(:last-child) {
    border-right: 1px solid rgba(0,0,0,0.1);
}
.pill-icon {
    width: 40px;
    height: 40px;
    background: rgba(25, 135, 84, 0.1);
    color: #198754;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.2rem;
    margin-right: 15px;
}
.pill-label {
    font-size: 0.70rem;
    font-weight: 700;
    color: #198754;
    text-transform: uppercase;
    letter-spacing: 1px;
    margin-bottom: 0;
}
.pill-value {
    font-size: 1.05rem;
    font-weight: 800;
    color: #333;
    margin-bottom: 0;
}
.btn-lihat-peta {
    background: linear-gradient(135deg, #198754, #146c43);
    color: white;
    border: none;
    border-radius: 50px;
    padding: 12px 30px;
    font-weight: 700;
    box-shadow: 0 4px 15px rgba(25, 135, 84, 0.4);
    transition: all 0.3s;
}
.btn-lihat-peta:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(25, 135, 84, 0.6);
    color: white;
}

@media (max-width: 991px) {
    .floating-pill {
        flex-direction: column;
        border-radius: 20px;
        padding: 20px;
        gap: 15px;
    }
    .pill-item {
        width: 100%;
        padding: 10px 0;
    }
    .pill-item:not(:last-child) {
        border-right: none;
        border-bottom: 1px solid rgba(0,0,0,0.1);
    }
    .btn-lihat-peta {
        width: 100%;
        margin-top: 10px;
    }
}

/* Modern Icon-Only Data Cards */
.modern-card.icon-only-card {
    background: #ffffff;
    border-radius: 20px;
    padding: 35px 30px;
    height: 100%;
    position: relative;
    border: 1px solid rgba(0,0,0,0.05);
    transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
    box-shadow: 0 5px 20px rgba(0,0,0,0.02);
    display: flex;
    flex-direction: column;
}

.modern-card.icon-only-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 20px 40px rgba(25, 135, 84, 0.08);
    border-color: rgba(25, 135, 84, 0.2);
}

.modern-card-icon-wrap {
    width: 70px;
    height: 70px;
    border-radius: 20px;
    background: rgba(25, 135, 84, 0.1);
    color: #198754;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 2rem;
    margin-bottom: 25px;
    transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
}

.modern-card.icon-only-card:hover .modern-card-icon-wrap {
    background: #198754;
    color: #fff;
    transform: scale(1.1) rotate(5deg);
    box-shadow: 0 10px 20px rgba(25, 135, 84, 0.3);
}

.modern-card-title {
    font-size: 1.25rem;
    font-weight: 700;
    margin-bottom: 12px;
    color: #2c3e50;
    transition: color 0.3s ease;
}

.modern-card.icon-only-card:hover .modern-card-title {
    color: #198754;
}

.modern-card-text {
    color: #6c757d;
    font-size: 0.95rem;
    line-height: 1.6;
    margin-bottom: 30px;
    flex-grow: 1; /* Pushes footer down */
}

.modern-card-footer {
    display: flex;
    align-items: center;
    margin-top: auto;
}

.modern-card-link {
    font-weight: 700;
    color: #198754;
    text-decoration: none;
    font-size: 0.95rem;
    display: inline-flex;
    align-items: center;
    transition: all 0.3s ease;
}

.modern-card-link-icon {
    width: 35px;
    height: 35px;
    border-radius: 50%;
    background: rgba(25, 135, 84, 0.1);
    display: flex;
    align-items: center;
    justify-content: center;
    margin-left: 12px;
    transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    font-size: 0.85rem;
}

.modern-card.icon-only-card:hover .modern-card-link-icon {
    background: #198754;
    color: #fff;
</style>

<div class="hero-header">
    <div class="header-carousel owl-carousel m-0 p-0">
        <div class="header-carousel-item">
            <img src="<?= base_url('assets/images/bghero/images_1.avif') ?>" class="hero-img" alt="Irigasi">
            <div class="hero-overlay"></div>
            <div class="hero-content">
                <h1 class="hero-title">RISDA</h1>
                <p class="hero-subtitle">Ruang Informasi Sumber Daya Air<br>Dinas Pengelolaan Sumber Daya Air Kabupaten Cilacap</p>
            </div>
        </div>
        <div class="header-carousel-item">
            <img src="<?= base_url('assets/images/bghero/images_2.avif') ?>" class="hero-img" alt="RISDA">
            <div class="hero-overlay"></div>
            <div class="hero-content">
                <h1 class="hero-title">BERSIH</h1>
                <p class="hero-subtitle">Cilacap Bersih Secara Lingkungan dan<br>Bersih Dalam Tata Kelola Infrastruktur Pengairan</p>
            </div>
        </div>
    </div>

    <!-- Floating Stats Pill -->
    <div class="floating-pill-container">
        <div class="floating-pill">
            <div class="d-flex flex-grow-1 justify-content-center flex-wrap flex-lg-nowrap">
                <div class="pill-item">
                    <div class="pill-icon"><i class="fas fa-water"></i></div>
                    <div>
                        <p class="pill-label">Infrastruktur</p>
                        <p class="pill-value">Daerah Irigasi</p>
                    </div>
                </div>
                <div class="pill-item">
                    <div class="pill-icon"><i class="fas fa-city"></i></div>
                    <div>
                        <p class="pill-label">Infrastruktur</p>
                        <p class="pill-value">Drainase Perkotaan</p>
                    </div>
                </div>
                <div class="pill-item">
                    <div class="pill-icon"><i class="fas fa-water"></i></div>
                    <div>
                        <p class="pill-label">Infrastruktur</p>
                        <p class="pill-value">Saluran Pembuang</p>
                    </div>
                </div>
            </div>
            <div class="ms-lg-3 mt-3 mt-lg-0 text-center text-lg-end flex-shrink-0">
                <a href="<?= base_url('Welcome/digital') ?>" class="btn btn-lihat-peta">Lihat Peta</a>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid service py-5">
    <div class="container py-5">
        <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
            <h2 class="display-4 mb-4">Basis Data</h2>
            <p class="mb-0">Basis Data Spasial Sumber Daya Air yang dikelola oleh Dinas PSDA Kabupaten Cilacap</p>
        </div>
        <div class="row g-4 justify-content-center">
            <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.1s">
                <div class="modern-card icon-only-card">
                    <div class="modern-card-icon-wrap">
                        <i class="fas fa-seedling"></i>
                    </div>
                    <h4 class="modern-card-title">Daerah Irigasi</h4>
                    <p class="modern-card-text">Kesatuan wilayah atau hamparan tanah yang mendapatkan air dari satu jaringan irigasi.</p>
                    <div class="modern-card-footer">
                        <a href="<?= base_url('Welcome/di') ?>" class="modern-card-link">
                            Selengkapnya 
                            <span class="modern-card-link-icon"><i class="fas fa-arrow-right"></i></span>
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.2s">
                <div class="modern-card icon-only-card">
                    <div class="modern-card-icon-wrap">
                        <i class="fas fa-city"></i>
                    </div>
                    <h4 class="modern-card-title">Drainase Perkotaan</h4>
                    <p class="modern-card-text">Sistem pengelolaan air untuk mengendalikan limpasan air hujan secara terstruktur.</p>
                    <div class="modern-card-footer">
                        <a href="<?= base_url('Welcome/drainase') ?>" class="modern-card-link">
                            Selengkapnya 
                            <span class="modern-card-link-icon"><i class="fas fa-arrow-right"></i></span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.3s">
                <div class="modern-card icon-only-card">
                    <div class="modern-card-icon-wrap">
                        <i class="fas fa-stream"></i>
                    </div>
                    <h4 class="modern-card-title">Saluran Pembuang</h4>
                    <p class="modern-card-text">Infrastruktur penting yang bertujuan mengalirkan genangan air ke tempat lain.</p>
                    <div class="modern-card-footer">
                        <a href="<?= base_url('Welcome/pembuang') ?>" class="modern-card-link">
                            Selengkapnya 
                            <span class="modern-card-link-icon"><i class="fas fa-arrow-right"></i></span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.4s">
                <div class="modern-card icon-only-card">
                    <div class="modern-card-icon-wrap">
                        <i class="fas fa-water"></i>
                    </div>
                    <h4 class="modern-card-title">Air Baku</h4>
                    <p class="modern-card-text">Sumber air yang muncul dari dalam bumi ke permukaan tanah secara alami atau buatan.</p>
                    <div class="modern-card-footer">
                        <a href="<?= base_url('Welcome/air_baku') ?>" class="modern-card-link">
                            Selengkapnya 
                            <span class="modern-card-link-icon"><i class="fas fa-arrow-right"></i></span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.5s">
                <div class="modern-card icon-only-card">
                    <div class="modern-card-icon-wrap">
                        <i class="fas fa-map-marked-alt"></i>
                    </div>
                    <h4 class="modern-card-title">Peta Digital</h4>
                    <p class="modern-card-text">Peta Spasial sumber daya air di Kab. Cilacap sebagai sarana utama fungsi pemantauan terpadu.</p>
                    <div class="modern-card-footer">
                        <a href="<?= base_url('Welcome/digital') ?>" class="modern-card-link">
                            Selengkapnya 
                            <span class="modern-card-link-icon"><i class="fas fa-arrow-right"></i></span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.6s">
                <div class="modern-card icon-only-card">
                    <div class="modern-card-icon-wrap">
                        <i class="fas fa-faucet"></i>
                    </div>
                    <h4 class="modern-card-title">SPAM</h4>
                    <p class="modern-card-text">Sistem Penyediaan Air Minum di Cilacap yang mengatur jalannya proses layanan distribusi air.</p>
                    <div class="modern-card-footer">
                        <a href="https://spam.psda1.cilacapkab.go.id/" target="_blank" class="modern-card-link">
                            Selengkapnya 
                            <span class="modern-card-link-icon"><i class="fas fa-arrow-right"></i></span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp" data-wow-delay="0.7s">
                <div class="modern-card icon-only-card">
                    <div class="modern-card-icon-wrap">
                        <i class="fas fa-chart-pie"></i>
                    </div>
                    <h4 class="modern-card-title">Statistik</h4>
                    <p class="modern-card-text">Media informasi yang dapat digunakan untuk membantu dalam hal pengambilan keputusan infrastruktur.</p>
                    <div class="modern-card-footer">
                        <a href="<?= base_url('Welcome/statistik/all/no') ?>" class="modern-card-link">
                            Selengkapnya 
                            <span class="modern-card-link-icon"><i class="fas fa-arrow-right"></i></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    window.onload = function() {
        var chart = new CanvasJS.Chart("chartContainer", {
            title: {
                text: "Kondisi Saluran Irigasi"
            },
            data: [{
                // Change type to "doughnut", "line", "splineArea", etc.
                type: "column",
                dataPoints: [{
                        label: "Baik Sekali",
                        y: 0
                    },
                    {
                        label: "Baik",
                        y: 899
                    },
                    {
                        label: "Sedang",
                        y: 145
                    },
                    {
                        label: "Buruk",
                        y: 47
                    },
                    {
                        label: "Belum Ada Data",
                        y: 161
                    }
                ]
            }]
        });
        chart.render();

        var chart = new CanvasJS.Chart("chartContainer1", {
            title: {
                text: "Kondisi Saluran Pembuang"
            },
            data: [{
                // Change type to "doughnut", "line", "splineArea", etc.
                type: "column",
                dataPoints: [{
                        label: "Baik",
                        y: 221
                    },
                    {
                        label: "Sedang",
                        y: 675
                    },
                    {
                        label: "Cukup",
                        y: 0
                    },

                ]
            }]
        });
        chart.render();

        var chart = new CanvasJS.Chart("chartContainer2", {
            title: {
                text: "Statistik Bendung"
            },
            legend: {
                maxWidth: 350,
                itemWidth: 120
            },
            data: [{
                type: "pie",
                showInLegend: true,
                legendText: "{indexLabel}",
                dataPoints: [{
                        y: 63,
                        indexLabel: "Baik"
                    },
                    {
                        y: 189,
                        indexLabel: "Sedang"
                    },
                    {
                        y: 160,
                        indexLabel: "Buruk"
                    },
                    {
                        y: 178,
                        indexLabel: "Belum Ada Data"
                    }
                ]
            }]
        });
        chart.render();
    }
</script>