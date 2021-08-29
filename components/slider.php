<section class="slider">
    <div class="owl-carousel owl-carousel-slider">
        <? foreach ($slider as $index=>$slide) : ?>
            <div class="slider__item d-flex justify-content-center">
                <video id="video_<?echo $index?>" poster="<? echo $slide['poster']; ?>">
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