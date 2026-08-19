<style>
.di-search-wrap { position: relative; display: block; width: 100%; min-width: 0; }
.di-search-wrap #search { display: block; width: 100%; max-width: 100%; min-width: 0; padding-right: 2.75rem !important; box-sizing: border-box; }
.di-search-clear { position: absolute; top: 50%; right: .35rem; transform: translateY(-50%); z-index: 2; width: 2.25rem; height: 2.25rem; padding: 0; }
</style>
<div class="container-fluid bg-light about pt-4 pb-4">
    <div class="container pt-2 pb-3">
        <!-- Page Title & Description -->
        <div class="text-center mx-auto pb-4 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
            <h1 class="display-4 text-success text-uppercase">Peta Daerah Irigasi</h1>
            <p class="mb-0 text-dark">Sistem informasi geografis yang menyajikan data spasial, jaringan infrastruktur, dan informasi terpadu terkait seluruh Daerah Irigasi di wilayah Kabupaten Cilacap.</p>
        </div>

        <div class="row g-4">
            <div class="col-xl-3 wow fadeInLeft" data-wow-delay="0.2s">
                <div class="about-item-content bg-white rounded p-4 h-100 shadow-sm border-0">
                    <h4 class="text-success mb-4" style="border-bottom: 2px solid rgba(25,135,84,0.1); padding-bottom: 10px;"><i class="fas fa-search me-2"></i>Pencarian</h4>

                    <div class="di-search-wrap mb-3">
                        <input type="text" id="search" class="form-control rounded-pill border-0 bg-light px-4 py-2" onkeyup="add_item(this.value)" placeholder="Ketik kata kunci...">
                        <button onclick="bersih()" type="button" class="di-search-clear btn bg-transparent border-0 text-muted" aria-label="Bersihkan pencarian">
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
                        <i class="fas fa-table me-2"></i>Data Daerah Irigasi
                    </h4>
                    <div class="row g-4 justify-content-center">
                        <div class="col-12">
                            <div class="table-responsive rounded bg-light p-3" style="border: 1px solid rgba(0,0,0,0.05);">
                              <table id="example" class="table table-striped table-hover table-bordered align-middle w-100">
                                <thead class="table-success text-center">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama DI</th>
                                        <th>Desa</th>
                                        <th>Kecamatan</th>
                                        <th>Kemantren</th>
                                        <th>UPTD</th>
                                        <th>DETAIL</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=1;
                                    foreach($bendung1 as $b) { ?>
                                    <tr>
                                        <td class="text-center"><?=$i?></td>
                                        <td class="fw-bold text-success"><?=$b->NAMA_DI?></td>
                                        <td><?=$b->DESA?></td>
                                        <td><?=$b->KECAMATAN?></td>
                                        <td><?=$b->KEMANTREN?></td>
                                        <td><?=$b->UPTD?></td>
                                        <td class="text-center"><a href="<?=base_url('Detail/bendung/'.$b->id)?>" class="btn btn-sm btn-success rounded-pill px-3 shadow-sm"><i class="fas fa-eye me-1"></i> Detail</a></td>
                                    </tr>
                                    <?php $i++;} ?>
                                </tbody>
                            </table>
                            </div>
                        </div>
                        
                        <!-- Statistik Widget -->
                        <div class="col-sm-6 col-lg-3 mt-4">
                            <div class="counter-item bg-light rounded p-4 h-100 shadow-sm text-center border-0 transition-hover" style="border-bottom: 4px solid #198754 !important;">
                                <div class="counter-counting mb-2">
                                    <span class="text-success fs-1 fw-bold" data-toggle="counter-up"><?=$jml[0]?></span>
                                </div>
                                <h6 class="mb-0 text-dark text-uppercase letter-spacing-1">Bendung</h6>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3 mt-4">
                            <div class="counter-item bg-light rounded p-4 h-100 shadow-sm text-center border-0 transition-hover" style="border-bottom: 4px solid #198754 !important;">
                                <div class="counter-counting mb-2">
                                    <span class="text-success fs-1 fw-bold" data-toggle="counter-up"><?=$jml[1]?></span>
                                </div>
                                <h6 class="mb-0 text-dark text-uppercase letter-spacing-1">Saluran Irigasi</h6>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3 mt-4">
                            <div class="counter-item bg-light rounded p-4 h-100 shadow-sm text-center border-0 transition-hover" style="border-bottom: 4px solid #198754 !important;">
                                <div class="counter-counting mb-2">
                                    <span class="text-success fs-1 fw-bold" data-toggle="counter-up"><?=$jml[2]?></span>
                                </div>
                                <h6 class="mb-0 text-dark text-uppercase letter-spacing-1">Bangunan Pelengkap</h6>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3 mt-4">
                            <div class="counter-item bg-light rounded p-4 h-100 shadow-sm text-center border-0 transition-hover" style="border-bottom: 4px solid #198754 !important;">
                                <div class="counter-counting mb-2">
                                    <span class="text-success fs-1 fw-bold" data-toggle="counter-up"><?=$jml[3]?></span>
                                </div>
                                <h6 class="mb-0 text-dark text-uppercase letter-spacing-1">Sawah</h6>
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

    function popbendung(f, l) {
        var out = [];
        var foto = f.properties['Photo1'];
        if (f.properties) {
            out.length = 0;
            out.push('Nama Bendung : ' + f.properties['NAMA_BENDU']);
            out.push('Daerah Irigasi : ' + f.properties['NAMA_DI']);
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
        if (v == 'Baik Sekali') {
            var h = 'baik_sekali.png';
        }else if(v == 'Baik') {
            var h = 'baik.png';
        }else if(v=='Sedang') {
            var h = 'sedang.png';
        }else{
            var h = 'buruk.png';
        }      
        return h;
    }
    function getirigasi(v) {
        if (v == 'Baik Sekali') {
            var h = '#3B72BE';
        }else if(v == 'Baik') {
            var h = '#008000';
        }else if(v=='Sedang') {
            var h = '#FFFF00';
        }else{
            var h = '#FF0000';
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
    function gaya_irigasi(feature) {
        return {
            color: getirigasi(feature.properties['KONDISI']),
            weight: 4,
            fillOpacity: 1,
            Opacity: 1,

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
         onEachFeature:popirigasi,
        style: gaya_irigasi,
    });
    var p_irigasi = L.geoJSON([<?= $p_irigasi ?>], {
        pointToLayer: point_p_irigasi,
        onEachFeature:poppembuang1
    });
    var sawah = L.geoJSON([<?= $sawah ?>], {
        style: gayasawah,
        onEachFeature: popUp_sawah
    });
    var desa = L.geoJSON([<?= $desa ?>], {
       style: gayakec,
        onEachFeature: des
    });
    var map = L.map('map', {
        center: [-7.417989, 109.005913],
        zoom: 10,
        fullscreenControl: true,
        fullscreenControlOptions: {
            position: 'topleft'
        },
        layers: [googleSat, kecamatan,  bendung]
    });

	// Index marker yang sudah dimuat agar klik hasil pencarian langsung fokus.
	var bendungByIrigasi = Object.create(null);
	bendung.eachLayer(function (layer) {
		if (!layer.feature || !layer.feature.properties) return;
		var key = String(layer.feature.properties.id_di);
		if (!bendungByIrigasi[key]) bendungByIrigasi[key] = [];
		bendungByIrigasi[key].push(layer);
	});

	function focusIrigasi(id) {
		var layers = bendungByIrigasi[String(id)] || [];
		if (!layers.length) return;
		if (!map.hasLayer(bendung)) map.addLayer(bendung);
		map.stop();
		if (layers.length === 1 && layers[0].getLatLng) {
			map.setView(layers[0].getLatLng(), 16, {animate: false});
			layers[0].openPopup();
		} else {
			map.fitBounds(L.featureGroup(layers).getBounds(), {padding: [25, 25], maxZoom: 16, animate: false});
		}
	}
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

    };
    L.control.groupedLayers(baseLayers, groupedOverlays, {
        collapsed: true
    }).addTo(map);

	var lazyLayers = [
		{layer: desa, name: 'desa'},
		{layer: uptd, name: 'uptd'},
		{layer: irigasi, name: 'irigasi'},
		{layer: p_irigasi, name: 'p_irigasi'},
		{layer: sawah, name: 'sawah'}
	];

	map.on('overlayadd', function (event) {
		var item = lazyLayers.find(function (candidate) { return candidate.layer === event.layer; });
		if (!item || item.loaded || item.loading) return;
		item.loading = true;
		fetch('<?= base_url('Welcome/layer_di/') ?>' + item.name, {credentials: 'same-origin'})
			.then(function (response) {
				if (!response.ok) throw new Error('Layer gagal dimuat');
				return response.json();
			})
			.then(function (features) {
				item.layer.addData(features);
				item.loaded = true;
			})
			.catch(function () {
				map.removeLayer(item.layer);
				alert('Data peta belum dapat dimuat. Silakan coba lagi.');
			})
			.finally(function () { item.loading = false; });
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
	var searchRequest = null;
    function add_item(data){
         if(/^[a-zA-Z0-9- ]*$/.test(data) == true) {
            if(data != null){
                 clearTimeout(timmer);
				 timmer = setTimeout(function callback(){
					 if (searchRequest) searchRequest.abort();
					 searchRequest = $.ajax({
							url: '<?php echo base_url('Welcome/cari/'); ?>'+encodeURIComponent(data || 'semua'),
                            success: function(response)
                            {
                              jQuery('#pencari').html(response);  
                            }
                        });

				 }, 300);
            }
         }
    }
    map.on('zoomend', onZoomend1);
	var bendungIconCache = Object.create(null);
	function scaledBendungIcon(kondisi, size) {
		var key = kondisi + ':' + size[0] + 'x' + size[1];
		if (!bendungIconCache[key]) {
			bendungIconCache[key] = L.icon({
				iconUrl: "<?= base_url('assets/images/') ?>" + getkondisi(kondisi),
				iconSize: size
			});
		}
		return bendungIconCache[key];
	}
    function onZoomend1(feature, layer) {
        var currentZoom = map.getZoom();
        var tooltip = $('.label_des');
        var tooltipdes = $('.label_des');
		var size = currentZoom <= 11 ? [15, 17]
			: currentZoom === 12 ? [20, 23]
			: currentZoom <= 15 ? [25, 27]
			: currentZoom === 16 ? [30, 33]
			: currentZoom <= 18 ? [35, 38]
			: currentZoom === 19 ? [40, 43] : [45, 48];
		tooltip.css('display', currentZoom < 14 ? 'none' : 'block');
		if (currentZoom >= 14) tooltip.css('font-size', Math.min(14.5, 12 + ((currentZoom - 14) * 0.5)));
        bendung.eachLayer(function(bendung) {
            var kondisi = bendung.feature.properties.KONDISI;
			bendung.setIcon(scaledBendungIcon(kondisi, size));
        });
        p_irigasi.eachLayer(function(p_irigasi) {
          
           
            var Url_nya = "<?= base_url('assets/images/home.png') ?>" ;
            var Icon0 = L.icon({
                iconUrl: Url_nya,
                iconSize: [7, 7],
            });
            var Icon = L.icon({
                iconUrl: Url_nya,
                iiconSize: [8, 8],
            });
            var Icon1 = L.icon({
                iconUrl: Url_nya,
                iconSize: [10, 10],
            });
            var Icon2 = L.icon({
                iconUrl: Url_nya,
                iconSize: [12, 12],
            });
            var Icon3 = L.icon({
                iconUrl: Url_nya,
                iconSize: [15, 15],
            });
            var Icon4 = L.icon({
                iconUrl: Url_nya,
                iconSize: [20, 20],
            });
            var Icon5 = L.icon({
                iconUrl: Url_nya,
                iconSize: [30, 30],
            });
            var Icon6 = L.icon({
                iconUrl: Url_nya,
                iconSize: [35, 35],
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
            
            if (currentZoom == 14) {
                p_irigasi.setIcon(Icon2);
            }
            if (currentZoom == 15) {
                p_irigasi.setIcon(Icon2);
            }
            if (currentZoom == 16) {
                p_irigasi.setIcon(Icon3);
            }
            if (currentZoom == 17) {
                p_irigasi.setIcon(Icon4);
            }
            if (currentZoom == 18) {
                p_irigasi.setIcon(Icon4);
            }
            if (currentZoom == 19) {
                p_irigasi.setIcon(Icon5);
            }
            if (currentZoom >= 20) {
                p_irigasi.setIcon(Icon6);
            }
        });
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
    var grades = ["&nbsp;&nbsp;Baik Sekali", "&nbsp;&nbsp;Baik", "&nbsp;&nbsp;Sedang", "&nbsp;&nbsp;Buruk",];
    var labels = ["<b>Legenda Kondisi</b><br>"];
    var from, to;
    labels.push('<img src="<?= base_url('assets/images/baik_sekali.png') ?>" width="20px">' + grades[0]);
    labels.push('<img src="<?= base_url('assets/images/baik.png') ?>" width="20px">' + grades[1]);
    labels.push('<img src="<?= base_url('assets/images/sedang.png') ?>" width="20px">' + grades[2]);
    labels.push('<img src="<?= base_url('assets/images/buruk.png') ?>" width="20px">' + grades[3]);                       
    div.innerHTML = labels.join(' ');
    return div;
};
legend_saluran.addTo(map);
	
new DataTable('#example');
</script>
