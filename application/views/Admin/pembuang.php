<div class="page-header">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><?= $judul ?></li>
    </ol>

</div>

<!-- Row start -->
<div class="row gutters">
   <div class="col-sm-12">
        <div class="card">
            <div id="map" style="height: 520px;">
            </div>
        </div>
    </div>
    <div class="col-sm-12">
        <div class="table-container">
            <div class="table-responsive">
                <table id="basicExample" class="table custom-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Panjang</th>
                            <th>Desa</th>
                            <th>Kecamatan</th>
                            
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0;
                        foreach($tabel as $t) {
                            $i++; ?>
                        
                        <tr>
                            <td><?=$i?></td>
                            <td><?=$t->nama_saluran?></td>
                            <td><?=$t->PANJANG?></td>
                            <td><?=$t->Desa?></td>
                            <td><?=$t->Kecamatan?></td>
                           
                            <td>
                                <a href="<?= base_url('Admin/Kecamatan/form_edit_pembuang/' . $t->id) ?>" class="icon red" data-toggle="tooltip" data-placement="top" title="Edit Bendung"><i class="icon-edit"></i></a>
                               
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
 
    <?php $this->load->view('Admin/bootstrap_model.php'); ?>
    <script>
        
        var googleSat = L.tileLayer('http://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}', {
            maxZoom: 20,
            subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
        });
         function gayakec(feature) {
        return {
            color: "white",
            weight: 1,
            opacity: 0.5,
            fillOpacity: 0
        };
    }
        function des(feature, layer) {
            layer.bindTooltip('Desa. ' + feature.properties['DESA'], {
                permanent: true,
                direction: "center",
                className: "label_des"
            });

        }
        function kec(feature, layer) {
            layer.bindTooltip(feature.properties['KECAMATAN'], {
                permanent: true,
                direction: "center",
                className: "label_kec"
            });

        }
        function popsaluranpembuang1(f,l){
            var out = [];
            if (f.properties){
                out.length = 0;
                out.push('Nama Saluran : '+f.properties['NAMAOBJ']);
                out.push('Sumber Data : '+f.properties['SBDATA']);
                out.push('panjang (m) : '+Math.round(f.properties['Panjang__m'],2));
                out.push("<center><a style='color: white' class='btn btn-block btn-success btn-sm' href='<?=base_url("Admin/Kecamatan/form_edit_pembuang/")?>"+f.properties['id']+"'  target='blank'>"+'Edit'+"</a></center>");
                l.bindPopup(out.join("<br />"));    

            }
        }
        function gaya_saluranPembuang1(feature) {
            return {        
            weight: '2',
            opacity: 1,
            color:warna(feature.properties['NAMAOBJ']),
            fillOpacity:0,
            }; 
        } 
        function warna(w) {
            if (w =='Saluran Primer') {
                war = '#C14F4D';
            }else if(w =='Saluran Sekunder'){
                war = '#9CBC57';
            }else if(w == 'Saluran Tersier') {
                war = '#1DC0AC';
            }else{
                war = '#8164A2';
            }
            return war;
        }
        var kecamatan = L.geoJSON([<?= $kecamatan ?>], {
            style: gayakec,
            onEachFeature: kec
        });
        var bendung = L.geoJSON([<?= $bendung ?>], {
           style:gaya_saluranPembuang1,
            onEachFeature:popsaluranpembuang1
        });
        var map = L.map('map', {
            center: [-7.417989, 109.005913],
            zoom: 10,
            fullscreenControl: true,
            fullscreenControlOptions: {
                position: 'topleft'
            },
            layers: [googleSat,kecamatan,bendung]
        });
    </script>