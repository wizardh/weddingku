<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?= $title; ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" type="image/png" href="/favicon.ico"/>

	<!-- STYLES -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- FONTS AND ICONS -->
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:ital@0;1&display=swap');
    @import url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css");
    </style> 

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- JQUERY -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body style="background-image: url('<?= base_url('assets/images/foad-roshan.jpg'); ?>'); background-size: cover;">

    <div class="fixed-top" style="background: rgba(248,249,250,0.7) !important;">
        <header class="container d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3">
        <ul class="nav col-12 col-md-auto justify-content-center mb-md-0" style="font-family: 'Playfair Display', serif;">
            <li><a href="#acara" class="nav-link px-2 link-secondary">Acara</a></li>
            <li><a href="#lokasi" class="nav-link px-2 link-dark">Lokasi</a></li>
            <li><a href="#buku-tamu" class="nav-link px-2 link-dark">Buku Tamu</a></li>
        </ul>
        </header>
    </div>
