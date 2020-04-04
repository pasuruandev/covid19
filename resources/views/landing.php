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
</head>

<body>
	<div class="container-fluid home">
		<div class="row">
			<div class="container">
				<div class="row">
					<div class="col-md-2 col-12 img-center">
						<img src="<?= url('assets/img/logo-kab.png') ?>" alt="logo-pasuruan" title="Pasuruan Covid-19" class="shadow circle logo-head">
						<img src="<?= url('assets/img/logo-kot.png') ?>" alt="logo-pasuruan" title="Pasuruan Covid-19" class="shadow circle logo-head">
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
						<p class="date"><?= $tanggal_terakhir ?></p>
					</div>
					<div class="col-md-5 offset-md-1 col-12">
						<div class="box-info text-white text-center">
							<img src="<?= url('assets/img/alert.png') ?>" alt="alert-icon" style="margin-top: -41px">
							<p class="font-24" id="title-posko" style="margin-top: 15px">Posko Covid-19 Kabupaten Pasuruan</p>
							<div class="row">
								<div class="col-md-4 offset-md-2 col-6 posko-call">
									<img src="<?= url('assets/img/posko_call.png') ?>">
									<p class="x-bold font-16 text-white">Kab. Pasuruan</p>
								</div>
								<div class="col-md-4 col-6 posko-call">
									<img src="<?= url('assets/img/posko_call.png') ?>">
									<p class="x-bold font-16 text-white">Kota Pasuruan</p>
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
					<img src="<?= url('assets/img/odp.png') ?>" alt="odp" class="circle shadow">
					<p class="x-bold text-green total-info"><?= $odp['kab']->jumlah + $odp['kota']->jumlah ?></p>
					<p class="font-24 text-green x-bold title-info">ODP</p>
					<p>(ORANG DALAM PEMANTAUAN)</p>
					<div class="sub-info text-center">
						<div class="row bg-grey">
							<div class="col-md-6 col-6">
								<span class="x-bold text-green font-20"><?= $odp['kab']->jumlah ?></span>
								<p class="font-14">Kab. Pasuruan</p>
							</div>
							<div class="col-md-6 col-6">
								<span class="x-bold text-green font-20"><?= $odp['kota']->jumlah ?></span>
								<p class="font-14">Kota Pasuruan</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4 col-12">
				<div class="bg-white shadow info text-center">
					<img src="<?= url('assets/img/pdp.png') ?>" alt="pdp" class="circle shadow">
					<p class="x-bold text-orange total-info"><?= $pdp['kab']->jumlah + $pdp['kota']->jumlah ?></p>
					<p class="font-24 text-orange x-bold title-info">PDP</p>
					<p>(PASIEN DALAM PENGAWASAN)</p>
					<div class="sub-info text-center">
						<div class="row bg-grey">
							<div class="col-md-6 col-6">
								<span class="x-bold text-green font-20"><?= $pdp['kab']->jumlah ?></span>
								<p class="font-14">Kab. Pasuruan</p>
							</div>
							<div class="col-md-6 col-6">
								<span class="x-bold text-green font-20"><?= $pdp['kota']->jumlah ?></span>
								<p class="font-14">Kota Pasuruan</p>
							</div>
						</div>
						<div class="row bg-white">
							<div class="col-md-6 col-6">
								<span class="x-bold text-green font-16"><?= $pdp['kab']->negatif ?> Negatif</span>
							</div>
							<div class="col-md-6 col-6">
								<span class="x-bold text-green font-16"><?= $pdp['kota']->negatif ?> Negatif</span>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4 col-12">
				<div class="bg-white shadow info last-info text-center">
					<img src="<?= url('assets/img/positif.png') ?>" alt="positif" class="circle shadow">
					<p class="x-bold text-red total-info"><?= $positif['kab']->jumlah + $positif['kota']->jumlah ?></p>
					<p class="font-24 text-red x-bold title-info">POSITIF CORONA</p>
					<p>(KONFIRMASI PASIEN POSITIF)</p>
					<div class="sub-info text-center">
						<div class="row bg-grey">
							<div class="col-md-6 col-6">
								<span class="x-bold text-green font-20"><?= $positif['kab']->jumlah ?></span>
								<p class="font-14">Kab. Pasuruan</p>
							</div>
							<div class="col-md-6 col-6">
								<span class="x-bold text-green font-20"><?= $positif['kota']->jumlah ?></span>
								<p class="font-14">Kota Pasuruan</p>
							</div>
						</div>
						<div class="row bg-white">
							<div class="col-md-6 col-6">
								<span class="x-bold text-green font-16"><?= $positif['kab']->sembuh ?> Sembuh</span><br>
								<span class="x-bold font-16"><?= $positif['kab']->meninggal ?> Meninggal</span>
							</div>
							<div class="col-md-6 col-6">
								<span class="x-bold text-green font-16"><?= $positif['kota']->sembuh ?> Sembuh</span><br>
								<span class="x-bold font-16"><?= $positif['kota']->meninggal ?> Meninggal</span>
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
					<i class="fa fa-exclamation-circle"></i> Data kasus terkonfirmasi secara resmi oleh Pemerintahan Provinsi Jawa Timur per <strong class="date"><?= $tanggal_terakhir ?></strong>
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
							<img src="<?= url('assets/img/rs.png') ?>" alt="rumah sakit" class="img-center" id="img-rs">
						</div>
						<div class="col-md-7 col-12 text-white mob-center" id="rujukan-info">
							<p class="font-20">Rumah Sakit Rujukan?</p>
							<p class="font-42 x-bold">RSUD BANGIL</p>
							<div class="row">
								<div class="col-md-1 col-12">
									<img src="<?= url('assets/img/address.png') ?>" alt="" class="img-center">
								</div>
								<div class="col-md-11 col-12" style="margin-top: 5px">
									<address>Jl. Raya Raci - Bangil, Balungbendo, Masangan, Kec. Bangil, Pasuruan</address>
								</div>
								<div class="col-md-1 col-12">
									<img src="<?= url('assets/img/phone.png') ?>" alt="" class="img-center">
								</div>
								<div class="col-md-11 col-12" style="margin-top: 5px">
									<span>(0343) 744900</span>
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
	<div class="container-fluid bg-green" id="lockdown">
		<div class="row">
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-12 text-white text-center">
						<span class="x-bold">Informasi</span> <br>
						<span class="x-bold font-52 mob-title">Lokasi Lockdown</span>
					</div>
				</div>
				<div class="row" style="margin-top: 100px">
					<div class="col-md-3 col-12">
						<div class="bg-white shadow info text-center">
							<img src="<?= url('assets/img/loc_shop.png') ?>" alt="imunitas" class="circle shadow">
							<p class="x-bold font-20" style="margin-top: 20px;">Indomaret</p>
							<div class="row text-left lockdown-info">
								<div class="col-md-1 offset-md-1 col-2 offset-1"><i class="fa fa-map-marker font-24"></i></div>
								<div class="col-md-9 col-8"><span class="font-18">Jl. Ahmad Yani</span></div>
								<div class="col-md-1 offset-md-1 col-2 offset-1"><i class="fa fa-clock-o font-24"></i></div>
								<div class="col-md-9 col-8"><span class="font-18">06:00 - 20:00</span></div>
								<div class="col-md-1 offset-md-1 col-2 offset-1"><i class="fa fa-tag font-24"></i></div>
								<div class="col-md-9 col-8"><span class="font-18">Toko di tutup lebih cepat agar warga dapat diam dirumah</span></div>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-12">
						<div class="bg-white shadow info text-center">
							<img src="<?= url('assets/img/loc_mosque.png') ?>" alt="imunitas" class="circle shadow">
							<p class="x-bold font-20" style="margin-top: 20px;">Masjid Cheng Ho</p>
							<div class="row text-left lockdown-info">
								<div class="col-md-1 offset-md-1 col-2 offset-1"><i class="fa fa-map-marker font-24"></i></div>
								<div class="col-md-9 col-8"><span class="font-18">Jl. Ahmad Yani</span></div>
								<div class="col-md-1 offset-md-1 col-2 offset-1"><i class="fa fa-clock-o font-24"></i></div>
								<div class="col-md-9 col-8"><span class="font-18">Jum'at</span></div>
								<div class="col-md-1 offset-md-1 col-2 offset-1"><i class="fa fa-tag font-24"></i></div>
								<div class="col-md-9 col-8"><span class="font-18">Toko di tutup lebih cepat agar warga dapat diam dirumah</span></div>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-12">
						<div class="bg-white shadow info text-center">
							<img src="<?= url('assets/img/loc_church.png') ?>" alt="imunitas" class="circle shadow">
							<p class="x-bold font-20" style="margin-top: 20px;">GBIS Hosanna</p>
							<div class="row text-left lockdown-info">
								<div class="col-md-1 offset-md-1 col-2 offset-1"><i class="fa fa-map-marker font-24"></i></div>
								<div class="col-md-9 col-8"><span class="font-18">Jl. Ahmad Yani</span></div>
								<div class="col-md-1 offset-md-1 col-2 offset-1"><i class="fa fa-clock-o font-24"></i></div>
								<div class="col-md-9 col-8"><span class="font-18">Minggu</span></div>
								<div class="col-md-1 offset-md-1 col-2 offset-1"><i class="fa fa-tag font-24"></i></div>
								<div class="col-md-9 col-8"><span class="font-18">Toko di tutup lebih cepat agar warga dapat diam dirumah</span></div>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-12">
						<div class="bg-white shadow info text-center">
							<img src="<?= url('assets/img/loc_shop.png') ?>" alt="imunitas" class="circle shadow">
							<p class="x-bold font-20" style="margin-top: 20px;">Indomaret</p>
							<div class="row text-left lockdown-info">
								<div class="col-md-1 offset-md-1 col-2 offset-1"><i class="fa fa-map-marker font-24"></i></div>
								<div class="col-md-9 col-8"><span class="font-18">Jl. Ahmad Yani</span></div>
								<div class="col-md-1 offset-md-1 col-2 offset-1"><i class="fa fa-clock-o font-24"></i></div>
								<div class="col-md-9 col-8"><span class="font-18">06:00 - 20:00</span></div>
								<div class="col-md-1 offset-md-1 col-2 offset-1"><i class="fa fa-tag font-24"></i></div>
								<div class="col-md-9 col-8"><span class="font-18">Toko di tutup lebih cepat agar warga dapat diam dirumah</span></div>
							</div>
						</div>
					</div>
					
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
								<img src="<?= url('assets/img/imun.png') ?>" alt="imunitas" class="circle shadow">
								<p class="x-bold font-35" style="margin-top: 50px">Tingkatkan Imunitas Tubuh</p>
								<p class="font-20 title-info">Dengan mengkonsumsi makanan yang ber gizi, berolahraga dan istirahat yang cukup</p>
							</center>
						</div>
					</div>
					<div class="col-md-4 col-12">
						<div class="bg-green text-white shadow info">
							<center>
								<img src="<?= url('assets/img/cuci.png') ?>" alt="cuci tangan" class="circle shadow">
								<p class="x-bold font-35" style="margin-top: 50px">Jaga Selalu Kebersihan</p>
								<p class="font-20 title-info">Dengan mencuci tangan pakai sabun selama 20 detik, gunakan masker dan handsanitizer</p>
							</center>
						</div>
					</div>
					<div class="col-md-4 col-12">
						<div class="bg-green text-white shadow info last-info">
							<center>
								<img src="<?= url('assets/img/salam.png') ?>" alt="kontak langsung" class="circle shadow">
								<p class="x-bold font-35" style="margin-top: 50px">Kurangi Kontak Langsung</p>
								<p class="font-20 title-info">Dengan hindari pertemuan besar (Lebih dari 10 orang) dan jaga jarak minimal 2 Meter</p>
							</center>
						</div>
					</div>
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