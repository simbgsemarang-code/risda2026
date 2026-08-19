<div class="page-header">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><?= html_escape($judul) ?></li>
    </ol>
</div>

<div class="row gutters">
    <div class="col-sm-12">
        <div class="table-container">
            <div class="table-responsive">
                <table id="basicExample" class="table custom-table">
                    <thead>
                        <tr>
                            <th style="width: 80px;">No</th>
                            <th>Nama Kecamatan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($tabel)) : ?>
                            <?php foreach ($tabel as $nomor => $kecamatan) : ?>
                                <tr>
                                    <td><?= $nomor + 1 ?></td>
                                    <td><?= html_escape($kecamatan->KECAMATAN ?? '-') ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="2" class="text-center">Data kecamatan belum tersedia.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
