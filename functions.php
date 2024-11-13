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

function generate_vcard()
{
  // Informações do contato
  $name = get_theme_mod('cartao_nome', 'Seu Nome');
  $company = get_bloginfo('name');
  $phone = get_theme_mod('cartao_phone', '');
  $email = get_theme_mod('cartao_email', '');
  $website = get_theme_mod('cartao_website', '');
  $position = get_theme_mod('cartao_cargo', '');

  // Conteúdo do vCard
  $vcard = "BEGIN:VCARD\r\n";
  $vcard .= "VERSION:3.0\r\n";
  $vcard .= "FN:" . $name . "\r\n";
  $vcard .= "ORG:" . $company . "\r\n";
  if (!empty($position)) {
    $vcard .= "TITLE:" . $position . "\r\n";
  }
  if (!empty($phone)) {
    $vcard .= "TEL;TYPE=WORK,VOICE:" . $phone . "\r\n";
  }
  if (!empty($email)) {
    $vcard .= "EMAIL;TYPE=PREF,INTERNET:" . $email . "\r\n";
  }
  if (!empty($website)) {
    $vcard .= "URL:" . $website . "\r\n";
  }
  $vcard .= "END:VCARD\r\n";

  // Configurar cabeçalhos para download
  header("Content-type: text/x-vcard");
  header("Content-Disposition: attachment; filename=contato.vcf");
  header("Content-Length: " . strlen($vcard));
  echo $vcard;
  exit;
}

function cartao_digital_customizer($wp_customize)
{
  $wp_customize->add_section('cartao_digital_section', array(
    'title' => 'Cartão Digital',
    'priority' => 30,
  ));

  // Nome
  $wp_customize->add_setting('cartao_nome');
  $wp_customize->add_control('cartao_nome', array(
    'label' => 'Nome',
    'section' => 'cartao_digital_section',
    'type' => 'text',
  ));

  // Cargo
  $wp_customize->add_setting('cartao_cargo');
  $wp_customize->add_control('cartao_cargo', array(
    'label' => 'Cargo',
    'section' => 'cartao_digital_section',
    'type' => 'text',
  ));

  // Logo
  $wp_customize->add_setting('cartao_logo');
  $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'cartao_logo', array(
    'label' => 'Logo',
    'section' => 'cartao_digital_section',
  )));

  // Foto de Perfil
  $wp_customize->add_setting('cartao_photo');
  $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'cartao_photo', array(
    'label' => 'Foto de Perfil',
    'section' => 'cartao_digital_section',
  )));

  // WhatsApp
  $wp_customize->add_setting('cartao_whatsapp');
  $wp_customize->add_control('cartao_whatsapp', array(
    'label' => 'Número do WhatsApp',
    'section' => 'cartao_digital_section',
    'type' => 'text',
  ));

  // Telefone
  $wp_customize->add_setting('cartao_phone');
  $wp_customize->add_control('cartao_phone', array(
    'label' => 'Número de Telefone',
    'section' => 'cartao_digital_section',
    'type' => 'text',
  ));

  // E-mail
  $wp_customize->add_setting('cartao_email');
  $wp_customize->add_control('cartao_email', array(
    'label' => 'E-mail',
    'section' => 'cartao_digital_section',
    'type' => 'email',
  ));

  // Website
  $wp_customize->add_setting('cartao_website');
  $wp_customize->add_control('cartao_website', array(
    'label' => 'Website',
    'section' => 'cartao_digital_section',
    'type' => 'url',
  ));

  // Instagram
  $wp_customize->add_setting('cartao_instagram');
  $wp_customize->add_control('cartao_instagram', array(
    'label' => 'Nome de usuário do Instagram',
    'section' => 'cartao_digital_section',
    'type' => 'text',
  ));

  // Localização
  $wp_customize->add_setting('cartao_location');
  $wp_customize->add_control('cartao_location', array(
    'label' => 'Link da Localização',
    'section' => 'cartao_digital_section',
    'type' => 'url',
  ));
}
add_action('customize_register', 'cartao_digital_customizer');
add_action('wp_ajax_generate_vcard', 'generate_vcard');
add_action('wp_ajax_nopriv_generate_vcard', 'generate_vcard');
