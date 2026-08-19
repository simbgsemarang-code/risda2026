<div class="container-fluid bg-light about py-1">
    <div class="container py-1">
        <div class="row g-1">
            <div class="col-xl-5 wow fadeInLeft" data-wow-delay="0.2s">
                <div class="about-item-content bg-white rounded p-5 h-100 py-2 g-1">
                    <h4 class="text-success">Detail Saluran Irigasi</h4>
                    <hr>
                    <div class="row g-5 mb-0">
                        <div class="col-sm-5 ">
                            <p" class="d-inline-block h6 mb-0">Nama Saluran</p>
                        </div>
                        <div class="col-sm-7">
                             <p" class="d-inline-block  mb-1">: <?=$irigasi1['NAMA']?></p>
                        </div>
                    </div>
                    
                    <div class="row g-5 mb-0">
                        <div class="col-sm-5">
                            <p" class="d-inline-block h6 mb-0">Kelas Saluran</p>
                        </div>
                        <div class="col-sm-7">
                             <p" class="d-inline-block  mb-1">:  <?=$irigasi1['KelasSalur']?></p>
                        </div>
                    </div>
                     <div class="row g-5 mb-0">
                        <div class="col-sm-5">
                            <p" class="d-inline-block h6 mb-0">Daerah Irigasi</p>
                        </div>
                        <div class="col-sm-7">
                             <p" class="d-inline-block  mb-2">: <?=$irigasi1['DI']?></p>
                        </div>
                    </div>
                    <div class="row g-5 mb-0">
                        <div class="col-sm-5">
                            <p" class="d-inline-block h6 mb-0">Desa</p>
                        </div>
                        <div class="col-sm-7">
                             <p" class="d-inline-block  mb-2">: <?=$irigasi1['Desa']?></p>
                        </div>
                    </div>
                     <div class="row g-5 mb-0">
                        <div class="col-sm-5">
                            <p" class="d-inline-block h6 mb-0">Kecamatan</p>
                        </div>
                        <div class="col-sm-7">
                             <p" class="d-inline-block  mb-2">: <?=$irigasi1['Kecamatan']?></p>
                        </div>
                    </div>
                     <div class="row g-5 mb-0">
                        <div class="col-sm-5">
                            <p" class="d-inline-block h6 mb-0">Kemantren</p>
                        </div>
                        <div class="col-sm-7">
                             <p" class="d-inline-block  mb-2">: <?=$irigasi1['KEMANTREN']?></p>
                        </div>
                    </div>
                     <div class="row g-5 mb-0">
                        <div class="col-sm-5">
                            <p" class="d-inline-block h6 mb-0">UPTD</p>
                        </div>
                        <div class="col-sm-7">
                             <p" class="d-inline-block  mb-2">: <?=$irigasi1['UPTD']?></p>
                        </div>
                    </div>
                    <div class="row g-5 mb-0">
                        <div class="col-sm-5">
                            <p" class="d-inline-block h6 mb-0">Panjang</p>
                        </div>
                        <div class="col-sm-7">
                             <p" class="d-inline-block  mb-2">: <?=$irigasi1['PANJANG']?></p>
                        </div>
                    </div>
                    <div class="row g-5 mb-0">
                        <div class="col-sm-5">
                            <p" class="d-inline-block h6 mb-0">Kondisi</p>
                        </div>
                        <div class="col-sm-7">
                             <p" class="d-inline-block  mb-2">: <?=$irigasi1['KONDISI']?></p>
                        </div>
                    </div>
                    
                </div>
                
            </div>
            <div class="col-xl-7 wow fadeInRight" data-wow-delay="0.2s">
                <div class="about-item-content bg-white rounded p-5 h-100 py-2 g-1">
                    <h4 class="text-success">
                        <center>Peta Saluran Irigasi <?=$irigasi1['NAMA']?>  </center>
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
                if (!empty($irigasi2)) {
                foreach($irigasi2 as $ir) {
                  
                    ?>
                <h5 class="text-success">* <?=$ir->K_SALURAN?> || <?=$ir->NAMA?> || <?=$ir->DI?></h5>
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
                                if ($kd->KONDISI == 'Baik Sekali') {
                                    $back = '#3B72BE';
                                    $kon = "BS";
                                     $c = 'black';
                                } elseif ($kd->KONDISI == 'Baik') {
                                    $back = '#008000';
                                    $kon = "B";
                                    $c = 'white';
                                } elseif ($kd->KONDISI == 'Sedang') {
                                    $back = '#FFFF00';
                                     $c = 'black';
                                    $kon = "S";
                                } elseif ($kd->KONDISI == 'Buruk') {
                                    $back = '#FF0000';
                                    $kon = "BR";
                                     $c = 'white';
                                } 
                        ?>
                            <td style="font-size:14px;color:<?=$c?>; text-align:center;background: <?= $back ?>"><b><?=$kon?></b></td>
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

    function point_p_irigasi(feature, latlng) {
        var Url_nya = "<?= base_url('assets/images/home.png') ?>";
        var Icon = L.icon({
            iconUrl: Url_nya,
            iconSize: [35, 35],
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
            iconSize: [35, 35],
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
            weight: 3,
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
            className: "label_kec"
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
    var kondisi = L.geoJSON([<?= $kondisi ?>], {
        style: gaya_kondisi,
        onEachFeature: popkondisi
    });
     var p_irigasi = L.geoJSON([<?= $p_irigasi ?>], {
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
        layers: [googleSat, kecamatan,irigasi,kondisi,p_irigasi,bendung,]
    });
    map.fitBounds(irigasi.getBounds());
    var Urlicon = "<?= base_url('assets/images/silang.png') ?>";
    var Icon = L.icon({
        iconUrl: Urlicon,
        iconSize: [15, 15],
    });
    <?php if (!empty($array_koor)) { foreach ($array_koor as $ak) {?>
      var marker = L.marker([<?=$ak?>],{icon:Icon}).addTo(map);
    <?php } } ?>
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
        "Saluran Irigasi": {
            "&nbsp;&nbsp;&nbsp;&nbsp;Bendung": bendung,
            "&nbsp;&nbsp;&nbsp;&nbsp;Saluran Irigasi": irigasi,
            "&nbsp;&nbsp;&nbsp;&nbsp;Bangunan Pelengkap": p_irigasi,
            "&nbsp;&nbsp;&nbsp;&nbsp;Kondisi": kondisi,
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
</script>