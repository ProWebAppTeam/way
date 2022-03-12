<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

//remove_action('woocommerce_before_shop_loop','woocommerce_breadcrumb', 20);
remove_action('woocommerce_before_shop_loop','woocommerce_output_all_notices', 10);
remove_action('woocommerce_before_shop_loop','woocommerce_result_count',20);
remove_action('woocommerce_before_shop_loop','woocommerce_catalog_ordering',30);

add_action('woocommerce_before_shop_loop','way_widgets',5);
function way_widgets(){?>
<div class="filter-block">
    <div class="category-filter">
    <?php way_category_filter(); ?>
    <?php way_category_filter(); ?>
    <?php way_category_filter(); ?>
    </div>
    <?php dynamic_sidebar( 'sidebar-2' ); ?>
    <?php //wc_get_template_part('content-widget-price-filter'); ?>
    <?php //echo do_shortcode("[woocommerce_product_filter_price ]"); ?>
    <!--<form method="get" action="<?php //echo esc_url( $form_action ); ?>">
        <div id="range-slider" data-min="p.1000" data-max="p.500000+"></div>
        <button type="submit" class="button"><?php //echo esc_html__( 'Filter', 'woocommerce' ); ?></button>
    </form>-->
    <!--<div id="range-slider" data-min="p.1000" data-max="p.500000+"></div>-->
</div>
<?php
};

function way_category_filter(){

          $taxonomy     = 'product_cat';
          $orderby      = 'name';  
          $show_count   = 0;      // 1 for yes, 0 for no
          $pad_counts   = 0;      // 1 for yes, 0 for no
          $hierarchical = 1;      // 1 for yes, 0 for no  
          $title        = '';  
          $empty        = 0;

          $args = array(
            'taxonomy'     => $taxonomy,
             'orderby'      => $orderby,
             'show_count'   => $show_count,
             'pad_counts'   => $pad_counts,
             'hierarchical' => $hierarchical,
             'title_li'     => $title,
             'hide_empty'   => $empty
            );

          $all_categories = get_categories( $args );
            foreach ($all_categories as $cat) {
                if($cat->category_parent == 0) {
                    $category_id = $cat->term_id;  
                    ?>
                    <div class="category-item">
                        <div class="category-name">
                            <?php echo '<a href="'. get_term_link($cat->slug, 'product_cat') .'">'. $cat->name .'</a>' ?>
                        </div>
                    <?php
                    $args2 = array(
                        'taxonomy'     => $taxonomy,
                        'child_of'     => 0,
                        'parent'       => $category_id,
                        'orderby'      => $orderby,
                        'show_count'   => $show_count,
                        'pad_counts'   => $pad_counts,
                        'hierarchical' => $hierarchical,
                        'title_li'     => $title,
                        'hide_empty'   => $empty
                    );
                    
                    $sub_cats = get_categories( $args2 );
                    if($sub_cats) {?>
                        <ul class="sub-menu">
                        <?php
                        foreach($sub_cats as $sub_category) {?>
                        <li>
                        <?php echo '<a href="'. get_term_link($sub_category->slug, 'product_cat') .'">'. $sub_category->name.'</a>'; ?>
                        </li>
                        <?php
                        }?>
                        </ul>
                        <?php
                    }?>
                    </div>
                    <?php
            }      
}
};


add_action('woocommerce_before_shop_loop','way_section_main_open',40);
function way_section_main_open(){?>
<section class="content-block">
    <div class="container">
        <h1 class="title"><?php woocommerce_page_title(); ?></h1>
<?php
};

add_action('woocommerce_after_shop_loop','way_section_main_close',40);
function way_section_main_close(){?>
    </div>
</section>
<?php
};