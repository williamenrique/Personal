<!DOCTYPE html>
<html lang="es">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<!-- Required meta tags -->

	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title><?= $data['page_title']?></title>
	<!-- plugins:css -->
	<!-- <link rel="stylesheet" href="<?= PLUGINS?>materialdesignicons.min.css">
	<link rel="stylesheet" href="<?= PLUGINS?>font-awesome.min.css">
	<link rel="stylesheet" href="<?= PLUGINS?>simple-line-icons.css"> -->
	<link rel="stylesheet" href="<?= PLUGINS?>feather.css">
	<link rel="stylesheet" href="<?= PLUGINS?>vendor.bundle.base.css">
	<!-- endinject -->
	<!-- inject:css -->
	<link rel="stylesheet" href="<?= PLUGINS?>dataTable/dataTables.bootstrap4.css">
	<link rel="stylesheet" href="<?= PLUGINS?>style.css">
	<!-- endinject -->
	<link rel="shortcut icon" href="<?= IMG?>logo-mini.svg">

</head>

<body style="" class="sidebar-fixed">
	<div class="container-scroller">
		<!-- navbar-->
		<?php require_once 'nav.php'?>
		<div class="container-fluid page-body-wrapper">
			<!-- skin -->
			<?php // require_once 'skin.php'?>
			<!-- sidebar-rigt -->
			<?php require_once 'sidebar-rigth.php'?>
			<!-- sidebar menu -->
			<?php require_once 'navSidebar.php'?>
			<!-- partial -->
			<div class="main-panel">
				<div class="content-wrapper">