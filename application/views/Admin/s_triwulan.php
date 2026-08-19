<div class="modal-header">

    <h4 class="modal-title"></i> <?= $judul ?></h4>
</div>
<div class="modal-body">
    <form action="<?= base_url('Admin/Kecamatan/kondisi_admin/' . $id) ?>" method="post">
        <div class="row">
            <div class="box box-danger">
                <div class="box-body">
                    <div class="col-xl-12">
                        <div class="row gutters">
                            
                            <div class="col-sm-12 col-12">
                                <div class="form-group">
                                    <label for="inputName">Tahun</label>
                                    <select name="tahun" style="width: 100px;" id="tahun" class="form-control">
                                        <option value="-"></option>
                                        <?php for ($i = 2020; $i <= 2030; $i++) { ?>
                                            <option value="<?= $i ?>"><?= $i ?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                            </div>

                        </div>
                        <div class="col-sm-4 col-12">
                            <div class="form-group">

                                <button type="submit" class="btn btn-success mb-2">Pilih</button>
                            </div>

                        </div>

                    </div>
                </div>
    </form>
</div>

<!-- Form Validation -->
<script src="<?php echo base_url(); ?>assets/dist/js/custom.js"></script>
<script type="text/javascript">
    function show_opening_balance(val) {
        if (val == 1) {
            $('#existing_account').css('display', 'block');
        } else {
            $('#existing_account').css('display', 'none');
        }
    }
</script>