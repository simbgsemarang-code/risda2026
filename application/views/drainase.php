<div class="container-fluid bg-light about pt-4 pb-4">
    <div class="container pt-2 pb-3">
        <!-- Page Title & Description -->
        <div class="text-center mx-auto pb-4 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
            <h1 class="display-4 text-success text-uppercase">Peta Drainase Perkotaan</h1>
            <p class="mb-0 text-dark">Sistem informasi geografis yang menyajikan data spasial, jaringan infrastruktur, dan informasi terpadu terkait seluruh Drainase Perkotaan di wilayah Kabupaten Cilacap.</p>
        </div>

        <div class="row g-4">
            <div class="col-xl-3 wow fadeInLeft" data-wow-delay="0.2s">
                <div class="about-item-content bg-white rounded p-4 h-100 shadow-sm border-0">
                    <h4 class="text-success mb-4" style="border-bottom: 2px solid rgba(25,135,84,0.1); padding-bottom: 10px;"><i class="fas fa-search me-2"></i>Pencarian</h4>

                    <div class="input-group mb-3">
                        <input type="text" id="search" class="form-control rounded-pill border-0 bg-light px-4 py-2" onkeyup="add_item(this.value)" placeholder="Ketik kata kunci...">
                        <button onclick="bersih()" type="button" class="btn bg-transparent border-0 text-muted" style="margin-left: -50px; z-index: 100;">
                            <i class="fa fa-times"></i>
                        </button>
                    </div>
                    <div id="pencari" class="p-2">
                          <?php $this->load->view($temp_view,$temp_data); ?>
                    </div>
                </div>
            </div>
            <div class="col-xl-9 wow fadeInRight" data-wow-delay="0.2s">
                <div class="bg-white rounded p-3 h-100 shadow-sm border-0 d-flex flex-column">
                    <!-- Map Wrapper (fills remaining height) -->
                    <div class="rounded bg-light flex-grow-1 w-100" style="border-radius: 20px; overflow: hidden; border: 1px solid rgba(0,0,0,0.05); display: flex; flex-direction: column;">
                        <div id="map" style="width: 100%; min-height: 500px; flex-grow: 1; z-index: 1;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="container pb-4">
        <div class="row g-4">
            <div class="col-xl-12 wow fadeInUp" data-wow-delay="0.2s">
                <div class="bg-white rounded p-4 h-100 shadow-sm border-0">
                    <h4 class="text-success mb-4 text-center">
                        <i class="fas fa-table me-2"></i>Data Drainase Perkotaan
                    </h4>
                    <div class="row g-4 justify-content-center">
                        <div class="col-12">
                            <div class="table-responsive rounded bg-light p-3" style="border: 1px solid rgba(0,0,0,0.05);">
                              <table id="example" class="table table-striped table-hover table-bordered align-middle w-100">
                                <thead class="table-success text-center">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Desa</th>
                                        <th>Kecamatan</th>
                                        <th>UPTD</th>
                                        <th>DETAIL</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=1;
                                    foreach($drainase1 as $b) { ?>
                                    <tr>
                                        <td class="text-center"><?=$i?></td>
                                        <td class="fw-bold text-success"><?=$b->NAMAOBJ?></td>
                                        <td><?=$b->DESA?></td>
                                        <td><?=$b->KECAMATAN?></td>
                                        <td><?=$b->UPTD?></td>
                                        <td class="text-center"><a href="<?=base_url('Detail/drainase/'.$b->id)?>" class="btn btn-sm btn-success rounded-pill px-3 shadow-sm"><i class="fas fa-eye me-1"></i> Detail</a></td>
                                    </tr>
                                    <?php $i++;} ?>
                                </tbody>
                            </table>
                            </div>
                        </div>
                        
                        <!-- Statistik Widget -->
                        <div class="col-sm-6 col-lg-3 mt-4 mx-auto">
                            <div class="counter-item bg-light rounded p-4 h-100 shadow-sm text-center border-0 transition-hover" style="border-bottom: 4px solid #198754 !important;">
                                <div class="counter-counting mb-2">
                                    <span class="text-success fs-1 fw-bold" data-toggle="counter-up"><?=$jml[0]?></span>
                                </div>
                                <h6 class="mb-0 text-dark text-uppercase letter-spacing-1">Drainase Perkotaan</h6>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
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

    

    function point_p_irigasi(feature, latlng) {
        var Url_nya = "<?= base_url('assets/images/home.png') ?>";
        var Icon = L.icon({
            iconUrl: Url_nya,
            iconSize: [7, 7],
        });
        var marker = L.marker(latlng, {
            icon: Icon
        });
        return marker
    }

    
    

    

    function onEachFeatureupt(feature, layer) {

        layer.bindTooltip('UPTD ' + feature.properties['uptd'], {
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
    function popsaluranpembuang1(f,l){
        var out = [];
        if (f.properties){
            out.length = 0;
            out.push('Nama Saluran : '+f.properties['NAMAOBJ']);
            out.push('Sumber Data : '+f.properties['SBDATA']);
            out.push('panjang (m) : '+Math.round(f.properties['Panjang__m'],2));
            out.push("<center><a style='color: white' class='btn btn-block btn-success btn-sm' href='<?=base_url("Detail/drainase/")?>"+f.properties['id']+"'  target='blank'>"+'Lihat Detail Saluran'+"</a></center>");
            l.bindPopup(out.join("<br />"));    

        }
    }
    function gaya_saluranPembuang1(feature) {
        return {        
        weight: '2',
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
    var drainase = L.geoJSON([<?= $drainase ?>], {
       onEachFeature:popsaluranpembuang1,style:gaya_saluranPembuang1
    });
    var desa = L.geoJSON([<?= $desa ?>], {
       style: gayakec,
        onEachFeature: des
    });
    var map = L.map('map', {
        center: [-7.711836, 109.0241091],
        zoom: 14,
        fullscreenControl: true,
        fullscreenControlOptions: {
            position: 'topleft'
        },
        layers: [googleSat, kecamatan,desa,drainase]
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
            "&nbsp;&nbsp;&nbsp;&nbsp;Desa": desa,
            "&nbsp;&nbsp;&nbsp;&nbsp;UPTD": uptd,
        },
        "Drainase": {
            "&nbsp;&nbsp;&nbsp;&nbsp;Drainase": drainase,
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
    var timmer;
    function add_item(data){
        var jenis = '<?=$jenis?>';
         if(/^[a-zA-Z0-9- ]*$/.test(data) == true) {
            if(data != null){
                 clearTimeout(timmer);
                 timmer = setTimeout(function callback(){
                     $.ajax({
                            url: '<?php echo base_url('Welcome/cari_drai/'); ?>'+data + '/' + jenis,
                            success: function(response)
                            {
                              jQuery('#pencari').html(response);  
                            }
                        });

                 }, 100);
            }
         }
    }
    map.on('zoomend', onZoomend1);
    function onZoomend1(feature, layer) {
        var currentZoom = map.getZoom();
        var tooltip = $('.label_des');
        var tooltipdes = $('.label_des');
        
        
        desa.eachLayer(function(desa) {
            if (currentZoom <= 11) {
                tooltipdes.css('display', 'none');
                tooltipdes.css('font-size', 6);
            }
            if (currentZoom == 12) {
                tooltipdes.css('display', 'none');
                tooltipdes.css('font-size', 10);
            }
            if (currentZoom < 14) {
                tooltipdes.css('display', 'none');
                tooltipdes.css('font-size', 11);
            }
            if (currentZoom == 14) {
                tooltipdes.css('display', 'block');
                tooltipdes.css('font-size', 12);
            }
            if (currentZoom == 15) {
                tooltipdes.css('display', 'block');
                tooltipdes.css('font-size', 12);
            }
            if (currentZoom == 16) {
                tooltipdes.css('display', 'block');
                tooltipdes.css('font-size', 13);
            }
            if (currentZoom == 17) {
                tooltipdes.css('display', 'block');
                tooltipdes.css('font-size', 13);
            }
            if (currentZoom == 18) {
                tooltipdes.css('display', 'block');
                tooltipdes.css('font-size', 14);
            }
            if (currentZoom == 19) {
                tooltipdes.css('display', 'block');
                tooltipdes.css('font-size', 14);
            }
            if (currentZoom == 20) {
                tooltipdes.css('display', 'block');
                tooltipdes.css('font-size', 15);
            }
        });
    }
var legend_saluran = L.control({
    position: 'bottomleft'
});

legend_saluran.onAdd = function(map) {
    var div = L.DomUtil.create('div', 'info legend');
    var grades = ["&nbsp;&nbsp;Saluran Primer", "&nbsp;&nbsp;Saluran Sekunder", "&nbsp;&nbsp;Saluran Tersier", "&nbsp;&nbsp;Saluran Lokal",];
    var labels = ["<b>Legenda Drainase</b><br>"];
    var from, to;
    labels.push('<i style="background:#C14F4D;height:10px"></i> ' + grades[0]);
    labels.push('<i style="background:#9CBC57;height:10px"></i> ' + grades[1]);
    labels.push('<i style="background:#1DC0AC;height:10px"></i> ' + grades[2]);
    labels.push('<i style="background:#8164A2;height:10px"></i> ' + grades[3]);                       
    div.innerHTML = labels.join('<br>');
    return div;
};
legend_saluran.addTo(map);
new DataTable('#example');
</script>