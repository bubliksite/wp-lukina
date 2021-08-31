
<?php

/*
Template name: Блог
Template Post Type: page
Theme URI:
Description: Тема страницы блога
Author: Сергей Москаленко
Author URI: http://bublik.site
Version: 1.0
*/

?>

<?php get_header(); ?>

<section class="for-header"></section>
<section class="title casual">
    <div class="container my-5">
        <h2 class="mb-5">Блог</h2>
        <hr>
    </div>
</section>
<section class="navigation pb-5 blog">
    <? $categories = get_terms('category', array('fields' => 'all') ); ?>
    <div class="container">
        <div class="py-5">
            <div class="nav nav-tabs row align-items-end" style="border-bottom: none" id="nav-tab" role="tablist">
                <? foreach ($categories as $index=>$category) : ?>
                    <div class="navigation__item col-4 p-0 <? echo $index == 0 ? 'active' : '' ?>" id="nav-<? echo $category->slug; ?>-tab" data-bs-toggle="tab" data-bs-target="#nav-<? echo $category->slug; ?>" type="button" role="tab" aria-controls="nav-<? echo $category->slug; ?>" aria-selected="true">
                        <h4 class="fw-bold px-3"><? echo $category->name; ?></h4>
                        <div class="navigation__bar">
                            <div class="inner"></div>
                        </div>
                    </div>
                <? endforeach; ?>
            </div>
        </div>
        <div class="tab-content" id="nav-tabContent">
            <? foreach ($categories as $index=>$category) : ?>
                <div class="tab-pane fade <? echo $index == 0 ? 'show active' : '' ?>" id="nav-<? echo $category->slug; ?>" role="tabpanel" aria-labelledby="nav-<? echo $category->slug; ?>-tab">
                    <?
                    $query = new WP_Query(
                        array(
                            'post_type' => 'post',
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'category',
                                    'field' => 'term_id',
                                    'terms' => $category->term_id
                                )
                            )
                        )
                    );
                    ?>
                    <div class="row posts">
                        <? while ( $query->have_posts() ) : $query->the_post() ?>
                            <div class="col-md-<? echo $category->term_id === 3 ? '4' : '6' ?> position-relative mb-3">
                                <div class="row">
                                    <div class="col-md-4 text-center">
                                        <img
                                            class="<? if ($category->term_id === 3) {echo 'interview';} else if ($category->term_id === 2) {echo 'books';} else {echo 'articles';} ?>"
                                            src="<? echo get_the_post_thumbnail_url() ?>"
                                            alt="">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="post__title">
                                            <h6 class="m-0 p-1 fw-bold"><? echo the_title() ?></h6>
                                        </div>
                                        <? if ($category->term_id !== 3) : ?>
                                        <p class="mt-2 mb-0 post__short">
                                            <small class="text-muted">
                                                <? echo CFS()->get('short') ?>
                                            </small>
                                        </p>
                                        <p class="mt-2 mb-0 post__text">
                                            <? echo the_excerpt(); ?>
                                        </p>
                                        <? endif; ?>
                                        <a class="pt-2 stretched-link" href="<? echo get_the_permalink() ?>">
                                            <? echo $category->term_id === 3 ? '' : '<small>Читать далее>></small>' ?>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <? endwhile; ?>
                        <?php wp_reset_query(); ?>
                    </div>
                </div>
            <? endforeach; ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>
