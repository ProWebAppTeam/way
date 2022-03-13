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
                 <?php yoast_breadcrumb( '<div class="breadcrumbs">','</div>' );?>
             </div>
           </div>
         </div>
         <section class="content-block">
           <div class="container">
             <h1 class="title"><?php get_the_title(); ?></h1>
			   
             <div class="collaborations-block">
            	<?php if ( have_posts() ) : ?>

			<!--<header class="page-header">
				<?php
				//the_archive_title( '<h1 class="page-title">', '</h1>' );
				//the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header> .page-header -->

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

			<?php endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>
			   </div>
           </div>
         </section>
       </main>
     </div>
   </div>



<?php
get_footer();
