<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">

    <?php
    // Obtenha os dados do Customizer
    $nome_ceo = get_theme_mod('cartao_nome', 'Nome da CEO');
    $cargo_ceo = get_theme_mod('cartao_cargo', 'Cargo da CEO');
    $logo_url = get_theme_mod('cartao_logo', get_template_directory_uri() . '/images/default-logo.png');
    $site_url = home_url('/cartao'); // Ajuste isso para a URL correta do seu cartão digital

    // Certifique-se de que a URL da logo é absoluta
    if (!filter_var($logo_url, FILTER_VALIDATE_URL)) {
        $logo_url = get_site_url() . $logo_url;
    }
    ?>

    <title><?php echo esc_html($nome_ceo); ?> - Cartão Digital | Sukha</title>

    <meta name="description" content="<?php echo esc_attr($cargo_ceo); ?> | Sukha">
    <meta name="author" content="digital.leandroroman.com">
    <meta name="keywords" content="Cartão Digital, <?php echo esc_attr($nome_ceo); ?>, <?php echo esc_attr($cargo_ceo); ?>, Sukha">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo esc_url($site_url); ?>">
    <meta property="og:title" content="<?php echo esc_attr($nome_ceo); ?> - Cartão Digital">
    <meta property="og:description" content="<?php echo esc_attr($cargo_ceo); ?> | Sukha">
    <meta property="og:image" content="<?php echo esc_url($logo_url); ?>">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:site_name" content="<?php echo esc_attr(get_bloginfo('name')); ?>">

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="<?php echo esc_url($site_url); ?>">
    <meta name="twitter:title" content="<?php echo esc_attr($nome_ceo); ?> - Cartão Digital">
    <meta name="twitter:description" content="<?php echo esc_attr($cargo_ceo); ?> | Sukha">
    <meta name="twitter:image" content="<?php echo esc_url($logo_url); ?>">

    <!-- Web Fonts -->
    <link id="googleFonts" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800%7CShadows+Into+Light&display=swap" rel="stylesheet" type="text/css">

    <?php wp_head(); ?>
</head>

<body data-plugin-page-transition>