<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php bloginfo( 'name' ); ?> — <?php bloginfo('description'); ?></title>
    <link rel="apple-touch-icon-precomposed" sizes="57x57"
          href="<?php echo get_bloginfo('template_directory'); ?>/dist/images/apple-touch-icon-57x57.png" />
    <link rel="apple-touch-icon-precomposed" sizes="114x114"
          href="<?php echo get_bloginfo('template_directory'); ?>/dist/images/apple-touch-icon-114x114.png" />
    <link rel="apple-touch-icon-precomposed" sizes="72x72"
          href="<?php echo get_bloginfo('template_directory'); ?>/dist/images/apple-touch-icon-72x72.png" />
    <link rel="apple-touch-icon-precomposed" sizes="144x144"
          href="<?php echo get_bloginfo('template_directory'); ?>/dist/images/apple-touch-icon-144x144.png" />
    <link rel="apple-touch-icon-precomposed" sizes="60x60"
          href="<?php echo get_bloginfo('template_directory'); ?>/dist/images/apple-touch-icon-60x60.png" />
    <link rel="apple-touch-icon-precomposed" sizes="120x120"
          href="<?php echo get_bloginfo('template_directory'); ?>/dist/images/apple-touch-icon-120x120.png" />
    <link rel="apple-touch-icon-precomposed" sizes="76x76"
          href="<?php echo get_bloginfo('template_directory'); ?>/dist/images/apple-touch-icon-76x76.png" />
    <link rel="apple-touch-icon-precomposed" sizes="152x152"
          href="<?php echo get_bloginfo('template_directory'); ?>/dist/images/apple-touch-icon-152x152.png" />
    <link rel="icon" type="image/png"
          href="<?php echo get_bloginfo('template_directory'); ?>/dist/images/favicon-196x196.png"
          sizes="196x196" />
    <link rel="icon" type="image/png"
          href="<?php echo get_bloginfo('template_directory'); ?>/dist/images/favicon-96x96.png"
          sizes="96x96" />
    <link rel="icon" type="image/png"
          href="<?php echo get_bloginfo('template_directory'); ?>/dist/images/favicon-32x32.png"
          sizes="32x32" />
    <link rel="icon" type="image/png"
          href="<?php echo get_bloginfo('template_directory'); ?>/dist/images/favicon-16x16.png"
          sizes="16x16" />
    <link rel="icon" type="image/png" 
          href="<?php echo get_bloginfo('template_directory'); ?>/dist/images/favicon-128.png"
          sizes="128x128" />
    <meta name="application-name" content="2nd Layer"/>
    <meta name="msapplication-TileColor" content="#FFFFFF" />
    <meta name="msapplication-TileImage" 
          content="<?php echo get_bloginfo('template_directory'); ?>/dist/images/mstile-144x144.png" />
    <meta name="msapplication-square70x70logo"
          content="<?php echo get_bloginfo('template_directory'); ?>/dist/images/mstile-70x70.png" />
    <meta name="msapplication-square150x150logo"
          content="<?php echo get_bloginfo('template_directory'); ?>/dist/images/mstile-150x150.png" />
    <meta name="msapplication-wide310x150logo"
          content="<?php echo get_bloginfo('template_directory'); ?>/dist/images/mstile-310x150.png" />
    <meta name="msapplication-square310x310logo"
          content="<?php echo get_bloginfo('template_directory'); ?>/dist/images/mstile-310x310.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.7.2/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans">
    <!-- Bulma Version 0.7.5 -->
    <link rel="stylesheet"
          href="<?php echo get_bloginfo('template_directory'); ?>/dist/css/main.bundle.css"
    />
    <script type="text/javascript">
      'use strict';

      document.addEventListener('DOMContentLoaded', function () {

        // Dropdowns in navbar

        var $dropdowns = getAll('.navbar-item.has-dropdown:not(.is-hoverable)');

        if ($dropdowns.length > 0) {
          $dropdowns.forEach(function ($el) {
            $el.addEventListener('click', function (event) {
              event.stopPropagation();
              $el.classList.toggle('is-active');
            });
          });

          document.addEventListener('click', function (event) {
            closeDropdowns();
          });
        }

        function closeDropdowns() {
          $dropdowns.forEach(function ($el) {
            $el.classList.remove('is-active');
          });
        }

        // Close dropdowns if ESC pressed
        document.addEventListener('keydown', function (event) {
          var e = event || window.event;
          if (e.keyCode === 27) {
            closeDropdowns();
          }
        });

        // Toggles

        var $burgers = getAll('.burger');

        if ($burgers.length > 0) {
          $burgers.forEach(function ($el) {
            $el.addEventListener('click', function () {
              var target = $el.dataset.target;
              var $target = document.getElementById(target);
              $el.classList.toggle('is-active');
              $target.classList.toggle('is-active');
            });
          });
        }

        // Functions

        function getAll(selector) {
          return Array.prototype.slice.call(document.querySelectorAll(selector), 0);
        }
      });
    </script>
    <link rel="stylesheet" href="<?php echo get_bloginfo('template_directory'); ?>/style.css">
    <?php wp_head(); ?>

  </head>
  <body id="site">
    <header>
      <div>
        <!-- START HEADER NAV -->
        <nav class="navbar is-spaced" role="navigation" aria-label="dropdown main navigation">
          <div class="navbar-brand">
            <!-- navbar items, navbar burger... -->
            <a href="<?php echo get_bloginfo('url'); ?>">
              <img class="navbar-item"
                   src="<?php echo get_bloginfo('template_directory'); ?>/dist/images/perlur-logo-basic.png"
                   style="height: 100px;"
              />
            </a>
            <div class="navbar-burger burger" data-target="HeaderMenu" aria-label="menu" aria-expanded="false">
              <span aria-hidden="true"></span>
              <span aria-hidden="true"></span>
              <span aria-hidden="true"></span>
            </div>
          </div>
          <div class="navbar-menu" id="HeaderMenu">
            <div class="navbar-end">
              <?php
                wp_nav_menu(
                  array (
                  'menu'           => 'header-menu',
                  'theme_location' => 'header-menu',
                  'container'      => false,
                  'walker'         => new Bulma_Nav_Walker(),
                  'items_wrap'     => '%3$s',
                  )
                );
              ?>

              <a class="navbar-item" href="https://www.facebook.com/2ndlayer.eu/">
                <i class="fab fa-facebook-square title"></i>
              </a>
              <a class="navbar-item" href="https://www.linkedin.com/company/2ndlayer/">
                <i class="fab fa-linkedin title"></i>
              </a>
              <a class="navbar-item" href="https://github.com/2nd-Layer">
                <i class="fab fa-github-square title"></i>
              </a>
              <a class="navbar-item" href="https://www.youtube.com/channel/UCncyGaCH5emsxroa3-YIb_A/">
                <i class="fab fa-youtube-square title"></i>
              </a>
            </div>
          </div>
        </nav>
        <!-- END HEADER NAV -->
      </div>
    </header>
