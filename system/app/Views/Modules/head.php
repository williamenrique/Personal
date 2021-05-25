<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
		<meta name="author" content="William Infante">
		<meta name="keywords"
			content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">
		<title><?= $data['page_title']?></title>
		<link rel="shortcut icon" href="<?= IMG?>icon.png" />
		<link href="<?= PLUGINS?>bootstrap-select-1.13.14/css/bootstrap-select.min.css" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="<?= CSS?>bootstrap.css">
		<!-- <link rel="stylesheet" href="<?= PLUGINS?>iconly/bold.css"> -->
		<link rel="stylesheet" href="<?= PLUGINS?>perfect-scrollbar/perfect-scrollbar.css">
		<!-- <link rel="stylesheet" href="<?= PLUGINS?>bootstrap-icons/bootstrap-icons.css"> -->
		<!-- <link rel="stylesheet" href="<?= PLUGINS?>fontawesome/all.min.css"> -->
		<link rel="stylesheet" href="<?= PLUGINS?>DataTable/dataTables.bootstrap5.min.css">
		<link rel="stylesheet" href="<?= CSS?>style.css">
		<link rel="stylesheet" href="<?= CSS?>app.css">
		<link rel="stylesheet" href="<?= PLUGINS?>FullCalendar/main.min.css">
		<script src="<?= PLUGINS?>FullCalendar/main.min.js"></script>
		<script src="<?= PLUGINS?>FullCalendar/es.js"></script>
		<script src="<?= PLUGINS?>FullCalendar/locales-all.min.js"></script>
		<!-- <script src="<?= JS?>paginador.js"></script> -->
		<!-- <script src="<?= JS?>function.paginator.js"></script> -->
	</head>

	<body>
		<div id="app">
			<?php include "sidebar.php";?>
			<div id="main" class='layout-navbar'>
				<?php include 'nav.php'?>
				<div id="main-content">