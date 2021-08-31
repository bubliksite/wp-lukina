<?php

/*
Template name: Услуги
Template Post Type: page
Theme URI:
Description: Тема страницы услуги
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

<section class="casual directions py-5">
    <div class="container py-5">
        <h2 class="mb-5">Направления</h2>
        <hr>
        <p class="my-5">
            В центре проводится психологическое консультирование в соответствии со стандартами и требованиями ЕАС
            (Европейской Ассоциации Психологического Консультирования) по всем основным направлениям:
        </p>

        <? $directions = CFS()->get('loopDirections') ?>
        <ul>
            <? foreach ($directions as $direction) : ?>
            <li class="d-flex align-items-center my-3">
                <img src="<?php echo get_template_directory_uri(); ?>/images/icons/IconCheck.svg" alt="">
                <p class="m-0 ms-3"><? echo $direction['direction']; ?></p>
            </li>
            <? endforeach; ?>
        </ul>
    </div>
</section>
<section class="casual bg-primary consultations py-5" id="schedule">
    <div class="container py-5">
        <h2 class="mb-5">Стоимость консультаций</h2>
        <hr>
        <div class="my-5">
            <? $services = CFS()->get('loopServices'); ?>
            <? foreach ($services as $service) : ?>
            <div class="consultation">
            <h5 class="mt-5 mb-2"><? echo $service['serviceTitle']; ?></h5>
            <? $consultations = $service['loopConsultations']; ?>
                <? foreach ($consultations as $consultation) : ?>
                <div class="row py-4 align-items-center consultation__item">
                    <div class="col-6">
                        <? echo $consultation['consultationTitle'] ?>
                    </div>
                    <div class="col-3">
                        <? echo $consultation['consultationTime'] ?>
                    </div>
                    <div class="col-3">
                        <? echo $consultation['consultationPrice'] ?>
                    </div>
                </div>
                <? endforeach; ?>
            <? endforeach; ?>
            </div>
            <p class="my-3 text-center">
                Записаться на консультацию по номеру
                <a class="link-default" href="tel:+7 925 39 84 33">+7 925 39 84 33</a>
                или прямо на
                <a class="link-default" href="#" data-bs-toggle="modal" data-bs-target="#modalSchedule">сайте</a>
            </p>
        </div>
    </div>
</section>
<section class="casual team py-5">
    <div class="container py-5">
        <h2 class="mb-5">Специалисты</h2>
        <hr>
        <? $team = CFS()->get('loopEmployees') ?>
        <div class="owl-carousel owl-carousel-team my-5">
            <? foreach ($team as $member) : ?>
            <div class="team__item">
                <div class="team__image">
                    <img src="<? echo $member['image']; ?>" alt="">
                </div>
                <p class="mt-3"><? echo $member['name']; ?></p>
                <a href="#" data-bs-toggle="modal" data-bs-target="#modalSchedule" class="link-default">Записаться</a>
            </div>
            <? endforeach; ?>
        </div>
        <p class="text-center mt-4">
            С ценами на консультацию специальстов центра вы можеете ознакомиться <a class="link-default" href="#schedule">по ссылке</a>.
        </p>
    </div>
</section>
<script>
    $(document).ready(function(){
        $(".owl-carousel-slider").owlCarousel({
            items: 1,
            dots: '<? count($slider) ?>' ? true : false,
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