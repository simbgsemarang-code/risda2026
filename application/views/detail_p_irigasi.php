<div class="container-fluid bg-light about py-1">
    <div class="container py-1">
        <div class="row g-1">
            <div class="col-xl-5 wow fadeInLeft" data-wow-delay="0.2s">
                <div class="about-item-content bg-white rounded p-5 h-100 py-2 g-1">
                    <h4 class="text-success">Detail Bangunan Pelengkap <?=$bendung1['NAMA']?></h4>
                    <hr>
                    <div class="row g-5 mb-0">
                        <div class="col-sm-5 ">
                            <p" class="d-inline-block h6 mb-0">NAMA </p>
                        </div>
                        <div class="col-sm-7">
                             <p" class="d-inline-block  mb-1">: <?=$bendung1['NAMA']?></p>
                        </div>
                    </div>
                    <div class="row g-5 mb-0">
                        <div class="col-sm-5 ">
                            <p" class="d-inline-block h6 mb-0">Desa</p>
                        </div>
                        <div class="col-sm-7">
                             <p" class="d-inline-block  mb-1">: <?=$bendung1['Desa']?></p>
                        </div>
                    </div>
                    
                    <div class="row g-5 mb-0">
                        <div class="col-sm-5">
                            <p" class="d-inline-block h6 mb-0">Kecamatan</p>
                        </div>
                        <div class="col-sm-7">
                             <p" class="d-inline-block  mb-1">: <?=$bendung1['Kecamatan']?></p>
                        </div>
                    </div>
                     <div class="row g-5 mb-0">
                        <div class="col-sm-5">
                            <p" class="d-inline-block h6 mb-0">Kemantren</p>
                        </div>
                        <div class="col-sm-7">
                             <p" class="d-inline-block  mb-2">: <?=$bendung1['KEMANTREN']?> </p>
                        </div>
                    </div>
                    <div class="row g-5 mb-0">
                        <div class="col-sm-5">
                            <p" class="d-inline-block h6 mb-0">UPTD</p>
                        </div>
                        <div class="col-sm-7">
                             <p" class="d-inline-block  mb-2">: <?=$bendung1['UPTD']?> </p>
                        </div>
                    </div>
                    <div class="row g-5 mb-0">
                        <div class="col-sm-5">
                            <p" class="d-inline-block h6 mb-0">Daerah Irigiasi</p>
                        </div>
                        <div class="col-sm-7">
                             <p" class="d-inline-block  mb-2">: <?=$bendung1['DI']?> l/s</p>
                        </div>
                    </div>
                    
                    <div class="row g-5 mb-0">
                        <div class="col-sm-5">
                            <p" class="d-inline-block h6 mb-0">Tipe</p>
                        </div>
                        <div class="col-sm-7">
                             <p" class="d-inline-block  mb-2" >: <?=$bendung1['TYPE']?> </p>
                        </div>
                    </div>
                    <div class="row g-5 mb-0">
                        <div class="col-sm-5">
                            <p" class="d-inline-block h6 mb-0">Kondisi</p>
                        </div>
                        <div class="col-sm-7">
                             <p" class="d-inline-block  mb-2">: <?=$bendung1['KONDISI']?></p>
                        </div>
                    </div>
                    <div class="row g-5 mb-0">
                        <div class="col-sm-5">
                            <p" class="d-inline-block h6 mb-0">Kode Bangunan</p>
                        </div>
                        <div class="col-sm-7">
                             <p" class="d-inline-block  mb-2" >: <?=$bendung1['K_BANGUNAN']?></p>
                        </div>
                    </div>
                    <div class="row g-5 mb-0">
                        <div class="col-sm-5">
                            <p" class="d-inline-block h6 mb-0">Nomenklatur</p>
                        </div>
                        <div class="col-sm-7">
                             <p" class="d-inline-block  mb-2" >: <?=$bendung1['NOMENKLATU']?></p>
                        </div>
                    </div>
                      <div class="row g-5 mb-0">
                        <div class="col-sm-5">
                            <p" class="d-inline-block h6 mb-0">Koordinat</p>
                        </div>
                        <div class="col-sm-7">
                            <?php $lat = $bendung1['POINT_Y'];
                            $lng = $bendung1['POINT_X'];?>
                             <p" class="d-inline-block  mb-2" >: <?=$bendung1['POINT_X']?>, <?=$bendung1['POINT_Y']?> <a href="https://www.google.com/maps/search/?api=1&query=<?= $lat ?>,<?= $lng ?>" target="_blank"><img width="23px" src="<?= base_url('assets/images/direct.png') ?>"></a></p>
                        </div>
                    </div>
                    
                </div>
                
            </div>
            <div class="col-xl-7 wow fadeInRight" data-wow-delay="0.2s">
                <div class="about-item-content bg-white rounded p-5 h-100 py-2 g-1">
                    <h4 class="text-success">
                        <center>Peta Bangunan Pelengkap <?=$bendung1['NAMA']?>  </center>
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
            <?php if ($bendung1['Photo1'] == 'no_image.jpg' || $bendung1['Photo1'] == null) {
                    $fil =  base_url('assets/foto/no_image.jpg');
                } else {
                        $fil = base_url('assets/foto/pirigasi/' . $bendung1['id'] . '/' . $bendung1['Photo1']);
                }
                if ($bendung1['Photo2'] == 'no_image.jpg' || $bendung1['Photo2'] == null) {
                    $nama_file = 'file_belum ada';
                    $fil2 =  base_url('assets/foto/no_image.jpg');
                } else {
                    $nama_file = $bendung1['Photo2'];
                    $fil2 = base_url('assets/foto/pirigasi/' . $bendung1['id'] . '/' . $bendung1['Photo2']);
                }
                ?>
            <div class="col-xl-6 wow fadeInRight" data-wow-delay="0.2s">
                <div class="about-item-content bg-white rounded p-5 h-100 py-2 g-1">
                    <h4 class="text-success">
                        <center>Foto Bangunan Pelengkap <?=$bendung1['NAMA']?>  </center>
                    </h4>
                    <div class="row g-4 justify-content-center">
                        <div class="col-12">
                            <div class="rounded bg-light">
                                < <img src="<?=$fil?>" style="width: auto; height: 600px;" class="img-fluid rounded w-100">
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="col-xl-6 wow fadeInRight" data-wow-delay="0.2s">
                <div class="about-item-content bg-white rounded p-5 h-100 py-2 g-1">
                    <h4 class="text-success">
                        <center>Foto Bangunan Pelengkap <?=$bendung1['NAMA']?>  </center>
                    </h4>
                    <div class="row g-4 justify-content-center">
                        <div class="col-12">
                            <div class="rounded bg-light">
                                 <img src="<?=$fil2?>" style="width: auto; height: 600px;" class="img-fluid rounded w-100">
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
function poppembuang1(f,l){
  var out = [];
  var foto = f.properties['Photo1'];
  var id = f.properties['id'];
  if (f.properties){
    out.length = 0;
    out.push('Nama Bangunan : '+f.properties['NAMA']);
    out.push('Kode : '+f.properties['K_BANGUNAN']);
    out.push('Tipe : '+f.properties['TYPE']);
    out.push('Kondisi : '+f.properties['KONDISI']);
    out.push("<center><img src='<?=base_url("assets/foto/pirigasi")?>/"+id+"/"+foto+"' width='180px' ></center>");
  
    l.bindPopup(out.join("<br />"));    

        }
      
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
     
    var uptd = L.geoJSON([<?= $uptd ?>], {
        style: gaya_uptd,
        onEachFeature: onEachFeatureupt
    });
    var kecamatan = L.geoJSON([<?= $kecamatan ?>], {
        style: gayakec,
        onEachFeature: kec
    });
    var bendung = L.geoJSON([<?= $bendung ?>], {
         pointToLayer: point_p_irigasi,
        onEachFeature:poppembuang1
    });
    function popsaluranpembuang1(f,l){
        var out = [];
        if (f.properties){
            out.length = 0;
            out.push('Nama Saluran : '+f.properties['NAMOBJ']);
            out.push('Sumber Data : '+f.properties['SBDATA']);
            out.push('panjang (m) : '+Math.round(f.properties['Panjang__m'],2));
          
            l.bindPopup(out.join("<br />"));    

        }
    }
   

    var map = L.map('map', {
        center: [-7.417989, 109.005913],
        zoom: 10,
        fullscreenControl: true,
        fullscreenControlOptions: {
            position: 'topleft'
        },
        layers: [googleSat,kecamatan,uptd,bendung]
    });
   
     map.fitBounds(bendung.getBounds());
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
        "Bangunan Pelengkap": {
            "&nbsp;&nbsp;&nbsp;&nbsp;Bangunan Pelengkap": bendung,
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


</script>