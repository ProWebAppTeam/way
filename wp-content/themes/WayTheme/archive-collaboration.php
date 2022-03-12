<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Way_u_choose
 */

get_header();
?>

	<div class="wrap-block">
     <div class="container df">
       <?php get_template_part("template-parts/aside")?>
       <main>
         <div class="content-header">
           <div class="container">
             <div class="main-block">
                 <p>collaborations</p>
                 <?php yoast_breadcrumb( '<div class="breadcrumbs">','</div>' );?>
             </div>
           </div>
         </div>
         <section class="content-block">
           <div class="container">
             <h1 class="title"><?php get_the_title(); ?></h1>
            	<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_type() );?>
				
				<div class="item">
                 <div class="img-block">
                   <img src="assets/img/collab1.png" alt="">
                 </div>
                 <div class="txt-block">
                   <h2><?php echo get_the_title();?></h2>
                   <div class="text-block">
                    <?php the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'way_u_choose' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			)
		);?>
                   </div>
                   <a href="">продолжить</a>
                 </div>
               </div>

			<?php endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>
		
           </div>
         </section>
       </main>
     </div>
   </div>



<?php
get_footer();
