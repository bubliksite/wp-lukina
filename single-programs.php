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
    <div class="container h-100 py-5">
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
<section class="excerpt">
    <div class="container">
        <p class="lead text-center my-5">
            <em><? echo CFS()->get('excerpt'); ?></em>
        </p>
    </div>
</section>
<style>
    section.page-navigation a:not(:last-child)::after {
        content: url("<?php echo get_template_directory_uri(); ?>//images/icons/IconBullet.svg");
    }
</style>
<section class="page-navigation py-4">
    <div class="container">
        <div class="d-flex flex-wrap justify-content-center text-uppercase">
            <? if (CFS()->get('loopAbout')) : ?>
            <a href="#program">Программа</a>
            <? endif; ?>
            <? if (CFS()->get('loopCase')) : ?>
            <a href="#cases">Кейсы</a>
            <? endif; ?>
            <? if (CFS()->get('loopFormat')) : ?>
            <a href="#format">Формат работы</a>
            <? endif; ?>
            <? if (CFS()->get('loopResult')) : ?>
            <a href="#result">Результат</a>
            <? endif; ?>
            <? if (CFS()->get('loopComparationWe')) : ?>
            <a href="#advantages">Преимущества</a>
            <? endif; ?>
            <? if (CFS()->get('loopPreparing')) : ?>
            <a href="#preparing">Подготвка</a>
            <? endif; ?>
        </div>
    </div>
</section>
<main>
    <? if (CFS()->get('loopAbout')) : ?>
    <section id="program" class="casual my-5">
        <div class="container">
            <h2><? the_title() ?></h2>
            <hr>
            <div class="my-5">
                <? $programs = CFS()->get('loopAbout') ?>
                <? foreach ($programs as $program) : ?>
                <div class="row mb-5">
                    <div class="col-md-4">
                        <h5 class="fw-bold"><? echo $program['titleAbout']; ?></h5>
                    </div>
                    <div class="col-md-8 border-start border-2 border-dark">
                        <p class="ps-md-3"><? echo $program['descriptionAbout']; ?></p>
                    </div>
                </div>
                <? endforeach; ?>
            </div>
        </div>
    </section>
    <? endif; ?>
    <? if (CFS()->get('loopAboutAdditional')) : ?>
    <section class="my-5">
        <div class="container py-md-0 py-5">
            <div class="row py-5">
                <? $additional_blocks = CFS()->get('loopAboutAdditional'); ?>
                <? foreach ($additional_blocks as $additional_block) : ?>
                <div class="col-12 col-md">
                    <h5 class="fw-bold"><? echo $additional_block['titleAboutAdditional'] ?></h5>
                    <p><? echo $additional_block['descriptionAboutAdditional'] ?></p>
                </div>
                <? endforeach;?>
                <p class="my-5 text-center w-80">
                    <? echo CFS()->get('resumeAboutAdditional') ?>
                </p>
            </div>
        </div>
    </section>
    <? endif; ?>
    <? if (CFS()->get('loopFormat')) : ?>
    <section id="format" class="casual py-5">
        <div class="container">
            <h2>Формат работы</h2>
            <hr>
            <div class="my-5">
                <? $formats = CFS()->get('loopFormat'); ?>
                <? foreach ($formats as $format) : ?>
                <div class="mb-3 format__body">
                    <h5 class="title__format"><? echo $format['titleFormat'] ?></h5>
                    <small><? echo $format['termFormat'] ?></small>
                    <p><? echo $format['descriptionFormat'] ?></p>
                </div>
                <? endforeach; ?>
            </div>
        </div>
    </section>
    <? endif; ?>
    <? if (CFS()->get('loopCase')) : ?>
    <section id="cases" class="casual py-5">
        <div class="container">
            <h2>Кейсы</h2>
            <hr>
            <div class="my-5">
                <div class="owl-carousel owl-carousel-cases">
                    <? $cases = CFS()->get('loopCase'); ?>
                    <? foreach ($cases as $index=>$case) : ?>
                    <div class="case__card p-3">
                        <h5 class="mb-3 text-center fw-bold"><? echo $case['titleCase']; ?></h5>
                        <div class="text-center">
                            <button class="btn btn-link link-default" data-bs-toggle="modal" data-bs-target="#modalCase_<? echo $index; ?>">Читать подробнее <i class="bi bi-arrow-right"></i></button>
                        </div>
                    </div>
                    <? endforeach; ?>
                </div>
                <p class="text-center mt-5"><? echo CFS()->get('resumeCase') ?></p>
            </div>
        </div>
    </section>
    <? endif; ?>
    <? if (CFS()->get('loopPreparing')) : ?>
    <section id="preparing" class="casual py-5">
        <div class="container">
            <h2>Как подготовить команду к проекту</h2>
            <hr>
            <div class="my-5">
                <? $prepares = CFS()->get('loopPreparing'); ?>
                <? foreach ($prepares as $prepare) : ?>
                    <div class="mb-3">
                        <h5 class="fw-bold"><? echo $prepare['titlePreparing'] ?></h5>
                        <p><? echo $prepare['descriptionPreparing'] ?></p>
                    </div>
                <? endforeach; ?>
            </div>
        </div>
    </section>
    <? endif; ?>
    <? if (CFS()->get('mainTitleComparation') && CFS()->get('loopComparationThey') && CFS()->get('loopComparationWe')) : ?>
    <section id="advantages" class="casual pt-5">
        <div class="container">
            <h2><? echo CFS()->get('mainTitleComparation') ?></h2>
            <hr>
            <div class="row my-5">
                <div class="col-md-5">
                    <h5 class="fw-bold text-uppercase mb-4"><? echo CFS()->get('mainTitleComparationThey') ?></h5>
                    <? $they_courses = CFS()->get('loopComparationThey'); ?>
                    <? foreach ($they_courses as $they_course) : ?>
                        <div>
                            <p class="fw-bold mb-1"><? echo $they_course['titleComparationThey']; ?></p>
                            <p><? echo $they_course['descriptionComparationThey']; ?></p>
                        </div>
                    <? endforeach; ?>
                </div>
                <div class="col-md-2">
                    <div class="d-flex justify-content-center align-items-center h-100">
                        <img class="my-4 w-100" src="<?php echo get_template_directory_uri(); ?>/images/icons/IconVS.svg" alt="">
                    </div>
                </div>
                <div class="col-md-5">
                    <h5 class="fw-bold text-uppercase mb-4"><? echo CFS()->get('mainTitleComparationWe') ?></h5>
                    <? $our_courses = CFS()->get('loopComparationWe'); ?>
                    <? foreach ($our_courses as $our_course) : ?>
                        <div>
                            <p class="fw-bold mb-1"><? echo $our_course['titleComparationWe']; ?></p>
                            <p><? echo $our_course['descriptionComparationWe']; ?></p>
                        </div>
                    <? endforeach; ?>
                </div>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-md-6 ps-0">
                <img class="w-100" src="<? echo CFS()->get('resumeComparationImage'); ?>" alt="">
            </div>
            <div class="col-md-6 mt-3">
                <div class="ps-0 ps-md-3">
                    <em><? echo CFS()->get('resumeComparationText'); ?></em>
                </div>
            </div>
        </div>
    </section>
    <? endif; ?>
    <? if (CFS()->get('descriptionChief') && CFS()->get('imageChief')) : ?>
    <section id="chief" class="casual about my-5">
        <div class="container py-5">
            <h2>Основатель и руководитель программы</h2>
            <hr>
            <div class="row mt-5">
                <div class="col-md-6">
                    <p><? echo CFS()->get('descriptionChief') ?></p>
                </div>
                <div class="col-md-6 d-flex align-items-center h-100">
                    <div class="mx-auto text-center main-image">
                        <img class="w-100 mb-3" src="<? echo CFS()->get('imageChief') ?>" alt="">
                        <? include 'components/socials.php'?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <? endif; ?>
    <? if (CFS()->get('loopFAQ')) : ?>
    <section id="faq" class="casual about py-5">
        <div class="container">
            <h2>Часто задаваемые вопросы</h2>
            <hr>
            <div class="accordion my-5" id="accordionFAQ">
                <? $faqs = CFS()->get('loopFAQ'); ?>
                <? foreach ($faqs as $index=>$faq) : ?>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="faq_heading_<? echo $index; ?>">
                            <button class="accordion-button collapsed  fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faq_collapse<? echo $index; ?>" aria-expanded="false" aria-controls="faq_collapse<? echo $index; ?>">
                                <? echo $faq['questionFAQ']; ?>
                            </button>
                        </h2>
                        <div id="faq_collapse<? echo $index; ?>" class="accordion-collapse collapse" aria-labelledby="faq_heading_<? echo $index; ?>" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body"><? echo $faq['answerFAQ']; ?></div>
                        </div>
                    </div>
                <? endforeach; ?>
            </div>
        </div>
    </section>
    <? endif; ?>
    <? if (CFS()->get('loopFeedback')) : ?>
    <section id="feedback" class="casual about py-5">
        <div class="container">
            <h2>Отзывы выпускников</h2>
            <hr>
            <div class="my-5">
                <p><? echo CFS()->get('subtitleFeedback') ?></p>
                <div class="row my-5">
                    <? $feedbacks = CFS()->get('loopFeedback') ?>
                    <? foreach ($feedbacks as $index=>$feedback) : ?>
                        <div class="col-md-4 mb-3">
                            <div class="feedback__card p-4" onmouseleave="collapseFeedback(<? echo $index ?>)">
                                <div class="inner__card" id="card_<? echo $index ?>">
                                    <h5 class="fw-bold mb-4"><? echo $feedback['nameFeedbcack'] ?></h5>
                                    <p><? echo $feedback['textFeedback'] ?></p>
                                </div>
                                <button id="btn_<? echo $index ?>" onclick="expandFeedback(<? echo $index ?>)" class="btn btn-link link-default p-0 mt-4">Читать далее <i class="bi bi-arrow-right"></i></button>
                            </div>
                        </div>
                    <? endforeach; ?>
                </div>
            </div>
        </div>
    </section>
    <? endif; ?>
    <? if (CFS()->get('loopColumnResult')) : ?>
    <section id="result" class="casual py-5">
        <div class="container">
            <h2>Результат</h2>
            <hr>
            <div class="row my-5">
                <?
                $results_columns = CFS()->get('loopColumnResult');
                $counts_of_columns = count($results_columns) % 2;
                ?>
                <? foreach ($results_columns as $results_column) : ?>
                <div class="col-md-6">
                    <h5 class="fw-bold mb-3"><?echo $results_column['titleColumnResult'];?></h5>
                    <? $results_items = $results_column['loopResult']; ?>
                    <? foreach ($results_items as $results_item) : ?>
                    <div>
                        <p class="fw-bold"><?echo $results_item['titleResult'];?></p>
                        <p><?echo $results_item['decriptionResult'];?></p>
                    </div>
                    <? endforeach; ?>
                </div>
                <? endforeach; ?>
                <div class="col-md-<? echo ($counts_of_columns) ? '6' : '12' ?>">
                    <div class="mt-3 w-100 h-100 feedback__form text-center d-flex align-items-center justify-content-center">
                        <div>
                            <h5 class="fw-bold">Начни обучение</h5>
                            <p>Запишись на обязательное собеседование с преподавателем</p>
                            <? echo do_shortcode('[caldera_form id="CF612ddc7001c54"]'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <? else:  ?>
    <section class="my-5">
        <div class="mt-3 w-100 h-100 feedback__form text-center d-flex align-items-center justify-content-center">
            <div>
                <h5 class="fw-bold">Начни обучение</h5>
                <p>Запишись на обязательное собеседование с преподавателем</p>
                <? echo do_shortcode('[caldera_form id="CF612ddc7001c54"]'); ?>
            </div>
        </div>
    </section>
    <? endif; ?>
</main>

<? if (CFS()->get('loopCase')) : ?>
    <? foreach ($cases as $index=>$case) : ?>
        <div class="modal fade modal-cases" id="modalCase_<? echo $index; ?>" tabindex="-1" aria-labelledby="modalCase_<? echo $index; ?>Label" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-body pt-5 pb-3 ps-5 pe-4">
                        <section class="casual">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            <h3 class="fw-bold"><? echo $case['titleCase'] ?></h3>
                            <hr>
                            <div class="my-5">
                                <? echo $case['bodyCase']; ?>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    <? endforeach; ?>
<? endif ?>

<script>
    $(document).ready(function(){
        $(".owl-carousel-cases").owlCarousel({
            nav: true,
            navText: ['<i class="bi bi-chevron-left"></i>', '<i class="bi bi-chevron-right"></i>'],
            margin: 30,
            responsiveClass:true,
            responsive: {
                0: {
                    items: 1,
                },
                768: {
                    items: 3,
                }
            }
        });
    });
</script>

<?php get_footer(); ?>
