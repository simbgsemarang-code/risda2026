<div class="page-header">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><?= $judul ?></li>
    </ol>

</div>

<!-- Row start -->
<form action="<?= base_url('Admin/Kecamatan/edit_simpan/' . $tabel[0]->id) ?>" method="POST" enctype="multipart/form-data">
    <div class="row gutters">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="row gutters">

                        <?php
                        $tab = $tabel[0];
                        foreach ($tab as $key => $value) {
                            if ($key != 'id' && $key != 'geojson' && $key != 'Photo1' && $key != 'Photo2') {

                        ?>

                                <div class="col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="inputName"><?= $key ?></label>
                                        <input type="text" class="form-control" id="<?= $key ?>" name="<?= $key ?>" value="<?= $value ?>">
                                    </div>

                                </div>
                            <?php } elseif ($key == 'Photo1') {
                                if ($tabel[0]->Photo1 == 'no_image.jpg' || $tabel[0]->Photo1 == null) {
                                    $fil =  base_url('assets/foto/no_image.jpg');
                                } else {
                                    $fil = base_url('assets/foto/bendung/foto/' . $tabel[0]->id . '/' . $tabel[0]->Photo1);
                                }
                                if ($tabel[0]->Photo2 == 'no_image.jpg' || $tabel[0]->Photo2 == null) {
                                    $nama_file = 'file_belum ada';
                                    $fil2 =  base_url('assets/foto/no_image.jpg');
                                } else {
                                    $nama_file = $tabel[0]->Photo2;
                                    $fil2 = base_url('assets/foto/bendung/skema/' . $tabel[0]->id . '/' . $tabel[0]->Photo2);
                                }
                                if ($tabel[0]->Photo3 == 'no_image.jpg' || $tabel[0]->Photo3 == null) {
                                    $nama_file = 'file_belum ada';
                                    $fil3 =  base_url('assets/foto/no_image.jpg');
                                } else {
                                    $nama_file = $tabel[0]->Photo3;
                                    $fil3 = base_url('assets/foto/bendung/jaringan/' . $tabel[0]->id . '/' . $tabel[0]->Photo3);
                                }
                            ?>

                             

                        <?php }
                        }
                        ?>
                        <div class="col-sm-6 col-12">
                            <div class="form-group">
                                <label for="inputName">Foto </label>
                                <input type="file" onchange="preview1()" name="Photo1" id="foto1" class="form-control" accept=".jpg, .jpeg, .png">
                            </div>
                        </div>
                        <div class="col-sm-6 col-12">
                            <div class="form-group">
                                <label for="inputName">Skema Jaringan</label>
                                <input type="file"  onchange="preview2()"  name="Photo2" id="foto2" class="form-control" accept=".pdf">
                            </div>
                        </div>
                         <div class="col-sm-6 col-12">
                                       
                            <div class="form-group">
                                <img id="frame1" src="<?=$fil?>" width="180px" height="190px"/>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12">
                            <div class="form-group">
                                <a id="tt" href="<?=$fil2?>" style="text-decoration: underline;" target="_blank"><?=$nama_file?></a>
                               
                            </div>
                        </div>
                         <div class="col-sm-6 col-12">
                            <div class="form-group">
                                <label for="inputName">Skema Bangunan</label>
                                <input type="file"  onchange="preview3()"  name="Photo3" id="foto2" class="form-control" accept=".pdf">
                            </div>
                        </div>
                        <div class="col-sm-6 col-12">
                            <div class="form-group">
                                <a id="tt1" href="<?=$fil3?>" style="text-decoration: underline;" target="_blank"><?=$nama_file?></a>
                               
                            </div>
                        </div>
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

    function preview1() {
        frame1.src=URL.createObjectURL(event.target.files[0]);
    }
     function preview2() {
        const file = event.target.files[0];
        const namaFile = file.name;
        tt.innerHTML=namaFile;
    }
     function preview3() {
        const file = event.target.files[0];
        const namaFile = file.name;
        tt1.innerHTML=namaFile;
    }

</script>