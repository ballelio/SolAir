<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package SolAir
 */

?>


<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'solair_theme' ); ?></a>

        <figure class="header-img"><?php the_header_image_tag(); ?>
            </figure> <!--header image--->
 
        
	<header id="masthead" class="site-header">
		<div class="site-branding">
			<?php
			the_custom_logo();
			if ( is_front_page() && is_home() ) :
				?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php
			else :
				?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php
			endif;
			$solair_theme_description = get_bloginfo( 'description', 'display' );
			if ( $solair_theme_description || is_customize_preview() ) :
				?>
				<p class="site-description"><?php echo $solair_theme_description; /* WPCS: xss ok. */ ?></p>
			<?php endif; ?>
		</div><!-- .site-branding -->	
	</header><!-- #masthead -->
  

	<div id="content" class="site-content">

 


	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title"><?php esc_html_e( 'Oops! No encotramos esa página.', 'solair_theme' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content">
                    <br/>
                    <br/>
                   <div class="icon"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><i class="fa fa-map-marker"></i></a></div>
                    <div class="icon"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><i class="fa fa-map"></i></a></div>
                    <br/><br/>
					<p><?php esc_html_e( 'Parece que no hay nada por aca. Para volver a la página principal puse el mapa.', 'solair_theme' ); ?>
                    <br/><br/><br/><br/><br/>
                    </p>



				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->
</body>
</html> 
<?php
get_footer();
