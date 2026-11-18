<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard Admin RISDA</title>
    <link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
</head>
<body class="bg-light">
<main class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 mb-1">Dashboard Admin</h1>
            <p class="text-muted mb-0">Selamat datang, <?= esc((string) ($user['nama_user'] ?? 'Admin')) ?>.</p>
        </div>
        <a class="btn btn-outline-danger" href="<?= site_url('Admin/Login/sign_out') ?>">Keluar</a>
    </div>
    <div class="row g-3">
        <?php foreach ($totals as $name => $total): ?>
            <div class="col-sm-6 col-lg-3">
                <section class="card shadow-sm border-0 h-100">
                    <div class="card-body">
                        <p class="text-muted mb-2"><?= esc($name) ?></p>
                        <strong class="display-6"><?= number_format($total, 0, ',', '.') ?></strong>
                    </div>
                </section>
            </div>
        <?php endforeach; ?>
    </div>
    <p class="text-muted mt-4 mb-0">Modul pengelolaan data sedang dimigrasikan ke CI4; halaman ini hanya tersedia untuk sesi admin yang sah.</p>
</main>
</body>
</html>
