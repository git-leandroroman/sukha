<?php

/**
 * Template Name: Cartao
 */

get_template_part('header-cartao');
?>

<meta property="og:title" content="<?php echo get_theme_mod('Sukha Negócios Imobiliários', 'Vanessa Azevedo Rocha'); ?> - Cartão Digital">
<meta property="og:description" content="<?php echo get_theme_mod('CEO', 'CEO'); ?>">
<meta property="og:image" content="<?php echo get_theme_mod('cartao_photo', get_template_directory_uri() . '/img/fundos/perfil.jpg'); ?>">

<style>
    .cartao-digital {
        position: relative;
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 20px;
        margin-bottom: -50px;
    }

    .background-texture {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-image: url('<?= HISDIR ?>/img/fundos/cimento-queimado.jpg');
        background-size: cover;
        background-position: center;
        opacity: 1;
        z-index: -1;
    }

    .cartao-content {
        background-color: rgba(255, 255, 255, 0.2);
        border-radius: 20px;
        padding: 40px;
        text-align: center;
        max-width: 400px;
        width: 100%;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .logo img {
        max-width: 200px;
        margin-bottom: 20px;
    }

    .profile-photo {
        width: 150px;
        height: 150px;
        border-radius: 50%;
        overflow: hidden;
        margin: 0 auto 20px;
        border: 5px solid #294d93;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .profile-photo img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .save-contact-btn {
        background-color: #f1ce00;
        border: none;
        color: #294d93;
        padding: 10px 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 20px 0;
        cursor: pointer;
        border-radius: 5px;
        transition: background-color 0.3s;
    }

    .save-contact-btn:hover {
        background-color: #45a049;
    }

    .contact-icons {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        gap: 20px;
    }

    .contact-icons a {
        color: #333;
        font-size: 24px;
        transition: color 0.3s;
    }

    .contact-icons a:hover {
        color: #4CAF50;
    }

    @media (max-width: 480px) {
        .cartao-content {
            padding: 20px;
        }

        .profile-photo {
            width: 150px;
            height: 150px;
        }

        .contact-icons {
            gap: 15px;
        }

        .contact-icons a {
            font-size: 20px;
        }
    }
</style>

<div class="cartao-digital">
    <div class="background-texture"></div>

    <div class="cartao-content">
        <div class="logo">
            <img src="<?php echo get_theme_mod('cartao_logo', get_template_directory_uri() . '/images/default-logo.png'); ?>" alt="Logo">
        </div>

        <div class="profile-photo">
            <img src="<?php echo get_theme_mod('cartao_photo', get_template_directory_uri() . '/images/default-profile.jpg'); ?>" alt="Foto de Perfil">
        </div>

        <div class="profile-info">
            <h2 class="profile-name"><?php echo get_theme_mod('cartao_nome', 'Seu Nome'); ?></h2>
            <p class="profile-position"><?php echo get_theme_mod('cartao_cargo', 'Seu Cargo'); ?></p>
        </div>

        <button id="saveContact" class="save-contact-btn">
            <i class="fas fa-user-plus"></i> Salvar Contato
        </button>

        <div class="contact-icons">
            <a href="https://wa.me/<?php echo get_theme_mod('cartao_whatsapp'); ?>" target="_blank"><i class="fab fa-whatsapp" style="color: #294d93;"></i></a>
            <a href="tel:<?php echo get_theme_mod('cartao_phone'); ?>"><i class="fas fa-phone" style="color: #294d93;"></i></a>
            <a href="mailto:<?php echo get_theme_mod('cartao_email'); ?>"><i class="fas fa-envelope" style="color: #294d93;"></i></a>
            <a href="<?php echo get_theme_mod('cartao_website'); ?>" target="_blank"><i class="fas fa-globe" style="color: #294d93;"></i></a>
            <a href="https://instagram.com/<?php echo esc_attr(trim(get_theme_mod('cartao_instagram', ''))); ?>" target="_blank"><i class="fab fa-instagram" style="color: #294d93;"></i></a>
            <a href="<?php echo get_theme_mod('cartao_location'); ?>" target="_blank"><i class="fas fa-map-marker-alt" style="color: #294d93;"></i></a>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const saveContactButton = document.getElementById('saveContact');

        saveContactButton.addEventListener('click', function() {
            const vcardUrl = '<?php echo admin_url('admin-ajax.php?action=generate_vcard'); ?>';

            fetch(vcardUrl)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Resposta da rede não foi ok');
                    }
                    return response.blob();
                })
                .then(blob => {
                    const url = window.URL.createObjectURL(blob);
                    const a = document.createElement('a');
                    a.style.display = 'none';
                    a.href = url;
                    a.download = 'contato.vcf';
                    document.body.appendChild(a);
                    a.click();
                    window.URL.revokeObjectURL(url);
                })
                .catch(error => {
                    console.error('Erro ao baixar o vCard:', error);
                    alert('Desculpe, houve um erro ao tentar salvar o contato. Por favor, tente novamente mais tarde.');
                });
        });
    });
</script>

<?php get_template_part('footer-cartao'); ?>