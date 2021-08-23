
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