<!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Data Pantauan COVID-19 Kabupaten Pasuruan</title>
	
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="theme-color" content="#2C9B5B" />
	<meta property="og:description" content="Situs informasi terkini tentang covid 19 di Pasuruan">
	<meta property="og:title" content="Data Pantauan COVID-19 Pasuruan" />
	<meta property="og:image" content="<?= url('assets/img/meta-img.png') ?>">
	<meta property="og:image:type" content="image/png , image/jpg">
	<meta property="og:image:width" content="180" />
	<meta property="og:image:height" content="180" />
	<meta property="og:type" content="information" />
	<meta property="og:url" content="<?= url('/') ?>" />
	<meta property="og:site_name" content="Data Pantauan COVID-19 Pasuruan" />
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
	<link rel="icon" href="favicon.ico" type="image/x-icon">
	<link rel="stylesheet" href="assets/css/main.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,700,800&display=swap" rel="stylesheet">
	<script src="https://use.fontawesome.com/34566f56b4.js"></script>
</head>

<body>
	<div class="container-fluid bg-green ld-list" id="lockdown">
		<div class="row">
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-12 text-white">
						<span class="x-bold font-32 mob-title"><a href="/" class="fa fa-arrow-left"></a> Informasi Lokasi Lockdown</span>
					</div>
				</div>
				<div class="row" style="margin-top: 100px" data-content="lockdown" data-template="#template-lockdown">
					<template class="hidden" id="template-lockdown">
						<div class="col-md-3 col-12">
							<div class="bg-white shadow info text-center">
								<img src="" alt="lockdown" class="circle shadow" data-entity="img">
								<p class="x-bold font-20" style="margin-top: 20px;" data-entity="lokasi">Ruas Jalan Pandaan</p>
								<div class="row text-left lockdown-info">
									<div class="col-md-1 offset-md-1 col-2 offset-1"><i class="fa fa-map-marker font-24"></i></div>
									<div class="col-md-9 col-8"><span class="font-18" data-entity="alamat">Jl. A. Yani - Jl. RA Kartini</span></div>
									<div class="col-md-1 offset-md-1 col-2 offset-1"><i class="fa fa-clock-o font-24"></i></div>
									<div class="col-md-9 col-8"><span class="font-18" data-entity="waktu"></span></div>
									<div class="col-md-1 offset-md-1 col-2 offset-1"><i class="fa fa-tag font-24"></i></div>
									<div class="col-md-9 col-8"><span class="font-18" data-entity="deskripsi">Masih suka berkumpul? Awas ANCAMAN PIDANA.</span></div>
								</div>
							</div>
						</div>
					</template>
				</div>
			</div>
		</div>
	</div>
	
	<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment-with-locales.min.js"></script>
	<script src="<?= url('assets/js/script.js') ?>"></script>

</body>

</html>