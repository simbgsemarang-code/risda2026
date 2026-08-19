<div class="modal-header">

    <table>
        <tr>
            <td style="width:550px;font-size:14px"><b>Kode         : </b><?=$hm[0]->K_SALURAN?></td>
            <td style="font-size:14px"><b>DI            :</b> <?=$hm[0]->DI?></td>
        </tr>
        <tr>
            <td style="width:250px;font-size:14px"><b>Nama Saluran : </b><?=$hm[0]->NAMA?></td>
            <td style="font-size:14px"><b>Kelas Saluran : </b><?=$hm[0]->KelasSalur?></td>
        </tr>
        <tr>
            <td style="width:250px;font-size:14px"><b>Desa : </b><?=$hm[0]->Desa?></td>
            <td style="font-size:14px"><b>Kecamatan : </b><?=$hm[0]->Kecamatan?></td>
        </tr>
        <tr>
            <td style="width:250px;font-size:14px"><b>Kemantren : </b><?=$hm[0]->KEMANTREN?></td>
            <td style="font-size:14px"><b>UPTD : </b><?=$hm[0]->UPTD?></td>
        </tr>
    </table>
</div>
  <div class="modal-body">
	<div class="row">
      <div class="box box-danger">
        <div class="box-body">
          <div class="col-md-12">
		   <table border="1" class="table table-bordered table-dark" >
           <tr>
                <th rowspan="2" >NAMA SALURAN</th>
                <th rowspan="2">ID SALURAN</th>
                <th rowspan="2">HM</th>
                <th colspan="2" style="text-align:center">KIRI</th>
                <th rowspan="2">KONSTRUKSI KIRI</th>
                <th colspan="2" style="text-align:center">KANAN</th>
                <th rowspan="2">KONSTRUKSI KANAN</th>
                <th rowspan="2">LEBAR ATAS</th>
                <th rowspan="2">LEBAR BAWAH</th>
                <th rowspan="2">KONDISI</th>
           </tr>
           <tr>      
                <th>TINGGI</th>
                <th>TEBAL</th>          
                <th>TINGGI</th>
                <th>TEBAL</th>         
           </tr>
            <tr>
                <td style="text-align:center"> <?=$hm[0]->NAMA?></td>
                <td style="text-align:center"><?=$hm[0]->Id_Saluran?></td>
                <td style="text-align:center"><?=$hm[0]->HM?></td>
                <td style="text-align:center"><?=$hm[0]->tinggikiri?></td>
                <td style="text-align:center"><?=$hm[0]->tebalkiri?></td>
                <td style="text-align:center"><?=$hm[0]->konstruksikiri?></td>
                <td style="text-align:center"><?=$hm[0]->tinggikanan?></td>
                <td style="text-align:center"><?=$hm[0]->tebalkanan?></td>
                <td style="text-align:center"><?=$hm[0]->konstruksikanan?></td>
                <td style="text-align:center"><?=$hm[0]->lebaratas?></td>
                <td style="text-align:center"><?=$hm[0]->lebarbawah?></td>
                <td style="text-align:center"><?=$hm[0]->KONDISI?></td>
            </tr>
           </table>
						  
	    </div>
	</div>
    <div class="row">
      <div class="box box-danger">
        <div class="box-body">
          <div class="h-100 d-flex align-items-center justify-content-center">
            <?php 
            if (isset($hm[0]->foto)) {
				$fil = base_url('assets/foto/' . $hm[0]->folder . '/'. $hm[0]->foto);
			} else {
				$fil =  base_url('assets/foto/no_image.jpg');
			}

			?>
            <img width="550px"  id="frame" src="<?= $fil ?>" alt="Bootstrap Gallery" />
          </div>
        </div>
        </div>
    </div>
    
</div>

