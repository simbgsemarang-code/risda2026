<main class="container py-5">
    <section class="bg-white rounded-4 shadow-sm p-4 p-md-5">
        <div class="d-flex flex-column flex-lg-row justify-content-between gap-4 align-items-lg-center mb-4">
            <div>
                <p class="text-success fw-bold text-uppercase small mb-2">Daerah Irigasi</p>
                <h1 class="h2 mb-2">Cari data irigasi dengan cepat</h1>
                <p class="text-muted mb-0">Halaman ini memuat maksimal 30 hasil. Data spasial peta dimuat hanya saat diperlukan agar tetap ringan.</p>
            </div>
            <a class="btn btn-success rounded-pill px-4" href="<?= site_url('Welcome/digital') ?>">
                <i class="fas fa-map-marked-alt me-2"></i>Buka Peta Digital
            </a>
        </div>

        <form class="row g-2 mb-4" method="get" action="<?= site_url('Welcome/di') ?>" role="search">
            <div class="col-sm">
                <label class="visually-hidden" for="di-search">Nama daerah irigasi</label>
                <input id="di-search" name="q" value="<?= esc($keyword, 'attr') ?>" class="form-control form-control-lg" maxlength="100" autocomplete="off" placeholder="Contoh: Kebogoran">
            </div>
            <div class="col-sm-auto d-grid">
                <button class="btn btn-success btn-lg px-4" type="submit"><i class="fas fa-search me-2"></i>Cari</button>
            </div>
        </form>

        <?php if ($items === []): ?>
            <div class="alert alert-light border mb-0">Data daerah irigasi tidak ditemukan.</div>
        <?php else: ?>
            <div class="table-responsive border rounded-3">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light"><tr><th class="ps-3">Daerah Irigasi</th><th class="text-end pe-3">Aksi</th></tr></thead>
                    <tbody>
                    <?php foreach ($items as $item): ?>
                        <tr>
                            <td class="ps-3 fw-semibold"><?= esc((string) ($item['NAMA_DI'] ?? 'Tanpa nama')) ?></td>
                            <td class="text-end pe-3"><a class="btn btn-sm btn-outline-success" href="<?= site_url('Welcome/digital') ?>">Lihat pada peta</a></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <?php if ($hasMore): ?><p class="text-muted small mt-3 mb-0">Menampilkan 30 hasil pertama. Gunakan pencarian untuk mempersempit hasil.</p><?php endif; ?>
        <?php endif; ?>
    </section>
</main>
