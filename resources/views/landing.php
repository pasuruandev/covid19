<!DOCTYPE html>
<html lang="id">
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
	<link rel="stylesheet" href="<?= url('assets/css/main.css') ?>">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,700,800&display=swap" rel="stylesheet">
	<script src="https://use.fontawesome.com/34566f56b4.js"></script>

	<!-- LEAFLET -->
	<link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.6.0/leaflet.css" />
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.6.0/leaflet-src.js"></script>
</head>

<body>
	<div class="container-fluid home">
		<div class="row">
			<div class="container">
				<div class="row">
					<div class="col-md-2 col-12 img-center">
						<img src="assets/img/logo-kab.png" alt="logo-pasuruan" title="Pasuruan Covid-19" class="shadow circle logo-head">
						<img src="assets/img/logo-kot.png" alt="logo-pasuruan" title="Pasuruan Covid-19" class="shadow circle logo-head">
					</div>
					<div class="col-md-8 col-12 mob-center" style="margin-top: 15px">
						<span class="text-white font-24 x-bold" id="title-home">PASURUAN TANGGAP COVID-19</span>
					</div>
					<div class="col-md-2 col-12 text-right checkup-link">
						<a href="https://checkupcovid19.jatimprov.go.id/" target="blank" class="text-white font-20">SELF CHECKUP</a>
					</div>
				</div>
				<div class="row text-white mob-center head-margin">
					<div class="col-md-6 col-12">
						<p>#DIRUMAHSAJA</p>
						<p class="x-bold font-52 mob-title" id="judul" style="line-height: 71px">Data Pantauan <br> COVID-19 Pasuruan</p>
						<p data-content="data" data-entity="tanggal_terakhir" data-type="date">-</p>
					</div>
					<div class="col-md-5 offset-md-1 col-12">
						<div class="box-info text-white text-center">
							<img src="assets/img/alert.png" alt="alert-icon" style="margin-top: -41px">
							<p class="font-24" id="title-posko" style="margin-top: 15px">Posko Covid-19 Pasuruan</p>
							<div class="row">
								<div class="col-md-4 offset-md-2 col-6 posko-call">
									<a href="tel:+6285718823889"><img src="assets/img/posko_call.png"></a>
									<p class="x-bold font-16 text-white">Kab. Pasuruan</p>
									<p class="x-bold font-16 text-white">(085334415276)</p>
								</div>
								<div class="col-md-4 col-6 posko-call">
									<a href="tel:+6281357722870"><img src="assets/img/posko_call.png"></a>
									<p class="x-bold font-16 text-white">Kota Pasuruan</p>
									<p class="x-bold font-16 text-white">(081357722870)</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="container" style="margin-top: -80px">
		<div class="row">
			<div class="col-md-4 col-12">
				<div class="bg-white shadow info text-center">
					<img src="assets/img/odp.png" alt="odp" class="circle shadow">
					<p class="x-bold text-green total-info" data-content="data" data-entity="odp.all.jumlah">0</p>
					<p class="font-24 text-green x-bold title-info">ODP</p>
					<p>(ORANG DALAM PEMANTAUAN)</p>
					<div class="sub-info text-center">
						<div class="row bg-grey">
							<div class="col-md-6 col-6">
								<span class="x-bold text-green font-20" data-content="data" data-entity="odp.kab.jumlah">0</span>
								<p class="font-14">Kab. Pasuruan</p>
							</div>
							<div class="col-md-6 col-6">
								<span class="x-bold text-green font-20" data-content="data" data-entity="odp.kota.jumlah">0</span>
								<p class="font-14">Kota Pasuruan</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4 col-12">
				<div class="bg-white shadow info text-center">
					<img src="assets/img/pdp.png" alt="pdp" class="circle shadow">
					<p class="x-bold text-orange total-info" data-content="data" data-entity="pdp.all.jumlah">0</p>
					<p class="font-24 text-orange x-bold title-info">PDP</p>
					<p>(PASIEN DALAM PENGAWASAN)</p>
					<div class="sub-info text-center">
						<div class="row bg-grey">
							<div class="col-md-6 col-6">
								<span class="x-bold text-green font-20" data-content="data" data-entity="pdp.kab.jumlah">0</span>
								<p class="font-14">Kab. Pasuruan</p>
							</div>
							<div class="col-md-6 col-6">
								<span class="x-bold text-green font-20" data-content="data" data-entity="pdp.kota.jumlah">0</span>
								<p class="font-14">Kota Pasuruan</p>
							</div>
						</div>
						<div class="row bg-white">
							<div class="col-md-6 col-6">
								<span class="x-bold text-green font-16"><span class="x-bold" data-content="data" data-entity="pdp.kab.negatif">0</span> Negatif</span>
							</div>
							<div class="col-md-6 col-6">
								<span class="x-bold text-green font-16"><span class="x-bold" data-content="data" data-entity="pdp.kota.negatif">0</span> Negatif</span>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4 col-12">
				<div class="bg-white shadow info last-info text-center">
					<img src="assets/img/positif.png" alt="positif" class="circle shadow">
					<p class="x-bold text-red total-info" data-content="data" data-entity="positif.all.jumlah">0</p>
					<p class="font-24 text-red x-bold title-info">POSITIF CORONA</p>
					<p>(KONFIRMASI PASIEN POSITIF)</p>
					<div class="sub-info text-center">
						<div class="row bg-grey">
							<div class="col-md-6 col-6">
								<span class="x-bold text-green font-20" data-content="data" data-entity="positif.kab.jumlah">0</span>
								<p class="font-14">Kab. Pasuruan</p>
							</div>
							<div class="col-md-6 col-6">
								<span class="x-bold text-green font-20" data-content="data" data-entity="positif.kota.jumlah">0</span>
								<p class="font-14">Kota Pasuruan</p>
							</div>
						</div>
						<div class="row bg-white">
							<div class="col-md-6 col-6">
								<span class="x-bold text-green font-16"><span class="xbold" data-content="data" data-entity="positif.kab.sembuh">0</span> Sembuh</span><br>
								<span class="x-bold font-16"><span class="xbold" data-content="data" data-entity="positif.kab.meninggal">0</span> Meninggal</span>
							</div>
							<div class="col-md-6 col-6">
								<span class="x-bold text-green font-16"><span class="xbold" data-content="data" data-entity="positif.kota.sembuh">0</span> Sembuh</span><br>
								<span class="x-bold font-16"><span class="xbold" data-content="data" data-entity="positif.kota.meninggal">0</span> Meninggal</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-12" style="padding-top: 30px;padding-bottom: 30px">
				<div class="alert alert-warning">
					<i class="fa fa-exclamation-circle"></i> Data kasus terkonfirmasi secara resmi oleh Pemerintahan Provinsi Jawa Timur per <strong data-content="data" data-entity="tanggal_terakhir" data-type="date">Rabu, 1 April 2020</strong>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-12">
				<div class="col-md-12 col-12 bg-green rujukan">
					<div class="row box-rujukan">
						<div class="col-md-5 col-12">
							<img src="assets/img/rs.png" alt="rumah sakit" class="img-center" id="img-rs">
						</div>
						<div class="col-md-7 col-12 text-white mob-center" id="rujukan-info">
							<p class="font-20">Rumah Sakit Rujukan?</p>
							<p class="font-42 x-bold">RSUD BANGIL</p>
							<div class="row">
								<div class="col-md-1 col-12">
									<img src="assets/img/address.png" alt="" class="img-center">
								</div>
								<div class="col-md-11 col-12" style="margin-top: 5px">
									<address>Jl. Raya Raci - Bangil, Balungbendo, Masangan, Kec. Bangil, Pasuruan</address>
								</div>
								<div class="col-md-1 col-12">
									<img src="assets/img/phone.png" alt="" class="img-center">
								</div>
								<div class="col-md-11 col-12" style="margin-top: 5px">
									<span>(0343) 744900</span>
								</div>
								<div class="col-md-12" style="margin-top: 15px">
									<a href="https://goo.gl/maps/43oSP6mJNjoVCUdd7" target="_blank" class="btn btn-light btn-lg">Lihat di Peta</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container mob-center" style="margin-top: 50px">
		<div class="row">
			<div class="col-md-12 col-12">
				<p class="x-bold">Informasi</p>
			</div>
		</div>
		<div class="row">
			<div class="col-md-5 col-12">
				<p class="font-48 x-bold mob-title">Apa itu Covid-19?</p>
			</div>
			<div class="col-md-7 col-12">
				<p class="font-24 mob-small" style="letter-spacing: 0.5px;line-height: 175%">Coronavirus Disease 2019 atau COVID-19 adalah penyakit baru yang dapat menyebabkan gangguan pernapasan dan radang paru. Penyakit ini disebabkan oleh infeksi Severe Acute Respiratory Syndrome Coronavirus 2 (SARS-CoV-2). Gejala klinis yang muncul beragam, mulai dari seperti gejala flu biasa (batuk, pilek, nyeri tenggorok, nyeri otot, nyeri kepala) sampai yang berkomplikasi berat (pneumonia atau sepsis).</p>
			</div>
		</div>
	</div>
	<div class="container-fluid bg-green text-white" id="map-container">
		<div class="row">
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-12 text-center">
						<span class="x-bold font-52 mob-title">Peta Sebaran Covid-19</span><br>
						<p class="x-bold font-24 text-center">Kabupaten Pasuruan</p>
					</div>
					<div class="col-md-8">
						<div id="map1" class="kab-map">
							<!-- <script type="text/javascript">
								var map = L.map('map1').setView([-7.72, 112.858215], 11);

								L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
								    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
								}).addTo(map);

								var newMarker = L.icon({
						            iconUrl: 'assets/img/marker.png',

						            iconSize:     [48, 48],
						            iconAnchor:   [20, 50],
						            popupAnchor:  [0, -60]
						        });

								var kec = [
									["PURWODADI", -7.803544,112.7271303,0,0,0],
									["TUTUR", -7.8996875,112.8224678,0,0,0],
									["PUSPO", -7.8360402,112.870133,0,0,0],
									["TOSARI", -7.8955854,112.8939647,0,0,0],
									["LUMBANG", -7.7995045,112.9773703,0,0,0],
									["PASREPAN", -7.7941107,112.8939647,0,0,0],
									["KEJAYAN", -7.7359823,112.8463007,0,0,0],
									["WONOREJO", -7.71972,112.7748002,0,0,0],
									["PURWOSARI", -7.7629501,112.7271303,0,0,0],
									["PRIGEN", -7.697172,112.627899,0,0,0],
									["SUKOREJO", -7.7169176,112.7187595,0,0,0],
									["PANDAAN", -7.6426348,112.7032945,0,0,0],
									["GEMPOL", -7.6034421,112.6794582,0,0,0],
									["BEJI", -7.5947854,112.7450068,0,0,0],
									["BANGIL", -7.604976,112.775101,0,0,0],
									["REMBANG", -7.6373665,112.7986343,0,0,0],
									["KRATON", -7.6752088,112.8463007,0,0,0],
									["POHJENTREK", -7.6786077,112.876091,0,0,0],
									["GONDANG WETAN", -7.7117048,112.9177957,0,0,0],
									["REJOSO", -7.6746075,112.9475835,0,0,0],
									["WINONGAN", -7.7508715,112.941626,0,0,0],
									["GRATI", -7.7468219,113.013113,0,0,0],
									["LEKOK", -7.6658741,113.013113,0,0,0],
									["NGULING", -7.7036431,113.0607675,0,0,0],
								];
								var markerpop = new Array();
								var marker = new Array();

								for (var i = 0; i < kec.length; i++) {
									markerpop[i] = "<div class='bg-green text-white x-bold font-16 p-1 popup-head text-center'>"+ kec[i][0] +"</div>"+
										"<p class='font-16 x-bold'>ODP : "+ kec[i][3] +"</p>" +
										"<p class='font-16 x-bold'>PDP : "+ kec[i][4] +"</p>" +
										"<p class='font-16 x-bold'>Positif : "+ kec[i][5] +"</p>";
							        marker[i] = L.marker([kec[i][1], kec[i][2]], {icon: newMarker}).addTo(map)
								    .bindPopup(markerpop[i], {minWidth:200});	
								}

							</script> -->
						</div>
					</div>
					<div class="col-md-4">
						<div class="table-responsive kab-table">
							<table class="table table-striped">
								<thead>
									<tr>
										<th>No.</th>
										<th>Kecamatan</th>
										<th>ODP</th>
										<th>PDP</th>
										<th>Positif</th>
									</tr>
								</thead>
								<tbody id="tabel-kecam1">
								
								</tbody>
							</table>
						</div>
					</div>
					<div class="col-md-12 col-12 text-center">
						<p class="x-bold font-24 text-center mt-4">Kota Pasuruan</p>
					</div>
					<div class="col-md-8">
						<div id="map2" class="kot-map">
							<!-- <script type="text/javascript">
								var map = L.map('map2').setView([-7.643130, 112.910461], 12);

								L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
								    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
								}).addTo(map);

								var newMarker = L.icon({
						            iconUrl: 'assets/img/marker.png',

						            iconSize:     [48, 48],
						            iconAnchor:   [20, 50],
						            popupAnchor:  [0, -60]
						        });

								var kec = [
									["GADINGREJO", -7.6374665,112.8880068,0,0,0],
									["PURWOREJO", -7.6647917,112.8969436,0,0,0],
									["BUGULKIDUL", -7.6469193,112.8999225,0,0,0],
									["PANGGUNGREJO", -7.630350,112.920998,0,0,0]
								];
								var markerpop = new Array();
								var marker = new Array();

								for (var i = 0; i < kec.length; i++) {
									markerpop[i] = "<div class='bg-green text-white x-bold font-16 p-1 popup-head text-center'>"+ kec[i][0] +"</div>"+
										"<p class='font-16 x-bold'>ODP : "+ kec[i][3] +"</p>" +
										"<p class='font-16 x-bold'>PDP : "+ kec[i][4] +"</p>" +
										"<p class='font-16 x-bold'>Positif : "+ kec[i][5] +"</p>";
							        marker[i] = L.marker([kec[i][1], kec[i][2]], {icon: newMarker}).addTo(map)
								    .bindPopup(markerpop[i], {minWidth:200});	
								}

							</script> -->
						</div>
					</div>
					<div class="col-md-4">
						<div class="table-responsive kot-table">
							<table class="table table-striped">
								<thead>
									<tr>
										<th>No.</th>
										<th>Kecamatan</th>
										<th>ODP</th>
										<th>PDP</th>
										<th>Positif</th>
									</tr>
								</thead>
								<tbody id="tabel-kecam2">
									
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container-fluid bg-green" id="lockdown" data-limit="4">
		<div class="row">
			<div class="container">
				<div class="row mob-center">
					<div class="col-md-6 col-12 text-white">
						<span class="x-bold">Informasi</span> <br>
						<span class="x-bold font-52 mob-title">Kawasan Physical Distancing</span>
					</div>
					<div class="col-md-6 col-12 text-right see-all">
						<a href="/lockdown" class="btn btn-light btn-lg">Tampilkan Semua</a>
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
	<div class="container-fluid bg-white" id="resiko">
		<div class="row">
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-12 text-center">
						<span class="x-bold">Bagaimana</span> <br>
						<span class="x-bold font-52 mob-title">Cara Mengurangi Resiko?</span>
					</div>
				</div>
				<div class="row" style="margin-top: 100px">
					<div class="col-md-4 col-12">
						<div class="bg-green text-white shadow info">
							<center>
								<img src="assets/img/imun.png" alt="imunitas" class="circle shadow">
								<p class="x-bold font-35" style="margin-top: 50px">Tingkatkan Imunitas Tubuh</p>
								<p class="font-20 title-info">Dengan mengkonsumsi makanan yang ber gizi, berolahraga dan istirahat yang cukup</p>
							</center>
						</div>
					</div>
					<div class="col-md-4 col-12">
						<div class="bg-green text-white shadow info">
							<center>
								<img src="assets/img/cuci.png" alt="cuci tangan" class="circle shadow">
								<p class="x-bold font-35" style="margin-top: 50px">Jaga Selalu Kebersihan</p>
								<p class="font-20 title-info">Dengan mencuci tangan pakai sabun selama 20 detik, gunakan masker dan handsanitizer</p>
							</center>
						</div>
					</div>
					<div class="col-md-4 col-12">
						<div class="bg-green text-white shadow info last-info">
							<center>
								<img src="assets/img/salam.png" alt="kontak langsung" class="circle shadow">
								<p class="x-bold font-35" style="margin-top: 50px">Kurangi Kontak Langsung</p>
								<p class="font-20 title-info">Dengan hindari pertemuan besar (Lebih dari 10 orang) dan jaga jarak minimal 2 Meter</p>
							</center>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container-fluid bg-green" id="artikel" data-limit="3">
		<div class="row">
			<div class="container">
				<div class="row mob-center">
					<div class="col-md-6 col-12 text-white">
						<span class="x-bold">Informasi</span> <br>
						<span class="x-bold font-52 mob-title">Artikel Covid-19</span>
					</div>
					<div class="col-md-6 col-12 text-right see-all">
						<!-- <a href="artikel.html" class="btn btn-light btn-lg">Tampilkan Semua</a> -->
					</div>
				</div>
				<div class="row" data-content="artikel" data-template="#template-artikel">
					<template class="hidden" id="template-artikel">
                        <div class="col-md-4 col-12">
                            <div class="card artikel-card">
                                <img class="card-img-top" src="" data-entity="header">
                                <div class="card-body">
                                    <h5 class="card-title font-20 x-bold" data-entity="title">Ullamcorper facilisis quisque molestie neque, cras</h5>
                                    <p class="card-text font-16">
                                        <a href="" class="text-green" data-entity="link">Baca Selengkapnya</a>
                                    </p>
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
