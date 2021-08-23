
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

<? $slider = CFS()->get('sliderLoop'); ?>

<section class="slider">
    <div class="owl-carousel">
        <? foreach ($slider as $index=>$slide) : ?>
            <div class="slider__item d-flex justify-content-center">
                <video id="video_<?echo $index?>">
                    <source src="<? echo $slide['video'] ?>" type="video/mp4">
                </video>
                <div class="item__caption position-absolute h-100 w-100" id="caption_<? echo $index; ?>">
                    <div class="container h-100">
                        <div class="d-flex align-items-center h-100">
                            <div class="w-100">
                                <div class="caption__controls d-none d-sm-flex justify-content-end align-items-end w-100">
                                    <img id="collapse_<? echo $index; ?>" src="<?php echo get_template_directory_uri(); ?>/images/icons/IconCollapse.svg" alt="" onclick="collapseCaption(<? echo $index ?>)">
                                    <img style="display: none; width: 28px" id="expand_<? echo $index; ?>" src="<?php echo get_template_directory_uri(); ?>/images/icons/IconExpand.svg" alt="" onclick="expandCaption(<? echo $index ?>)">
                                    <img id="close_<? echo $index; ?>" src="<?php echo get_template_directory_uri(); ?>/images/icons/IconClose.svg" onclick="closeCaption(<?echo $index?>)">
                                </div>
                                <div id="caption_text_<?echo $index;?>">
                                    <div class="caption__title">
                                        <? echo $slide['title']; ?>
                                    </div>
                                    <p class="caption__subtitle">
                                        <? echo $slide['subtitle']; ?>
                                    </p>
                                    <div class="caption__button mt-5 d-flex justify-content-start">
                                        <a href="/kontakty" class="btn btn-yell-outline">Написать</a>
                                    </div>
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
<section class="excerpt py-5">
    <div class="container">
        <hr>
        <p class="lead text-center my-5">
            <em><? echo CFS()->get('excerpt'); ?></em>
        </p>
        <hr>
    </div>
</section>
<section class="programs py-5" id="programs">
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
<section class="about py-5">
    <div class="container py-5">
        <h2 class="mb-5">О центре</h2>
        <hr>
        <div class="row">
            <div class="col-md-6">
                <p><? echo CFS()->get('aboutDescription') ?></p>
            </div>
            <div class="col-md-6 d-flex align-items-center h-100">
                <div class="mx-auto text-center">
                    <img class="main-image" src="<? echo CFS()->get('aboutPhoto') ?>" alt="">
                    <p class="my-5 small-excerpt">
                        <small>
                            <em><? echo CFS()->get('aboutExcerpt') ?></em>
                        </small>
                    </p>
                    <div class="socials d-flex justify-content-center">
                        <a href="//instagram.com">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/icons/icon-instagram-small.svg" alt="">
                        </a>
                        <a href="//facebook.com">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/icons/icon-facebook-small.svg" alt="">
                        </a>
                        <a href="//youtube.com">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/icons/icon-youtube-small.svg" alt="">
                        </a>
                        <a href="//telegram.org">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/icons/icon-telegram-small.svg" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="philosophy py-5">
    <div class="container my-5">
        <h2 class="mb-5">Философия</h2>
        <hr>
        <p class="my-5"><? echo CFS()->get('partText') ?></p>
        <div class="text-center">
            <img class="mx-auto d-none d-md-block" src="<? echo CFS()->get('imageDesktop') ?>" alt="">
            <img class="mx-auto d-md-none d-block" src="<? echo CFS()->get('imageMobile') ?>" alt="">
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
<section class="blog py-5">
    <div class="container my-5">
        <h2 class="mb-5">Блог</h2>
        <hr>
        <div class="row my-5">
            <? foreach ($blogs as $blog) : ?>
                <div class="col-6 mb-5">
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

<script>
    playVideo = (index) => {
        const video = document.getElementById(`video_${index}`)
        const playButton = document.getElementById(`play_${index}`)
        const pauseButton = document.getElementById(`pause_${index}`)
        collapseCaption(index)
        video.play()
        playButton.classList.remove('active')
        playButton.classList.add('disabled')
        pauseButton.classList.add('active')
        pauseButton.classList.remove('disabled')
    }
    pauseVideo = (index) => {
        const video = document.getElementById(`video_${index}`)
        const pauseButton = document.getElementById(`pause_${index}`)
        const playButton = document.getElementById(`play_${index}`)
        video.pause()
        expandCaption(index)
        pauseButton.classList.remove('active')
        pauseButton.classList.add('disabled')
        playButton.classList.add('active')
        playButton.classList.remove('disabled')
    }

    closeCaption = (index) => {
        document.getElementById(`caption_${index}`).style.display = 'none'
    }
    collapseCaption = (index) => {
        document.getElementById(`caption_text_${index}`).style.display = 'none'
        document.getElementById(`caption_${index}`).classList.add('collapsed')
        document.getElementById(`collapse_${index}`).style.display = 'none'
        document.getElementById(`expand_${index}`).style.display = 'block'
    }
    expandCaption = (index) => {
        document.getElementById(`caption_text_${index}`).style.display = 'block'
        document.getElementById(`caption_${index}`).classList.remove('collapsed')
        document.getElementById(`collapse_${index}`).style.display = 'block'
        document.getElementById(`expand_${index}`).style.display = 'none'
    }
</script>

<script>
    $(document).ready(function(){
        $(".owl-carousel").owlCarousel({
            items: 1,
        });
    });
</script>

<?php get_footer(); ?>