<?php
/*
Template Name: collaborations-Page
Template Post Type: page, collaboration
*/
__('Шаблон страницы о колобарациях', 'way-theme');

get_header();
?>
<div class="wrap-block">
    <div class="container df">
        <?php get_template_part("template-parts/aside") ?>
        <main>
            <div class="content-header">
                <div class="container">
                    <div class="main-block">
                        <?php yoast_breadcrumb( '<div class="breadcrumbs">','</div>' );?>
                    </div>
                </div>
            </div>
            <section class="content-block">
                <div class="container">
                    <h1 class="title">КОЛЛАБОРАЦИИ</h1>
                    <div class="collaborations-block">
                        <div class="item">
                            <div class="img-block">
                                <img src="<?php bloginfo('template_url'); ?>/assets/image/collab1.png" alt="">
                            </div>
                            <div class="txt-block">
                                <h2>way x gena gorin</h2>
                                <div class="text-block">
                                    <p>Повседневная практика показывает, что дальнейшее развитие различных форм деятельности обеспечивает широкому кругу (специалистов) участие в формировании кластеризации усилий.</p>
                                    <p>Как уже неоднократно упомянуто, сторонники тоталитаризма в науке представляют собой не что иное, как квинтэссенцию победы маркетинга над разумом </p>
                                </div>
                                <a href="">продолжить</a>
                            </div>
                        </div>
                        <div class="item">
                            <div class="img-block">
                                <img src="<?php bloginfo('template_url'); ?>/assets/image/collab1.png" alt="">
                            </div>
                            <div class="txt-block">
                                <h2>way x gena gorin</h2>
                                <div class="text-block">
                                    <p>Повседневная практика показывает, что дальнейшее развитие различных форм деятельности обеспечивает широкому кругу (специалистов) участие в формировании кластеризации усилий.</p>
                                    <p>Как уже неоднократно упомянуто, сторонники тоталитаризма в науке представляют собой не что иное, как квинтэссенцию победы маркетинга над разумом </p>
                                </div>
                                <a href="">продолжить</a>
                            </div>
                        </div>
                        <div class="item">
                            <div class="img-block">
                                <img src="<?php bloginfo('template_url'); ?>/assets/image/collab1.png" alt="">
                            </div>
                            <div class="txt-block">
                                <h2>way x gena gorin</h2>
                                <div class="text-block">
                                    <p>Повседневная практика показывает, что дальнейшее развитие различных форм деятельности обеспечивает широкому кругу (специалистов) участие в формировании кластеризации усилий.</p>
                                    <p>Как уже неоднократно упомянуто, сторонники тоталитаризма в науке представляют собой не что иное, как квинтэссенцию победы маркетинга над разумом </p>
                                </div>
                                <a href="">продолжить</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>
</div>

<?php
get_footer();
?>