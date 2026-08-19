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
    <div class="card">
        <div class="card-header">
           <a href="<?=base_url('Admin/Kecamatan/form_tambah_irigasi/'.$tabel[0]->id_di)?>" class="btn btn-primary">Tambah data</a> 
       
        </div>
        <div class="col-sm-12">
            <div class="table-container">
                <div class="table-responsive">
                    <table id="basicExample" class="table custom-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Nomenklatur</th>
                                <th>Kelas Saluran</th>
                                <th>Panjang</th>
                                <th>Desa</th>
                                <th>Kecamatan</th>
                                <th>Kemantren</th>
                                <th>UPTD</th>
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
                                <td><?=$t->NAMA?></td>
                                <td><?=$t->NOMENKLATU?></td>
                                <td><?=$t->KelasSalur?></td>
                                <td><?=$t->PANJANG?></td>
                                <td><?=$t->Desa?></td>
                                <td><?=$t->Kecamatan?></td>
                                <td><?=$t->KEMANTREN?></td>
                                <td><?=$t->UPTD?></td>
                                <td>
                                    <a href="<?= base_url('Admin/Kecamatan/form_edit_irigasi/' . $t->id.'/'.$t->id_di) ?>" class="icon red" data-toggle="tooltip" data-placement="top" title="Edit Saluran Irigasi"><i class="icon-edit"></i></a>
                                    <a href="<?= base_url('Admin/Kecamatan/saluran/' . $t->id.'/'.$t->id_di) ?>" class="icon red" data-toggle="tooltip" data-placement="top" title="Tambah Kondisi Irigasi"><i class="icon-plus"></i></a>
                                    <a href="javascript:void(0)" onClick="show_modal_page1('<?php echo base_url('Admin/Kecamatan/tri/' . $t->id); ?>')" class="icon red" data-toggle="tooltip" data-placement="top" title="Edit Kondisi"><i class="icon-map"></i></a>
                                    <a href="javascript:void(0)" onClick="hapus('Data Irigasi','<?= base_url("Admin/Kecamatan/hapus_irigasi/" . $t->id.'/'.$t->id_di) ?>')" class="icon red" data-toggle="tooltip" data-placement="top" title="Hapus"><i class="icon-trash"></i></a>
                 
                                </td>
                            </tr>
                            <?php }
                            } ?>
                        </tbody>
                    </table>
                </div>
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
            zoom: 10,
            fullscreenControl: true,
            fullscreenControlOptions: {
                position: 'topleft'
            },
            layers: [googleSat,kecamatan,irigasi,bendung]
        });
        map.fitBounds(bendung.getBounds());
        function hapus(pesan, url) {
            var result = confirm('Anda Yakin Untuk Menghapus ' + pesan);
                if (result) {
                    window.location = url;
                }
        }
    </script>