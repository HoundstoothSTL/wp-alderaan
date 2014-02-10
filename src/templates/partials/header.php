<?php $title = get_the_title(); ?>
<body id="<?= str_replace(' ', '-', strtolower($title)); ?>" <?php body_class() ?>>

    <nav class="primary-navigation" data-js="nav">
        <div class="container">
            <a href="<?php bloginfo('url') ?>" class="nav-logo">
                <img 
                    src="<?php bloginfo('stylesheet_directory') ?>/assets/img/logo-full.png" 
                    alt="Pixel Press Logo" 
                    width="125"
                    height="25">
            </a>

            <a href="#" class="navicon" data-js="navToggle"><i class="fa fa-reorder"></i></a>
        </div>
    </nav>

    <div class="main-content" role="main">