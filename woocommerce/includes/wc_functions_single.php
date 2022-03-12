<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

add_action('woocommerce_before_single_product','way_before_product_content',5);
function way_before_product_content(){
    ?>
   <section class="content-block">
       <div class="container">   
<?php
};

add_action('woocommerce_after_single_product','way_after_product_content');
function way_after_product_content(){
    ?>
     </div>
    </div>
   </section>
<?php
};


add_action('woocommerce_before_single_product_summary','way_categoty_block',5);
function way_categoty_block(){
    ?>
    <div class="top-line">
          <h2 class="title">КОЛЬЦО</h2>
          <?php previous_post_link('%link','<img src="assets/img/la.svg" alt="">Пред.</a>'); ?>
          <span class="vl"></span>
          <?php next_post_link('%link','След. <img src="assets/img/ra.svg" alt="">'); ?>
    </div>
    <div class="product-page">
<?php
};

//remove_action('woocommerce_before_single_product_summary','woocommerce_show_product_images', 20);
//add_action('woocommerce_before_single_product_summary','way_img_block',20);
function way_img_block(){
    
    global $product;
    $post_thumbnail_id = $product->get_image_id();
    $post_thumbnail = wp_get_attachment_image_src($post_thumbnail_id,'full');
    $attachment_ids = $product->get_gallery_image_ids();
    $full_src = wp_get_attachment_image_src( $attachment_id, $full_size );
    ?>
    
   <div class="product-image">
        <div class="big-img">
            <img src="<?php echo $post_thumbnail[0] ?>" width="<?php echo $post_thumbnail[1] ?>" height="<?php echo $post_thumbnail[2] ?>" alt="">
        </div>
           <div class="all-img">
               <?php
                   foreach($attachment_ids as $id){
                       $img = wp_get_attachment_image_src($id,'full');
                       ?>
                       <div class="small-img">
                           <img src="<?php echo $img[0]?>" alt="">
                       </div>
                       <?php
                   }
               ?>
           </div>
    </div>
<?php
};

add_action('woocommerce_single_product_summary','way_start_product_block',2);
function way_start_product_block(){?>
   <div class="product-description">
<?php
};

add_action('woocommerce_after_single_product_summary','way_end_product_block',25);
function way_end_product_block(){?>
   </div>
<?php
};


remove_action('woocommerce_single_product_summary','woocommerce_template_single_title', 5);
add_action('woocommerce_single_product_summary','way_title',5);
function way_title(){?>
    <div class="t1">
        <?php the_title( '<h1>', '</h1>' );?>
        <a href=""><img src="<?php echo get_template_directory_uri(); ?>/assets/image/favorite.svg" alt=""></a>
    </div>
<?php
};

remove_action('woocommerce_single_product_summary','woocommerce_template_single_price', 10);
add_action('woocommerce_single_product_summary','way_price',10);
function way_price(){
    global $product;?>
    <div class="price"><?php echo get_woocommerce_currency_symbol(); echo $product->get_price(); ?></div>
<?php
};

remove_action('woocommerce_single_product_summary','woocommerce_template_single_add_to_cart', 30);
add_action('woocommerce_single_product_summary','way_cart',30);
function way_cart(){
    global $product;
    
    
    
    if ( $product->is_in_stock() ) : ?>

	<form class="cart" action="<?php echo esc_url( apply_filters( 'woocommerce_add_to_cart_form_action', $product->get_permalink() ) ); ?>" method="post" enctype='multipart/form-data'>
	  <div class="t2">
	      <div class="t2l">
		        <?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>
		            <div class="amount">
		                <span class="c-name">Кол-во</span>
		                <div class="inpb">
		        <?php
		        do_action( 'woocommerce_before_add_to_cart_quantity' );
		         
		         woocommerce_quantity_input(
			        array(
			        	'min_value'   => apply_filters( 'woocommerce_quantity_input_min', $product->get_min_purchase_quantity(), $product ),
			        	'max_value'   => apply_filters( 'woocommerce_quantity_input_max', $product->get_max_purchase_quantity(), $product ),
			        	'input_value' => isset( $_POST['quantity'] ) ? wc_stock_amount( wp_unslash( $_POST['quantity'] ) ) : $product->get_min_purchase_quantity(), // WPCS: CSRF ok, input var ok.
			        )
		        );
		         
		        do_action( 'woocommerce_after_add_to_cart_quantity' );
		        ?>
		                </div>
		           </div>
		           
		    <div class="color">
                <span class="c-name">Металл</span>
                <div class="color-block">
                   <span class="active" style="background: #D3D3D3;"></span>
                   <span style="background: #C0BA97;"></span>
                   <span style="background: #DBC5C5;"></span>
                </div>
            </div>
		           
		  </div>
		
		<div class="t2r">
		<button type="submit" name="add-to-cart" value="<?php echo esc_attr( $product->get_id() ); ?>" class="single_add_to_cart_button button alt">Добавить в корзину</button>
		<button>Купить</button>
		</div>
      </div>
	</form>

<?php endif; ?>
<?php
};


remove_action('woocommerce_single_product_summary','woocommerce_template_single_meta', 40);

add_action('woocommerce_after_single_product_summary','way_tabs',5);
function way_tabs(){ ?>
    <div class="accordeon">
        <?php $postId = get_the_ID(); 
            $questions = carbon_get_post_meta($postId,'faq_single');
            foreach($questions as $item):
            ?>
                <div class="accordeon__line">
                    <?php echo $item['question']?>
                </div>
                <div class="accordeon__content">
                    <?php echo $item['answer']?>
                </div>
                <?php endforeach;
            ?>    
    </div>
<?php
}; 

