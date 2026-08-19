<style>
    .new-footer {
        background-color: #198754 !important;
        border-top: 1px solid rgba(255, 255, 255, 0.1);
    }
    .new-copyright {
        background-color: #146c43 !important;
    }
    .footer-item a.footer-link {
        transition: all 0.3s ease;
    }
    .footer-item a.footer-link:hover {
        color: #ffffff !important;
        letter-spacing: 1px;
    }
</style>
<div class="container-fluid new-footer py-5 wow fadeIn" data-wow-delay="0.2s">
    <div class="container py-4">
        <div class="row g-5">
            <div class="col-md-6 col-lg-4">
                <div class="footer-item">
                    <a href="<?= base_url() ?>" class="p-0 d-flex align-items-center mb-4 text-decoration-none">
                        <img src="<?= base_url('assets/images/logo.png') ?>" alt="Logo" style="max-height: 55px;">
                        <h2 class="text-white ms-3 mb-0" style="letter-spacing: 1px; font-weight: 700;">RISDA</h2>
                    </a>
                    <p class="text-light mb-0" style="line-height: 1.8; font-size: 0.95rem; opacity: 0.9;">Layanan Basis Data Sumber Daya Air<br>Dinas Pengelolaan Sumber Daya Air<br>Kabupaten Cilacap</p>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="footer-item">
                    <h4 class="text-white mb-4">Basis Data Kami</h4>
                    <div class="d-flex flex-column gap-3">
                        <a href="<?= base_url('Welcome/di') ?>" class="text-light text-decoration-none footer-link" style="opacity: 0.9;"><i class="fas fa-chevron-right me-2"></i> Daerah Irigasi</a>
                        <a href="<?= base_url('Welcome/drainase') ?>" class="text-light text-decoration-none footer-link" style="opacity: 0.9;"><i class="fas fa-chevron-right me-2"></i> Drainase Perkotaan</a>
                        <a href="<?= base_url('Welcome/pembuang') ?>" class="text-light text-decoration-none footer-link" style="opacity: 0.9;"><i class="fas fa-chevron-right me-2"></i> Saluran Pembuang</a>
                        <a href="<?= base_url('Welcome/air_baku') ?>" class="text-light text-decoration-none footer-link" style="opacity: 0.9;"><i class="fas fa-chevron-right me-2"></i> Air Baku</a>
                        <a href="<?= base_url('Welcome/statistik') ?>" class="text-light text-decoration-none footer-link" style="opacity: 0.9;"><i class="fas fa-chevron-right me-2"></i> Statistik</a>
                    </div>
                </div>
            </div>

            <div class="col-md-12 col-lg-4">
                <div class="footer-item">
                    <h4 class="text-white mb-4">Hubungi Kami</h4>
                    <div class="d-flex flex-column gap-4">
                        <div class="d-flex align-items-start">
                            <div class="bg-white text-success rounded-circle d-flex align-items-center justify-content-center flex-shrink-0" style="width: 45px; height: 45px;">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div class="ms-3">
                                <h6 class="text-white mb-1">Alamat</h6>
                                <p class="mb-0 text-light" style="font-size: 0.9rem; opacity: 0.9;">Jl. Kalimantan No. 34, Gunung Simping<br>Cilacap, Jawa Tengah 53224</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-start">
                            <div class="bg-white text-success rounded-circle d-flex align-items-center justify-content-center flex-shrink-0" style="width: 45px; height: 45px;">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div class="ms-3">
                                <h6 class="text-white mb-1">Email</h6>
                                <p class="mb-0 text-light" style="font-size: 0.9rem; opacity: 0.9;">psda@cilacapkab.go.id</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-start">
                            <div class="bg-white text-success rounded-circle d-flex align-items-center justify-content-center flex-shrink-0" style="width: 45px; height: 45px;">
                                <i class="fas fa-phone-alt"></i>
                            </div>
                            <div class="ms-3">
                                <h6 class="text-white mb-1">Telepon</h6>
                                <p class="mb-0 text-light" style="font-size: 0.9rem; opacity: 0.9;">+62 282 53400</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer End -->

<!-- Copyright Start -->
<div class="container-fluid new-copyright py-4">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center text-light" style="opacity: 0.9;">
                &copy; <?= date('Y'); ?> <a href="<?= base_url() ?>" class="text-white fw-bold text-decoration-none">RISDA</a>. Hak Cipta Dilindungi.
                <br>
                <small class="mt-2 d-block">Dinas Pengelolaan Sumber Daya Air Kabupaten Cilacap</small>
            </div>
        </div>
    </div>
</div>
<!-- Copyright End -->
<!-- Back to Top -->
<a href="#" class="btn btn-success btn-lg-square rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>
<!-- JavaScript Libraries -->
<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('assets/js/wow.min.js') ?>"></script>
<script src="<?= base_url('assets/js/easing.min.js') ?>"></script>
<script src="<?= base_url('assets/js/waypoints.min.js') ?>"></script>
<script src="<?= base_url('assets/js/counterup.min.js') ?>"></script>
<script src="<?= base_url('assets/js/lightbox.min.js') ?>"></script>
<script src="<?= base_url('assets/js/owl.carousel.min.js') ?>"></script>
<!-- Template Javascript -->
<script src="<?= base_url('assets/js/main.js') ?>"></script>
<script defer src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015" integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ==" data-cf-beacon='{"rayId":"95efab45483c494f","serverTiming":{"name":{"cfExtPri":true,"cfEdge":true,"cfOrigin":true,"cfL4":true,"cfSpeedBrain":true,"cfCacheStatus":true}},"version":"2025.6.2","token":"e1daa20f82894acc8aa9329cf84845f5"}' crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>