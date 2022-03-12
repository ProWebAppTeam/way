<?php
/*
Template Name: Main-Page
Template Post Type: page, main
*/
__( 'Шаблон главной страницы', 'way-theme' );

get_header();
?>
<div class="wrap-block">
  <div class="home-image-wrap-block" data-text="Way">
     <?php 
                $mainImgId =  carbon_get_theme_option('way_main_image');
                $mainImg = $mainImgId ? wp_get_attachment_image_src($mainImgId, 'full') : '';
            ?>
            <img src="<?php echo $mainImg[0] ?>" alt="">
  </div>
  <div class="container df">
       <?php get_template_part("template-parts/aside")?>
     </div>
     <div class="big-gallery home">
             <div class="img-gallery">
                <?php 
                        $firstImgId =  carbon_get_theme_option('first_main_carousel_image');
                        $firstImg = $firstImgId ? wp_get_attachment_image_src($firstImgId, 'full') : '';
                    ?>
                    <img src="<?php echo $firstImg[0] ?>" alt="">
             </div>
             <div class="img-gallery">
               <?php 
                        $secondImgId =  carbon_get_theme_option('second_main_carousel_image');
                        $secondImg = $secondImgId ? wp_get_attachment_image_src($secondImgId, 'full') : '';
                    ?>
                    <img src="<?php echo $secondImg[0] ?>" alt="">
             </div>
             <div class="img-gallery">
                <?php 
                        $thirdImgId =  carbon_get_theme_option('third_main_carousel_image');
                        $thirdImg = $firstImgId ? wp_get_attachment_image_src($thirdImgId, 'full') : '';
                    ?>
                    <img src="<?php echo $thirdImg[0] ?>" alt="">
             </div>             
           </div>
   </div>


    
     <?php 
         get_footer();
    ?>