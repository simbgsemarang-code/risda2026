<div class="page-header">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><?= $judul ?></li>
    </ol>

</div>

<!-- Row start -->
 <div class="row gutters">
    <div class="col-sm-6">
    <div class="card-body">
<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw-src.css" />
<script src="https://cdn.jsdelivr.net/npm/@turf/turf@6.3.0/turf.min.js"></script>
<form action="<?= base_url('Admin/Kecamatan/tambah_simpan_saluran/' . $saluran[0]->id) ?>" method="POST" enctype="multipart/form-data">
                    <div class="row gutters">

                        <?php
                        $tab = $tabel[0];
                        foreach ($tab as $key => $value) {
                            if ($key != 'id'  && $key != 'foto') {

                        ?>

                                <div class="col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="inputName"><?= $key ?></label>
                                        <?php if ($key == 'DI' ) {?>
                                            <input type="text" class="form-control" id="<?= $key ?>" name="<?= $key ?>" value="<?=$di[0]->NAMA_DI?>">
                                        <?php } elseif($key == 'id_di') {?>
                                            <input type="text" class="form-control" id="<?= $key ?>" name="<?= $key ?>" value="<?=$di[0]->id_di?>">
                                        <?php }elseif($key == 'NO_DI') { ?>
                                         <input type="text" class="form-control" id="<?= $key ?>" name="<?= $key ?>" value="<?=$di[0]->id_di?>">
                                         <?php }elseif($key == 'UPTD') { ?>
                                         <input type="text" class="form-control" id="<?= $key ?>" name="<?= $key ?>" value="<?=$di[0]->UPTD?>">
                                         <?php }elseif($key == 'KEMANTREN') { ?>
                                         <input type="text" class="form-control" id="<?= $key ?>" name="<?= $key ?>" value="<?=$di[0]->KEMANTREN?>">
                                         <?php }elseif($key == 'Kode_DI') { ?>
                                         <input type="text" class="form-control" id="<?= $key ?>" name="<?= $key ?>" value="<?=$di[0]->id_di?>">
                                         <?php }elseif($key == 'Desa') { ?>
                                         <input type="text" class="form-control" id="<?= $key ?>" name="<?= $key ?>" value="<?=$di[0]->DESA?>">
                                         <?php }elseif($key == 'Kecamatan') { ?>
                                         <input type="text" class="form-control" id="<?= $key ?>" name="<?= $key ?>" value="<?=$di[0]->KECAMATAN?>">
                                         <?php }elseif($key == 'geojson') { ?>
                                         <input type="text" class="form-control" id="<?= $key ?>" name="<?= $key ?>" value="[]">
                                         <?php }elseif($key == 'K_SALURAN') { ?>
                                         <input type="text" class="form-control" id="<?= $key ?>" name="<?= $key ?>" value="<?=$saluran[0]->K_SALURAN?>">
                                         <?php }elseif($key == 'NOMENKLATU') { ?>
                                         <input type="text" class="form-control" id="<?= $key ?>" name="<?= $key ?>" value="<?=$saluran[0]->NOMENKLATU?>">
                                         <?php }elseif($key == 'NAMA') { ?>
                                         <input type="text" class="form-control" id="<?= $key ?>" name="<?= $key ?>" value="<?=$saluran[0]->NAMA?>">
                                         <?php }elseif($key == 'KelasSalur') { ?>
                                         <input type="text" class="form-control" id="<?= $key ?>" name="<?= $key ?>" value="<?=$saluran[0]->KelasSalur?>">
                                         <?php }elseif($key == 'Id_Saluran') { ?>
                                         <input type="text" class="form-control" id="<?= $key ?>" name="<?= $key ?>" value="<?=$saluran[0]->id?>">
                                         
                                         <?php } else { ?>
                                          <input type="text" class="form-control" id="<?= $key ?>" name="<?= $key ?>" value="">
                                          <?php } ?>
                                        
                                    </div>

                                </div>
                            <?php } elseif ($key == 'foto') {
                                if ($tabel[0]->foto != null) {

                                    $fil = base_url('assets/dokumentasi_jalan/tambahan/' . $tabel[0]->id . '/' . $tabel[0]->foto);
                                } else {

                                    $fil =  base_url('assets/dokumentasi/no_image1.jpg');
                                }



                            ?>

                                <div style='height: 0px;width: 0px; overflow:hidden;'></div>

                        <?php }
                        }
                        ?>

                        <div class="col-sm-6 col-12">
                            <div class="form-group">

                                <button type="submit" class="btn btn-success mb-2">Simpan</button>
                            </div>

                        </div>

                        <div>
                        </div>
                    </div>
              
</form>
  </div>
</div>
<div class="col-sm-6">
                    <div class="card">
                        <div id="map" style="height: 520px;">
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

    function tes() {
        document.getElementById("upfile1").click();

    }

    function preview() {
        upfile = document.getElementById('upfile1');
        const [file] = upfile.files
        nama_file = event.target.files[0].name;
        f = document.getElementById('frame1');
        if (file) {
            f.src = URL.createObjectURL(file)
        }

    }

        
        var googleSat = L.tileLayer('http://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}', {
           
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
                iconSize: [20, 25],
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
                out.push("<center><img src='<?= base_url("assets/foto") ?>/" + foto + "' width='180px' ></center>");
                out.push("<center><a style='color: white' class='btn btn-block btn-success btn-sm' href='<?= base_url("Detail/bendung/") ?>" + f.properties['id'] + "'  target='_blank'>" + 'Detail' + "</a></center>");
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
        var irigasi = L.geoJSON([<?= $irigasi ?>], {
           
        });
        var bendung = L.geoJSON([<?= $bendung ?>], {
            onEachFeature: popbendung,
            pointToLayer: point_bendung
        });
        var map = L.map('map', {
            center: [-7.417989, 109.005913],
            zoom: 25,
            fullscreenControl: true,
            fullscreenControlOptions: {
                position: 'topleft'
            },
            layers: [googleSat,kecamatan,irigasi,bendung]
        });
        map.fitBounds(bendung.getBounds());

         var drawnItems = new L.FeatureGroup();
    map.addLayer(drawnItems);
    var drawControl = new L.Control.Draw({
        draw: {
            circle: false,
            circlemarker: false,
            rectangle: false,
            polyline: true,

        },
        edit: {
            featureGroup: drawnItems
        }
    });
    map.addControl(drawControl);
    map.on('draw:created', function(e) {
         var type = e.layerType,
            layer = e.layer;
        feature = layer.feature = layer.feature || {};
        feature.type = feature.type || "Feature";
        var props = feature.properties = feature.properties || {};
        drawnItems.addLayer(layer);
        var poly2 = drawnItems.toGeoJSON();
        koor = poly2.features[0]['geometry']['coordinates'];
        var a = JSON.stringify(koor);
        document.getElementById('geojson').value = a;
    });
    </script>
</script>