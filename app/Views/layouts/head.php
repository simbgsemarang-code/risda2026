<head>
    <meta charset="utf-8">
    <?php 
        $page_title = isset($title) && $title !== '' ? $title : (isset($Judul) && $Judul !== '' ? $Judul : '');
        $final_title = $page_title !== '' ? $page_title . ' - RISDA CILACAP' : 'RISDA CILACAP - Ruang Informasi Sumber Daya Air';
    ?>
    <title><?php echo $final_title; ?></title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- SEO Meta Tags -->
    <meta name="description" content="RISDA (Ruang Informasi Sumber Daya Air) Kabupaten Cilacap menyediakan data infrastruktur air seperti bendung, irigasi, dan drainase secara digital dan transparan.">
    <meta name="keywords" content="RISDA, Cilacap, Sumber Daya Air, Infrastruktur, Irigasi, Bendung, Drainase, Peta Digital, Cilacap Bercahaya">
    <meta name="author" content="Pemerintah Kabupaten Cilacap">
    <link rel="canonical" href="<?= base_url(uri_string()) ?>">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?= base_url(uri_string()) ?>">
    <meta property="og:title" content="<?php echo $final_title; ?>">
    <meta property="og:description" content="Akses data infrastruktur sumber daya air Kabupaten Cilacap secara interaktif melalui Peta Digital RISDA.">
    <meta property="og:image" content="<?= base_url('assets/images/logo.png') ?>">
    <meta property="og:site_name" content="RISDA CILACAP">

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="<?= base_url(uri_string()) ?>">
    <meta name="twitter:title" content="<?php echo $final_title; ?>">
    <meta name="twitter:description" content="Akses data infrastruktur sumber daya air Kabupaten Cilacap secara interaktif melalui Peta Digital RISDA.">
    <meta name="twitter:image" content="<?= base_url('assets/images/logo.png') ?>">

    <!-- favicon
    ============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url('assets/images/favicon.png') ?>">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Poppins:wght@300;400;500;600;700;800&family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=Inter:slnt,wght@-10..0,100..900&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link rel="stylesheet" href="<?= base_url('assets/css/animate.min.css') ?>" />
    <link href="<?= base_url('assets/css/lightbox.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/owl.carousel.min.css') ?>" rel="stylesheet">


    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?=base_url('assets/css/bootstrap.min.css')?>" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="<?= base_url('assets/css/style.css') ?>" rel="stylesheet">

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <link rel="stylesheet" href="<?= base_url('assets/css/leaflet.groupedlayercontrol.css') ?>" />
    <script src="<?= base_url('assets/js/leaflet.groupedlayercontrol.js') ?>"></script>
    <script src="<?= base_url('assets/js/Control.FullScreen.js') ?>"></script>
    <link rel="stylesheet" href="<?= base_url('assets/css/Control.FullScreen.css') ?>" />
    <link rel="stylesheet" href="https://api.tiles.mapbox.com/mapbox.js/plugins/leaflet-locatecontrol/v0.43.0/L.Control.Locate.css">
    <script src="https://api.tiles.mapbox.com/mapbox.js/plugins/leaflet-locatecontrol/v0.43.0/L.Control.Locate.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet-easybutton@2/src/easy-button.css">
    <script src="https://cdn.jsdelivr.net/npm/leaflet-easybutton@2/src/easy-button.js"></script>
    <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>

    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.4/css/dataTables.bootstrap4.css" />
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
   
    <script src="https://cdn.datatables.net/2.3.4/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.3.4/js/dataTables.bootstrap4.js"></script>
    <link rel="stylesheet" href="<?=base_url('assets/css/select2.min.css')?>">



<style>
	
			@font-face {
			font-family: 'Heavitas';
			src: url('assets/fonts/Heavitas.ttf') format('truetype');
			font-weight: normal;
			font-style: normal;
		}

		.text-title {
			font-family: 'Heavitas', 'Arial', sans-serif!important;
			font-weight: normal!important;
		}
    .label_kec {
        height: auto;
        font-size: 12px;
        border-color: none;
        border-width: 0;
        background: rgba(255, 255, 255, 0.0);
        font-weight: bold;
        text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;
        color: white;
    }

    .label_kec1 {
        width: auto;
        height: auto;
        font-size: 12px;
        border-color: none;
        border-width: 0;
        background: rgba(255, 255, 255, 0.0);
        font-weight: bold;
        text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;
        color: white;
    }

    .label_upt {
        width: auto;
        height: auto;
        font-size: 14px;
        border-color: none;
        border-width: 0;
        background: rgba(255, 255, 255, 0.0);
        font-weight: bold;
        text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;
        color: white;
    }

    .label_des {
        display: none;
        width: auto;
        height: auto;
        font-size: 6px;
        border-radius: 1px;
        border-color: none;
        border-width: 0;
        background: rgba(255, 255, 255, 0.0);
        font-weight: bold;
        color: rgba(255, 255, 255, 0.8);
    }
    .label_kondisi {
        display: none;
        width: auto;
        height: auto;
        font-size: 6px;
        border-radius: 1px;
        border-color: none;
        border-width: 0;
        background: rgba(255, 255, 255, 0.0);
        font-weight: bold;
        color: rgba(255, 255, 255, 0.8);
    }
    .info {
        padding: 6px 8px;
        font: 14px/16px Arial, Helvetica, sans-serif;
        background: white;
        background: rgba(255, 255, 255, 0.8);
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
        border-radius: 5px;
    }

    .info h4 {
        margin: 0 0 5px;
        color: #777;
    }

    .legend {
        text-align: left;
        line-height: 18px;
        color: #555;
    }

    .legend i {
        width: 18px;
        height: 18px;
        float: left;
        margin-right: 8px;
        opacity: 0.7;
    }

    .legend1 {
        text-align: left;
        line-height: 18px;
        color: #555;
    }

    .legend i {
        width: 18px;
        height: 18px;
        float: left;
        margin-right: 8px;
        opacity: 0.7;
    }
</style>
</head>