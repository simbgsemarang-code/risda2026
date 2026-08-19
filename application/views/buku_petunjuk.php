<section class="container-fluid py-5 buku-petunjuk-page">
    <div class="container py-3">
        <div class="text-center mx-auto mb-4" style="max-width: 720px;">
            <h1 class="display-5 mb-3">Buku Petunjuk</h1>
            <p class="text-muted mb-0">Panduan penggunaan Sistem Informasi Sumber Daya Air Kabupaten Cilacap.</p>
        </div>

        <?php if (!$unlocked) : ?>
            <div class="card border-0 shadow-sm mx-auto buku-login-card">
                <div class="card-body p-4 p-md-5">
                    <div class="text-center mb-4">
                        <span class="buku-lock-icon"><i class="fas fa-lock"></i></span>
                        <h2 class="h3 mt-3 mb-2">Dokumen Dilindungi</h2>
                        <p class="text-muted mb-0">Masukkan password untuk membuka buku petunjuk.</p>
                    </div>

                    <?php if ($error !== '') : ?>
                        <div class="alert alert-danger" role="alert"><?= html_escape($error) ?></div>
                    <?php endif; ?>

                    <form method="post" action="<?= base_url('Welcome/buku_petunjuk') ?>" autocomplete="off">
                        <input type="hidden" name="buku_token" value="<?= html_escape($buku_token) ?>">
                        <label for="buku-password" class="form-label fw-semibold">Password</label>
                        <div class="input-group mb-4">
                            <input type="password" id="buku-password" name="password" class="form-control form-control-lg"
                                   placeholder="Masukkan password" autocomplete="new-password" required autofocus>
                            <button class="btn btn-outline-secondary" type="button" id="toggle-buku-password"
                                    aria-label="Tampilkan password" aria-pressed="false">
                                <i class="fas fa-eye" aria-hidden="true"></i>
                            </button>
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg w-100">Buka Buku Petunjuk</button>
                    </form>
                </div>
            </div>
        <?php else : ?>
            <div class="card border-0 shadow-sm buku-reader-card">
                <div class="card-header bg-white d-flex flex-wrap align-items-center justify-content-between gap-2 p-3">
                    <span class="fw-semibold text-dark"><i class="fas fa-book-open text-success me-2"></i>Manual Book RISDA</span>
                    <a href="<?= base_url('Welcome/manual_book') ?>" target="_blank" rel="noopener" class="btn btn-outline-primary btn-sm">
                        <i class="fas fa-external-link-alt me-1"></i> Buka layar penuh
                    </a>
                </div>
                <div class="card-body p-0">
                    <iframe src="<?= base_url('Welcome/manual_book') ?>#toolbar=1&navpanes=0"
                            title="Buku Petunjuk RISDA" class="buku-reader"></iframe>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>

<style>
.buku-petunjuk-page { min-height: calc(100vh - 80px); }
.buku-login-card { max-width: 520px; border-radius: 22px; }
.buku-lock-icon {
    display: inline-flex; align-items: center; justify-content: center;
    width: 70px; height: 70px; border-radius: 50%;
    color: #198754; background: rgba(25, 135, 84, .12); font-size: 1.65rem;
}
.buku-reader-card { overflow: hidden; border-radius: 18px; }
.buku-reader { display: block; width: 100%; height: 78vh; min-height: 620px; border: 0; background: #eef2f0; }
@media (max-width: 767.98px) {
    .buku-reader { height: 72vh; min-height: 480px; }
}
</style>

<?php if (!$unlocked) : ?>
<script>
(function () {
    var input = document.getElementById('buku-password');
    var button = document.getElementById('toggle-buku-password');
    if (!input || !button) return;

    button.addEventListener('click', function () {
        var show = input.type === 'password';
        input.type = show ? 'text' : 'password';
        button.setAttribute('aria-pressed', show ? 'true' : 'false');
        button.setAttribute('aria-label', show ? 'Sembunyikan password' : 'Tampilkan password');
        var icon = button.querySelector('i');
        if (icon) icon.className = show ? 'fas fa-eye-slash' : 'fas fa-eye';
        input.focus();
    });
})();
</script>
<?php endif; ?>
