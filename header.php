<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My site</title>

    <?php wp_head(); ?>
</head>

<body>
    <header class="header">
        <nav id="nav" class="nav">
            <a class="phone" href="tel:<?php the_field('phone-link') ?>"><?php the_field('phone') ?></a>
            <span class="hamburger" id="hamburger"></span>
        </nav>
        <div class="header-inner" id="header-inner">
            <div class="header-inner-description">
                <h1 class="description__title"><?php the_field('title') ?></h1>
                <p class="description__text"><?php the_field('description-text') ?></p>
                <a class="btn description__btn" href="#catalog">ЗАБРОНИРОВАТЬ</a>
            </div>
            <div class="header-inner__bgimage"></div>
        </div>
    </header>