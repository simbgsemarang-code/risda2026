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
                            <th>Kode DI</th>
                            <th>Nama DI</th>
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
                            <td><?=$t->id_di?></td>
                            <td><?=$t->NAMA_DI?></td>
                            <td><?=$t->DESA?></td>
                            <td><?=$t->KECAMATAN?></td>
                            <td><?=$t->KEMANTREN?></td>
                            <td><?=$t->UPTD?></td>
                            <td>
                                <a href="<?= base_url('Admin/Kecamatan/form_edit/' . $t->id) ?>" class="icon red" data-toggle="tooltip" data-placement="top" title="Edit Bendung"><i class="icon-edit"></i></a>
                                <a href="<?= base_url('Admin/Kecamatan/irigasi/' . $t->id_di) ?>" class="icon red" data-toggle="tooltip" data-placement="top" title="Edit Saluran Irigasi"><i class="icon-map"></i></a>
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
        function point_bendung(feature, latlng) {
            var kondisi = feature.properties['KONDISI'];
            var icon = getkondisi(kondisi);
            var Url_nya = "<?= base_url('assets/images/') ?>" +icon
            var Icon = L.icon({
                iconUrl: Url_nya,
                iconSize: [10, 10],
            });
            var marker = L.marker(latlng, {
                icon: Icon
            });
            return marker
        }
        function getkondisi(v) {
            if (v == 'Baik') {
                var h = 'baik.png';
            }else if(v == 'Sedang') {
                var h = 'sedang.png';
            }else if(v=='Buruk') {
                var h = 'buruk.png';
            }else{
                var h = 'belum.png';
            }      
            return h;
        }
        function popbendung(f, l) {
            var out = [];
            var foto = f.properties['Photo1'];
            if (f.properties) {
                out.length = 0;
                out.push('Nama Bendung : ' + f.properties['NAMA_BENDU']);
                out.push('Daerag Irigasi : ' + f.properties['NAMA_DI']);
                out.push('Status Irigasi : ' + f.properties['STATUS_IRI']);
                out.push('Kondisi  : ' + f.properties['KONDISI']);
                out.push("<center><a style='color: white' class='btn btn-block btn-success btn-sm' href='<?= base_url("Admin/Kecamatan/form_edit/") ?>" + f.properties['id'] + "' >" + 'EDIT' + "</a></center>");
                out.push("<center><a style='color: white' class='btn btn-block btn-warning btn-sm' href='<?= base_url("Admin/Kecamatan/irigasi/") ?>" + f.properties['id_di'] + "'>" + 'SALURAN' + "</a></center>");
                l.bindPopup(out.join("<br />"));

            }
            l.bindTooltip(f.properties['NAMA_DI'], {
                permanent: true,
                direction: "center",
                className: "label_des"
            });

        }
        var kecamatan = L.geoJSON([<?= $kecamatan ?>], {
            style: gayakec,
            onEachFeature: kec
        });
        var bendung = L.geoJSON([<?= $bendung ?>], {
            onEachFeature: popbendung,
            pointToLayer: point_bendung
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