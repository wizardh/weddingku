<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?= $title; ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" type="image/png" href="/favicon.ico"/>

    <!-- JQUERY -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<!-- STYLES -->
    <link href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

    <!-- FONTS AND ICONS -->
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:ital@0;1&display=swap');
    @import url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css");
    </style> 

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <meta name="theme-color" content="#7952b3">
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      body {
        font-size: .875rem;
        }

        .feather {
        width: 16px;
        height: 16px;
        vertical-align: text-bottom;
        }

        /*
        * Sidebar
        */

        .sidebar {
        position: fixed;
        top: 0;
        /* rtl:raw:
        right: 0;
        */
        bottom: 0;
        /* rtl:remove */
        left: 0;
        z-index: 100; /* Behind the navbar */
        padding: 48px 0 0; /* Height of navbar */
        box-shadow: inset -1px 0 0 rgba(0, 0, 0, .1);
        }

        @media (max-width: 767.98px) {
        .sidebar {
            top: 5rem;
        }
        }

        .sidebar-sticky {
        position: relative;
        top: 0;
        height: calc(100vh - 48px);
        padding-top: .5rem;
        overflow-x: hidden;
        overflow-y: auto; /* Scrollable contents if viewport is shorter than content. */
        }

        .sidebar .nav-link {
        font-weight: 500;
        color: #333;
        }

        .sidebar .nav-link .feather {
        margin-right: 4px;
        color: #727272;
        }

        .sidebar .nav-link.active {
        color: #2470dc;
        }

        .sidebar .nav-link:hover .feather,
        .sidebar .nav-link.active .feather {
        color: inherit;
        }

        .sidebar-heading {
        font-size: .75rem;
        text-transform: uppercase;
        }

        /*
        * Navbar
        */

        .navbar-brand {
        padding-top: .75rem;
        padding-bottom: .75rem;
        font-size: 1rem;
        background-color: rgba(0, 0, 0, .25);
        box-shadow: inset -1px 0 0 rgba(0, 0, 0, .25);
        }

        .navbar .navbar-toggler {
        top: .25rem;
        right: 1rem;
        }

        .navbar .form-control {
        padding: .75rem 1rem;
        border-width: 0;
        border-radius: 0;
        }

        .form-control-dark {
        color: #fff;
        background-color: rgba(255, 255, 255, .1);
        border-color: rgba(255, 255, 255, .1);
        }

        .form-control-dark:focus {
        border-color: transparent;
        box-shadow: 0 0 0 3px rgba(255, 255, 255, .25);
        }

    </style>

    

  </head>
  <body>
    
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Admin Panel</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="navbar-nav">
  </div>
</header>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item fs-6">
            <a class="nav-link" href="#">
            <i class="bi bi-speedometer2"></i>
              Dashboard
            </a>
          </li>
          <li class="nav-item fs-6">
            <a class="nav-link" href="<?= base_url('guest'); ?>">
            <i class="bi bi-people"></i>
              Guests
            </a>
          </li>
          <li class="nav-item fs-6">
            <a class="nav-link" href="<?= base_url('guestbook'); ?>">
            <i class="bi bi-book"></i>
              Guest Book
            </a>
          </li>
          <li class="nav-item fs-6">
            <a class="nav-link" href="<?= base_url('setting'); ?>">
            <i class="bi bi-gear"></i>
              Settings
            </a>
          </li>
          <li class="nav-item fs-6">
            <a class="nav-link" href="<?= base_url('change_password'); ?>">
            <i class="bi bi-key"></i>
              Password
            </a>
          </li>
          <li class="nav-item fs-6">
            <a class="nav-link" href="<?= base_url('logout'); ?>">
              <i class="bi bi-x-circle-fill"></i>
              Log Out
            </a>
          </li>

        </ul>
      </div>
    </nav>
