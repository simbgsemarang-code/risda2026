<style>
/* Custom Navbar Styling - Only for Homepage */
.navbar-transparent {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    z-index: 1030;
    background: transparent !important; /* Wadah menu transparan */
}

/* Memastikan elemen nav di dalamnya juga transparan */
.navbar-transparent .navbar {
    background: transparent !important;
    background-color: transparent !important;
}

/* Menghilangkan kotak putih bawaan template pada elemen wadah link menu */
.navbar-transparent .navbar-nav,
.navbar-solid .navbar-nav {
    background: transparent !important;
    border-radius: 0 !important;
    justify-content: flex-end !important;
}

/* Force Solid Background for Subpages */
.navbar-solid {
    background-color: #198754 !important;
    position: relative;
    z-index: 1030;
}
/* Compact styling for subpages */
.navbar-solid .navbar {
    padding-top: 5px !important;
    padding-bottom: 5px !important;
}
.navbar-solid .brand-text {
    font-size: 1.25rem !important;
}
.navbar-solid img {
    max-height: 38px !important;
}
.navbar-solid .navbar-nav .nav-link {
    padding: 6px 11px !important;
    font-size: calc(0.85rem + 2px);
}

/* Link Styling untuk text biasa */
.navbar-nav .nav-link {
    font-family: 'Poppins', sans-serif;
    color: #ffffff !important;
    font-weight: 500;
    font-size: calc(0.95rem + 2px);
    padding: 8px 13px !important;
    margin-left: 0.25rem;
    border: 1px solid transparent !important;
    border-radius: 50rem !important;
    white-space: nowrap;
}

@media (min-width: 992px) and (max-width: 1399.98px) {
    .navbar-nav .nav-link,
    .navbar-solid .navbar-nav .nav-link {
        padding-left: 7px !important;
        padding-right: 7px !important;
        margin-left: 0.1rem;
        font-size: calc(0.76rem + 2px);
    }
}
.navbar-nav .nav-link:hover {
    background: rgba(255, 255, 255, 0.15) !important;
    color: #ffffff !important;
}

/* Styling untuk menu yang Aktif (btn-primary) */
.navbar-nav .btn-primary {
    background: rgba(255, 255, 255, 0.25) !important;
    border: 1px solid rgba(255, 255, 255, 0.5) !important;
    color: #ffffff !important;
    font-weight: 600;
    backdrop-filter: blur(5px);
}
.navbar-nav .btn-primary:hover {
    background: rgba(255, 255, 255, 0.35) !important;
}

/* Brand Text */
.brand-text {
    font-size: 1.4rem;
    font-weight: 800;
    color: #ffffff !important;
    letter-spacing: 1px;
}
.navbar-toggler {
    border-color: rgba(255,255,255,0.5);
    padding: 5px 10px;
}
.navbar-toggler:focus {
    box-shadow: none;
}

/* Mobile Dropdown Fix */
@media (max-width: 991.98px) {
    .navbar-collapse {
        background: transparent !important; /* Wadah menu langsung transparan, tanpa tebal overlay */
        padding: 10px 15px;
    }
    .navbar-solid .navbar-collapse {
        background: #198754 !important; /* Untuk subpage, tetap hijau agar teks putih terbaca */
    }
}

/* Typography & Global Settings */
body {
    background-color: #f7fbf9 !important; /* Extremely light green theme */
    font-family: 'Poppins', sans-serif;
    color: #4a5568;
}
p, small, .small, span, div {
    font-family: 'Poppins', sans-serif;
}
h1, h2, h3, h4, h5, h6, .display-1, .display-2, .display-3, .display-4, .display-5, .display-6 {
    font-family: 'Bebas Neue', sans-serif;
    letter-spacing: 1px;
    color: #198754;
}
.text-primary {
    color: #198754 !important;
}
.bg-primary {
    background-color: #198754 !important;
}
.text-dark {
    color: #2c3e50 !important;
}

/* Override default primary buttons to Green theme */
.btn-primary {
    color: #fff !important;
    background-color: #198754 !important;
    border-color: #198754 !important;
}
.btn-primary:hover, .btn-primary:focus, .btn-primary:active {
    background-color: #146c43 !important;
    border-color: #13653f !important;
    box-shadow: 0 0 0 0.25rem rgba(25, 135, 84, 0.5) !important;
}
.btn-outline-primary {
    color: #198754 !important;
    border-color: #198754 !important;
}
.btn-outline-primary:hover, .btn-outline-primary:focus, .btn-outline-primary:active {
    color: #fff !important;
    background-color: #198754 !important;
    border-color: #198754 !important;
    box-shadow: 0 0 0 0.25rem rgba(25, 135, 84, 0.5) !important;
}

/* Fix WOW.js animation flashing on page load */
.wow {
    visibility: hidden;
}

/* Make main containers transparent to reveal the global background */
.container-fluid.bg-light.about {
    background-color: transparent !important;
}

/* Modernize inner white/light boxes on all subpages to match homepage section 2 concept */
.about .bg-white,
.about .bg-light {
    background: rgba(255, 255, 255, 0.85) !important;
    backdrop-filter: blur(10px);
    -webkit-backdrop-filter: blur(10px);
    border: 1px solid rgba(0,0,0,0.05) !important;
    box-shadow: 0 5px 20px rgba(0,0,0,0.02) !important;
    border-radius: 20px !important;
    transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
}

.about .bg-white:hover,
.about .bg-light:hover {
    box-shadow: 0 15px 35px rgba(25, 135, 84, 0.05) !important;
    border-color: rgba(25, 135, 84, 0.1) !important;
}

/* Custom UI Utilities */
.transition-hover {
    transition: all 0.3s ease;
}
.transition-hover:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(25, 135, 84, 0.15) !important;
}
.letter-spacing-1 {
    letter-spacing: 1px;
}

/* Override DataTables / Pagination Blue Colors */
.page-item.active .page-link {
    background-color: #198754 !important;
    border-color: #198754 !important;
    color: #ffffff !important;
}
.page-link {
    color: #198754;
}
.page-link:hover {
    color: #146c43;
    background-color: rgba(25, 135, 84, 0.1);
}

/* Fix table backgrounds inside the transparent cards so they are readable */
.about .table {
    background-color: transparent !important;
}
.about .table-striped > tbody > tr:nth-of-type(odd) > * {
    background-color: rgba(25, 135, 84, 0.03) !important;
}
.table-primary {
    --bs-table-bg: rgba(25, 135, 84, 0.1);
    --bs-table-striped-bg: rgba(25, 135, 84, 0.15);
    --bs-table-active-bg: rgba(25, 135, 84, 0.2);
    --bs-table-hover-bg: rgba(25, 135, 84, 0.25);
    color: #2c3e50;
    border-color: rgba(25, 135, 84, 0.15);
}

/* Decorative Global Background Icons */
.global-bg-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100vw;
    height: 100vh;
    z-index: -10;
    pointer-events: none;
    overflow: hidden;
}
.global-bg-overlay i {
    position: absolute;
    color: #198754;
    opacity: 0.04;
}
.bg-icon-1 { top: 10%; left: 5%; font-size: 15rem; transform: rotate(-15deg); }
.bg-icon-2 { bottom: 15%; right: 5%; font-size: 20rem; transform: rotate(20deg); opacity: 0.05 !important; }
.bg-icon-3 { top: 40%; left: 45%; font-size: 25rem; transform: rotate(10deg); opacity: 0.02 !important; }
.bg-icon-4 { top: 70%; left: 15%; font-size: 12rem; transform: rotate(-10deg); }
.bg-icon-5 { top: 20%; right: 20%; font-size: 18rem; transform: rotate(15deg); }

/* Mobile scaling for global background icons */
@media (max-width: 768px) {
    .bg-icon-1 { font-size: 8rem; }
    .bg-icon-2 { font-size: 10rem; }
    .bg-icon-3 { font-size: 12rem; }
    .bg-icon-4 { font-size: 6rem; }
    .bg-icon-5 { font-size: 8rem; }
}
</style>

<?php 
// Pastikan hanya halaman utama yang mendapatkan navbar transparan
$seg1 = $this->uri->segment(1);
$seg2 = $this->uri->segment(2);
$is_home = (empty($seg1) || (strtolower($seg1) == 'welcome' && (empty($seg2) || strtolower($seg2) == 'index')));

// Jika bukan home, paksa class navbar-solid
$navbar_class = $is_home ? 'navbar-transparent' : 'navbar-solid shadow-sm';
?>

<!-- Global Background Overlay -->
<div class="global-bg-overlay">
    <i class="fas fa-water bg-icon-1"></i>
    <i class="fas fa-leaf bg-icon-2"></i>
    <i class="fas fa-city bg-icon-3"></i>
    <i class="fas fa-tint bg-icon-4"></i>
    <i class="fas fa-seedling bg-icon-5"></i>
</div>

<!-- Navbar Start -->
<div class="<?= $navbar_class ?>" style="padding: 0; margin: 0;">
    <nav class="navbar navbar-expand-lg navbar-dark w-100 px-4 px-lg-5">
        <a href="<?= base_url('Welcome') ?>" class="navbar-brand d-flex align-items-center">
            <img src="<?= base_url('assets/images/logo.png') ?>" alt="Logo" style="max-height: 45px;">
            <div class="ms-2 d-flex flex-column justify-content-center">
                <span class="brand-text mb-0" style="line-height: 1;">RISDA</span>
                <span style="font-size: 0.65rem; color: #f8f9fa; letter-spacing: 1.5px; margin-top: 2px;">KABUPATEN CILACAP</span>
            </div>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="fa fa-bars text-white"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto align-items-center">
                <a href="<?= base_url('Welcome') ?>" class="<?= $c[0] ?>">Beranda</a>
                <a href="<?= base_url('Welcome/di') ?>" class="<?= $c[1] ?>">Daerah Irigasi</a>
                <a href="<?= base_url('Welcome/drainase') ?>" class="<?= $c[2] ?>">Drainase Perkotaan</a>
                <a href="<?= base_url('Welcome/pembuang') ?>" class="<?= $c[3] ?>">Saluran Pembuang</a>
                <a href="<?= base_url('Welcome/air_baku') ?>" class="<?= $c[4] ?>">Air Baku</a>
                <a href="<?= base_url('Welcome/digital') ?>" class="<?= $c[5] ?>">Peta Digital</a>
                <a href="<?= base_url('Welcome/statistik/all/no') ?>" class="<?= $c[6] ?>">Statistik</a>
                <a href="<?= base_url('Welcome/buku_petunjuk') ?>" class="<?= isset($c[7]) ? $c[7] : 'nav-item nav-link' ?>">Buku Petunjuk</a>
                <a href="<?= base_url('Welcome/login') ?>" class="<?= isset($c[8]) ? $c[8] : 'nav-item nav-link' ?>">Login</a>
            </div>
        </div>
    </nav>
</div>
<!-- Navbar End -->
