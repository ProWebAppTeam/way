<?php
/*
Template Name: FAQ-Page
Template Post Type: page, main
*/
__( 'Шаблон страницы FAQ', 'way-theme' );

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
                 <a href="index.php">Главная</a> / <span>Профиль</span>
               </div>
             </div>
           </div>
         </div>
         <section class="content-block">
           <div class="container">
             <h1 class="title">FAQ</h1>
             <div class="account">
               <div class="account-menu">
                 <ul>
                   <li class="active"><a href="https://wayuchoose.com/faq/">ЧАСТО ЗАДАВАЕМЫЕ ВОПРОСЫ</a></li>
                   <li><a href="delivery.php">ДОСТАВКА</a></li>
                   <li><a href="pay.php">ОПЛАТА</a></li>
                   <li><a href="https://wayuchoose.com/contacts-us/">СВЯЗАТЬСЯ С НАМИ</a></li>
                 </ul>
               </div>
               <div class="faq-block">
                 <div class="bold-title">
                    ЧАСТО ЗАДАВАЕМЫЕ ВОПРОСЫ 
                 </div>
                 <div class="accordeon">
                       <?php $postId = get_the_ID(); 
                       $questions = carbon_get_post_meta($postId,'fio');
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
               </div>
             </div>
           </div>
         </section>
       </main>
     </div>
   </div>

<?php get_footer();?>