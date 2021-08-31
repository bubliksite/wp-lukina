<?php

?>

<?php get_header(); ?>

<div class="d-none">
    <?
    $parent_category = get_the_terms(the_ID(), 'programscategory');
    $term = CFS()->get('term');
    ?>
</div>


<section class="top" style="background-image: url('<? echo get_the_post_thumbnail_url() ?>')">
    <div class="container h-100 pb-5">
        <div class="h-100 d-flex pb-5 align-items-end">
            <div>
                <? if ($term) : ?>
                <h5 class="term mb-3"><? echo CFS()->get('term') ?></h5>
                <? endif; ?>
                <div class="breadcrumbs">
                    <a href="/">Главная</a> —
                    <a href="<? if ($parent_category[0]->term_id === 7) {echo '/companies';} else {echo '/personal';} ?>"><?echo $parent_category[0]->name?></a> —
                    <a href="/#programs">Программы</a> —
                    <span><?the_title()?></span>
                </div>
                <h2 class="fw-bold mt-3"><? the_title() ?></h2>
            </div>
            
        </div>
    </div>

</section>

<?php get_footer(); ?>
