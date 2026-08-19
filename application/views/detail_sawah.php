<div class="container-fluid bg-light about py-1">
    <div class="container py-1">
        <div class="row g-1">
            <div class="col-xl-5 wow fadeInLeft" data-wow-delay="0.2s">
                <div class="about-item-content bg-white rounded p-5 h-100 py-2 g-1">
                    <h4 class="text-success">Detail Sawah</h4>
                    <hr>
                    <div class="row g-5 mb-0">
                        <div class="col-sm-5 ">
                            <p" class="d-inline-block h6 mb-0">NAMA DI </p>
                        </div>
                        <div class="col-sm-7">
                             <p" class="d-inline-block  mb-1">: <?=$bendung1['Nama_DI']?></p>
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
                            <p" class="d-inline-block h6 mb-0">Luas Baku</p>
                        </div>
                        <div class="col-sm-7">
                             <p" class="d-inline-block  mb-2">: <?=$bendung1['LBaku']?> Ha</p>
                        </div>
                    </div>
                    
                    <div class="row g-5 mb-0">
                        <div class="col-sm-5">
                            <p" class="d-inline-block h6 mb-0">Luas Potensial</p>
                        </div>
                        <div class="col-sm-7">
                             <p" class="d-inline-block  mb-2" >: <?=$bendung1['LPotensial']?> Ha</p>
                        </div>
                    </div>
                     <div class="row g-5 mb-0">
                        <div class="col-sm-5">
                            <p" class="d-inline-block h6 mb-0">Luas Fungsional</p>
                        </div>
                        <div class="col-sm-7">
                             <p" class="d-inline-block  mb-2" >: <?=$bendung1['LFunsional']?> Ha</p>
                        </div>
                    </div>
                    
                    
                </div>
                
            </div>
            <div class="col-xl-7 wow fadeInRight" data-wow-delay="0.2s">
                <div class="about-item-content bg-white rounded p-5 h-100 py-2 g-1">
                    <h4 class="text-success">
                        <center>Peta Sawah <?=$bendung1['Nama_DI']?>  </center>
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
        style: gayasawah,
        onEachFeature: popUp_sawah
    });
     function gayasawah(feature) {
        return {
            color: "yellow",
            weight: 1,
            opacity: 1,
            fillOpacity: 0.7,
        };
    }

    function popUp_sawah(f, l) {
        var out = [];
        if (f.properties) {
            out.length = 0;
            out.push('Daerah Irigasi : ' + f.properties['Nama_DI']);
            out.push('Luas Baku : ' + f.properties['LBaku'] + ' Ha');
           
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
        "Sawah": {
            "&nbsp;&nbsp;&nbsp;&nbsp;Sawah": bendung,
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