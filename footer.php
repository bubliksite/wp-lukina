
<footer class="py-5">
    <div class="container my-5">
        <div class="row">
            <div class="col-md-7 row">
                <div class="col-md-4">
                    <h5>Меню</h5>
                    <?php
                    wp_nav_menu( array(
                        'menu' => 'main',
                        'menu_class' => 'd-md-block d-flex p-0 list-unstyled',
                        'container' => false,
                    ) );
                    ?>
                </div>
                <div class="col-md-8">
                    <h5>Направления</h5>
                    <?php
                    wp_nav_menu( array(
                        'menu' => 'footer',
                        'menu_class' => 'd-md-block d-flex p-0 list-unstyled',
                        'container' => false,
                    ) );
                    ?>
                </div>
            </div>
            <div class="col-md-5 text-center text-md-start">
                <h5>Контакты</h5>
                <div class="my-3">
                    <a href="tel:+7 925 391 84 33" class="py-5 tel">+7 925 391 84 33</a>
                </div>
                <div class="my-3">
                    <a href="mailto:olga.aleksandrovna.lukina@yandex.ru" class="py-5 mail">
                        olga.aleksandrovna.lukina@yandex.ru
                    </a>
                </div>
                <p>
                    Москва, ул. Трубная д. 32, стр. 3, 1-й этаж, офис 12 <br/>Психологический Центр. 10 минут пешком от станций метро Цветной Бульвар или Сухаревская
                </p>
                <? include 'components/socials.php'?>
            </div>
        </div>
        <div class="my-5 copyright">
            <div class="d-md-flex d-block align-items-center text-center text-md-start">
                <div class="d-md-flex d-none me-3">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/logo-black.svg" alt="">
                </div>
                <a href="/policy">Документы и юридическая информация</a>
                <div class="d-md-flex d-none mx-3">
                    |
                </div>
                <p class="m-0">© 2001 — <? echo date("Y"); ?> Ольга Лукина</p>
            </div>
        </div>
    </div>
</footer>

<div class="modal fade" id="modalFeedback" tabindex="-1" aria-labelledby="modalFeedbackLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body pt-5 pb-3 ps-5 pe-4">
                <h5>Получить подробную информацию</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="my-3">
                    <? echo do_shortcode('[caldera_form id="CF612b5f71ca617"]'); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalSchedule" tabindex="-1" aria-labelledby="modalScheduleLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body pt-5 pb-3 ps-5 pe-4">
                <section class="casual partners mb-5">
                    <h2>Записаться</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <hr>
                </section>
                <div class="my-3">
                    <? echo do_shortcode('[caldera_form id="CF612b6429902c9"]'); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php wp_footer(); ?>

</body>
</html>