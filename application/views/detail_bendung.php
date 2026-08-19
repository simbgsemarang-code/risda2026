<div class="container-fluid bg-light about py-1">
    <div class="container py-1">
        <div class="row g-1">
            <div class="col-xl-5 wow fadeInLeft" data-wow-delay="0.2s">
                <div class="about-item-content bg-white rounded p-5 h-100 py-2 g-1">
                    <h4 class="text-success">Detail Bendung</h4>
                    <hr>
                    <div class="row g-5 mb-0">
                        <div class="col-sm-5 ">
                            <p" class="d-inline-block h6 mb-0">Daerah Irigasi</p>
                        </div>
                        <div class="col-sm-7">
                             <p" class="d-inline-block  mb-1">: <?=$bendung1['NAMA_DI']?></p>
                        </div>
                    </div>
                    
                    <div class="row g-5 mb-0">
                        <div class="col-sm-5">
                            <p" class="d-inline-block h6 mb-0">Nama Bendung</p>
                        </div>
                        <div class="col-sm-7">
                             <p" class="d-inline-block  mb-1">: <?=$bendung1['NAMA_BENDU']?></p>
                        </div>
                    </div>
                     <div class="row g-5 mb-0">
                        <div class="col-sm-5">
                            <p" class="d-inline-block h6 mb-0">Luas Areal</p>
                        </div>
                        <div class="col-sm-7">
                             <p" class="d-inline-block  mb-2">: <?=$bendung1['LUAS_AREAL']?> Ha</p>
                        </div>
                    </div>
                    <div class="row g-5 mb-0">
                        <div class="col-sm-5">
                            <p" class="d-inline-block h6 mb-0">Luas Baku</p>
                        </div>
                        <div class="col-sm-7">
                             <p" class="d-inline-block  mb-2">: <?=$bendung1['BAKU']?> Ha</p>
                        </div>
                    </div>
                     <div class="row g-5 mb-0">
                        <div class="col-sm-5">
                            <p" class="d-inline-block h6 mb-0">Luas Potensial</p>
                        </div>
                        <div class="col-sm-7">
                             <p" class="d-inline-block  mb-2">: <?=$bendung1['POTENSIAL']?> Ha</p>
                        </div>
                    </div>
                     <div class="row g-5 mb-0">
                        <div class="col-sm-5">
                            <p" class="d-inline-block h6 mb-0">Luas Fungsional</p>
                        </div>
                        <div class="col-sm-7">
                             <p" class="d-inline-block  mb-2">: <?=$bendung1['FUNGSIONAL']?> Ha</p>
                        </div>
                    </div>
                     <div class="row g-5 mb-0">
                        <div class="col-sm-5">
                            <p" class="d-inline-block h6 mb-0">Desa</p>
                        </div>
                        <div class="col-sm-7">
                             <p" class="d-inline-block  mb-2">: <?=$bendung1['DESA']?></p>
                        </div>
                    </div>
                    <div class="row g-5 mb-0">
                        <div class="col-sm-5">
                            <p" class="d-inline-block h6 mb-0">Kecamatan</p>
                        </div>
                        <div class="col-sm-7">
                             <p" class="d-inline-block  mb-2">: <?=$bendung1['KECAMATAN']?></p>
                        </div>
                    </div>
                    <div class="row g-5 mb-0">
                        <div class="col-sm-5">
                            <p" class="d-inline-block h6 mb-0">Kemantren</p>
                        </div>
                        <div class="col-sm-7">
                             <p" class="d-inline-block  mb-2">: <?=$bendung1['KEMANTREN']?></p>
                        </div>
                    </div>
                    <div class="row g-5 mb-0">
                        <div class="col-sm-5">
                            <p" class="d-inline-block h6 mb-0">UPTD</p>
                        </div>
                        <div class="col-sm-7">
                             <p" class="d-inline-block  mb-2">: <?=$bendung1['UPTD']?></p>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="col-xl-7 wow fadeInRight" data-wow-delay="0.2s">
                <div class="about-item-content bg-white rounded p-5 h-100 py-2 g-1">
                    <h4 class="text-success">
                        <center>Peta Daerah Irigasi <?=$bendung1['NAMA_DI']?>  </center>
                    </h4>
                    <div class="row g-4 justify-content-center">
                        <div class="col-12">
                            <div class="rounded bg-light">
                                <div id="map" style="width: auto; height: 600px;" class="img-fluid rounded w-100"></div>
                                <!--<img src="https://sijakon.dpupr.cilacapkab.go.id/umum/img/about.png" class="img-fluid rounded w-100" alt="">-->
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container py-5" >
        <div class="col-xl-12 " data-wow-delay="0.2s" style =" overflow: auto;max-height:350px;"> 
            <div class="about-item-content bg-white rounded p-5 h-100 py-2 g-1" style=" width: fit-content; ">
                <h4 class="text-success">Strip Map Saluran Irigasi</h4>
                <br>
                <?php 
                if (is_iterable($irigasi1)) {
                foreach($irigasi1 as $ir) {
                  
                    ?>
                <h5 class="text-success">* <?=$ir->K_SALURAN?> || <?=$ir->NAMA?> || <?=$bendung1['NAMA_DI']?> || <a href="<?=base_url("Detail/irigasi/".$ir->id)?>" class='btn btn-success btn-warning btn-sm' target="_blank">Detail</a></h5>
                <table border="1" class="table w-100" >
                    <tr>
                        <td style="font-size:12px;width: 100px;"><b>HM</b></td>
                        <?php 
                        $this->db->where('Id_Saluran', $ir->id);
                        $this->db->order_by('HM', 'ASC');
                        $query = $this->db->get('kondisi');
                        $knd  = $query->result();;
                        if ($knd != null) {
                            foreach ($knd as $kd) {
                        ?>
                            <td style="font-size:14px; text-align:center"><b><?=$kd->HM?></b></td>
                        <?php }
                         } ?>
                    </tr>
                    <tr>
                         <td><b>Kondisi</b></td>
                         <?php 
                        if ($knd != null) {
                           
                            foreach ($knd as $kd) {
								$back = '#E9ECEF';
								$kon = '-';
								$textColor = 'black';
                                if ($kd->KONDISI == 'Baik') {
                                    $back = '#3B72BE';
                                    $kon = "BS";
									$textColor = 'black';
                                } elseif ($kd->KONDISI == 'Rusak Ringan') {
                                    $back = '#008000';
                                    $kon = "B";
									$textColor = 'white';
                                } elseif ($kd->KONDISI == 'Rusak Sedang') {
                                    $back = '#FFFF00';
									$textColor = 'black';
                                    $kon = "S";
                                } elseif ($kd->KONDISI == 'Rusak Berat') {
                                    $back = '#FF0000';
                                    $kon = "BR";
									$textColor = 'white';
                                } 
                        ?>
                            <td style="font-size:14px;color:<?=$textColor?>; text-align:center;background: <?= $back ?>"><b><?=$kon?></b></td>
                        <?php }
                         } ?>
                    </tr>
                    <tr>
                         <td><b>Penanganan</b></td>
                           <?php 
                        if ($knd != null) {
                            foreach ($knd as $kd) {
                        ?>
                            <td style="font-size:14px; text-align:center"></td>
                        <?php }
                         } ?>
                    </tr>
                    <tr>
                         <td><b>Kebutuhan Anggaran</b></td>
                        <?php 
                        if ($knd != null) {
                            foreach ($knd as $kd) {
                        ?>
                            <td style="font-size:14px; text-align:center"></td>
                        <?php }
                        } ?>
                    </tr>
                    <tr>
                         <td><b></b></td>
                        <?php 
                        if ($knd != null) {
                            foreach ($knd as $kd) {
                        ?>
                            <td style="font-size:14px; text-align:center"><a href="javascript:void(0)" style="font-size:10px" class="btn btn-success btn-xs" onClick="show_modal_page1('<?php echo base_url('Welcome/hm/' . $kd->id); ?>')"><?= 'Detail' ?></a></td>
                        <?php }
                        } ?>
                    </tr>
                    <tr>
                         <td></b></td>
                    </tr>
                </table>
                <?php }
                } ?>
            </div> 
           
        </div>
    </div>

   <div class="container py-5" >
        <div class="col-xl-12 " data-wow-delay="0.2s" style =" overflow: auto;max-height:350px;"> 
            <div class="about-item-content bg-white rounded p-5 h-100 py-2 g-1">
                <h4 class="text-success">Bangunan Pelengkap</h4>
                <table border="1" class="table w-100">
                    <tr>
                        <td style="font-size:13px;background: black;color:white">Nomor</td>
                        <td style="font-size:13px;background: black;color:white">Kode</td>
                        <td style="font-size:13px;background: black;color:white">Nama</td>
                        <td style="font-size:13px;background: black;color:white">Kondisi</td>
                         <td style="font-size:13px;background: black;color:white">Tipe</td>
                        <td style="font-size:13px;background: black;color:white">Koordinat</td>
                         <td style="font-size:13px;background: black;color:white">Detail</td>
                                
                    </tr>
                    <?php if ($p_irigasi1 != null) {
                        $no = 0;
                        foreach ($p_irigasi1 as $tj) { 
                            $no++;
                            ?>
                    <tr>
                        <td style="font-size:13px;"><?=$no?></td>
                        <td style="font-size:13px;"><?= $tj->K_BANGUNAN ?></td>
                        <td style="font-size:13px;"><?= $tj->NAMA ?></td>
                        <td style="font-size:13px;"><?= $tj->KONDISI ?></td>
                         <td style="font-size:13px;"><?= $tj->TYPE ?></td>
                        <td style="font-size:13px;"><?= $tj->POINT_X ?>, <?= $tj->POINT_Y ?><a href="https://www.google.com/maps/search/?api=1&query=<?= $tj->POINT_Y ?>,<?= $tj->POINT_X ?>" target="_blank"><img width="23px" src="<?= base_url('assets/images/direct.png') ?>"></a></td>
                        <td><a href="<?=base_url("Detail/p_irigasi/".$tj->id)?>" class='btn btn-success btn-success btn-sm' target="_blank">Detail</a></td>
                    </tr>
                    <?php }
                    } ?>
                </table>
                 
            </div> 
           
        </div>
    </div>
    <div class="container py-5" style =" overflow-y: auto;height:250px">
        <div class="col-xl-12 wow fadeInLeft" data-wow-delay="0.2s" style="overflow:auto;"> 
            <div class="about-item-content bg-white rounded p-5 h-100 py-2 g-1">
                <h4 class="text-success">Areal Sawah</h4>
                 <table border="1" class="table w-100">
                    <tr>
                        <td style="font-size:13px;background: black;color:white">Nomor</td>
                        <td style="font-size:13px;background: black;color:white">Luas Baku</td>
                        <td style="font-size:13px;background: black;color:white">Luas Potensial</td>
                        <td style="font-size:13px;background: black;color:white">Luas Fungsional</td>
                     
                                
                    </tr>
                    <?php if ($sawah1 != null) {
                        $no = 0;
                        foreach ($sawah1 as $tj) { 
                            $no++;
                            ?>
                    <tr>
                        <td style="font-size:13px;"><?=$no?></td>
                        <td style="font-size:13px;"><?= $tj->LBaku ?> Ha</td>
                        <td style="font-size:13px;"><?= $tj->LPotensial ?> Ha</td>
                        <td style="font-size:13px;"><?= $tj->LFunsional ?> Ha</td>
                      
                    </tr>
                    <?php }
                    } ?>
                </table>
            </div> 
           
        </div>
    </div>
    <?php
    if ($bendung1['Photo1'] == 'no_image.jpg' || $bendung1['Photo1'] == null) {
            $fil =  base_url('assets/foto/no_image.jpg');
    } else {
            $fil = base_url('assets/foto/bendung/foto/' . $bendung1['id'] . '/' . $bendung1['Photo1']);
    }
    if ($bendung1['Photo2'] == 'no_image.jpg' || $bendung1['Photo2'] == null) {
        $nama_file = 'file_belum ada';
        $fil2 =  base_url('assets/foto/no_image.jpg');
    } else {
        $nama_file = $bendung1['Photo2'];
        $fil2 = base_url('assets/foto/bendung/skema/' . $bendung1['id'] . '/' . $bendung1['Photo2']);
    }
    ?>
    <div class="container py-5">
        <div class="row g-1">
            <div class="col-xl-6 wow fadeInLeft" data-wow-delay="0.2s">
                <div class="about-item-content bg-white rounded p-5 h-100 py-2 g-1">
                    <h4 class="text-success">Foto Bendung</h4>
                    <hr>
                    <div class="row g-5 mb-0">
                        <img src="<?=$fil?>" class="img-fluid rounded w-100" alt="">
                    </div>
                    
                    
                </div>
                
            </div>
            <div class="col-xl-6 wow fadeInRight" data-wow-delay="0.2s">
                <div class="about-item-content bg-white rounded p-5 h-100 py-2 g-1">
                     <h4 class="text-success">Skema Bendung</h4>
                    <hr>
                    <div>
      <button onclick="openFullscreen()" class="btn btn-primary">Fullscreen</button>
    </div>
                <div>
               
                <div class="row g-5 mb-0">
                      <div id="pdfContainer">
                    <iframe src="<?=$fil2?>" width="100%"  height="700px"></iframe></div>
                </div>
            </div>
        </div>
    </div>
</div>
	<?php $this->load->view('bootstrap_model'); ?>
<script>
    var osm = L.tileLayer('https://{s}.tile.osm.org/{z}/{x}/{y}.png', {});
    var Esri_WorldImagery = L.tileLayer(
        'https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}'
    );

    var googleStreets = L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}', {
        maxZoom: 20,
        subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
    });


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

    function kec(feature, layer) {
        layer.bindTooltip(feature.properties['KECAMATAN'], {
            permanent: true,
            direction: "center",
            className: "label_kec"
        });

    }

    function popbendung(f, l) {
        var out = [];
        var foto = f.properties['Photo1'];
        var id = f.properties['id'];
        if (f.properties) {
            out.length = 0;
            out.push('Nama Bendung : ' + f.properties['NAMA_BENDU']);
            out.push('Daerah Irigasi : ' + f.properties['NAMA_DI']);
            out.push('Status Irigasi : ' + f.properties['STATUS_IRI']);

            out.push('Kondisi  : ' + f.properties['KONDISI']);
            out.push("<center><img src='<?= base_url("assets/foto/bendung/foto") ?>/" + id + '/' + foto + "' width='180px' ></center>");
          
            l.bindPopup(out.join("<br />"));

        }
        l.bindTooltip(f.properties['NAMA_DI'], {
            permanent: true,
            direction: "center",
            className: "label_des"
        });

    }

    function point_p_irigasi(feature, latlng) {
        var Url_nya = "<?= base_url('assets/images/home.png') ?>";
        var Icon = L.icon({
            iconUrl: Url_nya,
            iconSize: [15, 16],
        });
        var marker = L.marker(latlng, {
            icon: Icon
        });
        return marker
    }

    function point_bendung(feature, latlng) {
        var kondisi = feature.properties['KONDISI'];
        var icon = getkondisi(kondisi);
        var Url_nya = "<?= base_url('assets/images/') ?>" +icon
        var Icon = L.icon({
            iconUrl: Url_nya,
            iconSize: [25, 27],
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
    function gayasawah(feature) {
        return {
            color: "yellow",
            weight: 1,
            opacity: 0.5,
            fillOpacity: 0.2,
        };
    }
    function gayairigasi(feature) {
        return {
            color: "white",
            weight: 15,
            opacity:0.3,
            fillOpacity: 0.3,
        };
    }
    function gaya_kondisi(feature) {
        return {
            color: getcolor(feature.properties['KONDISI']),
            weight: 2,
            opacity:1,
            fillOpacity: 1,
        };
    }

    function getcolor(k) {
        if (k=='Baik Sekali') {
            var c = '#3B72BE';
        }else if (k=='Baik') {
            var c = '#008000';
        }else if (k=='Sedang') {
            var c = '#FFFF00';
        }else{
            var c = '#FF0000';
        }
        return c;
    }
    function popUp_sawah(f, l) {
        var out = [];
        if (f.properties) {
            out.length = 0;
            out.push('Daerah Irigasi : ' + f.properties['Nama_DI']);
            out.push('Luas Baku : ' + f.properties['LBaku'] + ' Ha');
            out.push("<center><a href='<?= base_url("Detail/sawah/") ?>" + f.properties['id'] + "'  target='blank'>" + 'Lihat Detail Sawah' + "</a></center>");
            l.bindPopup(out.join("<br />"));
        }

    }

    function onEachFeatureupt(feature, layer) {
      
        layer.bindTooltip('UPTD ' + feature.properties['UPTD'], {
            permanent: true,
            direction: "center",
            className: "label_kec"
        });
    }

    function gaya_uptd(feature) {
        return {
            color: feature.properties['warna'],
            weight: 1,
            fillOpacity: 0.1,
            Opacity: 0.1,

        };
    }
     function popp_irigasi(f, l) {
         
        var out = [];
        var foto = f.properties['Photo1'];
        if (f.properties) {
            out.length = 0;
            out.push('Nama Bangunan : ' + f.properties['NAMA']);
            out.push('Nomenklatur : ' + f.properties['NOMENKLATU']);
            out.push('Kondisi  : ' + f.properties['KONDISI']);
            out.push('Koordinat  : ' + f.properties['geojson']);
            out.push("<center><img src='<?= base_url("assets/foto") ?>/" + foto + "' width='180px' ></center>");
            out.push("<center><a style='color: white' class='btn btn-block btn-success btn-sm' href='<?=base_url("Detail/p_irigasi/")?>"+f.properties['id']+"'  target='_blank'>"+'Lihat Detail Bangunan Pelengkap'+"</a></center>");
            l.bindPopup(out.join("<br />"));

        }
        l.bindTooltip(f.properties['NAMA'], {
            permanent: true,
            direction: "center",
            className: "label_kec"
        });

    }
    function popkondisi(f, l) {
        l.bindTooltip(f.properties['HM'], {
            permanent: true,
            direction: "center",
            className: "label_kondisi"
        });
    }
    var uptd = L.geoJSON([<?= $uptd ?>], {
        style: gaya_uptd,
        onEachFeature: onEachFeatureupt
    });
    var kecamatan = L.geoJSON([<?= $kecamatan ?>], {
        style: gayakec,
        onEachFeature: kec
    });
     var bendung = L.geoJSON([<?= $bendung ?>], {
        onEachFeature: popbendung,
        pointToLayer: point_bendung
    });
     var irigasi = L.geoJSON([<?= $irigasi ?>], {
        style: gayairigasi,
    });
    var sawah = L.geoJSON([<?= $sawah ?>], {
        style: gayasawah,
        onEachFeature: popUp_sawah
    });
     var kondisi = L.geoJSON([<?= $kondisi ?>], {
        style: gaya_kondisi,
        onEachFeature: popkondisi
    });
    var p_irigasi = L.geoJSON(<?= $p_irigasi ?>, {
    pointToLayer: point_p_irigasi,
    onEachFeature: popp_irigasi
});
    var map = L.map('map', {
        center: [-7.417989, 109.005913],
        zoom: 10,
        fullscreenControl: true,
        fullscreenControlOptions: {
            position: 'topleft'
        },
        layers: [googleSat, kecamatan,bendung,p_irigasi,irigasi,sawah,kondisi]
    });
    var baseLayers = {
        "Google Roadmap": googleStreets,
        "Google Satellite": googleSat,
        "Open Street Map": osm,
        "ESRI World Imagery": Esri_WorldImagery,
    };
    var groupedOverlays = {
        "Administrasi": {
            "&nbsp;&nbsp;&nbsp;&nbsp;Kecamatan": kecamatan,
            "&nbsp;&nbsp;&nbsp;&nbsp;UPTD": uptd,
        },
        "Daerah Irigasi": {
            "&nbsp;&nbsp;&nbsp;&nbsp;Bendung": bendung,
            "&nbsp;&nbsp;&nbsp;&nbsp;Saluran Irigasi": irigasi,
            "&nbsp;&nbsp;&nbsp;&nbsp;Bangunan Pelengkap": p_irigasi,
            "&nbsp;&nbsp;&nbsp;&nbsp;Sawah": sawah,
        },

    };
    L.control.groupedLayers(baseLayers, groupedOverlays, {
        collapsed: true
    }).addTo(map);
    lc = L.control.locate({
        strings: {
            title: "Lokasi Anda"
        }
    }).addTo(map);

    function bersih() {
        document.getElementById('search').value = '';
          $('#search').focus();
           $.ajax({
                url: '<?php echo base_url('Welcome/cari/'); ?>'+'semua',
                success: function(response)
                {
                    jQuery('#pencari').html(response);  
                }
        });

    }
    map.fitBounds(irigasi.getBounds());

    var Urlicon = "<?= base_url('assets/images/silang.png') ?>";
    var Icon = L.icon({
        iconUrl: Urlicon,
        iconSize: [10, 10],
    });
    <?php if (!empty($array_koor)) { foreach ($array_koor as $ak) {?>
      var marker = L.marker([<?=$ak?>],{icon:Icon}).addTo(map);
    <?php } } ?>
    map.on('zoomend', onZoomend1);
    function onZoomend1(feature, layer) {
        var currentZoom = map.getZoom();
        var tooltip = $('.label_des');
        var tooltip1 = $('.label_kec');
        var tooltip2 = $('.label_kondisi');
        kondisi.eachLayer(function(kondisi) {
             console.log(currentZoom);
            if (currentZoom <= 16) {
                tooltip2.css('display', 'none');
            }
            if (currentZoom == 17) {
                tooltip2.css('display', 'block');
                tooltip2.css('font-size', 12);
            }
            if (currentZoom == 18) {
                tooltip2.css('display', 'block');
                tooltip2.css('font-size', 14);
            }
            if (currentZoom == 19) {
                tooltip2.css('display', 'block');
                tooltip2.css('font-size', 15);
            }
            if (currentZoom == 20) {
                tooltip2.css('display', 'block');
                tooltip2.css('font-size', 17);
            }
            
            
        });
        bendung.eachLayer(function(bendung) {
            var kondisi = bendung.feature.properties.KONDISI;
           
            var icon = getkondisi(kondisi);
            var Url_nya = "<?= base_url('assets/images/') ?>" +icon;
            var Icon0 = L.icon({
                iconUrl: Url_nya,
                iconSize: [15, 17],
            });
            var Icon = L.icon({
                iconUrl: Url_nya,
                iconSize: [20, 23],
            });
            var Icon1 = L.icon({
                iconUrl: Url_nya,
                iconSize: [25, 27],
            });
            var Icon2 = L.icon({
                iconUrl: Url_nya,
                iconSize: [25, 27],
            });
            var Icon3 = L.icon({
                iconUrl: Url_nya,
                iconSize: [30, 33],
            });
            var Icon4 = L.icon({
                iconUrl: Url_nya,
                iconSize: [35, 38],
            });
            var Icon5 = L.icon({
                iconUrl: Url_nya,
                iconSize: [40, 43],
            });
            var Icon6 = L.icon({
                iconUrl: Url_nya,
                iconSize: [45, 48],
            });
            if (currentZoom <= 11) {
                bendung.setIcon(Icon0);
            }
            if (currentZoom == 12) {
                bendung.setIcon(Icon);
            }
            if (currentZoom == 13) {
                bendung.setIcon(Icon1);
            }
             if (currentZoom < 14) {
                tooltip.css('display', 'none');
            }
            if (currentZoom == 14) {
                tooltip.css('display', 'block');
                tooltip.css('font-size', 12);
                bendung.setIcon(Icon2);
            }
            if (currentZoom == 15) {
                tooltip.css('font-size', 12.5);
                bendung.setIcon(Icon2);
            }
            if (currentZoom == 16) {
                tooltip.css('font-size', 13);
                bendung.setIcon(Icon3);
            }
            if (currentZoom == 17) {
                 tooltip.css('font-size', 13.5);
                bendung.setIcon(Icon4);
            }
            if (currentZoom == 18) {
                tooltip.css('font-size', 14);
               bendung.setIcon(Icon4);
            }
            if (currentZoom == 19) {
                tooltip.css('font-size', 14.5);
                bendung.setIcon(Icon5);
            }
            if (currentZoom >= 20) {
                tooltip.css('font-size', 14.5);
                bendung.setIcon(Icon6);
            }
        });

        p_irigasi.eachLayer(function(p_irigasi) {
          
          
           
            var Url_nya = "<?= base_url('assets/images/home.png') ?>" ;
            var Icon0 = L.icon({
                iconUrl: Url_nya,
                iconSize: [15, 17],
            });
            var Icon = L.icon({
                iconUrl: Url_nya,
                iconSize: [16, 17],
            });
            var Icon1 = L.icon({
                iconUrl: Url_nya,
               iconSize: [18, 19],
            });
            var Icon2 = L.icon({
                iconUrl: Url_nya,
               iconSize: [20, 21],
            });
            var Icon3 = L.icon({
                iconUrl: Url_nya,
              iconSize: [22, 23],
            });
            var Icon4 = L.icon({
                iconUrl: Url_nya,
                 iconSize: [24, 25],
            });
            var Icon5 = L.icon({
                iconUrl: Url_nya,
                iconSize: [25, 27],
            });
            var Icon6 = L.icon({
                iconUrl: Url_nya,
                  iconSize: [25, 27],
            });
            if (currentZoom <= 11) {
                p_irigasi.setIcon(Icon0);
            }
            if (currentZoom == 12) {
                p_irigasi.setIcon(Icon);
            }
            if (currentZoom == 13) {
                p_irigasi.setIcon(Icon1);
            }
            if (currentZoom < 14) {
                tooltip1.css('font-size', 9);
            }
           
            if (currentZoom == 14) {
                tooltip1.css('font-size', 9);
                p_irigasi.setIcon(Icon2);
            }
            if (currentZoom == 15) {
                tooltip1.css('font-size', 10);
                p_irigasi.setIcon(Icon2);
            }
            if (currentZoom == 16) {
                tooltip1.css('font-size', 11);
                p_irigasi.setIcon(Icon3);
            }
            if (currentZoom == 17) {
                tooltip1.css('font-size', 11.5);
                p_irigasi.setIcon(Icon4);
            }
            if (currentZoom == 18) {
                tooltip1.css('font-size', 12);
                p_irigasi.setIcon(Icon4);
            }
            if (currentZoom == 19) {
                tooltip1.css('font-size', 12.5);
                p_irigasi.setIcon(Icon5);
            }
            if (currentZoom >= 20) {
                tooltip1.css('font-size', 12.5);
                p_irigasi.setIcon(Icon6);
            }
        });
    }
var legend_saluran = L.control({
    position: 'bottomleft'
});

legend_saluran.onAdd = function(map) {
    var div = L.DomUtil.create('div', 'info legend');
    var grades = ["&nbsp;&nbsp;Baik Sekali", "&nbsp;&nbsp;Baik", "&nbsp;&nbsp;Sedang", "&nbsp;&nbsp;Buruk","&nbsp;&nbsp;Bangunan Pelengkap"];
    var labels = ["<b>Legenda Kondisi</b><br>"];
    var from, to;
    labels.push('<img src="<?= base_url('assets/images/baik_sekali.png') ?>" width="20px">' + grades[0]);
    labels.push('<img src="<?= base_url('assets/images/baik.png') ?>" width="20px">' + grades[1]);
    labels.push('<img src="<?= base_url('assets/images/sedang.png') ?>" width="20px">' + grades[2]);
    labels.push('<img src="<?= base_url('assets/images/buruk.png') ?>" width="20px">' + grades[3]);    
    labels.push('<img src="<?= base_url('assets/images/home.png') ?>" width="20px">' + grades[4]);                    
    div.innerHTML = labels.join(' ');
    return div;
};
legend_saluran.addTo(map);


function openFullscreen() {
  let elem = document.getElementById("pdfContainer");

  if (elem.requestFullscreen) {
    elem.requestFullscreen();
  } else if (elem.webkitRequestFullscreen) { // Safari
    elem.webkitRequestFullscreen();
  } else if (elem.msRequestFullscreen) { // IE11
    elem.msRequestFullscreen();
  }
}

</script>
