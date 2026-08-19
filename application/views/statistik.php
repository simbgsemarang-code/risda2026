<div class="container-fluid bg-light about pt-4 pb-4">
    <div class="container pt-2 pb-3">
        <div class="text-center mx-auto pb-4 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
            <h1 class="display-4 text-primary text-uppercase mb-2">Statistik</h1>
        </div>
        
        <style>
.nav-text-tabs {
    border-bottom: 2px solid #eaeaea;
    gap: 10px;
}
.nav-text-tabs .nav-link {
    color: #6c757d;
    background: transparent;
    border: none;
    border-bottom: 3px solid transparent;
    border-radius: 0;
    padding: 10px 20px;
    font-weight: 600;
    font-size: 1.1rem;
    transition: all 0.2s ease-in-out;
}
.nav-text-tabs .nav-link:hover {
    color: #198754;
    border-bottom-color: #a3cfbb;
}
.nav-text-tabs .nav-link.active, .nav-text-tabs .show>.nav-link {
    color: #198754;
    background: transparent;
    border-bottom: 3px solid #198754;
}
.btn-success { background-color: #198754; border-color: #198754; }
.table-success { --bs-table-bg: #d1e7dd; }
</style>
        <div class="row g-4">
            <div class="col-xl-12 wow fadeInRight" data-wow-delay="0.2s">
                <div class="bg-white rounded p-4 h-100 shadow-sm">
                    <div class="text-center mx-auto pb-4 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 100%;">
                        <select id="uptd" class="form-control form-control-lg border-success border-2" onchange="sta(this.value)">
                            <option value="all">Semua UPTD</option>
                            <?php foreach ($uptd as $u)  {?>
                            <option value="<?=$u->uptd?>"><?=$u->uptd?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div id='stat'>
                        
                        <ul class="nav nav-text-tabs mb-4 justify-content-center bg-white" id="statTabs" role="tablist">
                          <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="jumlah-tab" data-bs-toggle="tab" data-bs-target="#jumlah" type="button" role="tab" aria-controls="jumlah" aria-selected="true" onclick="setTimeout(function(){window.dispatchEvent(new Event('resize'));},200)">Jumlah</button>
                          </li>
                          <li class="nav-item" role="presentation">
                            <button class="nav-link" id="panjang-tab" data-bs-toggle="tab" data-bs-target="#panjang" type="button" role="tab" aria-controls="panjang" aria-selected="false" onclick="setTimeout(function(){window.dispatchEvent(new Event('resize'));},200)">Panjang (m)</button>
                          </li>
                          <li class="nav-item" role="presentation">
                            <button class="nav-link" id="bangunan-tab" data-bs-toggle="tab" data-bs-target="#bangunan" type="button" role="tab" aria-controls="bangunan" aria-selected="false" onclick="setTimeout(function(){window.dispatchEvent(new Event('resize'));},200)">Bangunan</button>
                          </li>
                          <li class="nav-item" role="presentation">
                            <button class="nav-link" id="airbaku-tab" data-bs-toggle="tab" data-bs-target="#airbaku" type="button" role="tab" aria-controls="airbaku" aria-selected="false" onclick="setTimeout(function(){window.dispatchEvent(new Event('resize'));},200)">Air Baku</button>
                          </li>
                        </ul>

<div class="tab-content" id="statTabsContent">

  <!-- JUMLAH -->
  <div class="tab-pane fade show active" id="jumlah" role="tabpanel" aria-labelledby="jumlah-tab">
<div class="text-center mx-auto pb-2 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 100%;">
                            <h4 class="fw-bold mb-3 text-primary text-uppercase">Berdasarkan Jumlah</h4>
                        </div>
                        <div class="row g-4 justify-content-center">
                            <div class="col-sm-4">
                                <div class="counter-item bg-light rounded p-3 h-100">
                                    <div id="chartContainer" style="height: 300px; width: 100%;"></div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="counter-item bg-light rounded p-3 h-100">
                                    <div id="chartContainer1" style="height: 300px; width: 100%;"></div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="counter-item bg-light rounded p-3 h-100">
                                    <div id="chartContainer2" style="height: 300px; width: 100%;"></div>
                                </div>
                            </div>
                        </div>
                        <br>
                        
<div class="text-center mx-auto pb-2 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 100%;">
                            <h4 class="fw-bold mb-3 text-primary text-uppercase">Jumlah Saluran Per UPTD</h4>
                        </div>
                        
                        <div class="row g-4 justify-content-center">
                            <div class="col-sm-4">
                                <p style="font-size:24px"><b> Saluran Irigasi</b></p>
                                <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover shadow-sm rounded overflow-hidden" style="background-color: white;">
                                    <thead class="table-success">
                                    <tr>
                                        <th style="text-align:center">No</th>
                                        <th style="text-align:center">UPTD</th>
                                        <th style="text-align:center">Jumlah</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                     <?php 
                                     $i=1;
                                      $total = 0;
                                     foreach ($uptd as $u)  {
                                        
                                        $jml = $this->Buka_peta->statistik($u->uptd, null,null,'irigasi');
                                         $total = $total + $jml;
                                        ?>
                                    <tr>
                                        <td style="text-align:center"><?=$i?></td>
                                        <td><a href="javascript:void(0)" class="text-success fw-bold text-decoration-none" onClick="show_modal_page2('<?php echo base_url('Welcome/popstat/si/' . $u->id); ?>')"><?=$u->uptd?></a></td>
                                        <td style="text-align:center"><?=$jml?></td>
                                    </tr>
                                    <?php $i++;} ?>
                                    <tr class="table-group-divider">
                                        <td style="text-align:center"></td>
                                        <td class="fw-bold">Total</td>
                                        <td style="text-align:center" class="fw-bold"><?=$total?></td>
                                    </tr>
                                    </tbody>
                                </table>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <p style="font-size:24px"><b> Saluran Pembuang</b></p>
                                <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover shadow-sm rounded overflow-hidden" style="background-color: white;">
                                    <thead class="table-success">
                                    <tr>
                                        <th style="text-align:center">No</th>
                                        <th style="text-align:center">UPTD</th>
                                        <th style="text-align:center">Jumlah</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                     <?php 
                                     $i=1;
                                     $total = 0;
                                     foreach ($uptd as $u)  {
                                        
                                        $jml = $this->Buka_peta->statistik($u->uptd, null,null,'saluran_pembuang');
                                        $total = $total + $jml;
                                        ?>
                                    <tr>
                                        <td style="text-align:center"><?=$i?></td>
                                        <td><a href="javascript:void(0)" class="text-success fw-bold text-decoration-none" onClick="show_modal_page2('<?php echo base_url('Welcome/popstat/sp/' . $u->id); ?>')"><?=$u->uptd?></a></td>
                                        <td style="text-align:center"><?=$jml?></td>
                                    </tr>
                                    
                                    <?php $i++;} ?>
                                    <tr class="table-group-divider">
                                        <td style="text-align:center"></td>
                                        <td class="fw-bold">Total</td>
                                        <td style="text-align:center" class="fw-bold"><?=$total?></td>
                                    </tr>
                                    </tbody>
                                </table>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <p style="font-size:24px"><b> Drainase Perkotaan</b></p>
                                <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover shadow-sm rounded overflow-hidden" style="background-color: white;">
<thead class="table-success">
<tr>
                                        <th style="text-align:center">No</th>
                                        <th style="text-align:center">UPTD</th>
                                        <th style="text-align:center">Jumlah</th>
                                    </tr>
</thead>
<tbody>
                                     <?php 
                                     $i=1;
                                      $total = 0;
                                     foreach ($uptd as $u)  {
                                        
                                        $jml = $this->Buka_peta->statistik($u->uptd, null,null,'drainase');
                                         $total = $total + $jml;
                                        ?>
                                    <tr>
                                        <td style="text-align:center"><?=$i?></td>
                                        <td><?=$u->uptd?></td>
                                        <td style="text-align:center"><?=$jml?></td>
                                    </tr>
                                    <?php $i++;} ?>
                                    <tr>
                                        <td style="text-align:center"></td>
                                        <td>Total</td>
                                        <td style="text-align:center"><?=$total?></td>
                                    </tr>
                                </tbody>
                                </table>
                                </div>
                            </div>
                        </div>
                        <br>
                        

                        
<div class="text-center mx-auto pb-2 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 100%;">
                            <h4 class="fw-bold mb-3 text-primary text-uppercase">Jumlah Saluran Per Kecamatan</h4>
                        </div>
                        
                        <div class="row g-4 justify-content-center">
                            <div class="col-sm-4">
                                <p style="font-size:24px"><b> Saluran Irigasi</b></p>
                                <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover shadow-sm rounded overflow-hidden" style="background-color: white;">
<thead class="table-success">
<tr>
                                        <th style="text-align:center">No</th>
                                        <th style="text-align:center">Kecamatan</th>
                                        <th style="text-align:center">Jumlah</th>
                                    </tr>
</thead>
<tbody>
                                     <?php 
                                     $i=1;
                                      $total = 0;
                                     foreach ($kecamatan as $u)  {
                                        $kec = $u->KECAMATAN;
                                        $jm = strlen($kec);
                                        $kc = substr($kec,5,$jm);
                                        $jml = $this->Buka_peta->statistik_kecamatan($kc, null,null,'irigasi');
                                         $total = $total + $jml;
                                        ?>
                                    <tr>
                                        <td style="text-align:center"><?=$i?></td>
                                        <td><a href="javascript:void(0)" class="text-success fw-bold text-decoration-none" onClick="show_modal_page2('<?php echo base_url('Welcome/popstat2/si/' . $u->id); ?>')"><?=$kc?></a></td>
                                        <td style="text-align:center"><?=$jml?></td>
                                    </tr>
                                    <?php $i++;} ?>
                                    <tr>
                                        <td style="text-align:center"></td>
                                        <td>Total</td>
                                        <td style="text-align:center"><?=$total?></td>
                                    </tr>
                                </tbody>
                                </table>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <p style="font-size:24px"><b> Saluran Pembuang</b></p>
                                <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover shadow-sm rounded overflow-hidden" style="background-color: white;">
<thead class="table-success">
<tr>
                                        <th style="text-align:center">No</th>
                                        <th style="text-align:center">Kecamatan</th>
                                        <th style="text-align:center">Jumlah</th>
                                    </tr>
</thead>
<tbody>
                                     <?php 
                                     $i=1;
                                     $total = 0;
                                     foreach ($kecamatan as $u)  {
                                       $kec = $u->KECAMATAN;
                                        $jm = strlen($kec);
                                        $kc = substr($kec,5,$jm);
                                        $jml = $this->Buka_peta->statistik_kecamatan($kc, null,null,'saluran_pembuang');
                                         $total = $total + $jml;
                                        ?>
                                    <tr>
                                        <td style="text-align:center"><?=$i?></td>
                                       <td><a href="javascript:void(0)" class="text-success fw-bold text-decoration-none" onClick="show_modal_page2('<?php echo base_url('Welcome/popstat2/sp/' . $u->id); ?>')"><?=$kc?></a></td>
                                        <td style="text-align:center"><?=$jml?></td>
                                    </tr>
                                    <?php $i++;} ?>
                                    <tr>
                                        <td style="text-align:center"></td>
                                        <td>Total</td>
                                        <td style="text-align:center"><?=$total?></td>
                                    </tr>
                                </tbody>
                                </table>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <p style="font-size:24px"><b> Drainase Perkotaan</b></p>
                                <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover shadow-sm rounded overflow-hidden" style="background-color: white;">
<thead class="table-success">
<tr>
                                        <th style="text-align:center">No</th>
                                        <th style="text-align:center">Kecamatan</th>
                                        <th style="text-align:center">Jumlah</th>
                                    </tr>
</thead>
<tbody>
                                     <?php 
                                     $i=1;
                                      $total = 0;
                                     foreach ($kecamatan as $u)  {
                                         $kec = $u->KECAMATAN;
                                        $jm = strlen($kec);
                                        $kc = substr($kec,5,$jm);
                                        $jml = $this->Buka_peta->statistik_kecamatan($kec, null,null,'drainase');
                                         $total = $total + $jml;
                                        ?>
                                    <tr>
                                        <td style="text-align:center"><?=$i?></td>
                                       <td><a href="javascript:void(0)" class="text-success fw-bold text-decoration-none" onClick="show_modal_page2('<?php echo base_url('Welcome/popstat2/d/' . $u->id); ?>')"><?=$kc?></a></td>
                                        <td style="text-align:center"><?=$jml?></td>
                                    </tr>
                                    <?php $i++;} ?>
                                    <tr>
                                        <td style="text-align:center"></td>
                                        <td>Total</td>
                                        <td style="text-align:center"><?=$total?></td>
                                    </tr>
                                </tbody>
                                </table>
                                </div>
                            </div>
                        </div>
                        <br>
                        

                        
  </div>

  <!-- PANJANG -->
  <div class="tab-pane fade" id="panjang" role="tabpanel" aria-labelledby="panjang-tab">
<div class="text-center mx-auto pb-2 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 100%;">
                            <h4 class="fw-bold mb-3 text-primary text-uppercase">Berdasarkan Panjang (m)</h4>
                        </div>
                        <div class="row g-4 justify-content-center">
                            <div class="col-sm-4">
                                <div class="counter-item bg-light rounded p-3 h-100">
                                    <div id="chartContainer3" style="height: 300px; width: 100%;"></div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="counter-item bg-light rounded p-3 h-100">
                                    <div id="chartContainer4a" style="height: 300px; width: 100%;"></div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="counter-item bg-light rounded p-3 h-100">
                                    <div id="chartContainer5" style="height: 300px; width: 100%;"></div>
                                </div>
                            </div>
                        </div>
                        <br>
                        
<div class="text-center mx-auto pb-2 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 100%;">
                            <h4 class="fw-bold mb-3 text-primary text-uppercase">Panjang Saluran Per UPTD</h4>
                        </div>
                        
                        <div class="row g-4 justify-content-center">
                            <div class="col-sm-4">
                                <p style="font-size:24px"><b> Saluran Irigasi</b></p>
                                <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover shadow-sm rounded overflow-hidden" style="background-color: white;">
<thead class="table-success">
<tr>
                                        <th style="text-align:center">No</th>
                                        <th style="text-align:center">UPTD</th>
                                        <th style="text-align:center">Jumlah</th>
                                    </tr>
</thead>
<tbody>
                                     <?php 
                                     $i=1;
                                      $total = 0;
                                     foreach ($uptd as $u)  {
                                        
                                        $jml = $this->Buka_peta->statistik_pan($u->uptd, null,null,'irigasi','PANJANG');
                                         $total = $total + $jml[0]->PANJANG;
                                        ?>
                                    <tr>
                                        <td style="text-align:center"><?=$i?></td>
                                         <td><a href="javascript:void(0)" class="text-success fw-bold text-decoration-none" onClick="show_modal_page2('<?php echo base_url('Welcome/popstat1/si/' . $u->id); ?>')"><?=$u->uptd?></a></td>
                                        <td style="text-align:center"><?=number_format($jml[0]->PANJANG,2)?></td>
                                    </tr>
                                    <?php $i++;} ?>
                                    <tr>
                                        <td style="text-align:right"></td>
                                        <td>Total</td>
                                        <td style="text-align:right"><?=number_format($total,2)?></td>
                                    </tr>
                                </tbody>
                                </table>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <p style="font-size:24px"><b> Saluran Pembuang</b></p>
                                <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover shadow-sm rounded overflow-hidden" style="background-color: white;">
<thead class="table-success">
<tr>
                                        <th style="text-align:center">No</th>
                                        <th style="text-align:center">UPTD</th>
                                        <th style="text-align:center">Jumlah</th>
                                    </tr>
</thead>
<tbody>
                                     <?php 
                                     $i=1;
                                     $total = 0;
                                     foreach ($uptd as $u)  {
                                        
                                        $jml = $this->Buka_peta->statistik_pan($u->uptd, null,null,'saluran_pembuang','PANJANG');
                                        $total = $total + $jml[0]->PANJANG;
                                        ?>
                                    <tr>
                                        <td style="text-align:center"><?=$i?></td>
                                        <td><a href="javascript:void(0)" class="text-success fw-bold text-decoration-none" onClick="show_modal_page2('<?php echo base_url('Welcome/popstat1/sp/' . $u->id); ?>')"><?=$u->uptd?></a></td>
                                        <td style="text-align:center"><?=number_format($jml[0]->PANJANG,2)?></td>
                                    </tr>
                                    
                                    <?php $i++;} ?>
                                    <tr>
                                        <td style="text-align:right"></td>
                                        <td>Total</td>
                                        <td style="text-align:right"><?=number_format($total,2)?></td>
                                    </tr>
                                </tbody>
                                </table>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <p style="font-size:24px"><b> Drainase Perkotaan</b></p>
                                <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover shadow-sm rounded overflow-hidden" style="background-color: white;">
<thead class="table-success">
<tr>
                                        <th style="text-align:center">No</th>
                                        <th style="text-align:center">UPTD</th>
                                        <th style="text-align:center">Jumlah</th>
                                    </tr>
</thead>
<tbody>
                                     <?php 
                                     $i=1;
                                      $total = 0;
                                     foreach ($uptd as $u)  {
                                        
                                        $jml = $this->Buka_peta->statistik_pan($u->uptd, null,null,'drainase','Panjang__m');
                                        if ($jml[0]->Panjang__m != null) {
                                            $j =  number_format($jml[0]->Panjang__m,2);
                                        }else{
                                            $j=0.00;
                                        }
                                         $total = $total + $jml[0]->Panjang__m;
                                        ?>
                                    <tr>
                                        <td style="text-align:center"><?=$i?></td>
                                        <td><?=$u->uptd?></td>
                                        <td style="text-align:right"><?=$j?></td>
                                    </tr>
                                    <?php $i++;} ?>
                                    <tr>
                                        <td style="text-align:center"></td>
                                        <td>Total</td>
                                        <td style="text-align:right"><?=number_format($total,2)?></td>
                                    </tr>
                                </tbody>
                                </table>
                                </div>
                            </div>
                        </div>
                        <br>
                        
<div class="text-center mx-auto pb-2 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 100%;">
                            <h4 class="fw-bold mb-3 text-primary text-uppercase">Panjang Saluran Per Kecamatan</h4>
                        </div>
                        
                        <div class="row g-4 justify-content-center">
                            <div class="col-sm-4">
                                <p style="font-size:24px"><b> Saluran Irigasi</b></p>
                                <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover shadow-sm rounded overflow-hidden" style="background-color: white;">
<thead class="table-success">
<tr>
                                        <th style="text-align:center">No</th>
                                        <th style="text-align:center">UPTD</th>
                                        <th style="text-align:center">Jumlah</th>
                                    </tr>
</thead>
<tbody>
                                     <?php 
                                     $i=1;
                                      $total = 0;
                                     foreach ($kecamatan as $u)  {
                                        $kec = $u->KECAMATAN;
                                        $jm = strlen($kec);
                                        $kc = substr($kec,5,$jm);
                                        $jml = $this->Buka_peta->statistik_pan_kecamatan($kc, null,null,'irigasi','PANJANG');
                                        if ( $jml[0]->PANJANG != null) {
                                            $jm = number_format( $jml[0]->PANJANG,2);
                                        }else{
                                            $jm = 0;
                                        }
                                         $total = $total + $jml[0]->PANJANG;
                                        ?>
                                    <tr>
                                        <td style="text-align:center"><?=$i?></td>
                                         <td><a href="javascript:void(0)" class="text-success fw-bold text-decoration-none" onClick="show_modal_page2('<?php echo base_url('Welcome/popstat3/si/' . $u->id); ?>')"><?=$kc?></a></td>
                                        <td style="text-align:right"><?=$jm?></td>
                                    </tr>
                                    <?php $i++;} ?>
                                    <tr>
                                        <td style="text-align:right"></td>
                                        <td>Total</td>
                                        <td style="text-align:right"><?=number_format($total,2)?></td>
                                    </tr>
                                </tbody>
                                </table>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <p style="font-size:24px"><b> Saluran Pembuang</b></p>
                                <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover shadow-sm rounded overflow-hidden" style="background-color: white;">
<thead class="table-success">
<tr>
                                        <th style="text-align:center">No</th>
                                        <th style="text-align:center">UPTD</th>
                                        <th style="text-align:center">Jumlah</th>
                                    </tr>
</thead>
<tbody>
                                     <?php 
                                     $i=1;
                                     $total = 0;
                                     foreach ($kecamatan as $u)  {
                                         $kec = $u->KECAMATAN;
                                        $jm = strlen($kec);
                                        $kc = substr($kec,5,$jm);
                                        $jml = $this->Buka_peta->statistik_pan_kecamatan($kc, null,null,'saluran_pembuang','PANJANG');
                                        
                                        if ( $jml[0]->PANJANG != null) {
                                            $jm = number_format( $jml[0]->PANJANG,2);
                                        }else{
                                            $jm = 0;
                                        }$total = $total + $jml[0]->PANJANG;
                                        ?>
                                    <tr>
                                        <td style="text-align:center"><?=$i?></td>
                                        <td><a href="javascript:void(0)" class="text-success fw-bold text-decoration-none" onClick="show_modal_page2('<?php echo base_url('Welcome/popstat3/sp/' . $u->id); ?>')"><?=$kc?></a></td>
                                        <td style="text-align:right"><?=$jm?></td>
                                    </tr>
                                    
                                    <?php $i++;} ?>
                                    <tr>
                                        <td style="text-align:right"></td>
                                        <td>Total</td>
                                        <td style="text-align:right"><?=number_format($total,2)?></td>
                                    </tr>
                                </tbody>
                                </table>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <p style="font-size:24px"><b> Drainase Perkotaan</b></p>
                                <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover shadow-sm rounded overflow-hidden" style="background-color: white;">
<thead class="table-success">
<tr>
                                        <th style="text-align:center">No</th>
                                        <th style="text-align:center">Kecamatan</th>
                                        <th style="text-align:center">Jumlah</th>
                                    </tr>
</thead>
<tbody>
                                     <?php 
                                     $i=1;
                                      $total = 0;
                                     foreach ($kecamatan as $u)  {
                                         $kec = $u->KECAMATAN;
                                        $jm = strlen($kec);
                                        $kc = substr($kec,5,$jm);
                                        $jml = $this->Buka_peta->statistik_pan_kecamatan($kec, null,null,'drainase','Panjang__m');
                                        if ($jml[0]->Panjang__m != null) {
                                            $j =  number_format($jml[0]->Panjang__m,2);
                                        }else{
                                            $j=0.00;
                                        }
                                         $total = $total + $jml[0]->Panjang__m;
                                        ?>
                                    <tr>
                                        <td style="text-align:center"><?=$i?></td>
                                       <td><a href="javascript:void(0)" class="text-success fw-bold text-decoration-none" onClick="show_modal_page2('<?php echo base_url('Welcome/popstat3/d/' . $u->id); ?>')"><?=$kc?></a></td>
                                        <td style="text-align:right"><?=$j?></td>
                                    </tr>
                                    <?php $i++;} ?>
                                    <tr>
                                        <td style="text-align:center"></td>
                                        <td>Total</td>
                                        <td style="text-align:right"><?=number_format($total,2)?></td>
                                    </tr>
                                </tbody>
                                </table>
                                </div>
                            </div>
                        </div>
                        <br>
                        
  </div>

  <!-- BANGUNAN -->
  <div class="tab-pane fade" id="bangunan" role="tabpanel" aria-labelledby="bangunan-tab">
<div class="text-center mx-auto pb-2 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 100%;">
                            <h4 class="fw-bold mb-3 text-primary text-uppercase">Statistik Bangunan</h4>
                        </div>
                        
                        <div class="row g-4 justify-content-center">
                            <div class="col-sm-4">
                                <div class="counter-item bg-light rounded p-3 h-100">
                                    <div id="chartContainer6" style="height: 300px; width: 100%;"></div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="counter-item bg-light rounded p-3 h-100">
                                    <div id="chartContainer7" style="height: 300px; width: 100%;"></div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="counter-item bg-light rounded p-3 h-100">
                                    <div id="chartContainer8" style="height: 300px; width: 100%;"></div>
                                </div>
                            </div>
                        </div>
                        <br>
                        
<div class="text-center mx-auto pb-2 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 100%;">
                            <h4 class="fw-bold mb-3 text-primary text-uppercase">Jumlah Bangunan Per UPTD</h4>
                        </div>
                        
                        <div class="row g-4 justify-content-center">
                            <div class="col-sm-4">
                                <p style="font-size:24px"><b> Bendung</b></p>
                                <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover shadow-sm rounded overflow-hidden" style="background-color: white;">
<thead class="table-success">
<tr>
                                        <th style="text-align:center">No</th>
                                        <th style="text-align:center">UPTD</th>
                                        <th style="text-align:center">Jumlah</th>
                                    </tr>
</thead>
<tbody>
                                     <?php 
                                     $i=1;
                                      $total = 0;
                                     foreach ($uptd as $u)  {
                                        
                                        $jml = $this->Buka_peta->statistik($u->uptd, null,null,'bendung');
                                         $total = $total + $jml;
                                        ?>
                                    <tr>
                                        <td style="text-align:center"><?=$i?></td>
                                        <td><a href="javascript:void(0)" class="text-success fw-bold text-decoration-none" onClick="show_modal_page2('<?php echo base_url('Welcome/popstat/bd/' . $u->id); ?>')"><?=$u->uptd?></a></td>
                                        <td style="text-align:center"><?=$jml?></td>
                                    </tr>
                                    <?php $i++;} ?>
                                    <tr>
                                        <td style="text-align:center"></td>
                                        <td>Total</td>
                                        <td style="text-align:center"><?=$total?></td>
                                    </tr>
                                </tbody>
                                </table>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <p style="font-size:24px"><b> B. Pelengkap Irigasi</b></p>
                                <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover shadow-sm rounded overflow-hidden" style="background-color: white;">
<thead class="table-success">
<tr>
                                        <th style="text-align:center">No</th>
                                        <th style="text-align:center">UPTD</th>
                                        <th style="text-align:center">Jumlah</th>
                                    </tr>
</thead>
<tbody>
                                     <?php 
                                     $i=1;
                                     $total = 0;
                                     foreach ($uptd as $u)  {
                                        
                                        $jml = $this->Buka_peta->statistik($u->uptd, null,null,'p_irigasi');
                                        $total = $total + $jml;
                                        ?>
                                    <tr>
                                        <td style="text-align:center"><?=$i?></td>
                                        <td><a href="javascript:void(0)" class="text-success fw-bold text-decoration-none" onClick="show_modal_page2('<?php echo base_url('Welcome/popstat/bi/' . $u->id); ?>')"><?=$u->uptd?></a></td>
                                        <td style="text-align:center"><?=$jml?></td>
                                    </tr>
                                    
                                    <?php $i++;} ?>
                                    <tr>
                                        <td style="text-align:center"></td>
                                        <td>Total</td>
                                        <td style="text-align:center"><?=$total?></td>
                                    </tr>
                                </tbody>
                                </table>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <p style="font-size:24px"><b>B. Pelengkap Pembuang</b></p>
                                <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover shadow-sm rounded overflow-hidden" style="background-color: white;">
<thead class="table-success">
<tr>
                                        <th style="text-align:center">No</th>
                                        <th style="text-align:center">UPTD</th>
                                        <th style="text-align:center">Jumlah</th>
                                    </tr>
</thead>
<tbody>
                                     <?php 
                                     $i=1;
                                      $total = 0;
                                     foreach ($uptd as $u)  {
                                        
                                        $jml = $this->Buka_peta->statistik($u->uptd, null,null,'pelengkap_pembuang');
                                         $total = $total + $jml;
                                        ?>
                                    <tr>
                                        <td style="text-align:center"><?=$i?></td>
                                       <td><a href="javascript:void(0)" class="text-success fw-bold text-decoration-none" onClick="show_modal_page2('<?php echo base_url('Welcome/popstat/bp/' . $u->id); ?>')"><?=$u->uptd?></a></td>
                                        <td style="text-align:center"><?=$jml?></td>
                                    </tr>
                                    <?php $i++;} ?>
                                    <tr>
                                        <td style="text-align:center"></td>
                                        <td>Total</td>
                                        <td style="text-align:center"><?=$total?></td>
                                    </tr>
                                </tbody>
                                </table>
                                </div>
                            </div>
                        </div>
                         <br>
                        
<div class="text-center mx-auto pb-2 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 100%;">
                            <h4 class="fw-bold mb-3 text-primary text-uppercase">Jumlah Bangunan Per Kecamatan</h4>
                        </div>
                        
                        <div class="row g-4 justify-content-center">
                            <div class="col-sm-3">
                                <p style="font-size:24px"><b> Bendung</b></p>
                                <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover shadow-sm rounded overflow-hidden" style="background-color: white;">
<thead class="table-success">
<tr>
                                        <th style="text-align:center">No</th>
                                        <th style="text-align:center">Kecamatan</th>
                                        <th style="text-align:center">Jumlah</th>
                                    </tr>
</thead>
<tbody>
                                     <?php 
                                     $i=1;
                                      $total = 0;
                                     foreach ($kecamatan as $u)  {
                                          $kec = $u->KECAMATAN;
                                        $jm = strlen($kec);
                                        $kc = substr($kec,5,$jm);
                                        $jml = $this->Buka_peta->statistik_kecamatan($kc, null,null,'bendung');
                                         $total = $total + $jml;
                                        ?>
                                    <tr>
                                        <td style="text-align:center"><?=$i?></td>
                                        <td><a href="javascript:void(0)" class="text-success fw-bold text-decoration-none" onClick="show_modal_page2('<?php echo base_url('Welcome/popstat2/bd/' . $u->id); ?>')"><?=$kc?></a></td>
                                        <td style="text-align:center"><?=$jml?></td>
                                    </tr>
                                    <?php $i++;} ?>
                                    <tr>
                                        <td style="text-align:center"></td>
                                        <td>Total</td>
                                        <td style="text-align:center"><?=$total?></td>
                                    </tr>
                                </tbody>
                                </table>
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <p style="font-size:24px"><b> B. Pelengkap Irigasi</b></p>
                                <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover shadow-sm rounded overflow-hidden" style="background-color: white;">
<thead class="table-success">
<tr>
                                        <th style="text-align:center">No</th>
                                        <th style="text-align:center">Kecamatan</th>
                                        <th style="text-align:center">Jumlah</th>
                                    </tr>
</thead>
<tbody>
                                     <?php 
                                     $i=1;
                                     $total = 0;
                                     foreach ($kecamatan as $u)  {
                                          $kec = $u->KECAMATAN;
                                        $jm = strlen($kec);
                                        $kc = substr($kec,5,$jm);
                                        $jml = $this->Buka_peta->statistik_kecamatan($kc, null,null,'p_irigasi');
                                        $total = $total + $jml;
                                        ?>
                                    <tr>
                                        <td style="text-align:center"><?=$i?></td>
                                        <td><a href="javascript:void(0)" class="text-success fw-bold text-decoration-none" onClick="show_modal_page2('<?php echo base_url('Welcome/popstat2/bi/' . $u->id); ?>')"><?=$kc?></a></td>
                                        <td style="text-align:center"><?=$jml?></td>
                                    </tr>
                                    
                                    <?php $i++;} ?>
                                    <tr>
                                        <td style="text-align:center"></td>
                                        <td>Total</td>
                                        <td style="text-align:center"><?=$total?></td>
                                    </tr>
                                </tbody>
                                </table>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <p style="font-size:24px"><b>B. Pelengkap Pembuang</b></p>
                                <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover shadow-sm rounded overflow-hidden" style="background-color: white;">
<thead class="table-success">
<tr>
                                        <th style="text-align:center">No</th>
                                        <th style="text-align:center">Kecamatan</th>
                                        <th style="text-align:center">Jumlah</th>
                                    </tr>
</thead>
<tbody>
                                     <?php 
                                     $i=1;
                                      $total = 0;
                                     foreach ($kecamatan as $u)  {
                                         $kec = $u->KECAMATAN;
                                        $jm = strlen($kec);
                                        $kc = substr($kec,5,$jm);
                                        $jml = $this->Buka_peta->statistik_kecamatan($kc, null,null,'pelengkap_pembuang');
                                         $total = $total + $jml;
                                        ?>
                                    <tr>
                                        <td style="text-align:center"><?=$i?></td>
                                       <td><a href="javascript:void(0)" class="text-success fw-bold text-decoration-none" onClick="show_modal_page2('<?php echo base_url('Welcome/popstat2/bp/' . $u->id); ?>')"><?=$kc?></a></td>
                                        <td style="text-align:center"><?=$jml?></td>
                                    </tr>
                                    <?php $i++;} ?>
                                    <tr>
                                        <td style="text-align:center"></td>
                                        <td>Total</td>
                                        <td style="text-align:center"><?=$total?></td>
                                    </tr>
                                </tbody>
                                </table>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <p style="font-size:24px"><b>Air Baku</b></p>
                                <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover shadow-sm rounded overflow-hidden" style="background-color: white;">
<thead class="table-success">
<tr>
                                        <th style="text-align:center">No</th>
                                        <th style="text-align:center">Kecamatan</th>
                                        <th style="text-align:center">Jumlah</th>
                                    </tr>
</thead>
<tbody>
                                     <?php 
                                     $i=1;
                                      $total = 0;
                                     foreach ($kecamatan as $u)  {
                                         $kec = $u->KECAMATAN;
                                        $jm = strlen($kec);
                                        $kc = substr($kec,5,$jm);
                                        $jml = $this->Buka_peta->statistik_kecamatan($kc, null,null,'sumur');
                                         $total = $total + $jml;
                                        ?>
                                    <tr>
                                        <td style="text-align:center"><?=$i?></td>
                                       <td><a href="javascript:void(0)" class="text-success fw-bold text-decoration-none" onClick="show_modal_page2('<?php echo base_url('Welcome/popstat2/ab/' . $u->id); ?>')"><?=$kc?></a></td>
                                        <td style="text-align:center"><?=$jml?></td>
                                    </tr>
                                    <?php $i++;} ?>
                                    <tr>
                                        <td style="text-align:center"></td>
                                        <td>Total</td>
                                        <td style="text-align:center"><?=$total?></td>
                                    </tr>
                                </tbody>
                                </table>
                                </div>
                            </div>
                        </div>
                         <br>
                        

                            
                        
  </div>

  <!-- AIR BAKU -->
  <div class="tab-pane fade" id="airbaku" role="tabpanel" aria-labelledby="airbaku-tab">
<div class="text-center mx-auto pb-2 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 100%;">
                            <h4 class="fw-bold mb-3 text-primary text-uppercase">Statistik Air Baku</h4>
                        </div>
                        <div class="row g-4 justify-content-center">
                            <div class="col-sm-6">
                                <div class="counter-item bg-light rounded p-3 h-100">
                                    <div id="chartContainer9" style="height: 300px; width: 100%;"></div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <p style="font-size:24px"><b> Air Baku</b></p>
                                <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover shadow-sm rounded overflow-hidden" style="background-color: white;">
<thead class="table-success">
<tr>
                                        <th style="text-align:center">No</th>
                                        <th style="text-align:center">UPTD</th>
                                        <th style="text-align:center">Jumlah</th>
                                    </tr>
</thead>
<tbody>
                                     <?php 
                                     $i=1;
                                      $total = 0;
                                     foreach ($uptd as $u)  {
                                        
                                        $jml = $this->Buka_peta->statistik($u->uptd, null,null,'sumur');
                                         $total = $total + $jml;
                                        ?>
                                    <tr>
                                        <td style="text-align:center"><?=$i?></td>
                                        <td><a href="javascript:void(0)" class="text-success fw-bold text-decoration-none" onClick="show_modal_page2('<?php echo base_url('Welcome/popstat/ab/' . $u->id); ?>')"><?=$u->uptd?></a></td>
                                        <td style="text-align:center"><?=$jml?></td>
                                    </tr>
                                    <?php $i++;} ?>
                                    <tr>
                                        <td style="text-align:center"></td>
                                        <td>Total</td>
                                        <td style="text-align:center"><?=$total?></td>
                                    </tr>
                                </tbody>
                                </table>
                                </div>
                            </div>

                            
                        </div>
                        
  </div>

</div>
</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('bootstrap_model'); ?>
<script>
    function sta(dt) {
       
        $.ajax({
            url: '<?php echo base_url('Welcome/cari_sta/'); ?>'+ dt+'/ajax',
            dataType:'json',
            success: function(response){
                var jml_baik_sekali = response.jml_irigasi.jumlah_baik_sekali;
                var jml_baik = response.jml_irigasi.jumlah_baik;
                var jml_sedang = response.jml_irigasi.jumlah_sedang;
                var jml_buruk = response.jml_irigasi.jumlah_buruk;
                var chart = new CanvasJS.Chart("chartContainer", {
                    title: {
                        text: "Kondisi Saluran Irigasi"
                    },
                    data: [{
                        // Change type to "doughnut", "line", "splineArea", etc.
                        type: "column",
                        dataPoints: [{
                                label: "Baik Sekali",
                                y: jml_baik_sekali
                            },
                            {
                                label: "Baik",
                                y: jml_baik
                            },
                            {
                                label: "Sedang",
                                y: jml_sedang
                            },
                            {
                                label: "Buruk",
                                y: jml_buruk
                            },
                            
                        ]
                    }]
                });
                chart.render();

                var jml_baik = response.jml_pembuang.jumlah_baik;
                var jml_sedang = response.jml_pembuang.jumlah_sedang;
                var jml_buruk = response.jml_pembuang.jumlah_buruk;
                var chart = new CanvasJS.Chart("chartContainer1", {
                    title: {
                        text: "Kondisi Saluran Pembuang"
                    },
                    data: [{
                        // Change type to "doughnut", "line", "splineArea", etc.
                        type: "column",
                        dataPoints: [{
                                label: "Baik",
                                y: jml_baik
                            },
                            {
                                label: "Sedang",
                                y: jml_sedang
                            },
                            {
                                label: "Buruk",
                                y: jml_buruk
                            },

                        ]
                    }]
                });
                chart.render();
                var jml_baik = response.jml_drainase.jumlah_baik;
                var jml_sedang = response.jml_drainase.jumlah_sedang;
                var jml_buruk = response.jml_drainase.jumlah_buruk;
                var chart = new CanvasJS.Chart("chartContainer2", {
                    title: {
                        text: "Kondisi Drainase Perkotaan"
                    },
                    data: [{
                        // Change type to "doughnut", "line", "splineArea", etc.
                        type: "column",
                        dataPoints: [{
                                label: "Baik",
                                y: jml_baik
                            },
                            {
                                label: "Sedang",
                                y: jml_sedang
                            },
                            {
                                label: "Buruk",
                                y: jml_buruk
                            },

                        ]
                    }]
                });
                chart.render();
                var pan_baik_sekali = response.pan_irigasi.panjang_baik_sekali;
                var pan_baik = response.pan_irigasi.panjang_baik;
                var pan_sedang = response.pan_irigasi.panjang_sedang;
                var pan_buruk = response.pan_irigasi.panjang_buruk;
               
                var chart = new CanvasJS.Chart("chartContainer3", {
                    title: {
                        text: "Kondisi Saluran Irigasi"
                    },
                    data: [{
                        // Change type to "doughnut", "line", "splineArea", etc.
                        type: "column",
                        dataPoints: [{
                                label: "Baik Sekali",
                                y: parseFloat(pan_baik_sekali)
                            },
                            {
                                label: "Baik",
                                y: parseFloat(pan_baik)
                            },
                            {
                                label: "Sedang",
                                y: parseFloat(pan_sedang)
                            },
                            {
                                label: "Buruk",
                                y: parseFloat(pan_buruk)
                            },
                            
                        ]
                    }]
                });
                chart.render();
                var pan_baik = response.pan_pembuang.panjang_baik;
                var pan_sedang = response.pan_pembuang.panjang_sedang;
                var pan_buruk = response.pan_pembuang.panjang_buruk;
                var chart = new CanvasJS.Chart("chartContainer4a", {
                    title: {
                        text: "Kondisi Saluran Pembuang"
                    },
                    data: [{
                        // Change type to "doughnut", "line", "splineArea", etc.
                        type: "column",
                        dataPoints: [{
                                label: "Baik",
                                y: parseFloat(pan_baik)
                            },
                            {
                                label: "Sedang",
                                y: parseFloat(pan_sedang)
                            },
                            {
                                label: "Buruk",
                                y: parseFloat(pan_buruk)
                            },

                        ]
                    }]
                });
                chart.render();
                var pan_baik = response.pan_drainase.panjang_baik;
                var pan_sedang = response.pan_drainase.panjang_sedang;
                var pan_buruk = response.pan_drainase.panjang_buruk;
                var chart = new CanvasJS.Chart("chartContainer5", {
                    title: {
                        text: "Kondisi Saluran Drainase"
                    },
                    data: [{
                        // Change type to "doughnut", "line", "splineArea", etc.
                        type: "column",
                        dataPoints: [{
                                label: "Baik",
                                y: parseFloat(pan_baik)
                            },
                            {
                                label: "Sedang",
                                y: parseFloat(pan_sedang)
                            },
                            {
                                label: "Buruk",
                                y: parseFloat(pan_buruk)
                            },

                        ]
                    }]
                });
                chart.render();
                var jml_baik = response.jml_bendung.jumlah_baik;
                var jml_sedang = response.jml_bendung.jumlah_sedang;
                var jml_buruk = response.jml_bendung.jumlah_buruk;
                var chart = new CanvasJS.Chart("chartContainer6", {
                    title: {
                        text: "Statistik Bendung"
                    },
                    legend: {
                        maxWidth: 350,
                        itemWidth: 120
                    },
                    data: [{
                        type: "pie",
                        showInLegend: true,
                        legendText: "{indexLabel}",
                        dataPoints: [{
                                y: jml_baik,
                                indexLabel: "Baik"
                            },
                            {
                                y: jml_sedang,
                                indexLabel: "Sedang"
                            },
                            {
                                y: jml_buruk,
                                indexLabel: "Buruk"
                            },
                        
                        ]
                    }]
                });
                chart.render();
                var jml_baik = response.jml_pirigasi.jumlah_baik;
                var jml_sedang = response.jml_pirigasi.jumlah_sedang;
                var jml_buruk = response.jml_pirigasi.jumlah_buruk;
                var chart = new CanvasJS.Chart("chartContainer7", {
                    title: {
                        text: "Statistik B. Pelengkap Irigasi"
                    },
                    legend: {
                        maxWidth: 350,
                        itemWidth: 120
                    },
                    data: [{
                        type: "pie",
                        showInLegend: true,
                        legendText: "{indexLabel}",
                        dataPoints: [{
                                y: jml_baik,
                                indexLabel: "Baik"
                            },
                            {
                                y: jml_sedang,
                                indexLabel: "Sedang"
                            },
                            {
                                y: jml_buruk,
                                indexLabel: "Buruk"
                            },
                        
                        ]
                    }]
                });
                chart.render();
                var jml_baik = response.jml_ppembuang.jumlah_baik;
                var jml_sedang = response.jml_ppembuang.jumlah_sedang;
                var jml_buruk = response.jml_ppembuang.jumlah_buruk;
                var jumlah_batas_imajiner = response.jml_ppembuang.jumlah_batas_imajiner;
                var jumlah_imajiner = response.jml_ppembuang.jumlah_imajiner;
                var jumlah_alami = response.jml_ppembuang.jumlah_alami;
                var jumlah_rusak_berat = response.jml_ppembuang.jumlah_rusak_berat;
                var jumlah_hilang = response.jml_ppembuang.jumlah_hilang;
                var chart = new CanvasJS.Chart("chartContainer8", {
                    title: {
                        text: "Statistik B. Pelengkap Pembuang"
                    },
                    legend: {
                        maxWidth: 350,
                        itemWidth: 120
                    },
                    data: [{
                        type: "pie",
                        showInLegend: true,
                        legendText: "{indexLabel}",
                        dataPoints: [{
                                y: jml_baik,
                                indexLabel: "Baik"
                            },
                            {
                                y: jml_sedang,
                                indexLabel: "Sedang"
                            },
                            {
                                y: jml_buruk,
                                indexLabel: "Buruk"
                            },
                            {
                                y: jumlah_batas_imajiner,
                                indexLabel: "Batas Imajiner"
                            },
                            {
                                y: jumlah_imajiner,
                                indexLabel: "Imajiner"
                            },
                            {
                                y: jumlah_alami,
                                indexLabel: "Alami"
                            },
                            {
                                y: jumlah_rusak_berat,
                                indexLabel: "Rusak Berat"
                            },
                            {
                                y: jumlah_hilang,
                                indexLabel: "Hilang"
                            },
                        
                        ]
                    }]
                });
                chart.render();
                var jml_baik = response.jml_airbaku.jumlah_baik;
                var jml_sedang = response.jml_airbaku.jumlah_sedang;
                var jml_buruk = response.jml_airbaku.jumlah_buruk;
                var jumlah_tidak_operasi = response.jml_airbaku.jumlah_tidak_operasi;
                
                var chart = new CanvasJS.Chart("chartContainer9", {
                    title: {
                        text: "Statistik B. Pelengkap Irigasi"
                    },
                    legend: {
                        maxWidth: 350,
                        itemWidth: 120
                    },
                    data: [{
                        type: "pie",
                        showInLegend: true,
                        legendText: "{indexLabel}",
                        dataPoints: [{
                                y: jml_baik,
                                indexLabel: "Baik"
                            },
                            {
                                y: jml_sedang,
                                indexLabel: "Sedang"
                            },
                            {
                                y: jml_buruk,
                                indexLabel: "Buruk"
                            },
                            {
                                y: jumlah_tidak_operasi,
                                indexLabel: "Tidak Beroperasi"
                            },
                        
                        ]
                    }]
                });
                chart.render();
                
                
            }
        });
    }


     window.onload = function() {
        var chart = new CanvasJS.Chart("chartContainer", {
            title: {
                text: "Kondisi Saluran Irigasi"
            },
            data: [{
                // Change type to "doughnut", "line", "splineArea", etc.
                type: "column",
                dataPoints: [{
                        label: "Baik Sekali",
                        y: <?=$statistik['jml irigasi']['jumlah baik sekali']?>
                    },
                    {
                        label: "Baik",
                        y: <?=$statistik['jml irigasi']['jumlah baik']?>
                    },
                    {
                        label: "Sedang",
                        y: <?=$statistik['jml irigasi']['jumlah sedang']?>
                    },
                    {
                        label: "Buruk",
                        y: <?=$statistik['jml irigasi']['jumlah buruk']?>
                    },
                    
                ]
            }]
        });
        chart.render();

        var chart = new CanvasJS.Chart("chartContainer1", {
            title: {
                text: "Kondisi Saluran Pembuang"
            },
            data: [{
                // Change type to "doughnut", "line", "splineArea", etc.
                type: "column",
                dataPoints: [{
                        label: "Baik",
                        y: <?=$statistik['jml pembuang']['jumlah baik']?>
                    },
                    {
                        label: "Sedang",
                        y: <?=$statistik['jml pembuang']['jumlah sedang']?>
                    },
                    {
                        label: "Buruk",
                        y: <?=$statistik['jml pembuang']['jumlah buruk']?>
                    },

                ]
            }]
        });
        chart.render();

         var chart = new CanvasJS.Chart("chartContainer2", {
            title: {
                text: "Kondisi Drainase Perkotaan"
            },
            data: [{
                // Change type to "doughnut", "line", "splineArea", etc.
                type: "column",
                dataPoints: [{
                        label: "Baik",
                        y: <?=$statistik['jml drainase']['jumlah baik']?>
                    },
                    {
                        label: "Sedang",
                        y: <?=$statistik['jml drainase']['jumlah sedang']?>
                    },
                    {
                        label: "Buruk",
                        y: <?=$statistik['jml drainase']['jumlah buruk']?>
                    },

                ]
            }]
        });
        chart.render();
        var chart = new CanvasJS.Chart("chartContainer3", {
            title: {
                text: "Kondisi Saluran Irigasi"
            },
            data: [{
                // Change type to "doughnut", "line", "splineArea", etc.
                type: "column",
                dataPoints: [{
                        label: "Baik Sekali",
                        y: <?=$statistik['pan irigasi']['panjang baik sekali']?>
                    },
                    {
                        label: "Baik",
                        y: <?=$statistik['pan irigasi']['panjang baik']?>
                    },
                    {
                        label: "Sedang",
                        y: <?=$statistik['pan irigasi']['panjang sedang']?>
                    },
                    {
                        label: "Buruk",
                        y: <?=$statistik['pan irigasi']['panjang buruk']?>
                    },
                    
                ]
            }]
        });
        chart.render();
        var chart = new CanvasJS.Chart("chartContainer4a", {
            title: {
                text: "Kondisi Saluran Pembuang"
            },
            data: [{
                // Change type to "doughnut", "line", "splineArea", etc.
                type: "column",
                dataPoints: [{
                        label: "Baik",
                        y: <?=$statistik['pan pembuang']['panjang baik']?>
                    },
                    {
                        label: "Sedang",
                        y: <?=$statistik['pan pembuang']['panjang sedang']?>
                    },
                    {
                        label: "Buruk",
                        y: <?=$statistik['pan pembuang']['panjang buruk']?>
                    },

                ]
            }]
        });
        chart.render();
        var chart = new CanvasJS.Chart("chartContainer5", {
            title: {
                text: "Kondisi Saluran Drainase"
            },
            data: [{
                // Change type to "doughnut", "line", "splineArea", etc.
                type: "column",
                dataPoints: [{
                        label: "Baik",
                        y: <?=$statistik['pan drainase']['panjang baik']?>
                    },
                    {
                        label: "Sedang",
                        y: <?=$statistik['pan drainase']['panjang sedang']?>
                    },
                    {
                        label: "Buruk",
                        y: <?=$statistik['pan drainase']['panjang buruk']?>
                    },

                ]
            }]
        });
        chart.render();
        var chart = new CanvasJS.Chart("chartContainer6", {
            title: {
                text: "Statistik Bendung"
            },
            legend: {
                maxWidth: 350,
                itemWidth: 120
            },
            data: [{
                type: "pie",
                showInLegend: true,
                legendText: "{indexLabel}",
                dataPoints: [{
                        y: <?=$statistik['jml bendung']['jumlah baik']?>,
                        indexLabel: "Baik"
                    },
                    {
                        y: <?=$statistik['jml bendung']['jumlah sedang']?>,
                        indexLabel: "Sedang"
                    },
                    {
                        y: <?=$statistik['jml bendung']['jumlah buruk']?>,
                        indexLabel: "Buruk"
                    },
                   
                ]
            }]
        });
        chart.render();

        var chart = new CanvasJS.Chart("chartContainer7", {
            title: {
                text: "Statistik B. Pelengkap Irigasi"
            },
            legend: {
                maxWidth: 350,
                itemWidth: 120
            },
            data: [{
                type: "pie",
                showInLegend: true,
                legendText: "{indexLabel}",
                dataPoints: [{
                        y: <?=$statistik['jml pirigasi']['jumlah baik']?>,
                        indexLabel: "Baik"
                    },
                    {
                        y: <?=$statistik['jml pirigasi']['jumlah sedang']?>,
                        indexLabel: "Sedang"
                    },
                    {
                        y: <?=$statistik['jml pirigasi']['jumlah buruk']?>,
                        indexLabel: "Buruk"
                    },
                   
                ]
            }]
        });
        chart.render();
        var chart = new CanvasJS.Chart("chartContainer8", {
            title: {
                text: "Statistik B. Pelengkap Pembuang"
            },
            legend: {
                maxWidth: 350,
                itemWidth: 120
            },
            data: [{
                type: "pie",
                showInLegend: true,
                legendText: "{indexLabel}",
                dataPoints: [{
                        y: <?=$statistik['jml ppembuang']['jumlah baik']?>,
                        indexLabel: "Baik"
                    },
                    {
                        y: <?=$statistik['jml ppembuang']['jumlah sedang']?>,
                        indexLabel: "Sedang"
                    },
                    {
                        y: <?=$statistik['jml ppembuang']['jumlah buruk']?>,
                        indexLabel: "Buruk"
                    },
                    {
                        y: <?=$statistik['jml ppembuang']['jumlah batas imajiner']?>,
                        indexLabel: "Batas Imajiner"
                    },
                    {
                        y: <?=$statistik['jml ppembuang']['jumlah imajiner']?>,
                        indexLabel: "Imajiner"
                    },
                    {
                        y: <?=$statistik['jml ppembuang']['jumlah alami']?>,
                        indexLabel: "Alami"
                    },
                    {
                        y: <?=$statistik['jml ppembuang']['jumlah rusak berat']?>,
                        indexLabel: "Rusak Berat"
                    },
                     {
                        y: <?=$statistik['jml ppembuang']['jumlah hilang']?>,
                        indexLabel: "Hilang"
                    },
                   
                ]
            }]
        });
        chart.render();
        var chart = new CanvasJS.Chart("chartContainer9", {
            title: {
                text: "Statistik Air Baku"
            },
            legend: {
                maxWidth: 350,
                itemWidth: 120
            },
            data: [{
                type: "pie",
                showInLegend: true,
                legendText: "{indexLabel}",
                dataPoints: [{
                        y: <?=$statistik['jml air baku']['jumlah baik']?>,
                        indexLabel: "Baik"
                    },
                    {
                        y: <?=$statistik['jml air baku']['jumlah sedang']?>,
                        indexLabel: "Sedang"
                    },
                    {
                        y: <?=$statistik['jml air baku']['jumlah buruk']?>,
                        indexLabel: "Buruk"
                    },
                    {
                        y: <?=$statistik['jml air baku']['jumlah tidak operasi']?>,
                        indexLabel: "Tidak Beroperasi"
                    },
                   
                   
                ]
            }]
        });
        chart.render();
       
    }
</script>
