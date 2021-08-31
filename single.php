<?php get_header(); ?>

<section class="for-header"></section>

<section class="blog__post my-5">
    <div class="container">
        <div class="mb-5">
            <a href="/blog" class="link-default"><i class="bi bi-chevron-left me-2"></i>Назад</a>
        </div>
        <div class="row align-items-center mb-5">
            <div class="col-md-auto">
                <img style="max-width: 100%; max-height: 80px;" src="<? echo get_the_post_thumbnail_url() ?>" alt="">
            </div>
            <div class="col-md-auto">
                <h3 class="fw-bold"><? the_title() ?></h3>
            </div>
        </div>
        <div>
            <? the_content(); ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>