<div class="page-header">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><?= $judul ?></li>
    </ol>

</div>

<!-- Row start -->
<div class="row gutters">
   
    <div class="card">
        <div class="card-header">
           <a href="<?=base_url('Admin/Kecamatan/form_tambah_saluran/'.$saluran[0]->id)?>" class="btn btn-primary">Tambah data</a> 
       
        </div>
        <div class="col-sm-12">
            <div class="table-container">
                <div class="table-responsive">
                    <table id="basicExample" class="table custom-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>HM</th>
                                
                                <th>Posting untuk Edit Kondisi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            if ($tabel != null) {
                            $i = 0;
                            foreach($tabel as $t) {
                                $i++; ?>
                            
                            <tr>
                                <td><?=$i?></td>
                                <td><?=$t->HM?></td>
                               <td><select name="tahun1" id="tahun1"  style="margin-right: 10px">
                               <?php foreach($tw as $r) {?> 
                               <option value="<?=$r->id?>"><?=$r->Tahun?></option>
                             <?php } ?>
                               </select><button onClick="posting1('Posting Data?Data Lama Akan terhapus','<?= base_url("Admin/Kecamatan/posting/per/" . $t->id .'/'.$t->Id_Saluran) ?>')" class="btn btn-warning"><i class="icon-send"></button></td>
                               
                                <td>
                                    <a href="<?= base_url('Admin/Kecamatan/form_edit_saluran/' . $t->id) ?>" class="icon red" data-toggle="tooltip" data-placement="top" title="Edit Saluran Irigasi"><i class="icon-edit"></i></a>
                                    
                                    
                                    <a href="javascript:void(0)" onClick="hapus('Data Saluran','<?= base_url("Admin/Kecamatan/hapus_saluran/" . $t->id.'/'.$t->Id_Saluran) ?>')" class="icon red" data-toggle="tooltip" data-placement="top" title="Hapus"><i class="icon-trash"></i></a>
                                    
                 
                                </td>
                            </tr>
                            
                            <?php }
                            } ?>
                            <tr>
                               
                                <td colspan="4"> <select name="tahun2" id="tahun2"  style="margin-right: 10px">
                               <?php foreach($tw as $r) {?> 
                               <option value="<?=$r->id?>"><?=$r->Tahun?></option>
                             <?php } ?>
                               </select> <button onClick="posting2('Posting Data?Data Lama Akan terhapus','<?= base_url("Admin/Kecamatan/posting/all/" . $t->id .'/'.$t->Id_Saluran) ?>')" class="btn btn-warning"> Posting Semua Data >></button> </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
    </div>
 
    <?php $this->load->view('Admin/bootstrap_model.php'); ?>
    <script>
        
       function hapus(pesan, url) {
            var result = confirm('Anda Yakin Untuk Menghapus ' + pesan);
                if (result) {
                    window.location = url;
                }
        }
        function posting1(pesan, url) {
            var result = confirm('Anda Yakin  ' + pesan);
            var tahun = document.getElementById('tahun1').value;
                if (result) {
                    
                    window.location = url+'/'+tahun;
                }
        }
        function posting2(pesan, url) {
            var result = confirm('Anda Yakin  ' + pesan);
            var tahun = document.getElementById('tahun2').value;
                if (result) {
                    
                    window.location = url+'/'+tahun;
                }
        }
        
    </script>