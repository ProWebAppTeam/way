<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Way_u_choose
 */

?>

  <footer>
       <div class="container">
            <ul>
                <li><a href="https://wayuchoose.com/faq/">FAQ</a></li>
                <li><a href="<?php echo carbon_get_theme_option('way_politics')?>">Политика конфиденциальности</a></li>
                <li><a href="<?php echo carbon_get_theme_option('way_ofert')?>">Публичная оферта</a></li>
                <li><a href="<?php echo carbon_get_theme_option('way_inst')?>">Instagram</a></li>
            </ul>
            <div class="copyright"><?php echo carbon_get_theme_option('way_copyrite')?></div>
       </div>
   </footer>

<?php wp_footer(); ?>

</body>
</html>
