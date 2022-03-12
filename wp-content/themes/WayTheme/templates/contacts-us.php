<?php
/*
Template Name: contacts-Page
Template Post Type: page, main
*/
__( 'Шаблон страницы о нас', 'way-theme' );

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
             <h1 class="title">СВЯЗАТЬСЯ С НАМИ</h1>
             <div class="account">
               <div class="account-menu">
                 <ul>
                   <li><a href="https://wayuchoose.com/faq/">ЧАСТО ЗАДАВАЕМЫЕ ВОПРОСЫ</a></li>
                   <li><a href="delivery.php">ДОСТАВКА</a></li>
                   <li><a href="pay.php">ОПЛАТА</a></li>
                   <li class="active"><a href="https://wayuchoose.com/contacts-us/">СВЯЗАТЬСЯ С НАМИ</a></li>
                 </ul>
               </div>
               <div class="contact-us-block">
                 <div class="bold-title">
                   СВЯЗАТЬСЯ С НАМИ
                 </div>
                 <?php the_content(); ?>

               </div>
             </div>
           </div>
         </section>
       </main>
     </div>
   </div>

<?php 
    get_footer();
?>