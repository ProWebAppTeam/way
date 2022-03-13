<?php

$gallery = carbon_get_post_meta(get_the_ID(),'collection_gallery');
				$count_class_name = 'v2';
				if(count($gallery) == 3) $count_class_name = 'v3';
				if(count($gallery) > 3) $count_class_name = 'v4';
				?>
				<div class="item">
                 <h2 class="head-title"><?php echo get_the_title();?><a href="<?php echo get_the_permalink();?>">продолжить</a></h2>
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
                 <div class="gallery-block <?php echo $count_class_name ?>">
                    <?php 
                        foreach($gallery as $item):
                        $ImgId =  carbon_get_theme_option($item['collection_image']);
                        $ImgSrc = wp_get_attachment_image_src($item['collection_image'], 'full');
                    ?>
                    <div class="img-item">
                      <img src="<?php echo $ImgSrc[0]?>" alt="<?php echo $item['collection_image_alt']?>">
                    </div>
                    <?php endforeach; ?>
                 </div>
               </div>