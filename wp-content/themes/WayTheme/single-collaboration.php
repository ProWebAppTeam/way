<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Way_u_choose
 */

get_header();
?>
<?php
	while ( have_posts() ) :
		the_post(); 
		$collaborationPostId =  get_the_ID();?>
			
    <div class="image-wrap-block">
        <?php echo get_the_post_thumbnail( get_the_ID(), 'full');//way_u_choose_post_thumbnail(); ?>
    </div>

	<div class="wrap-block">
	   
     <div class="container df">
       <?php get_template_part("template-parts/aside")?>
       <main>
         <div class="content-header">
           <div class="container">
             <div class="main-block">
                 <div class="breadcrumbs">
                 <p>collection single</p>
                 <?php yoast_breadcrumb( '<div class="breadcrumbs">','</div>' );?>
                 </div>
             </div>
           </div>
         </div>
         <section class="content-block">
           <div class="container">
              <div class="collections-block collection-page">
                <div class="item">
                    <?php the_title( '<h1 class="head-title">', '</h1>' );?>
			
			<div class="text-block">
			<?php the_content();?>
			</div>
			
			
			<ul class="product-list columns-4">
			<?php
			$collaboration_name = get_post_field('collaboration_attribute_name',get_the_ID());
			
			$args = array(
		        // Использование аргумента tax_query для установки параметров терминов таксономии 
		            'tax_query' => array(
		            // массив для атрибута pa_attribute-1 имеющим значение attribute-1
		            array(
		                  'taxonomy' => 'pa_collaboration',
		                  'field' => 'slug',
		                  'terms' => $collaboration_name
		                )
	                ),
	                // Параметры отображения выведенных товаров
	                'posts_per_page' => 8, // количество выводимых товаров
	                'post_type' => 'product', // тип товара
	                'orderby' => 'title', // сортировка
                    );
            
            $productLoop = new WP_Query( $args );
            
            while ( $productLoop->have_posts() ) : $productLoop->the_post();
            global $product; 
            $link = get_permalink( $product->ID );?>
                <li class="product">
                    <?php way_template_loop_product_link_open();
                    way_before_img();
                    way_img();
                    way_after_img();
                    ?>
                    <div class="product-text">
                        <div class="product-name">
                            <h2 class="woocommerce-loop-product__title">
                                <?php echo $product->get_name(); ?>
                            </h2>
                        </div>
                        <?php way_loop_price(); ?>
                    </div>
                    <?php way_end_link(); ?>
                </li>
            <?php endwhile; ?>
            </ul>
            
            <?php
			//get_template_part( 'template-parts/content', get_post_type() );

			/*the_post_navigation(
				array(
					'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'way_u_choose' ) . '</span> <span class="nav-title">%title</span>',
					'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'way_u_choose' ) . '</span> <span class="nav-title">%title</span>',
				)
			);*/
			?>

		
		       </div>
		     </div>
           </div>
         </section>
       </main>
     </div>
     
     <div class="big-gallery">
         <?php 
            $gallery = carbon_get_post_meta($collaborationPostId,'collaboration_gallery');
            foreach($gallery as $item):
                $ImgId =  carbon_get_theme_option($item['collaboration_image']);
                $ImgSrc = wp_get_attachment_image_src($item['collaboration_image'], 'full');
            ?>
                <div class="img-gallery">
                    <img src="<?php echo $ImgSrc[0]?>" alt="<?php echo $item['collaboration_image_alt']?>">
                </div>
            <?php endforeach;
            ?>
     </div>
		
   </div>

<?php endwhile; // End of the loop.?>
<?php
get_footer();
