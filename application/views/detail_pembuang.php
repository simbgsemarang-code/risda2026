<div class="container-fluid bg-light about py-1">
    <div class="container py-1">
        <div class="row g-1">
            <div class="col-xl-5 wow fadeInLeft" data-wow-delay="0.2s">
                <div class="about-item-content bg-white rounded p-5 h-100 py-2 g-1">
                    <h4 class="text-success">Detail Saluran Pembuang</h4>
                    <hr>
                    <div class="row g-5 mb-0">
                        <div class="col-sm-5 ">
                            <p" class="d-inline-block h6 mb-0">Nama </p>
                        </div>
                        <div class="col-sm-7">
                             <p" class="d-inline-block  mb-1">: <?=$bendung1['nama_saluran']?></p>
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
                            <p" class="d-inline-block h6 mb-0">Panjang</p>
                        </div>
                        <div class="col-sm-7">
                             <p" class="d-inline-block  mb-2">: <?=$bendung1['PANJANG']?> m</p>
                        </div>
                    </div>
                    <div class="row g-5 mb-0">
                        <div class="col-sm-5">
                            <p" class="d-inline-block h6 mb-0">Lebar Atas</p>
                        </div>
                        <div class="col-sm-7">
                             <p" class="d-inline-block  mb-2">: <?=$bendung1['LEBAR_A']?> m</p>
                        </div>
                    </div>
                    <div class="row g-5 mb-0">
                        <div class="col-sm-5">
                            <p" class="d-inline-block h6 mb-0">Lebar Bawah</p>
                        </div>
                        <div class="col-sm-7">
                             <p" class="d-inline-block  mb-2">: <?=$bendung1['LEBAR_B']?> m</p>
                        </div>
                    </div>
                    <div class="row g-5 mb-0">
                        <div class="col-sm-5">
                            <p" class="d-inline-block h6 mb-0">Material Kiri</p>
                        </div>
                        <div class="col-sm-7">
                             <p" class="d-inline-block  mb-2">: <?=$bendung1['MATRIAL_KI']?> </p>
                        </div>
                    </div>
                    <div class="row g-5 mb-0">
                        <div class="col-sm-5">
                            <p" class="d-inline-block h6 mb-0">Material Kanan</p>
                        </div>
                        <div class="col-sm-7">
                             <p" class="d-inline-block  mb-2">: <?=$bendung1['MATRIAL_KA']?> </p>
                        </div>
                    </div>
                    <div class="row g-5 mb-0">
                        <div class="col-sm-5">
                            <p" class="d-inline-block h6 mb-0">Tinggi Kiri</p>
                        </div>
                        <div class="col-sm-7">
                             <p" class="d-inline-block  mb-2">: <?=$bendung1['TINGGI_KI']?> m</p>
                        </div>
                    </div>
                    <div class="row g-5 mb-0">
                        <div class="col-sm-5">
                            <p" class="d-inline-block h6 mb-0">Tinggi Kanan</p>
                        </div>
                        <div class="col-sm-7">
                             <p" class="d-inline-block  mb-2">: <?=$bendung1['TINGGI_KA']?> m</p>
                        </div>
                    </div>
                    <div class="row g-5 mb-0">
                        <div class="col-sm-5">
                            <p" class="d-inline-block h6 mb-0">Tebal Kiri</p>
                        </div>
                        <div class="col-sm-7">
                             <p" class="d-inline-block  mb-2">: <?=$bendung1['TEBAL_KI']?> m</p>
                        </div>
                    </div>
                    <div class="row g-5 mb-0">
                        <div class="col-sm-5">
                            <p" class="d-inline-block h6 mb-0">Tebal Kanan</p>
                        </div>
                        <div class="col-sm-7">
                             <p" class="d-inline-block  mb-2">: <?=$bendung1['TEBAL_KA']?> m</p>
                        </div>
                    </div>
                     
                    
                </div>
                
            </div>
            <div class="col-xl-7 wow fadeInRight" data-wow-delay="0.2s">
                <div class="about-item-content bg-white rounded p-5 h-100 py-2 g-1">
                    <h4 class="text-success">
                        <center>Peta Saluaran Pembuang <?=$bendung1['nama_saluran']?>  </center>
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
            out.push("<center><a href='<?=base_url("Detail/p_pembuang/")?>"+f.properties['id']+"'  target='blank'>"+'Lihat Detail Saluran'+"</a></center>");
            l.bindPopup(out.join("<br />"));    

        }
    }
    function gaya_saluranPembuang1(feature) {
        return {        
        weight: '6',
        opacity: 1,
        color:warna(feature.properties['Kondisi']),
        fillOpacity:0,
        }; 
    } 
     function warna(w) {
        if (w == "Baik"){
        var war = '#4F84C4';
      }else if (w == "Sedang") {
        var war = '#F6D155';
      }else{
        var war = '#223A5E';
      }
      return war ;
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
       style:gaya_saluranPembuang1,
        onEachFeature:popsaluranpembuang1
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
        "Saluran Pembuang": {
            "&nbsp;&nbsp;&nbsp;&nbsp;Saluran Pembuang": bendung,
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
    var grades = ["&nbsp;&nbsp;Baik", "&nbsp;&nbsp;Sedang", "&nbsp;&nbsp;Buruk"];
    var labels = ["<b>Legenda Saluran Pembuang</b><br>"];
    var from, to;
    labels.push('<i style="background:#4F84C4;height:10px"></i> ' + grades[0]);
    labels.push('<i style="background:#F6D155;height:10px"></i> ' + grades[1]);
    labels.push('<i style="background:#223A5E;height:10px"></i> ' + grades[2]);
                       
    div.innerHTML = labels.join('<br>');
    return div;
};
legend_saluran.addTo(map);
</script>