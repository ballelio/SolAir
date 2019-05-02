<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package SolAir
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="site-info">
           
		<div><?php the_custom_logo();?></div>
		<div class="footer-contact-name">
                    <?php printf( esc_html__( 'SolAir Cargo Express' 
                                         ));
				?></div>	
                <div class="footer-contact">         
                        <li><?php printf( esc_html__(
                                '5141 NW 79 Ave. Unit 9' ));?></li>
                        <li><?php printf( esc_html__(
                                                'Doral, FL 33166' ));?></li>
                        <li class="phone"><?php printf( esc_html__(
                                                'Ph: +1 (305) 594 9011' ));?></li>
                        <li class="phone"><?php printf( esc_html__(
                                                'Bogotá: +57 (1) 489 9102' ));?></li>
                        <li><?php printf( esc_html__(
                                                'sales@solaircargousa.com' ));
                                        ?></li></div>		
                                           
		</div><!-- .site-info -->
                
                <!-- footer menu - social-media -->
                     <div id="social-media" class="menu-social-media-container"   <?php
			wp_nav_menu( array(
				'theme_location' => 'menu-2',
				'menu_id'        => 'social-media'
			) );
			?></div>
                
<?php wp_footer(); ?>
	
</div><!-- #page -->

</footer><!-- #colophon -->
</body>
</html>
