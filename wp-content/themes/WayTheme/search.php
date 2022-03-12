<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
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
               <div class="breadcrumbs">
                 <a href="index.php">Главная</a> / <span>Поиск</span>
               </div>
             </div>
           </div>
         </div>
         <section class="content-block">
           <div class="container">
        <?php if ( have_posts() ) : ?>
             <h1 class="page-title">
					<?php
					/* translators: %s: search query. */
					printf( esc_html__( 'Search Results for: %s', 'way_u_choose' ), '<span>' . get_search_query() . '</span>' );
					?>
			</h1>
             
            <?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'search' );

			endwhile;

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