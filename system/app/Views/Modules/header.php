<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= $data['page_title']?></title>
	<link rel="stylesheet" href="<?= PLUGINS?>sweetalert/sweetalert2.css">
	<link rel="stylesheet" href="<?= CSS?>styles.main.css">
	<link rel="stylesheet" href="<?= CSS_VENDORS?>style-starter.css">

	<link rel="stylesheet" href="<?= PLUGINS?>dataTable/datatables.min.css" />
	<!-- <link rel="stylesheet" href="<?= PLUGINS?>dataTable/css/dataTables.bootstrap4.min.css" />
	<link rel="stylesheet" href="<?= PLUGINS?>dataTable/css/responsive.bootstrap4.min.css" />
	<link rel="stylesheet" href="<?= PLUGINS?>dataTable/css/jquery.dataTables.min.css" /> -->
</head>

<body class="sidebar-menu-collapsed">
	<div class="se-pre-con"></div>
	<?php
require_once 'sidebar.php';
require_once 'header-nav.php';
?>