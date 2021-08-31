<?php

/*
Template name: Программы
Template Post Type: page
Theme URI:
Description: Тема страницы программ
Author: Сергей Москаленко
Author URI: http://bublik.site
Version: 1.0
*/

?>

<?php get_header(); ?>

<? $slider = CFS()->get('sliderLoop'); ?>

<section class="slider">
    <div class="owl-carousel owl-carousel-slider">
        <? foreach ($slider as $index=>$slide) : ?>
            <div class="slider__item d-flex justify-content-center">
                <video id="video_<?echo $index?>" poster="<? echo $slide['poster']; ?>">
                    <source src="<? echo $slide['video'] ?>" type="video/mp4">
                </video>
                <div class="item__caption position-absolute h-100 w-100" id="caption_<? echo $index; ?>">
                    <div class="container h-100">
                        <div class="row h-100">
                            <div class="col-md-6"></div>
                            <div class="col-md-6 d-flex align-items-center" id="caption_text_<?echo $index;?>">
                                <div>
                                    <h2 class="fw-bold mb-3 text-uppercase" style="color: #F5B22B">
                                        <? echo the_title() ?>
                                    </h2>
                                    <p class="text-white">
                                        <? echo CFS()->get('about') ?>
                                    </p>
                                    <? if ($slide['isShowButton']) : ?>
                                        <div class="caption__button mt-5 d-flex justify-content-start">
                                            <button class="btn btn-yell-outline" data-bs-toggle="modal" data-bs-target="#modalFeedback">
                                                Написать
                                            </button>
                                        </div>
                                    <? endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item__controls">
                    <div class="controls__play active" id="play_<? echo $index ?>" onclick="playVideo(<?echo $index?>)">
                        <i class="bi bi-play-fill" style="font-size: 48px"></i>
                    </div>
                    <div class="controls__pause disabled" id="pause_<? echo $index ?>" onclick="pauseVideo(<?echo $index?>)">
                        <i class="bi bi-pause-fill" style="font-size: 48px"></i>
                    </div>
                </div>
            </div>
        <? endforeach; ?>
    </div>
</section>
<section class="navigation bg-primary py-5">
    <? $categories = get_terms('programscategory', array('parent' => CFS()->get('category')[0], 'fields' => 'all') ); ?>
    <div class="container">
        <div class="py-5">
            <div class="nav nav-tabs row align-items-end" style="border-bottom: none" id="nav-tab" role="tablist">
                <? foreach ($categories as $index=>$category) : ?>
                    <div class="col-6 navigation__item p-0 <? echo $index == 0 ? 'active' : '' ?>" id="nav-<? echo $category->slug; ?>-tab" data-bs-toggle="tab" data-bs-target="#nav-<? echo $category->slug; ?>" type="button" role="tab" aria-controls="nav-<? echo $category->slug; ?>" aria-selected="true">
                        <h4 class="fw-bold text-uppercase px-3"><? echo $category->name; ?></h4>
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
                            'post_type' => 'programs',
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'programscategory',
                                    'field' => 'term_id',
                                    'terms' => $category->term_id
                                )
                            )
                        )
                    );
                    ?>
                    <div class="owl-carousel owl-carousel-programs d-flex align-items-center">
                        <? while ( $query->have_posts() ) : $query->the_post() ?>
                        <div class="program__card p-3 col">
                            <h5 class="fw-bold my-4"><? echo the_title() ?></h5>
                            <p class="text-start"><? echo CFS()->get('description') ?></p>
                            <br>
                            <div class="text-end more-link">
                                <a href="<? the_permalink() ?>" class="link-default">Подробнее <i class="bi bi-arrow-right-short"></i></a>
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
<section class="excerpt py-5">
    <div class="container">
        <hr>
        <p class="lead text-center my-2">
            <em><? echo CFS()->get('excerpt'); ?></em>
        </p>
        <hr>
    </div>
</section>
<section class="casual bg-primary about py-5" id="about">
    <div class="container py-5">
        <h2 class="mb-5">От автора</h2>
        <hr>
        <div class="row mt-5">
            <div class="col-md-6">
                <p><? echo CFS()->get('authorDescription') ?></p>
            </div>
            <div class="col-md-6 d-flex align-items-center h-100">
                <div class="mx-auto text-center main-image">
                    <img class="w-100" src="<? echo CFS()->get('authorPhoto') ?>" alt="">
                    <p class="my-5 small-excerpt">
                        <small>
                            <em><? echo CFS()->get('authorExcerpt') ?></em>
                        </small>
                    </p>
                    <? include 'components/socials.php'?>
                </div>
            </div>
        </div>
    </div>
</section>
<!--<section class="casual team py-5">-->
<!--    <div class="container py-5">-->
<!--        <h2 class="mb-5">Преподаватели</h2>-->
<!--        <hr>-->
<!--        --><?// $team = CFS()->get('loopEmployees') ?>
<!--        <div class="owl-carousel owl-carousel-team my-5">-->
<!--            --><?// foreach ($team as $member) : ?>
<!--                <div class="team__item">-->
<!--                    <div class="team__image">-->
<!--                        <img src="--><?// echo $member['image']; ?><!--" alt="">-->
<!--                    </div>-->
<!--                    <p class="mt-3">--><?// echo $member['name']; ?><!--</p>-->
<!--                    <a href="#" data-bs-toggle="modal" data-bs-target="#modalSchedule" class="link-default">Записаться</a>-->
<!--                </div>-->
<!--            --><?// endforeach; ?>
<!--        </div>-->
<!--    </div>-->
<!--</section>-->

<script>
    $(document).ready(function(){
        $(".owl-carousel-slider").owlCarousel({
            items: 1,
            dots: '<? count($slider) ?>' ? true : false,
        });
    });
    $(document).ready(function(){
        $(".owl-carousel-programs").owlCarousel({
            margin: 30,
            loop: true,
            nav: true,
            navText: ['<i class="bi bi-chevron-left"></i>', '<i class="bi bi-chevron-right"></i>'],
            responsiveClass: true,
            responsive: {
                0: {items: 1},
                768: {items: 3}
            }
        });
    });
    $(document).ready(function(){
        $(".owl-carousel-team").owlCarousel({
            nav: true,
            navText: ['<i class="bi bi-chevron-left"></i>', '<i class="bi bi-chevron-right"></i>'],
            responsiveClass:true,
            responsive: {
                0: {
                    items: 1,
                },
                768: {
                    items: 4,
                }
            }
        });
    });
</script>

<?php get_footer(); ?>
