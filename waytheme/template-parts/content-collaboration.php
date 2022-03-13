<div class="item">
    <div class="img-block">
        <?php way_u_choose_post_thumbnail();?>
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
        <a href="<?php echo get_the_permalink();?>">продолжить</a>
    </div>
</div>