<?php

include('fungsi.php');
include_once "library/database.php";

session_start();
if (cek_login() == false) {
	echo "<script>window.alert('Anda harus login dulu!');
					window.location.href=('index.php')
		   </script>";
	exit();
}

if (!isset($_SESSION['id_user'])) {
	header("location: index.php");
	exit;
}

?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>Selamat Datang - Agenda KAMMI UIN SUKA</title>

	<!-- 

Sentra Template

http://www.templatemo.com/tm-518-sentra

-->
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="apple-touch-icon" href="assets/apple-touch-icon.png">

	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="assets/css/fontAwesome.css">
	<link rel="stylesheet" href="assets/css/light-box.css">
	<link rel="stylesheet" href="assets/css/owl-carousel.css">
	<link rel="stylesheet" href="assets/css/templatemo-style.css">

	<!-- Favcon -->
	<link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
	<link rel="manifest" href="site.webmanifest">

	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">

	<script src="assets/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
</head>

<body>



	<header class="nav-down responsive-nav hidden-lg hidden-md">
		<!-- untuk memanggil header.php-->
		<?php require_once "header.php"; ?>
	</header>

	<div class="sidebar-navigation hidde-sm hidden-xs">
		<!-- untuk memanggil sidebar.php-->
		<?php require_once "sidebar.php"; ?>
	</div>

	<div class="slider">
		<!-- untuk memanggil slider.php-->
		<?php require_once "slider.php"; ?>
	</div>


	<div class="page-content">
		<section id="featured" class="content-section">
			<div class="row">
				<div class="col-lg-12 page-header">
					<div class="section-heading">
						<div class="row">
							<div class="col-md-6">
								<h1>Agenda Kegiatan<br><em>KAMMI UIN SUKA</em></h1>
							</div>
							<div class="col-md-6">
								<p>Berikut adalah agenda KAMMI UIN SUKA
									<br>untuk satu bulan kedepan.
								</p>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-12">
					<div class="table-responsive">
						<table class="table table-condesed table-bordered table-hover">
							<thead>
								<tr>
									<th>No</th>
									<th>Nama Kegiatan</th>
									<th>Waktu</th>
									<th>Tanggal</th>
									<th>Keterangan</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$i = 1;
								$tampil = $koneksi->prepare("SELECT id_agenda,nama_kegiatan, jam_mulai, jam_akhir, tgl_mulai,tgl_akhir, keterangan from data_agenda where tgl_mulai = CURDATE()");
								$tampil->execute();
								$tampil->store_result();
								$tampil->bind_result($id, $nama_kegiatan, $jammulai, $jamakhir, $tglmulai, $tglakhir, $ket);
								if ($tampil->num_rows() == 0) {
									echo "<tr align='center' bgcolor='pink'><td  colspan='6'><b>BELUM ADA DATA!</b></td></tr>";
								} else {
									while ($tampil->fetch()) {
								?>
										<tr>
											<td><?php echo $i++; ?></td>
											<td><?php echo $nama_kegiatan; ?></td>
											<td><?php echo $jammulai . " s/d " . $jamakhir; ?></td>
											<td><?php echo $tglmulai . " s/d " . $tglakhir; ?></td>
											<td><?php echo $ket; ?></td>
										</tr>
								<?php
									}
								}
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</section>

		<section id="contact" class="content-section">
			<div class="row">
				<div class="col-lg-12 page-header">
					<div class="section-heading">
						<div class="row">
							<div class="col-md-6">
								<h1>Hubungi<br><em>Kami</em></h1>
							</div>
							<div class="col-md-6">
								<p>Hubungi nomor berikut untuk info lebih lengkap
								</p>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-12">
					<div class="table-responsive">
						<table class="table table-bordered table-condesed">
							<thead>
								<tr>
									<th>Departemen</th>
									<th>PJ</th>
									<th>Kontak</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>Humas</td>
									<td>Haris</td>
									<td>0811111111</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</section>



		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
		<script>
			window.jQuery || document.write('<script src="assets/js/vendor/jquery-1.11.2.min.js"><\/script>')
		</script>

		<script src="assets/js/vendor/bootstrap.min.js"></script>

		<script src="assets/js/plugins.js"></script>
		<script src="assets/js/main.js"></script>

		<script language="javascript">
			function hanyaAngka(e, decimal) {
				var key;
				var keychar;
				if (window.event) {
					key = window.event.keyCode;
				} else
				if (e) {
					key = e.which;
				} else return true;

				keychar = String.fromCharCode(key);
				if ((key == null) || (key == 0) || (key == 8) || (key == 9) || (key == 13) || (key == 27)) {
					return true;
				} else
				if ((("0123456789").indexOf(keychar) > -1)) {
					return true;
				} else
				if (decimal && (keychar == ".")) {
					return true;
				} else return false;
			}
		</script>

		<script>
			// Hide Header on on scroll down
			var didScroll;
			var lastScrollTop = 0;
			var delta = 5;
			var navbarHeight = $('header').outerHeight();

			$(window).scroll(function(event) {
				didScroll = true;
			});

			setInterval(function() {
				if (didScroll) {
					hasScrolled();
					didScroll = false;
				}
			}, 250);

			function hasScrolled() {
				var st = $(this).scrollTop();

				// Make sure they scroll more than delta
				if (Math.abs(lastScrollTop - st) <= delta)
					return;

				// If they scrolled down and are past the navbar, add class .nav-up.
				// This is necessary so you never see what is "behind" the navbar.
				if (st > lastScrollTop && st > navbarHeight) {
					// Scroll Down
					$('header').removeClass('nav-down').addClass('nav-up');
				} else {
					// Scroll Up
					if (st + $(window).height() < $(document).height()) {
						$('header').removeClass('nav-up').addClass('nav-down');
					}
				}

				lastScrollTop = st;
			}
		</script>

		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>

</body>

</html>