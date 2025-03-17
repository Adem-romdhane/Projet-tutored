<!DOCTYPE html>

<html <?php language_attributes(); ?>>

<head>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  
  
  <!--Dynamique -->
  <meta charset="<?php bloginfo('charset'); ?>">
  <!-- =======================================================
  * Template Name: Medilab
  * Template URL: https://bootstrapmade.com/medilab-free-medical-bootstrap-theme/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  <?php wp_head()?>
</head>

<body class="index-page">
  
<header id="header" class="header sticky-top">

    <div class="topbar d-flex align-items-center">
      <div class="container d-flex justify-content-center justify-content-md-between">
        <div class="contact-info d-flex align-items-center">
          <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:contact@example.com">contact@example.com</a></i>
          <i class="bi bi-phone d-flex align-items-center ms-4"><span>+1 5589 55488 55</span></i>
        </div>
        <!-- à mettre en place avec carbon fields-->
        <div class="social-links d-none d-md-flex align-items-center">
          <a href="#" class="twitter"><i class="bi bi-twitter-x"></i></a>
          <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
          <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
          <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
        </div>
      </div>
    </div><!-- End Top Bar -->

    <div class="branding d-flex align-items-center">

      <div class="container position-relative d-flex align-items-center justify-content-between">
        <a href="index.html" class="logo d-flex align-items-center me-auto">
          <!-- Uncomment the line below if you also wish to use an image logo -->
          <!-- <img src="assets/img/logo.png" alt=""> -->
          <h1 class="sitename">Medilab</h1>
        </a>

        <nav id="navmenu" class="navmenu">
          <?php 
            wp_nav_menu(
              array(
                'theme_location' => 'menu-haut', // Utilise le menu 'menu-haut' enregistré
                'container' => 'ul', // Enveloppe le menu dans une balise <ul>
                'menu_class' => 'navbar-nav ms-auto mb-2 mb-lg-0 small fw-bolder', // Classes CSS pour le menu
                'depth' => 2, // Permet d'afficher un sous-menu (dropdown) avec un niveau de profondeur
                //'walker' => new WP_Bootstrap_Navwalker() // Si tu utilises Bootstrap pour le menu dropdown
              )
            );
          ?>
          <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>


        <a class="cta-btn d-none d-sm-block" href="#appointment">Make an Appointment</a>

      </div>

    </div>

  </header>