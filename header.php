
<!DOCTYPE html>
<html class="wide wow-animation desktop rd-navbar-static-linked landscape" lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta property="og:title" content="<?php bloginfo('name'); wp_title(); ?>">
    <meta property="og:description" content="<?php bloginfo('description'); wp_title(); ?>">
    <meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/images/IMAGE">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/favicon.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700;800&family=Raleway:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400;1,600;1,700&display=swap" rel="stylesheet">
    <title><?php bloginfo('name'); wp_title(); ?></title>
    <?php wp_head(); ?>
</head>
<body>

<header class="w-100 py-lg-3 py-2">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <div class="logo">
                <a href="/">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/logo-white.svg" alt="">
                </a>
            </div>
            <div class="menu w-100 h-100 d-flex align-items-center justify-content-end">
                <?php
                wp_nav_menu( array(
                    'menu' => 'main',
                    'menu_class' => 'nav d-none d-md-flex w-100 justify-content-end align-items-center',
                    'container' => false,
                ) );
                ?>
                <button class="d-none d-md-flex btn menu-item" data-bs-toggle="modal" data-bs-target="#modalFeedback">
                    Записаться
                </button>
                <nav style="flex-wrap: nowrap" class="nav ms-3">
                    <a class="nav-link cursor-pointer d-block d-md-none" onclick="openMenu()">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/icons/IconHamburger.svg" alt="">
                    </a>
                    <a href="tel: +7 (999) 000-00-00" class="nav-link d-none d-md-block">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/icons/IconPhone.svg" alt="">
                    </a>
                    <a href="https://instagram.com" class="nav-link d-none d-md-block">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/icons/IconInstagram.svg" alt="">
                    </a>
                    <a href="https://lk.domain.name" class="nav-link">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/icons/IconUser.svg" alt="">
                    </a>
                </nav>
            </div>
        </div>
    </div>
</header>
    <div id="mobile-menu" class="d-block d-md-none closed">
        <div class="close-icon" onclick="closeMenu()">
            <img src="<?php echo get_template_directory_uri(); ?>/images/icons/IconCloseWhite.svg" alt="">
        </div>
        <div onclick="closeMenu()">
            <?php
            wp_nav_menu( array(
                'menu' => 'main',
                'menu_class' => 'my-5 mx-5 list-unstyled',
                'container' => false,
            ) );
            ?>
        </div>
    </div>
<script>
    openMenu = () => {
        document.getElementById('mobile-menu').classList.remove('closed')
        document.getElementById('mobile-menu').classList.add('opened')
    }
    closeMenu = () => {
        document.getElementById('mobile-menu').classList.add('closed')
        document.getElementById('mobile-menu').classList.remove('opened')
    }
</script>