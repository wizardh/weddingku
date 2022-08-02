<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?= $title; ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" type="image/png" href="/favicon.ico"/>

	<!-- STYLES -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- FONTS AND ICONS -->
    <style>
    @import url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css");
    @import url('<?= $setting->font_import; ?>');

    @keyframes zoom-out {
        0% {
            transform: scale(0, 0);
        }
        50% {
            transform: scale(1, 1);
        }
    }    

    @media (prefers-reduced-motion: no-preference) {
        .zoom-animation {
            animation: zoom-out 2s 1;
        }
    }

    .bg-wedding {
        background-color: <?= $setting->bg_color; ?>;
    }
    
    .sect-header{
        <?= $setting->font_css; ?>
    }

    .parallax {
        /* The image used */
        background-image: url("<?= base_url('assets/images/background.jpg'); ?>");

        /* Set a specific height */
        min-height: 500px;

        /* Create the parallax scrolling effect */
        background-attachment: fixed;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }
    </style> 

    <!-- icons -->
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">    
</head>
<body class="parallax">

    <!-- <div class="fixed-top" style="background: rgba(248,249,250,0.7) !important;">
        <header class="container d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3">
        <ul class="nav col-12 col-md-auto justify-content-center mb-md-0" style="font-family: 'Playfair Display', serif;">
            <li><a href="#acara" class="nav-link px-2 link-secondary">Acara</a></li>
            <li><a href="#lokasi" class="nav-link px-2 link-dark">Lokasi</a></li>
            <li><a href="#buku-tamu" class="nav-link px-2 link-dark">Buku Tamu</a></li>
        </ul>
        </header>
    </div> -->
