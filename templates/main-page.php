<?php
/*
Template Name: Main-Page
Template Post Type: page, main
*/
__( 'Шаблон главной страницы', 'way-theme' );

get_header();
?>


<main>
        <div class="big-image-continer fluid-container p-0">
            <?php 
                $mainImgId =  carbon_get_theme_option('way_main_image');
                $mainImg = $mainImgId ? wp_get_attachment_image_src($mainImgId, 'full') : '';
            ?>
            <img src="<?php echo $mainImg[0] ?>" alt="">
            <div class="big-image-text">
                <h1 class="druk-font">Way</h1>
            </div>
        </div>
        <div class="grid-image-continer fluid-container p-0">
            <div class="row p-0 flex-wrap flex-md-nowrap m-0">
                <div class="grid-image-item col-3">
                    <?php 
                        $firstImgId =  carbon_get_theme_option('first_main_carousel_image');
                        $firstImg = $firstImgId ? wp_get_attachment_image_src($firstImgId, 'full') : '';
                        echo $firstImg[0];
                    ?>
                    <img src="<?php echo $firstImg[0] ?>" alt="">
                </div>
                <div class="grid-image-item col-5">
                    <?php 
                        $secondImgId =  carbon_get_theme_option('second_main_carousel_image');
                        $secondImg = $secondImgId ? wp_get_attachment_image_src($secondImgId, 'full') : '';
                    ?>
                    <img src="<?php echo $secondImg[0] ?>" alt="">
                </div>
                <div class="grid-image-item col-4">
                    <?php 
                        $thirdImgId =  carbon_get_theme_option('third_main_carousel_image');
                        $thirdImg = $firstImgId ? wp_get_attachment_image_src($thirdImgId, 'full') : '';
                    ?>
                    <img src="<?php echo $thirdImg[0] ?>" alt="">
                </div>
            </div>

        </div>
    </main>
    
     <?php 
         get_footer();
    ?>