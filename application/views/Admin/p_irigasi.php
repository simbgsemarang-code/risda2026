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
                            <th>DI</th>
                            <th>Nomenklatur</th>
                            <th>Kondisi</th>
                            <th>Desa</th>
                            <th>Kecamatan</th>
                            <th>Kemantren</th>
                            <th>UPTD</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0;
                        foreach($tabel as $t) {
                            $i++; ?>
                        
                        <tr>
                            <td><?=$i?></td>
                            <td><?=$t->NAMA?> </td>
                            <td><?=$t->DI?> </td>
                            <td><?=$t->NOMENKLATU?></td>
                            <td><?=$t->KONDISI?></td>
                            <td><?=$t->Desa?></td>
                            <td><?=$t->Kecamatan?></td>
                           <td><?=$t->KEMANTREN?></td>
                           <td><?=$t->UPTD?></td>
                            <td>
                                <a href="<?= base_url('Admin/Kecamatan/form_edit_pirigasi/' . $t->id) ?>" class="icon red" data-toggle="tooltip" data-placement="top" title="Edit Bendung"><i class="icon-edit"></i></a>
                               
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
       
        
        var kecamatan = L.geoJSON([<?= $kecamatan ?>], {
            style: gayakec,
            onEachFeature: kec
        });
         function point_p_irigasi(feature, latlng) {
            var Url_nya = "<?= base_url('assets/images/home.png') ?>";
            var Icon = L.icon({
                iconUrl: Url_nya,
                iconSize: [15, 20],
            });
            var marker = L.marker(latlng, {
                icon: Icon
            });
            return marker
        }
        function poppembuang1(f,l){
            var out = [];
            var foto = f.properties['Photo1'];
            if (f.properties){
                out.length = 0;
                out.push('Nama : '+f.properties['NAMA']);
             
                out.push("<center><a style='color: white' class='btn btn-block btn-success btn-sm' href='<?=base_url("Admin/Kecamatan/form_edit_pirigasi/")?>"+f.properties['id']+"'  target='_blank'>"+'EDIT'+"</a></center>");
                l.bindPopup(out.join("<br />"));    

                    }
            
        } 
        var bendung = L.geoJSON([<?= $bendung ?>], {
           pointToLayer: point_p_irigasi,
            onEachFeature:poppembuang1
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