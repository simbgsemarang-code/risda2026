<main class="container py-5">
    <section class="bg-white rounded-4 shadow-sm p-4 p-md-5">
        <a href="<?= site_url('Welcome/di') ?>" class="text-decoration-none small"><i class="fas fa-arrow-left me-2"></i>Kembali ke Daerah Irigasi</a>
        <h1 class="h2 mt-3 mb-4"><?= esc($title) ?></h1>
        <div class="table-responsive border rounded-3">
            <table class="table table-hover mb-0"><tbody>
            <?php foreach ($data as $key => $value): ?>
                <?php if ($key !== 'geojson' && !is_array($value) && !is_object($value)): ?>
                    <tr><th class="bg-light" style="width:35%"><?= esc((string) $key) ?></th><td><?= esc((string) $value) ?></td></tr>
                <?php endif; ?>
            <?php endforeach; ?>
            </tbody></table>
        </div>
    </section>
</main>
