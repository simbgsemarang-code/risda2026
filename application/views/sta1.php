<div class="modal-header">
</div>
  <div class="modal-body">
	<div class="row">
      <div class="box box-danger">
        <div class="box-body">
          <div class="col-md-12">
           
		   <table border="1" class="table table-bordered table-dark" >
      
           <tr>
                <th >No</th>
                <th >Keterangan</th>
                <th >Jumlah</th>
               
           </tr>
           <?php 
           $no = 1;
           $total = 0;
           foreach($data as $d) {
              $jml = $this->Buka_peta->statistik_pan_kemantren($d->kemantren, $tabel,$jns,$pan);
                $total = $total + $jml[0]->PANJANG;
                if ($jml[0]->PANJANG != null) {
                    $jmla = number_format($jml[0]->PANJANG,2);
                }else{
                    $jmla = 0;
                }
            ?>
            <tr>
                <td style="text-align:center"><?=$no?></td>
                <td style="text-align:left"><?=$d->kemantren?></td>
                <td style="text-align:center"><?=$jmla?></td>
            </tr>
            <?php $no++;} ?>
              <tr>
                <td style="text-align:center"></td>
                <td style="text-align:left">Total</td>
                <td style="text-align:center"><?=number_format($total,2)?></td>
            </tr>
           </table>
				  
	    </div>
	</div>
</div>

