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
	<link rel="stylesheet" href="/assets/css/main.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,700,800&display=swap" rel="stylesheet">
	<script src="https://use.fontawesome.com/34566f56b4.js"></script>

	<!-- JSSOCIALS -->
	<link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials.css" />

	<link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials-theme-flat.css" />

</head>

<body>
	<div class="detail_back bg-green"><a href="/" class="fa fa-2x fa-arrow-left text-white"></a></div>
	<div class="container-fluid bg-white ld-list" id="detail">
		<div class="row">
            <img src="/assets/img/article/<?= !empty($article->header) ? $article->header : '1.jpg' ?>" class="detail-img">
			
			<div class="col-md-8 offset-md-2 detail-text">
            <h1 class="x-bold font-32"><?= $article->title ?></h1>
            <small><i>by admin at <?= date('d-m-Y H:i', strtotime($article->created_at)) ?></i></small>
            <br/>

            <?= $article->content ?>
            <br>
				<strong>Bagikan :</strong><br>
				<div id="share"></div>
			</div>
		</div>
	</div>
	
	<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

	<!-- JSSOCIALS -->
	<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials.min.js"></script>
	<script>
        $("#share").jsSocials({
        	showCount: true,
        	showLabel: false,
            shares: ["twitter", "facebook",  "linkedin", "whatsapp", "line", "telegram"]
        });
    </script>

</body>

</html>
