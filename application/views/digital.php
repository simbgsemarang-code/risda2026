<script>
$( document ).ready(function() {
    $('#di_nya').select2({
	  	placeholder: 'Pilih Daerah Irigasi',
	  	language: "id"
	});
     $('#kecamatan_nya').select2({
	  	placeholder: 'Pilih Kecamatan',
	  	language: "id"
	});
     $('#desa_nya').select2({
	  	placeholder: 'Pilih Desa',
	  	language: "id"
	});
     $('#sal_iri').select2({
	  	placeholder: 'Pilih Saluran Irigasi',
	  	language: "id"
	});
     $('#pel_iri').select2({
	  	placeholder: 'Pilih Bangunan Pelengkap',
	  	language: "id"
	});
      $('#sp_nya').select2({
	  	placeholder: 'Pilih Saluran Pembuang',
	  	language: "id"
	});
     $('#pel_pembuang_nya').select2({
	  	placeholder: 'Pilih Bangunan Pelengkap',
	  	language: "id"
	});
     $('#drainase_nya').select2({
	  	placeholder: 'Pilih Bangunan Pelengkap',
	  	language: "id"
	});
    $('#air_baku_nya').select2({
	  	placeholder: 'Pilih Air Baku',
	  	language: "id"
	});
    $('#uptd_nya').select2({
	  	placeholder: 'Pilih UPTD',
	  	language: "id"
	});
    $('#kemantren_nya').select2({
	  	placeholder: 'Pilih Kemantren',
	  	language: "id"
	});
});
</script>
<div class="container-fluid bg-light about pt-4 pb-4">
    <div class="container pt-2 pb-3">
        <div class="row g-4">
            
            <div class="col-xl-12 wow fadeInRight" data-wow-delay="0.2s">
                <div class="bg-white rounded p-4 h-100 shadow-sm border-0">
                    <h4 class="text-success mb-4 text-center" style="border-bottom: 2px solid rgba(25,135,84,0.1); padding-bottom: 10px;">
                        Peta Ruang Informasi Sumber Daya Air
                    </h4>
                    
                    <div class="row pt-2 pb-2 mb-3 bg-light rounded shadow-sm mx-0" style="z-index: 10006; border: 1px solid rgba(0,0,0,0.05);">
                        <!-- BAGIAN PILIH WILAYAH (SISTEMATIS) -->
                        <div class="col-md-5 border-end pe-3">
                            <div class="d-flex align-items-center mb-2">
                                <span class="badge bg-success me-2">1</span>
                                <label class="small fw-bold text-dark mb-0">Pilih Wilayah</label>
                                <div class="ms-auto btn-group btn-group-sm" role="group">
                                    <input type="radio" class="btn-check" name="wil-type" id="type-kec" autocomplete="off" checked onclick="wil('kecamatan')">
                                    <label class="btn btn-outline-success border-0 px-2 py-0" style="font-size: 10px;" for="type-kec">Kecamatan</label>
                                    <input type="radio" class="btn-check" name="wil-type" id="type-uptd" autocomplete="off" onclick="wil('uptd')">
                                    <label class="btn btn-outline-success border-0 px-2 py-0" style="font-size: 10px;" for="type-uptd">UPTD</label>
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="col-6" id="kecamatan">
                                    <select class="form-select form-select-sm select2" id="kecamatan_nya" onchange="cari_desa(this.value)">
                                        <option value="">-- Pilih Kecamatan --</option>
                                        <?php foreach($kecamatan1 as $b) {?>
                                            <option value="<?=$b->id?>"><?=$b->KECAMATAN?></option>
                                        <?php } ?>   
                                    </select>
                                </div>
                                <div class="col-6" id="uptd" style="display:none;">
                                    <select class="form-select form-select-sm select2" id="uptd_nya" onchange="cari_kemantren(this.value)">
                                        <option value="">-- Pilih UPTD --</option>
                                        <?php foreach($uptd1 as $b) {?>
                                            <option value="<?=$b->id?>"><?=$b->uptd?></option>
                                        <?php } ?>   
                                    </select>
                                </div>
                                <div class="col-6" id="desa">
                                    <select class="form-select form-select-sm select2" id="desa_nya" onchange="prepare_specific_data(this.value)">
                                        <option value="">-- Pilih Desa --</option>
                                    </select>
                                </div>
                                <div class="col-6" id="kemantren" style="display:none;">
                                    <select class="form-select form-select-sm select2" id="kemantren_nya" onchange="prepare_specific_data(this.value)">
                                        <option value="">-- Pilih Kemantren --</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- BAGIAN PILIH KATEGORI & DATA -->
                        <div class="col-md-7 ps-3">
                            <div class="d-flex align-items-center mb-2">
                                <span class="badge bg-success me-2">2</span>
                                <label class="small fw-bold text-dark mb-0">Pilih Kategori & Data Teknis</label>
                            </div>
                            <div class="row g-2 align-items-center">
                                <div class="col-3">
                                    <select class="form-select form-select-sm" id="kategori" onchange="kategori_select(this.value)">
                                        <option value="">-- Kategori --</option>
                                        <option value="bendung">Bendung</option>
                                        <option value="irigasi">Saluran Irigasi</option>
                                        <option value="saluran_pembuang">Saluran Pembuang</option>
                                        <option value="drainase">Drainase Perkotaan</option>
                                        <option value="p_irigasi">B. Pelengkap Irigasi</option>
                                    </select>
                                </div>
                                
                                <!-- DYNAMIC FILTERS BASED ON CATEGORY -->
                                <div class="col-5">
                                    <div id="di" style="display:none;">
                                        <select class="form-select form-select-sm select2" id="di_nya" onchange="load_additional_category_data(this.value)">
                                            <option value="">-- Pilih Daerah Irigasi --</option>
                                            <?php foreach($bendung1 as $b) {?>
                                                <option value="<?=$b->id_di?>"><?=$b->NAMA_DI?></option>
                                            <?php } ?>                              
                                        </select>
                                    </div>
                                    <div id="sp" style="display:none;">
                                        <select class="form-select form-select-sm select2" id="sp_nya">
                                            <option value="">-- Pilih Saluran --</option>
                                            <?php foreach($pembuang1 as $b) {?>
                                                <option value="<?=$b->id?>"><?=$b->nama_saluran?></option>
                                            <?php } ?>                              
                                        </select>
                                    </div>
                                    <div id="pel_pembuang" style="display:none;">
                                        <select class="form-select form-select-sm select2" id="pel_pembuang_nya">
                                            <option value="">-- Pilih Bangunan --</option>
                                            <?php foreach($pelengkap as $b) {?>
                                                <option value="<?=$b->id?>"><?=$b->NAME?></option>
                                            <?php } ?>                              
                                        </select>
                                    </div>
                                    <div id="drainase" style="display:none;">
                                        <select class="form-select form-select-sm select2" id="drainase_nya">
                                            <option value="">-- Pilih Drainase --</option>
                                            <?php foreach($drainase1 as $b) {?>
                                                <option value="<?=$b->id?>"><?=$b->NAMAOBJ?></option>
                                            <?php } ?>                              
                                        </select>
                                    </div>
                                    <div id="air_baku" style="display:none;">
                                        <select class="form-select form-select-sm select2" id="air_baku_nya">
                                            <option value="">-- Pilih Air Baku --</option>
                                            <?php foreach($airbaku1 as $b) {?>
                                                <option value="<?=$b->id?>"><?=$b->SumberDana?></option>
                                            <?php } ?>                              
                                        </select>
                                    </div>
                                    <div id="saluran_irigasi" style="display:none;">
                                        <select class="form-select form-select-sm select2" id="sal_iri">
                                             <option value="">-- Pilih Saluran Irigasi --</option>                    
                                        </select>
                                    </div>
                                    <div id="pelengkap_irigasi" style="display:none;">
                                        <select class="form-select form-select-sm select2" id="pel_iri">
                                             <option value="">-- Pilih Bangunan Pel. Irigasi --</option>                   
                                        </select>
                                    </div>
                                </div>

                                <div class="col-4 text-end">
                                    <button type="button" class="btn btn-success btn-sm w-100 shadow-sm d-flex align-items-center justify-content-center py-1 transition-all hover-scale" id="btn-filter" onclick="jalankan_filter()">
                                        <i class="fas fa-play-circle me-2"></i>
                                        <span class="fw-bold fw-600" style="font-size: 11px;">TAMPILKAN PETA</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- NOTIFIKASI & TOMBOL FILTER -->
                    <div id="alert-container" class="mb-3" style="display:none;">
                        <div class="alert alert-warning d-flex align-items-center mb-0 py-2 border-0 shadow-sm" role="alert" style="background-color: #fff3cd; border-left: 4px solid #ffc107 !important;">
                            <i class="fas fa-exclamation-circle text-warning me-2" style="font-size: 1.2rem;"></i>
                            <div id="alert-msg" class="small fw-bold text-dark"></div>
                            <button type="button" class="btn-close ms-auto" style="font-size: 0.7rem;" onclick="$('#alert-container').fadeOut()"></button>
                        </div>
                    </div>

                    <div class="row flex-grow-1 mt-2">
                        <div class="col-12 h-100 d-flex flex-column" style="position: relative;">

                            <div class="rounded bg-light flex-grow-1" style="min-height: 70vh; position: relative; border: 1px solid rgba(0,0,0,0.1);">
                                <div id="map" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;" class="rounded"></div>
                            </div>
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
    function popsaluranpembuang1(f,l){
        var out = [];
        if (f.properties){
            out.length = 0;
            out.push('Nama Saluran : '+f.properties['NAMOBJ']);
            out.push('Sumber Data : '+f.properties['SBDATA']);
            out.push('panjang (m) : '+Math.round(f.properties['Panjang__m'],2));
            out.push("<center><a style='color: white' class='btn btn-block btn-success btn-sm' href='<?=base_url("Detail/drainase/")?>"+f.properties['id']+"'  target='blank'>"+'Lihat Detail Saluran'+"</a></center>");
            l.bindPopup(out.join("<br />"));    

        }
    }
        function popsaluranpembuang2(f,l){
            var out = [];
            var foto = f.properties['Photo_Awal'];
            if (f.properties){
                out.length = 0;
                out.push('Nama Saluran : '+f.properties['nama_saluran']);
                out.push('Nomer SK : '+f.properties['no_sk']);
                out.push('Kondisi : '+f.properties['Kondisi']);
                out.push("<center><img src='<?=base_url("assets/foto")?>/"+foto+"' width='180px' ></center>");
                out.push("<center><a style='color: white' class='btn btn-block btn-success btn-sm' href='<?=base_url("Detail/pembuang/")?>"+f.properties['id']+"'  target='blank'>"+'Lihat Detail Saluran'+"</a></center>");
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
    function gaya_saluranPembuang2(feature) {
        return {        
        weight: '3',
        opacity: 1,
        color:warna2(feature.properties['Kondisi']),
        fillOpacity:0,
        }; 
    }
    function warna2(w) {
        if (w == "Baik"){
            var war = '#4F84C4';
        }else if (w == "Sedang") {
            var war = '#F6D155';
        }else{
            var war = '#223A5E';
        }
        return war ;
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
    function des(feature, layer) {
        layer.bindTooltip('Desa. ' + feature.properties['DESA'], {
            permanent: false,
            direction: "center",
            className: "label_des"
        });

    }
    function kec(feature, layer) {
        layer.bindTooltip(feature.properties['KECAMATAN'], {
            permanent: false,
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
            permanent: false,
            direction: "center",
            className: "label_des"
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
function point_air(feature, latlng) {
        var Url_nya = "<?= base_url('assets/images/sumur.png') ?>";
        var Icon = L.icon({
            iconUrl: Url_nya,
            iconSize: [15, 26],
        });
        var marker = L.marker(latlng, {
            icon: Icon
        });
        return marker
    }
function point_p_irigasi1(feature, latlng) {
        var Url_nya = "<?= base_url('assets/images/pelengkap.png') ?>";
        var Icon = L.icon({
            iconUrl: Url_nya,
            iconSize: [7, 7],
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
            out.push("<center><a style='color: white' class='btn btn-block btn-success btn-sm' href='<?= base_url("Detail/sawah/") ?>" + f.properties['id'] + "'  target='_blank'>" + 'Lihat Detail Sawah' + "</a></center>");
            l.bindPopup(out.join("<br />"));
        }

    }

    function onEachFeatureupt(feature, layer) {

        layer.bindTooltip('UPTD ' + feature.properties['UPTD'], {
            permanent: false,
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
    function poppembuang1(f,l){
        var out = [];
        var foto = f.properties['Photo1'];
        if (f.properties){
            out.length = 0;
            out.push('Nama : '+f.properties['NAMA']);
            out.push("<center><img src='<?=base_url("assets/foto")?>/"+foto+"' width='180px' ></center>");
            out.push("<center><a style='color: white' class='btn btn-block btn-success btn-sm' href='<?=base_url("Detail/p_irigasi/")?>"+f.properties['id']+"'  target='_blank'>"+'Lihat Detail Bangunan Pelengkap'+"</a></center>");
            l.bindPopup(out.join("<br />"));    

                }
            
        } 
    function popair(f,l){
        var out = [];
        var foto = f.properties['Photo1'];
        if (f.properties){
            out.length = 0;
            out.push('Sumber Dana : '+f.properties['SumberDana']);
            out.push("<center><img src='<?=base_url("assets/foto")?>/"+foto+"' width='180px' ></center>");
            out.push("<center><a style='color: white' class='btn btn-block btn-success btn-sm' href='<?=base_url("Detail/air_baku/")?>"+f.properties['id']+"'  target='blank'>"+'Lihat Detail Air Baku'+"</a></center>");
            l.bindPopup(out.join("<br />"));    

                }
            
        } 
    function poppembuang2(f,l){
        var out = [];
        var foto = f.properties['Photo1'];
        if (f.properties){
            out.length = 0;
            out.push('Nama Bangunan : '+f.properties['NAME']);
            out.push('Jenis Bangunan : '+f.properties['BANGUNAN']);
            out.push('Nomer SK : '+f.properties['NO_SK']);
            out.push('Kondisi : '+f.properties['KONDISI']);
            out.push("<center><img src='<?=base_url("assets/foto")?>/"+foto+"' width='180px' ></center>");
            out.push("<center><a style='color: white' class='btn btn-block btn-success btn-sm' href='<?=base_url("Detail/p_pembuang/")?>"+f.properties['id']+"'  target='blank'>"+'Lihat Detail Bangunan Pelengkap'+"</a></center>");
            l.bindPopup(out.join("<br />"));    

                }
            
        } 
     function popirigasi(f,l){
        var out = [];
        var foto = f.properties['Photo1'];
        if (f.properties){
            out.length = 0;
            out.push('Nama : '+f.properties['NAMA']);
            out.push('Kelas : '+f.properties['KelasSalur']);
            out.push("<center><img src='<?=base_url("assets/foto")?>/"+foto+"' width='180px' ></center>");
            out.push("<center><a style='color: white' class='btn btn-block btn-success btn-sm' href='<?=base_url("Detail/irigasi/")?>"+f.properties['id']+"'  target='_blank'>"+'Lihat Detail Saluran Iirgasi'+"</a></center>");
            l.bindPopup(out.join("<br />"));    

                }
            
        } 
    var uptd = L.geoJSON(null, {
        style: gaya_uptd,
        onEachFeature: onEachFeatureupt
    });
    var kecamatan = L.geoJSON(null, {
        style: gayakec,
        onEachFeature: kec
    });
    var bendung = L.geoJSON(null, {
        onEachFeature: popbendung,
        pointToLayer: point_bendung
    });
    var irigasi = L.geoJSON(null, {
         onEachFeature:popirigasi
    });
    var p_irigasi = L.geoJSON(null, {
        pointToLayer: point_p_irigasi,
        onEachFeature:poppembuang1
    });
    var sawah = L.geoJSON(null, {
        style: gayasawah,
        onEachFeature: popUp_sawah
    });
    var desa = L.geoJSON(null, {
       style: gayakec,
        onEachFeature: des
    });
    var drainase = L.geoJSON(null, {
       onEachFeature:popsaluranpembuang1,style:gaya_saluranPembuang1
    });
    var pembuang = L.geoJSON(null, {
        style:gaya_saluranPembuang2,
        onEachFeature:popsaluranpembuang2
    });
    var p_irigasi1 = L.geoJSON(null, {
        pointToLayer: point_p_irigasi1,
        onEachFeature:poppembuang2
    });

    var airbaku = L.geoJSON(null, {
        pointToLayer: point_air,
        onEachFeature:popair
    });
    var map = L.map('map', {
        center: [-7.417989, 109.005913],
        zoom: 10,
        fullscreenControl: true,
        fullscreenControlOptions: {
            position: 'topleft'
        },
        layers: [googleSat]
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
        "Daerah Irigasi": {
            "&nbsp;&nbsp;&nbsp;&nbsp;Bendung": bendung,
            "&nbsp;&nbsp;&nbsp;&nbsp;Saluran Irigasi": irigasi,
            "&nbsp;&nbsp;&nbsp;&nbsp;Bangunan Pelengkap": p_irigasi,
            "&nbsp;&nbsp;&nbsp;&nbsp;Sawah": sawah,
        },
        "Drainase Perkotaan": {
            "&nbsp;&nbsp;&nbsp;&nbsp;Drainase": drainase,
        },
          "Saluran Pembuang": {
            "&nbsp;&nbsp;&nbsp;&nbsp;Saluran Pembuang": pembuang,
            "&nbsp;&nbsp;&nbsp;&nbsp;Bangunan Pelengkap": p_irigasi1,
        },
        "Air Baku": {
            "&nbsp;&nbsp;&nbsp;&nbsp;Air Baku": airbaku,
        },

    };
    L.control.groupedLayers(baseLayers, groupedOverlays, {
        collapsed: true
    }).addTo(map);

    // Layer berat dimuat satu kali ketika pengguna benar-benar memilihnya.
    var lazyLayers = [
        { layer: kecamatan, name: 'kecamatan' },
        { layer: desa, name: 'desa' },
        { layer: uptd, name: 'uptd' },
        { layer: bendung, name: 'bendung' },
        { layer: irigasi, name: 'irigasi' },
        { layer: p_irigasi, name: 'p_irigasi' },
        { layer: sawah, name: 'sawah' },
        { layer: drainase, name: 'drainase' },
        { layer: pembuang, name: 'saluran_pembuang' },
        { layer: p_irigasi1, name: 'pelengkap_pembuang' },
        { layer: airbaku, name: 'sumur' }
    ];

    function loadLayerOnce(entry) {
        if (entry.loaded || entry.loading) return;
        entry.loading = true;

        $.ajax({
            url: '<?= base_url('Welcome/layer_di/') ?>' + entry.name,
            dataType: 'json',
            cache: true
        }).done(function (features) {
            entry.layer.addData(features || []);
            entry.loaded = true;
            lastZoomBucket = null;
            updateZoomStyles();
        }).fail(function () {
            if (map.hasLayer(entry.layer)) map.removeLayer(entry.layer);
            show_alert('Layer gagal dimuat. Silakan coba kembali.');
        }).always(function () {
            entry.loading = false;
        });
    }

    map.on('overlayadd', function (event) {
        for (var i = 0; i < lazyLayers.length; i++) {
            if (lazyLayers[i].layer === event.layer) {
                loadLayerOnce(lazyLayers[i]);
                break;
            }
        }
    });

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
         if(/^[a-zA-Z0-9- ]*$/.test(data) == true) {
            if(data != null){
                 clearTimeout(timmer);
                 timmer = setTimeout(function callback(){
                     $.ajax({
                            url: '<?php echo base_url('Welcome/cari/'); ?>'+data,
                            success: function(response)
                            {
                              jQuery('#pencari').html(response);  
                            }
                        });

                 }, 100);
            }
         }
    }
    var bendungIconCache = {};
    var pelengkapIconCache = {};
    var lastZoomBucket = null;

    function zoomBucket(zoom) {
        if (zoom <= 11) return 0;
        if (zoom <= 13) return 1;
        if (zoom <= 15) return 2;
        if (zoom <= 18) return 3;
        return 4;
    }

    function cachedBendungIcon(kondisi, bucket) {
        var key = kondisi + ':' + bucket;
        if (!bendungIconCache[key]) {
            var sizes = [[15, 17], [20, 23], [25, 27], [35, 38], [45, 48]];
            bendungIconCache[key] = L.icon({
                iconUrl: "<?= base_url('assets/images/') ?>" + getkondisi(kondisi),
                iconSize: sizes[bucket]
            });
        }
        return bendungIconCache[key];
    }

    function cachedPelengkapIcon(bucket) {
        if (!pelengkapIconCache[bucket]) {
            var sizes = [[7, 7], [10, 10], [12, 12], [20, 20], [35, 35]];
            pelengkapIconCache[bucket] = L.icon({
                iconUrl: "<?= base_url('assets/images/home.png') ?>",
                iconSize: sizes[bucket]
            });
        }
        return pelengkapIconCache[bucket];
    }

    function updateZoomStyles() {
        var zoom = map.getZoom();
        var bucket = zoomBucket(zoom);
        if (bucket === lastZoomBucket) return;
        lastZoomBucket = bucket;

        bendung.eachLayer(function (marker) {
            if (marker.setIcon && marker.feature) {
                marker.setIcon(cachedBendungIcon(marker.feature.properties.KONDISI, bucket));
            }
        });
        p_irigasi.eachLayer(function (marker) {
            if (marker.setIcon) marker.setIcon(cachedPelengkapIcon(bucket));
        });
    }

    map.on('zoomend', updateZoomStyles);
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
    div.innerHTML = labels.join(' ');
    return div;
};
legend_saluran.addTo(map);
var activeResultLayer = null;

function showFilteredResult(data, options, addToMap) {
    if (activeResultLayer && map.hasLayer(activeResultLayer)) {
        map.removeLayer(activeResultLayer);
    }
    activeResultLayer = L.geoJSON(data || [], options || {});
    if (addToMap !== false) activeResultLayer.addTo(map);
    var bounds = activeResultLayer.getBounds();
    if (bounds.isValid()) map.fitBounds(bounds, { padding: [24, 24], maxZoom: 16 });
}

function cari_iri(a,tabel,jns) {
     $.ajax({
            url: '<?= base_url('Welcome/cari_iri/') ?>' + a +'/' + tabel +'/'+jns,
            dataType: 'json',
            cache: true,
            success: function(msg) {
                showFilteredResult(msg, {}, true);
            }
        });
}
function cari_pel(a) {
     $.ajax({
            url: '<?= base_url('Welcome/cari_pel/') ?>' + a,
            dataType: 'json',
            cache: true,
            success: function(msg) {
                showFilteredResult(msg, {}, true);
            }
        });
}
function cari_sp(a) {
    alert('tes')
}
function cari_di(a) {
    $.ajax({
        url: '<?= base_url('Welcome/cari_di/') ?>' + a,
        dataType: 'json',
        cache: true,
        success: function(msg) {
            showFilteredResult(msg, {}, true);
        }
    });
}
function jalankan_filter() {
    var kategoriVal = $('#kategori').val();
    var filterContainer = "";
    var filterValue = "";
    
    // Reset Alert
    $('#alert-container').hide();
    
    // 1. Validasi Wilayah
    var isKec = $('#type-kec').is(':checked');
    var rootWil = isKec ? $('#kecamatan_nya').val() : $('#uptd_nya').val();
    var childWil = isKec ? $('#desa_nya').val() : $('#kemantren_nya').val();
    
    if(!rootWil || rootWil == "Semua") {
        show_alert("Silahkan pilih " + (isKec ? "Kecamatan" : "UPTD") + " terlebih dahulu.");
        return;
    }

    // 2. Validasi Kategori
    if(!kategoriVal) {
        show_alert("Silahkan pilih Kategori Data (misal: Bendung atau Irigasi).");
        return;
    }

    // 3. Validasi & Jalankan berdasarkan Kategori
    switch(kategoriVal) {
        case 'bendung':
            filterValue = $('#di_nya').val();
            if(!filterValue) return show_alert("Silahkan pilih Daerah Irigasi.");
            cari_di(filterValue);
            break;
        case 'irigasi':
            filterValue = $('#sal_iri').val();
            if(!filterValue) return show_alert("Silahkan pilih Saluran Irigasi.");
            cari_iri(filterValue, 'irigasi', 'MultiLineString');
            break;
        case 'saluran_pembuang':
            filterValue = $('#sp_nya').val();
            if(!filterValue) return show_alert("Silahkan pilih Saluran Pembuang.");
            cari_iri(filterValue, 'saluran_pembuang', 'MultiLineString');
            break;
        case 'drainase':
            filterValue = $('#drainase_nya').val();
            if(!filterValue) return show_alert("Silahkan pilih Data Drainase.");
            cari_iri(filterValue, 'drainase', 'MultiLineString');
            break;
        case 'p_irigasi':
            filterValue = $('#pel_iri').val();
            if(!filterValue) return show_alert("Silahkan pilih Bangunan Pelengkap Irigasi.");
            cari_iri(filterValue, 'p_irigasi', 'Point');
            break;
        default:
            show_alert("Kategori belum didukung.");
    }
}

function show_alert(msg) {
    $('#alert-msg').html(msg);
    $('#alert-container').fadeIn();
    // Auto hide after 5 seconds
    setTimeout(function() {
        $('#alert-container').fadeOut();
    }, 5000);
}

function kategori_select(a) {
    di = document.getElementById('di');
    sp = document.getElementById('sp');
    pp = document.getElementById('pel_pembuang');
    dr = document.getElementById('drainase');
    ab = document.getElementById('air_baku');
    
    // Always call load category data to populate nested dropdowns if needed
    // But we don't trigger the map update here anymore
    
    if (a == 'bendung' || a == 'irigasi' || a == 'p_irigasi') {
        di.style.display="block";
        sp.style.display="none";
        pp.style.display="none";
        dr.style.display="none";
        ab.style.display="none";
    }else if(a=='saluran_pembuang'){
        di.style.display="none";
        sp.style.display="block";
        pp.style.display="none";
        dr.style.display="none";
        ab.style.display="none";
    }else if(a == 'pelengkap_pembuang') {
        di.style.display="none";
        sp.style.display="none";
        pp.style.display="block";
        dr.style.display="none";
        ab.style.display="none";
    }else if (a == 'drainase') {
        di.style.display="none";
        sp.style.display="none";
        pp.style.display="none";
        dr.style.display="block";
        ab.style.display="none";
    }else if (a =='air_baku') {
        di.style.display="none";
        sp.style.display="none";
        pp.style.display="none";
        dr.style.display="none";
        ab.style.display="block";
    }
}

function load_additional_category_data(a) {
    var kat = $('#kategori').val();
    var sal = document.getElementById('saluran_irigasi');
    var pel = document.getElementById('pelengkap_irigasi');
    
    if(kat == 'irigasi') {
        sal.style.display="block";
        pel.style.display="none";
        $.ajax({
            url: "<?= base_url('Welcome/cari_irigasi/') ?>"+parseInt(a), 
            success: function(response) {
                $("#sal_iri").empty().append(response);
            }
        });
    } else if(kat == 'p_irigasi') {
        sal.style.display="none";
        pel.style.display="block";
        $.ajax({
            url: "<?= base_url('Welcome/cari_pirigasi/') ?>"+parseInt(a), 
            success: function(response) {
                $("#pel_iri").empty().append(response);
            }
        });
    }
}

function prepare_specific_data(val) {
    // When region changes, we might need to refresh category options
    // But we don't trigger map update
    var kat = $('#kategori').val();
    if(kat == 'bendung' || kat == 'irigasi' || kat == 'p_irigasi') {
        cari_di_desa(val);
    }
}


function wil(b) {
    kecamatan = document.getElementById('kecamatan');
    uptd = document.getElementById('uptd');
    desa = document.getElementById('desa');
    kemantren = document.getElementById('kemantren');
     if (b == 'kecamatan') {
        kecamatan.style.display="block";
        desa.style.display="block";
        kemantren.style.display="none";
        uptd.style.display="none";
    }else{
        kecamatan.style.display="none";
        desa.style.display="none";
        kemantren.style.display="block";
        uptd.style.display="block";
    }
}

function cari_desa(a) {
   
   $.ajax({
    url: "<?= base_url('Welcome/cari_desa1/') ?>"+parseInt(a), 
     success: function(response)
        {
          
            $("#desa_nya").empty();
            $("#desa_nya").append(response);
           
        }
   });
}
function cari_kemantren(a) {
   
   $.ajax({
    url: "<?= base_url('Welcome/cari_kemantren1/') ?>"+parseInt(a), 
     success: function(response)
        {
         
            $("#kemantren_nya").empty();
            $("#kemantren_nya").append(response);
           
        }
   });
}
 function gayakec1(feature) {
        return {
            color: "white",
            weight: 3,
            opacity: 1,
            fillOpacity: 0
        };
    }
    
function cari_di_desa(a) {
   var bd='';
    kategori1 = document.getElementById('kategori').value;
    if (kategori1 == 'bendung' || kategori1 =='irigasi' || kategori1 == 'p_irigasi') {
         $.ajax({
            url: "<?= base_url('Welcome/cari_di_desa/') ?>"+parseInt(a), 
            success: function(response)
                {
                    $("#di_nya").empty();
                    $("#di_nya").append(response);
                }
        });
    }else{
        var jenis = 'pembuang';
        $.ajax({
                url: '<?= base_url('Welcome/cari_desa/') ?>' + parseInt(a) + '/' + jenis,
                success: function(msg) {
                
                    var geojsonFeature = JSON.parse(msg);
                    var on = { style: gayakec1};
                    bd = L.geoJSON(geojsonFeature, on);
                    //bd.addTo(map);
                    map.fitBounds(bd.getBounds());
                }
            });
    }
}
function cari_di_kemantren(a) {
  
    kategori1 = document.getElementById('kategori').value;
     if (kategori1 == 'bendung' || kategori1 =='irigasi' || kategori1 == 'p_irigasi') {
         $.ajax({
            url: "<?= base_url('Welcome/cari_di_kemantren/') ?>"+parseInt(a), 
            success: function(response)
                {
                 
                    $("#di_nya").empty();
                    $("#di_nya").append(response);
                }
        });
    }
}

</script>
