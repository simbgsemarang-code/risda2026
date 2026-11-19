<?php if ($row === []): ?>
    <p class="mb-0 text-muted">Data kondisi tidak ditemukan.</p>
<?php else: ?>
    <div class="table-responsive"><table class="table table-sm mb-0"><tbody>
    <?php foreach ($row as $key => $value): ?>
        <?php if ($key !== 'geojson' && !is_array($value) && !is_object($value)): ?>
            <tr><th><?= esc((string) $key) ?></th><td><?= esc((string) $value) ?></td></tr>
        <?php endif; ?>
    <?php endforeach; ?>
    </tbody></table></div>
<?php endif; ?>
