<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>TEST IT</title>
	<link rel="shortcut icon" href="asset/favicon.webp">  
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<!--  -->
	<!-- animation css cdn -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
	<!--  -->
	<!-- css -->
	<style type="text/css">
		@import "asset/all-style.css";
	</style>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body>
	<div class="nav-1">
		<div class="hero-bg">
			<div class="hero-bg-on"><a href="index.php" onmouseover="nav(this)" onmouseout="stop(this)"><i class="fa-brands fa-cloudscale" id="nav"></i></a></div>
			<div class="hero-bg-off">
				<span></span>
				<a onclick="tampil()" id="rubber"><i class="fa-solid fa-notes-medical"></i></a>
				<span></span>
				<a href="Report_Mutasi.php"><i class="fa-solid fa-database"></i></a>
			</div>
		</div>
	</div>
	<div class="hero-bg-menu" id="menu">
		<div class="span-top"></div>
		<div class="span-left-right" id="menu-LR">
			<div></div>
			<div class="span"></div>
			<div></div>
			<div class="span"></div>
			<div></div>
		</div>
		<div class="content-menu" id="content-menu">
			<div class="menu">
				<a href="Input_Barang.php"><i class="fa-solid fa-pen-to-square"></i> Input Barang</a>
				<a href="Input_Mutasi.php"><i class="fa-solid fa-pen-to-square"></i> Input Mutasi</a>
			</div>
			<div class="hiden-menu">
				<a onclick="hidenMenu()">
					<i class="fa-solid fa-angles-left fa-fade" id="arow"></i>
				</a>
			</div>
			<div class="span"></div>
		</div>
	</div>
	<div class="header-bg">
		<strong>TEST IT |<i> System</i></strong>
		<div class="users">
			<div class="name">JUWAN </div>
			<div class="images-user">
				<img src="asset/favicon.webp" alt="">
				<a onclick="showInfo()" id="showInfo" class="view-profil"><i class="fa-solid fa-square-caret-down"></i></a>
			</div>
		</div>
	</div>
	<div class="show-info" id="info-profil">
		<div class="span-info"><a onclick="hideInfo()" class="exit-profil"><i class="fa-solid fa-arrow-up-right-from-square"></i></a></div>
		<div class="span-info-RL" id="span-info-RL">
			<div class="span-top-buttom"></div>
			<span></span>
			<div class="span-top-buttom"></div>
		</div>
		<div class="span-info-conten" id="span-info-conten">
			<div class="text">
				<strong>MUHAMMAD MAJUWAN SIREGAR</strong>
				<p>Test It</p>
			</div>
		</div>
	</div>