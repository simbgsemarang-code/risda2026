<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Meta -->
<meta name="description" content="Responsive Bootstrap Admin Dashboards">
<meta name="author" content="Bootstrap Gallery">
<link rel="shortcut icon" href="<?= base_url('assets/img/sampah2.png') ?>" />

<!-- Title -->
<title>Admin RISDA</title>



<!-- *************
			************ Common Css Files *************
		************ -->
<!-- Bootstrap css -->
<link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
<!-- Icomoon Font Icons css -->
<link rel="stylesheet" href="<?= base_url('assets/fonts/style.css') ?>">
<!-- Main css -->
<link rel="stylesheet" href="<?= base_url('assets/css/main.min.css') ?>">
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

<!-- *************
			************ Vendor Css Files *************
		************ -->
<link rel="stylesheet" href="<?= base_url('vendor/datatables/dataTables.bs4.css') ?>" />
<link rel="stylesheet" href="<?= base_url('vendor/datatables/dataTables.bs4-custom.css') ?>" />
<link href="<?= base_url('vendor/datatables/buttons.bs.css') ?>" rel="stylesheet" />

<link rel="stylesheet" href="<?= base_url('vendor/datepicker/css/classic.css') ?>" />
<link rel="stylesheet" href="<?= base_url('vendor/datepicker/css/classic.date.css') ?>" />
<link rel="stylesheet" href="<?= base_url('assets/css/select2.min.css') ?>">
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<!-- Prism css -->
<link rel="stylesheet" href="<?= base_url('vendor/prism/prism.css') ?>" />


<style>
	.dropdown-submenu {
		position: relative;
		padding: 10px;
	}

	.dropdown-submenu .dropdown-menu {
		top: 0;
		left: 100%;
		margin-top: -1px;
		padding: 10px;

		font-size: 15px;
	}

	.label_kec {
		width: auto;
		height: auto;
		font-size: 10px;

		border-color: none;

		border-width: 0;

		background: rgba(255, 255, 255, 0.0);

		font-weight: bold;

		text-shadow: -1px 0 red, 0 1px black, 1px 0 red, 0 -1px red;

		color: white;
	}


    .label_kec {
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
</style>