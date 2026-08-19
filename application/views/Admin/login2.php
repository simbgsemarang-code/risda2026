<style>
@import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap');

/* Modern Login Specific Styles */
.login-container {
    min-height: 100vh;
    background: url('<?= base_url("assets/images/bghero/images_1.avif") ?>') center center/cover no-repeat;
    position: relative;
    overflow: hidden;
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 1;
}

/* Blur overlay for the background image */
.login-container::before {
    content: "";
    position: absolute;
    top: 0; 
    left: 0; 
    width: 100%; 
    height: 100%;
    background: rgba(247, 251, 249, 0.4); /* Slight light tint */
    backdrop-filter: blur(15px); /* Strong blur effect */
    -webkit-backdrop-filter: blur(15px);
    z-index: -1;
}
.login-btn-back {
    position: absolute;
    top: 30px;
    left: 40px;
    z-index: 10;
    font-weight: 600;
    padding: 10px 25px;
    border-radius: 50rem;
    background: white;
    color: #198754;
    border: 1px solid rgba(25, 135, 84, 0.2);
    box-shadow: 0 4px 15px rgba(0,0,0,0.05);
    transition: all 0.3s;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
}
.login-btn-back:hover {
    background: #198754;
    color: white;
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(25, 135, 84, 0.2);
}
.login-card {
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(10px);
    border-radius: 20px;
    box-shadow: 0 15px 35px rgba(0,0,0,0.05);
    border: 1px solid rgba(25, 135, 84, 0.1);
    width: 100%;
    max-width: 900px;
    position: relative;
    z-index: 5;
    overflow: hidden;
}
.login-header-gradient {
    background: linear-gradient(135deg, #198754 0%, #146c43 100%);
    position: relative;
    overflow: hidden;
}
.login-header-gradient::before {
    content: '';
    position: absolute;
    top: -50%;
    left: -50%;
    width: 200%;
    height: 200%;
    background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 60%);
    transform: rotate(30deg);
}
.login-input {
    border-radius: 10px;
    border: 1px solid rgba(25, 135, 84, 0.2);
    box-shadow: none !important;
    padding: 12px 20px;
    font-size: 1rem;
    background: #fcfcfc;
}
.login-input:focus {
    border-color: #198754;
    background: white;
    box-shadow: 0 0 0 4px rgba(25, 135, 84, 0.1) !important;
}
.login-btn-submit {
    background: linear-gradient(135deg, #198754, #146c43);
    color: white;
    border: none;
    border-radius: 10px;
    padding: 14px 20px;
    font-weight: 700;
    font-size: 1.1rem;
    box-shadow: 0 8px 20px rgba(25, 135, 84, 0.3);
    transition: all 0.3s;
    width: 100%;
}
.login-btn-submit:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(25, 135, 84, 0.4);
    color: white;
}
.captcha-box {
    background: rgba(25, 135, 84, 0.05);
    border: 1px dashed rgba(25, 135, 84, 0.3);
    border-radius: 10px;
    padding: 15px;
}
</style>

<div class="login-container">
    <!-- Back to Home Button -->
    <a href="<?= base_url('Welcome') ?>" class="login-btn-back">
        <i class="fas fa-arrow-left me-2"></i> Kembali ke Beranda
    </a>

    <!-- Login Card -->
    <div class="login-card row g-0 m-3" data-aos="zoom-in" data-aos-duration="600">
        <!-- Left Side: Branding -->
        <div class="col-lg-5 d-none d-lg-flex flex-column align-items-center justify-content-center p-5 text-white login-header-gradient">
            <div class="text-center position-relative z-1">
                <img src="<?= base_url('assets/images/logo.png') ?>" alt="Logo RISDA" style="width: 130px; filter: drop-shadow(0 5px 15px rgba(0,0,0,0.2));" class="mb-4">
                <h1 class="text-white mb-2" style="font-family: 'Bebas Neue', sans-serif; letter-spacing: 3px; font-size: 4rem;">RISDA</h1>
                <h6 class="text-white mb-4" style="opacity: 0.9; line-height: 1.6;">Ruang Informasi Sumber Daya Air<br>Kabupaten Cilacap</h6>
                <div class="mt-4 pt-4 border-top border-light border-opacity-25 w-100">
                    <p class="small mb-0 opacity-75"><i class="fas fa-shield-alt me-2"></i>Sistem Terintegrasi Aman</p>
                </div>
            </div>
        </div>
        
        <!-- Right Side: Login Form -->
        <div class="col-lg-7 p-4 p-md-5 d-flex flex-column justify-content-center">
            <div class="text-center mb-5">
                <img class="d-lg-none mb-3" src="<?= base_url('assets/images/logo.png') ?>" alt="Logo" style="width: 80px; filter: drop-shadow(0 4px 6px rgba(0,0,0,0.1));">
                <h3 class="fw-bold text-dark mb-2">Akses Admin Panel</h3>
                <p class="text-muted">Silakan masuk menggunakan kredensial Anda</p>
            </div>

            <?php if(!empty($alert)): ?>
            <div class="alert alert-danger border-0 shadow-sm rounded-3 py-3 mb-4 d-flex align-items-center" onmousedown='return false;' onselectstart='return false;'>
                <i class="fas fa-exclamation-triangle fs-5 me-3 text-danger"></i>
                <div class="fw-medium"><?= html_escape($alert) ?></div>
            </div>
            <?php endif; ?>

            <form action="<?= base_url('Admin/Login/authentication') ?>" method="post">
                <!-- Username -->
                <div class="mb-4">
                    <label class="form-label text-muted fw-bold small text-uppercase mb-2"><i class="fas fa-user text-success me-2"></i>Nama Pengguna</label>
                    <input type="email" class="form-control login-input" name="email" placeholder="Masukkan email terdaftar" required>
                </div>
                
                <!-- Password -->
                <div class="mb-4">
                    <label class="form-label text-muted fw-bold small text-uppercase mb-2"><i class="fas fa-lock text-success me-2"></i>Kata Sandi</label>
                    <input type="password" name="pass" class="form-control login-input" placeholder="Masukkan kata sandi" required>
                </div>

                <!-- Captcha -->
                <div class="mb-4 captcha-box">
                    <label class="form-label text-muted fw-bold small text-uppercase mb-3 d-block text-center"><i class="fas fa-shield-alt text-success me-2"></i>Verifikasi Keamanan</label>
                    
                    <div class="text-center p-3 mb-3" style="background: rgba(255,255,255,0.7); border-radius: 10px; border: 1px solid rgba(25,135,84,0.1);">
                        <span class="fs-4 fw-bold text-dark font-monospace" style="letter-spacing: 5px; word-break: break-all; user-select: none;" onmousedown='return false;' onselectstart='return false;'><?= $captcha ?></span>
                    </div>
                    
                    <input type="text" name="cap" class="form-control login-input text-center" placeholder="Ketik kode di atas" required>
                </div>

                <!-- Submit Button -->
                <button name="send" class="login-btn-submit" type="submit">
                    Masuk Sekarang <i class="fas fa-sign-in-alt ms-2"></i>
                </button>
            </form>
        </div>
    </div>
</div>
