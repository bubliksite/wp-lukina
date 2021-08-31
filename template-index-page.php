
<?php

/*
Template name: Главная страница
Template Post Type: page
Theme URI:
Description: Тема главной страницы
Author: Сергей Москаленко
Author URI: http://bublik.site
Version: 1.0
*/

?>

<?php get_header(); ?>

<?
$slider = CFS()->get('sliderLoop');
include 'components/slider.php'
?>


<section class="excerpt bg-primary py-5">
    <div class="container">
        <hr>
        <p class="lead text-center my-5">
            <em><? echo CFS()->get('excerpt'); ?></em>
        </p>
        <hr>
    </div>
</section>
<section class="casual programs py-5" id="programs">
    <div class="container my-5">
        <div class="row">
            <? foreach ([20, 22] as $page) : ?>
            <div class="col-md-6 mb-5">
                <h2 class="mb-5"><? echo get_the_title($page); ?></h2>
                <hr>
                <p class="mt-5 pe-md-5 pe-0"><? echo CFS()->get('about', $page) ?></p>
                <a href="<? echo get_the_permalink($page); ?>" class="my5 text-uppercase"><? echo CFS()->get('link', $page) ?><i class="ms-3 bi bi-arrow-right"></i></a>
            </div>
            <? endforeach; ?>
        </div>
    </div>
</section>
<section class="casual bg-primary about py-5" id="about">
    <div class="container py-5">
        <h2 class="mb-5">О центре</h2>
        <hr>
        <div class="row">
            <div class="col-md-6">
                <p><? echo CFS()->get('aboutDescription') ?></p>
            </div>
            <div class="col-md-6 d-flex align-items-center h-100">
                <div class="mx-auto text-center main-image">
                    <img class="w-100" src="<? echo CFS()->get('aboutPhoto') ?>" alt="">
                    <p class="my-5 small-excerpt">
                        <small>
                            <em><? echo CFS()->get('aboutExcerpt') ?></em>
                        </small>
                    </p>
                    <? include 'components/socials.php'?>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="casual philosophy py-5">
    <div class="container my-5">
        <h2 class="mb-5">Философия</h2>
        <hr>
        <p class="my-5"><? echo CFS()->get('partText') ?></p>
        <div class="text-center">
            <img class="mx-auto w-100 d-none d-md-block" src="<? echo CFS()->get('imageDesktop') ?>" alt="">
            <img class="mx-auto w-100 d-md-none d-block" src="<? echo CFS()->get('imageMobile') ?>" alt="">
        </div>
        <div class="mt-5 mb-3 philosophy_card">
            <div class="p-3">
                <p class="m-0"><? echo CFS()->get('cardText') ?></p>
            </div>
        </div>
        <p class="text-end" style="width: 480px; max-width: 90%; float: right">
            <em>Подробнее о направлениях работы, услугах и специалистах центра смотрите в раздел Услуги.</em>
        </p>
    </div>
</section>

<? $blogs = get_posts(['numberposts'=> 5]) ?>
<section class="casual bg-primary blog py-5">
    <div class="container my-5">
        <h2 class="mb-5">Блог</h2>
        <hr>
        <div class="row my-5">
            <? foreach ($blogs as $blog) : ?>
                <div class="col-md-6 mb-5">
                    <div class="row">
                        <div class="col-4">
                            <img class="w-100" src="<? echo get_the_post_thumbnail_url($blog->ID) ?>" alt="">
                        </div>
                        <div class="col-8">
                            <div class="post__title">
                                <p class="m-0 p-1"><? echo $blog->post_title ?></p>
                            </div>
                            <p class="mt-2 mb-0 post__short">
                                <small class="text-muted">
                                    <? echo CFS()->get('short', $blog->ID) ?>
                                </small>
                            </p>
                            <p class="mt-2 mb-0 post__text">
                                <? echo $blog->post_content ?>
                            </p>
                            <a class="pt-2" href="<? echo get_the_permalink($blog->ID) ?>">
                                <small>Читать далее>></small>
                            </a>
                        </div>
                    </div>
                </div>
            <? endforeach; ?>
            <a href="/blog" class="my-5">Больше публикаций<i class="ms-3 bi bi-arrow-right"></i></a>
        </div>
    </div>
</section>

<? $partners = CFS()->get('partnersLoop'); ?>
<section class="casual partners py-5">
    <div class="container my-5">
        <h2 class="mb-5">Партнеры</h2>
        <hr>
        <div class="row my-5">
            <? foreach ($partners as $partner) : ?>
            <div class="col-md-6 col-md-3 mb-3">
                <div class="d-flex justify-content-center">
                    <img src="<? echo $partner['partnerImage']; ?>" alt="<? echo $partner['partnerName']; ?>">
                </div>
                <p class="my-4 px-3"><? echo $partner['partnerName']; ?></p>
            </div>
            <? endforeach; ?>
        </div>
    </div>
</section>

<script>
    $(document).ready(function(){
        $(".owl-carousel-slider").owlCarousel({
            items: 1,
            dots: true
        });
    });
</script>

<?php get_footer(); ?>