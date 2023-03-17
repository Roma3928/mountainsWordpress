<?php
/*
Template Name: home
*/
?>

<?php get_header(); ?>

<main class="main" id="main">
    <section class="author" id="author">
        <div class="container">
            <div class="author-info">
                <h2 class="author-info__title">Немного об авторе</h2>
                <p class="author-info__text"><?php the_field('author-info') ?></p>
                <div class="author-info__avatar"></div>
            </div>
        </div>
    </section>

    <section class="catalog">
        <div class="container">
            <h2 class="ttl catalog__title" id="catalog">Какие путешествия можно выбрать ?</h2>
            <h3 class="catalog__subtitle_top">Многодневные</h3>
            <ul class="catalog__list">

            <?php
            global $post;

            $myposts = get_posts([ 
                'numberposts' => -1,
                'category_name' => 'catalog',
                'tag'  => 'multiday-trips'
            ]);

            if( $myposts ){
                foreach( $myposts as $post ){
                    setup_postdata( $post );
            ?>
                    <li class="catalog__item">
                        <div class="catalog__item-box_top">
                        <?php the_post_thumbnail(
                            array(268, 220),
                            array(
                            'class' => 'catalog__item-box_top-img'
                            )
                        ); ?>
                            <div class="item_place"><?php the_title(); ?> </div>
                            <a href="#modal_one" rel="modal:open">Подробнее</a>
                        </div>
                        <div class="catalog__item-box_bottom">
                            <span></span>
                            <p class="item-box_day"><?php the_field('item-day'); ?></p>
                            <p class="item-box_price"><?php the_field('item-price'); ?></p>
                        </div>
                    </li>

            <?php } } wp_reset_postdata();?>      

            </ul>

            <h3 class="catalog__subtitle_bottom">Однодневные</h3>
            <ul class="catalog__list">

            <?php
            global $post;

            $myposts = get_posts([ 
                'numberposts' => -1,
                'category_name' => 'catalog',
                'tag'  => 'day-trips'
            ]);

            if( $myposts ){
                foreach( $myposts as $post ){
                    setup_postdata( $post );
            ?>
                    <li class="catalog__item">
                        <div class="catalog__item-box_top">
                        <?php the_post_thumbnail(
                            array(268, 220),
                            array(
                            'class' => 'catalog__item-box_top-img'
                            )
                        ); ?>
                            <div class="item_place"><?php the_title(); ?> </div>
                            <a href="#<?php the_ID() ?>" rel="modal:open"><?php the_field('href'); ?>Подробнее</a>
                        </div>
                        <div class="catalog__item-box_bottom">
                            <span></span>
                            <p class="item-box_day"><?php the_field('item-day'); ?></p>
                            <p class="item-box_price"><?php the_field('item-price'); ?></p>
                        </div>
                    </li>

            <?php } } wp_reset_postdata();?> 

            </ul>
        </div>
    </section>

    <section class="advantage" id="advantage">
        <div class="container">
            <h2 class="ttl advantage__title">Почему путешествуют с нами?</h2>
            <?php the_field('advantage-list'); ?>
        </div>
    </section>

    <section class="gallery" id="gallery">
        <div class="container">
            <h2 class="ttl gallery__title">Атмосфера наших путешествий</h2>
            <ul class="gallery__list" id="ul-li">
            <?php
            global $post;

            $myposts = get_posts([ 
                'numberposts' => -1,
                'category_name' => 'gallery'
            ]);

            if( $myposts ){
                foreach( $myposts as $post ){
                    setup_postdata( $post );
            ?>
                    <li class="gallery__item" data-src="<?php the_post_thumbnail_url(); ?>">
                    <?php the_post_thumbnail(
                            array(275, 206),
                            array(
                            'class' => 'gallery-box__photo'
                            )
                        ); ?>
                    </li>

            <?php } } wp_reset_postdata();?> 
            </ul>
        </div>
    </section>

    <section class="faq" id="faq">
        <div class="container">
            <h2 class="ttl faq__title">Ответы на часто задаваемые вопросы</h2>
            <div class="accordion-container">

            <?php
            global $post;

            $myposts = get_posts([ 
                'numberposts' => -1,
                'category_name' => 'faq',
            ]);

            if( $myposts ){
                foreach( $myposts as $post ){
                    setup_postdata( $post );
            ?>
                <div class="ac">
                    <h2 class="ac-header">
                        <button type="button" class="ac-trigger"><?php the_title(); ?> </button>
                    </h2>
                    <div class="ac-panel">
                        <p class="ac-text"><?php the_field('answer-question'); ?> </p>
                    </div>
                </div>

            <?php } } wp_reset_postdata();?> 
            </div>
        </div>
    </section>

    <section class="form" id="form">
        <div class="form-box">
            <form class="form-box__form" method="post">
                <h2 class="form-box__title">Остались вопросы?</h2>
                <p class="form-box__text">Оставьте заявку и мы вам перезвоним в ближайшее время!</p>
                <?php echo do_shortcode('[contact-form-7 id="41" title="Контактная форма 1"]'); ?>
            </form>
        </div>
    </section>
</main>
    <?php get_footer(); ?>