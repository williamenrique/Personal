<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= $data['page_title']?></title>
	<link rel="stylesheet" href="<?= PLUGINS?>sweetalert/sweetalert2.css">
	<link rel="stylesheet" href="<?= CSS_VENDORS?>style-starter.css">
</head>

<body class="sidebar-menu-collapsed">
	<div class="se-pre-con"></div>
	<?php
require_once 'sidebar.php';
require_once 'header-nav.php';
?>