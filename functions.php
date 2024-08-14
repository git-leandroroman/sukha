<?php

define('HISDIR', get_template_directory_uri());
define('HISINC', get_template_directory());

show_admin_bar(false);

function his_load_files_prod()
{
  wp_enqueue_style('style', get_stylesheet_uri());
  wp_enqueue_style('his-style', HISDIR . '/css/theme.css');
  wp_enqueue_style('his-theme', HISDIR . '/css/custom.css');
  wp_enqueue_style('his-elements', HISDIR . '/css/theme-elements.css');
  wp_enqueue_style('his-blog', HISDIR . '/css/theme-blog.css');
  wp_enqueue_style('his-shop', HISDIR . '/css/theme-shop.css');
  wp_enqueue_style('his-minhaHist', HISDIR . '/css/theme-sukha.css');
  wp_enqueue_style('his-fontsWald', HISDIR . '/css/fonts/stylesheet.css');

  wp_enqueue_style('his-flip', HISDIR . '/vendor/circle-flip-slideshow/css/component.css');
  wp_enqueue_style('his-skins', HISDIR . '/css/skins/default.css');
  wp_enqueue_style('his-skin-landing', HISDIR . '/css/skins/skin-landing.css');

  wp_enqueue_style('his-demo-landing', HISDIR . '/css/demo/demo-landing.css');

  wp_enqueue_style('his-bootstrap', HISDIR . '/vendor/bootstrap/css/bootstrap.min.css');
  wp_enqueue_style('his-fontawesome', HISDIR . '/vendor/fontawesome-free/css/all.min.css');
  wp_enqueue_style('his-animate', HISDIR . '/vendor/animate/animate.compat.css');
  wp_enqueue_style('his-simple', HISDIR . '/vendor/simple-line-icons/css/simple-line-icons.min.css');
  wp_enqueue_style('his-owl', HISDIR . '/vendor/owl.carousel/assets/owl.theme.default.min.css');
  wp_enqueue_style('his-carousel', HISDIR . '/vendor/owl.carousel/assets/owl.carousel.min.css');
  wp_enqueue_style('his-popup', HISDIR . '/vendor/magnific-popup/magnific-popup.min.css');

  wp_enqueue_script('his-vendor', sprintf("%s/vendor/plugins/js/plugins.min.js", HISDIR), $deps = [], '', true);
  wp_enqueue_script('his-flip-js', sprintf("%s/vendor/circle-flip-slideshow/js/jquery.flipshow.min.js", HISDIR), $deps = [], '', true);
  wp_enqueue_script('his-view-js', sprintf("%s/js/views/view.home.js", HISDIR), $deps = [], '', true);
  wp_enqueue_script('his-theme', sprintf("%s/js/theme.js", HISDIR), $deps = [], '', true);
  wp_enqueue_script('his-custom', sprintf("%s/js/custom.js", HISDIR), $deps = [], '', true);
  wp_enqueue_script('his-init', sprintf("%s/js/theme.init.js", HISDIR), $deps = [], '', true);

  wp_enqueue_script('his-script-font', 'https://kit.fontawesome.com/9b30fc358a.js', $deps = [], '', false);
}

add_action('wp_enqueue_scripts', 'his_load_files_prod');

include_once(HISINC . '/functions.php');

if (function_exists('register_nav_menus')) {
  register_nav_menus([
    'main' => 'Principal',
    'footer' => 'Rodapé',
  ]);
}

add_theme_support('post-thumbnails');
add_theme_support('woocommerce');

