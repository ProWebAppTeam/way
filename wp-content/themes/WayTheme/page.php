<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
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
             
             <?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>
           </div>
         </section>
       </main>
     </div>
   </div>

<?php
get_footer(); 
?>
