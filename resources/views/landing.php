<!DOCTYPE html>
<html lang="id">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Data Pantauan COVID-19 Pasuruan Raya</title>
	
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
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css" integrity="sha512-/zs32ZEJh+/EO2N1b0PEdoA10JkdC3zJ8L5FTiQu82LR9S/rOQNfQN7U59U9BC12swNeRAz3HSzIL2vpp4fv3w==" crossorigin="anonymous" />
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
            <div class="col-md-6 col-12">
                <div class="bg-white shadow info text-center mb-5 mt-2">
                    <img src="<?= url('assets/img/logo-kab.png') ?>" alt="kab.pasuruan" class="circle shadow">
                    <h3 class="text-green mt-3 mb-5"><b>Kabupaten Pasuruan</b></h3>
                    <div class="sub-info text-center">
                        <div class="row mt-4 bg-grey">
                            <div class="col-md-12 col-xs-12">
                                <table class="table_data" style="width: 100%;">
                                    <tr>
                                        <td style="width: 25%;">
                                            <span class="x-bold text-orange total-info" data-content="data" data-entity="suspek.kab.jumlah">0</span> <br>
                                            <span class="text-orange x-bold title-info">SUSPEK</span>
                                        </td>
                                        <td style="width: 25%;">
                                            <span class="x-bold font-20" data-content="data" data-entity="suspek.kab.dirawat">0</span>
                                            <p class="font-14">dirawat</p>
                                        </td>
                                        <td style="width: 25%;">
                                            <span class="x-bold font-20" data-content="data" data-entity="suspek.kab.sembuh">0</span>
                                            <p class="font-14">sembuh</p>
                                        </td>
                                        <td style="width: 25%;">
                                            <span class="x-bold font-20" data-content="data" data-entity="suspek.kab.meninggal">0</span>
                                            <p class="font-14">meninggal</p>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="row mt-4 bg-grey">
                            <div class="col-md-12 col-xs-12">
                                <table class="table_data" style="width: 100%;">
                                    <tr>
                                        <td style="width: 25%;">
                                            <span class="x-bold text-red total-info" data-content="data" data-entity="konfirmasi.kab.jumlah">0</span> <br>
                                            <span class="text-red x-bold title-info">KONFIRMASI</span>
                                        </td>
                                        <td style="width: 25%;">
                                            <span class="x-bold font-20" data-content="data" data-entity="konfirmasi.kab.isolasi">0</span>
                                            <p class="font-14">isolasi</p>
                                        </td>
                                        <td style="width: 25%;">
                                            <span class="x-bold font-20" data-content="data" data-entity="konfirmasi.kab.sembuh">0</span>
                                            <p class="font-14">sembuh</p>
                                        </td>
                                        <td style="width: 25%;">
                                            <span class="x-bold font-20" data-content="data" data-entity="konfirmasi.kab.meninggal">0</span>
                                            <p class="font-14">meninggal</p>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-12">
                <div class="bg-white shadow info text-center mb-5 mt-2">
                    <img src="<?= url('assets/img/logo-kot.png') ?>" alt="kota pasuruan" class="circle shadow">
                    <h3 class="text-green mt-3 mb-5"><b>Kota Pasuruan</b></h3>
                    <div class="sub-info text-center">
                        <div class="row mt-4 bg-grey">
                            <div class="col-md-12 col-xs-12">
                                <table class="table_data" style="width: 100%;">
                                    <tr>
                                        <td style="width: 25%;">
                                            <span class="x-bold text-orange total-info" data-content="data" data-entity="suspek.kota.jumlah">0</span> <br>
                                            <span class="text-orange x-bold title-info">SUSPEK</span>
                                        </td>
                                        <td style="width: 25%;">
                                            <span class="x-bold font-20" data-content="data" data-entity="suspek.kota.dirawat">0</span>
                                            <p class="font-14">dirawat</p>
                                        </td>
                                        <td style="width: 25%;">
                                            <span class="x-bold font-20" data-content="data" data-entity="suspek.kota.sembuh">0</span>
                                            <p class="font-14">sembuh</p>
                                        </td>
                                        <td style="width: 25%;">
                                            <span class="x-bold font-20" data-content="data" data-entity="suspek.kota.meninggal">0</span>
                                            <p class="font-14">meninggal</p>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="row mt-4 bg-grey">
                            <div class="col-md-12 col-xs-12">
                                <table class="table_data" style="width: 100%;">
                                    <tr>
                                        <td style="width: 25%;">
                                            <span class="x-bold text-red total-info" data-content="data" data-entity="konfirmasi.kota.jumlah">0</span> <br>
                                            <span class="text-red x-bold title-info">KONFIRMASI</span>
                                        </td>
                                        <td style="width: 25%;">
                                            <span class="x-bold font-20" data-content="data" data-entity="konfirmasi.kota.isolasi">0</span>
                                            <p class="font-14">isolasi</p>
                                        </td>
                                        <td style="width: 25%;">
                                            <span class="x-bold font-20" data-content="data" data-entity="konfirmasi.kota.sembuh">0</span>
                                            <p class="font-14">sembuh</p>
                                        </td>
                                        <td style="width: 25%;">
                                            <span class="x-bold font-20" data-content="data" data-entity="konfirmasi.kota.meninggal">0</span>
                                            <p class="font-14">meninggal</p>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<!-- <div class="container" style="margin-top: -80px">
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
								<span class="x-bold text-green font-16"><span class="x-bold" data-content="data" data-entity="positif.kab.sembuh">0</span> Sembuh</span><br>
								<span class="x-bold font-16"><span class="x-bold" data-content="data" data-entity="positif.kab.meninggal">0</span> Meninggal</span>
							</div>
							<div class="col-md-6 col-6">
								<span class="x-bold text-green font-16"><span class="x-bold" data-content="data" data-entity="positif.kota.sembuh">0</span> Sembuh</span><br>
								<span class="x-bold font-16"><span class="x-bold" data-content="data" data-entity="positif.kota.meninggal">0</span> Meninggal</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div> -->
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
				<div class="col-md-12 col-12 bg-green rujukan  text-white">
					<div class="row box-rujukan">
						<div class="col-12 text-center">
							<p class="font-42 x-bold">Rumah Sakit Rujukan?</p>
						</div>
						<div class="col-md-4 col-12 pt-4 pb-4">
							<img src="assets/img/rs.png" alt="rumah sakit" width="25%">
							<p class="font-24 x-bold">RSUD Bangil</p>
							<div class="row">
								<div class="col-md-1 col-1">
									<img src="assets/img/address.png" alt="" class="img-center">
								</div>
								<div class="col-md-10 col-10" style="margin-top: 5px">
									<address>Jl. Raya Raci - Bangil, Balungbendo, Masangan, Kec. Bangil, Pasuruan</address>
								</div>
								<div class="col-md-1 col-1">
									<img src="assets/img/phone.png" alt="" class="img-center">
								</div>
								<div class="col-md-10 col-10" style="margin-top: 5px">
									<span>(0343) 744900</span>
								</div>
								<div class="col-md-12" style="margin-top: 15px">
									<a href="https://goo.gl/maps/43oSP6mJNjoVCUdd7" target="_blank" class="btn btn-light">Lihat di Peta</a>
								</div>
							</div>
						</div>
						<div class="col-md-4 col-12 pt-4 pb-4">
							<img src="assets/img/rs.png" alt="rumah sakit" width="25%">
							<p class="font-24 x-bold">RSUD Dr. Soedarsono</p>
							<div class="row">
								<div class="col-md-1 col-1">
									<img src="assets/img/address.png" alt="" class="img-center">
								</div>
								<div class="col-md-10 col-10" style="margin-top: 5px">
									<address>Jl. Dr. Wahidin Sudiro Husodo No. 1-4, Purutrejo, Kec. Purworejo, Kota Pasuruan</address>
								</div>
								<div class="col-md-1 col-1">
									<img src="assets/img/phone.png" alt="" class="img-center">
								</div>
								<div class="col-md-10 col-10" style="margin-top: 5px">
									<span>(0343) 421073</span>
								</div>
								<div class="col-md-12" style="margin-top: 15px">
									<a href="https://goo.gl/maps/eyM3xSe4DMddgEz5A" target="_blank" class="btn btn-light">Lihat di Peta</a>
								</div>
							</div>
						</div>
						<div class="col-md-4 col-12 pt-4 pb-4">
							<img src="assets/img/rs.png" alt="rumah sakit" width="25%">
							<p class="font-24 x-bold">RSUD Prima Husada</p>
							<div class="row">
								<div class="col-md-1 col-1">
									<img src="assets/img/address.png" alt="" class="img-center">
								</div>
								<div class="col-md-10 col-10" style="margin-top: 5px">
									<address>Jl. Raya Surabaya-Malang KM 54, Palang, Lemahbang, Kec. Sukorejo, Kab. Pasuruan</address>
								</div>
								<div class="col-md-1 col-1">
									<img src="assets/img/phone.png" alt="" class="img-center">
								</div>
								<div class="col-md-10 col-10" style="margin-top: 5px">
									<span>(0343) 67450000</span>
								</div>
								<div class="col-md-12" style="margin-top: 15px">
									<a href="https://goo.gl/maps/CxFXKyiVU1VxadWM8" target="_blank" class="btn btn-light">Lihat di Peta</a>
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
	<div class="container-fluid bg-green text-white">
		<div class="row">
			<div class="container" id="map-container">
				<div class="row">
					<div class="col-md-12 col-12 text-center">
						<span class="x-bold font-52 mob-title">Peta Sebaran Covid-19</span><br>
						<p class="x-bold font-24 text-center">Kabupaten Pasuruan</p>
					</div>
					<div class="col-md-8">
						<div id="map1" class="kab-map"></div>
					</div>
					<div class="col-md-4">
						<div class="table-responsive kab-table">
							<table class="table table-striped">
								<thead>
									<tr>
										<th>No.</th>
										<th>Kecamatan</th>
										<th>Suspek</th>
										<th>Konfirmasi</th>
									</tr>
								</thead>
								<tbody id="tabel-kecam1"></tbody>
							</table>
						</div>
					</div>
					<div class="col-md-12 col-12 text-center">
						<p class="x-bold font-24 text-center mt-4">Kota Pasuruan</p>
					</div>
					<div class="col-md-8">
						<div id="map2" class="kot-map">
						</div>
					</div>
					<div class="col-md-4">
						<div class="table-responsive kot-table">
							<table class="table table-striped">
								<thead>
									<tr>
										<th>No.</th>
										<th>Kecamatan</th>
										<th>Suspek</th>
										<th>Konfirmasi</th>
									</tr>
								</thead>
								<tbody id="tabel-kecam2"></tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<div class="container mb-5 mt-5 p-2">
				<div class="bg-white text-green p-2 pb-3 pt-5 rujukan ld-list" id="chart-container">
					<div class="row">
						<div class="col-md-12 col-12 text-center pb-1">
							<span class="x-bold font-32 mob-title">Grafik Pertambahan Pasien</span>
						</div>
						<div class="col-md-6 col-12 p-3 pl-5 pr-5 text-center">
							<p class="font-24 text-center">Kabupaten Pasuruan</p>
							<canvas id="chart-kab" height="200"></canvas>
						</div>
						<div class="col-md-6 col-12 p-3 pl-5 pr-5 text-center">
							<p class="font-24 text-center">Kota Pasuruan</p>
							<canvas id="chart-kota" height="200"></canvas>
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
	<div id="artikel" class="container-fluid bg-green">
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

	<div class="container bg-white text-green pt-5 pb-5 footer">
		<div class="row">
			<div class="col-md-6 col-12">
				<h5 class="font-20 x-bold">Tentang Project Covid</h5>
				<p class="font-16">
					Website ini dibangun oleh<br>
					Komunitas pegiat IT<br>
					PasuruanDev
				</p>

				<div class="mt-5">
					<h5 class="font-20 x-bold">Follow Us</h5>
					<a href="https://github.com/pasuruandev" class="text-green mr-2" target="_blank"><i class="fa fa-github fa-2x"></i></a>
					<a href="https://medium.com/pasuruandev" class="text-green mr-2" target="_blank"><i class="fa fa-medium fa-2x"></i></a>
					<a href="https://www.instagram.com/pasuruan.dev/" class="text-green mr-2" target="_blank"><i class="fa fa-instagram fa-2x"></i></a>
					<a href="https://www.facebook.com/PasuruanDev/" class="text-green mr-2" target="_blank"><i class="fa fa-facebook fa-2x"></i></a>
					<a href="https://telegram.me/PasuruanDev" class="text-green mr-2" target="_blank"><i class="fa fa-telegram fa-2x"></i></a>
				</div>
			</div>
			<div class="col-md-6 col-12 text-right">
				<div class="mt-5 text-center footer-logo" style="width: 40%; float: right;">
					<h5 class="font-20 x-bold">Make with Love</h5>
					<img src="assets/img/pasdev.png" style="width: 100%">
				</div>
			</div>
		</div>
	</div>
	
	<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment-with-locales.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" integrity="sha512-s+xg36jbIujB2S2VKfpGmlC3T5V2TF3lY48DX7u2r9XzGzgPsa6wTpOQA7J9iffvdeBN0q9tKzRxVxw1JviZPg==" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.min.js" integrity="sha512-vBmx0N/uQOXznm/Nbkp7h0P1RfLSj0HQrFSzV8m7rOGyj30fYAOKHYvCNez+yM8IrfnW0TCodDEjRqf6fodf/Q==" crossorigin="anonymous"></script>
	<script src="<?= url('assets/js/script.js') ?>"></script>

</body>

</html>
