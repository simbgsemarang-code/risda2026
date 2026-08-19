<div class="page-header">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><?= $judul ?></li>
    </ol>

</div>

<!-- Row start -->
<form action="<?= base_url('Admin/Kecamatan/edit_simpan_ppembuang/' . $tabel[0]->id) ?>" method="POST" enctype="multipart/form-data">
    <div class="row gutters">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="row gutters">

                        <?php
                        $tab = $tabel[0];
                        foreach ($tab as $key => $value) {
                            if ($key != 'id' && $key != 'geojson' && $key != 'Photo2' && $key != 'Photo3' && $key != 'Photo1' ) {

                        ?>

                                <div class="col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="inputName"><?= $key ?></label>
                                        <input type="text" class="form-control" id="<?= $key ?>" name="<?= $key ?>" value="<?= $value ?>">
                                    </div>

                                </div>
                            <?php } elseif ($key == 'foto_awal') {
                                if ($tabel[0]->foto_awal != null) {

                                    $fil = base_url('assets/dokumentasi_jalan/tambahan/' . $tabel[0]->id . '/' . $tabel[0]->foto_awal);
                                } else {

                                    $fil =  base_url('assets/dokumentasi/no_image1.jpg');
                                }



                            ?>

                                <div style='height: 0px;width: 0px; overflow:hidden;'></div>

                        <?php }
                        }
                        ?>

                        <div class="col-sm-6 col-12">
                            <div class="form-group">

                                <button type="submit" class="btn btn-success mb-2">Simpan</button>
                            </div>

                        </div>

                        <div>
                        </div>
                    </div>
                </div>
            </div>
</form>
<?php $this->load->view('Admin/bootstrap_model.php'); ?>
<script>
    function hapus(pesan, url) {

        var result = confirm('Anda Yakin Untuk Menghapus ' + pesan);
        if (result) {
            window.location = url;
        }
    }

    function tes() {
        document.getElementById("upfile1").click();

    }

    function preview() {
        upfile = document.getElementById('upfile1');
        const [file] = upfile.files
        nama_file = event.target.files[0].name;
        f = document.getElementById('frame1');
        if (file) {
            f.src = URL.createObjectURL(file)
        }

    }
</script>