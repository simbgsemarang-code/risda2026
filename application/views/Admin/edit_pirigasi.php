<div class="page-header">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><?= $judul ?></li>
    </ol>

</div>

<!-- Row start -->
<form action="<?= base_url('Admin/Kecamatan/edit_simpan_pirigasi/' . $tabel[0]->id) ?>" method="POST" enctype="multipart/form-data">
    <div class="row gutters">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="row gutters">

                        <?php
                        $tab = $tabel[0];
                        foreach ($tab as $key => $value) {
                            if ($key != 'id' && $key != 'geojson' && $key != 'Photo2' && $key != 'Photo3' && $key != 'Photo1' && $key != 'KONDISI' ) {

                        ?>

                                <div class="col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="inputName"><?= $key ?></label>
                                        <input type="text" class="form-control" id="<?= $key ?>" name="<?= $key ?>" value="<?= $value ?>">
                                    </div>

                                </div>
                            <?php }elseif($key == 'KONDISI') { ?>
                             <div class="col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="inputName"><?= $key ?></label>
                                            <select class="form-control" id="<?= $key ?>" name="<?= $key ?>">
                                                <option value="<?= $value ?>"><?= $value ?></option>
                                                <option value="Baik">Baik</option>
                                                <option value="Rusak Ringan">Rusak Ringan</option>
                                                <option value="Rusak Sedang">Rusak Sedang</option>
                                                <option value="Rusak Berat">Rusak Berat</option>
                                            </select>
                                </div>

                                </div>
                                 <?php }elseif($key == 'Photo1') { 
                                        if ($tabel[0]->Photo1 == 'no_image.jpg' || $tabel[0]->Photo1 == null) {
                                            $fil =  base_url('assets/foto/no_image.jpg');
                                        } else {
                                            $fil = base_url('assets/foto/pirigasi/' . $tabel[0]->id . '/' . $tabel[0]->Photo1);
                                        }
                                        if ($tabel[0]->Photo2 == 'no_image.jpg' || $tabel[0]->Photo2 == null) {
                                            $fi2 =  base_url('assets/foto/no_image.jpg');
                                        } else {
                                            $fi2 = base_url('assets/foto/pirigasi/' . $tabel[0]->id . '/' . $tabel[0]->Photo2);
                                        }
                                    
                                    ?>
                                <div class="col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="inputName"><?= $key ?></label>
                                        <input type='file' onchange="preview1()" name="<?= $key ?>" class="form-control"></file>
                                    </div>

                                </div>
                                 <?php }elseif($key == 'Photo2') { ?>
                                <div class="col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="inputName"><?= $key ?></label>
                                        <input type='file' onchange="preview2()" name="<?= $key ?>" class="form-control"></file>
                                    </div>

                                </div>


                        <?php }
                        }
                        
                        ?>
                        <div class="col-sm-6 col-12">
                                       
                            <div class="form-group">
                                <img id="frame1" src="<?=$fil?>" width="180px" height="190px"/>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12">
                                       
                            <div class="form-group">
                                <img id="frame2" src="<?=$fi2?>" width="180px" height="190px"/>
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
        frame2.src=URL.createObjectURL(event.target.files[0]);
    }
</script>