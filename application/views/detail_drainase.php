<div class="container-fluid bg-light about py-1">
    <div class="container py-1">
        <div class="row g-1">
            <div class="col-xl-5 wow fadeInLeft" data-wow-delay="0.2s">
                <div class="about-item-content bg-white rounded p-5 h-100 py-2 g-1">
                    <h4 class="text-success">Detail Drainase Perkotaan</h4>
                    <hr>
                    <div class="row g-5 mb-0">
                        <div class="col-sm-5 ">
                            <p" class="d-inline-block h6 mb-0">Nama </p>
                        </div>
                        <div class="col-sm-7">
                             <p" class="d-inline-block  mb-1">: <?=$bendung1['NAMAOBJ']?></p>
                        </div>
                    </div>
                    <div class="row g-5 mb-0">
                        <div class="col-sm-5 ">
                            <p" class="d-inline-block h6 mb-0">Desa</p>
                        </div>
                        <div class="col-sm-7">
                             <p" class="d-inline-block  mb-1">: <?=$bendung1['DESA']?></p>
                        </div>
                    </div>
                    
                    <div class="row g-5 mb-0">
                        <div class="col-sm-5">
                            <p" class="d-inline-block h6 mb-0">Kecamatan</p>
                        </div>
                        <div class="col-sm-7">
                             <p" class="d-inline-block  mb-1">: <?=$bendung1['KECAMATAN']?></p>
                        </div>
                    </div>
                     <div class="row g-5 mb-0">
                        <div class="col-sm-5">
                            <p" class="d-inline-block h6 mb-0">Panjang</p>
                        </div>
                        <div class="col-sm-7">
                             <p" class="d-inline-block  mb-2">: <?=$bendung1['Panjang__m']?> m</p>
                        </div>
                    </div>
                    <div class="row g-5 mb-0">
                        <div class="col-sm-5">
                            <p" class="d-inline-block h6 mb-0">Sumber Data</p>
                        </div>
                        <div class="col-sm-7">
                             <p" class="d-inline-block  mb-2">: <?=$bendung1['SBDATA']?></p>
                        </div>
                    </div>
                     
                    
                </div>
                
            </div>
            <div class="col-xl-7 wow fadeInRight" data-wow-delay="0.2s">
                <div class="about-item-content bg-white rounded p-5 h-100 py-2 g-1">
                    <h4 class="text-success">
                        <center>Peta Drainase <?=$bendung1['NAMAOBJ']?>  </center>
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
 function popsaluranpembuang1(f,l){
        var out = [];
        if (f.properties){
            out.length = 0;
            out.push('Nama Saluran : '+f.properties['NAMOBJ']);
            out.push('Sumber Data : '+f.properties['SBDATA']);
            out.push('panjang (m) : '+Math.round(f.properties['Panjang__m'],2));
            out.push("<center><a href='<?=base_url("Detail/drainase/")?>"+f.properties['id']+"'  target='blank'>"+'Lihat Detail Saluran'+"</a></center>");
            l.bindPopup(out.join("<br />"));    

        }
    }
    function gaya_saluranPembuang1(feature) {
        return {        
        weight: '6',
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
        onEachFeature:popsaluranpembuang1,
        style:gaya_saluranPembuang1
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
        "Drainase": {
            "&nbsp;&nbsp;&nbsp;&nbsp;Drainase": bendung,
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
    var grades = ["&nbsp;&nbsp;Baik", "&nbsp;&nbsp;Sedang", "&nbsp;&nbsp;Buruk", "&nbsp;&nbsp;Belum ada data",];
    var labels = ["<b>Legenda Kondisi</b><br>"];
    var from, to;
    labels.push('<img src="<?= base_url('assets/images/baik.png') ?>" width="20px">' + grades[0]);
    labels.push('<img src="<?= base_url('assets/images/sedang.png') ?>" width="20px">' + grades[1]);
    labels.push('<img src="<?= base_url('assets/images/buruk.png') ?>" width="20px">' + grades[2]);
    labels.push('<img src="<?= base_url('assets/images/belum.png') ?>" width="20px">' + grades[3]);                       
    div.innerHTML = labels.join('<br>');
    return div;
};
legend_saluran.addTo(map);
</script>