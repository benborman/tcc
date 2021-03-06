<?php
if ( ! defined( 'ABSPATH' ) ) exit;
/**
 * Header Template
 *
 * Here we setup all logic and XHTML that is required for the header section of all screens.
 *
 * @package WooFramework
 * @subpackage Template
 */

 global $woo_options, $woocommerce;?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head <?php do_action( 'add_head_attributes' ); ?>>
<meta property="fb:admins" content="benborman" />
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php woo_title(); ?></title>
<?php woo_meta(); ?>
<link rel="pingback" href="<?php echo esc_url( get_bloginfo( 'pingback_url' ) ); ?>" />
<?php
wp_head();
woo_head();
?>

<script type="text/javascript" src="<?php bloginfo(template_url); ?>/js/footable.js"></script> 
<script type="text/javascript" src="<?php bloginfo(template_url); ?>/js/footable.sortable.js"></script> 
<script type="text/javascript" src="<?php bloginfo(template_url); ?>/js/footable.filter.js"></script> 
<script type="text/javascript" src="<?php bloginfo(template_url); ?>/js/basicTabs-min.js"></script> 
<script type="text/javascript" src="<?php bloginfo(template_url); ?>/js/jquery.stellar.js"></script> 

<script type="text/javascript">
  jQuery(function() {
    jQuery('.footable').footable();
  });
</script>

<?php include('includes/map-header-connect.php') ?>
<script type="text/javascript">
	
		jQuery(function(){
			jQuery.stellar({
				horizontalScrolling: false,
				verticalOffset: 30
			});
		});
		</script>
</head>
<body <?php body_class(); ?>>
<!-- Beacon Ads Ad Code -->
<script type="text/javascript">
(function(){
  var bsa = document.createElement('script');
     bsa.type = 'text/javascript';
     bsa.async = true;
     bsa.src = 'http://cdn.beaconads.com/ac/beaconads.js';
  (document.getElementsByTagName('head')[0]||document.getElementsByTagName('body')[0]).appendChild(bsa);
})();
</script>
<!-- End Beacon Ads Ad Code -->
<script>
/**
* Function that tracks a click on an outbound link in Google Analytics.
* This function takes a valid URL string as an argument, and uses that URL string
* as the event label.
*/
var trackOutboundLink = function(url) {
   ga('send', 'event', 'outbound', 'click', url, {'hitCallback':
     function () {
     document.location = url;
     }
   });
}
</script>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<script type="text/javascript">
jQuery.noConflict();
jQuery(document).ready(function($){
 $('.widget_ad_widget img').each(function(){
 $(this).removeAttr('width')
 $(this).removeAttr('height');
 });
});
</script>



<?php woo_top(); ?>

<div id="wrapper">
	<div id="inner-wrapper">

    <?php woo_header_before(); ?>
    
   
	<header id="header">


					<?php woo_loop_before(); ?>

        <?php
        	if ( get_query_var( 'paged') ) { $paged = get_query_var( 'paged' ); } elseif ( get_query_var( 'page') ) { $paged = get_query_var( 'page' ); } else { $paged = 1; }

        	$query_args = array(
        							'post_type' => 'banner-ads', 
        							//'tutorial-type' =>"$post_slug",
        							'posts_per_page' => '-1'
        						);


        	$query_args = apply_filters( 'woo_blog_template_query_args', $query_args ); // Do not remove. Used to exclude categories from displaying here.

        	remove_filter( 'pre_get_posts', 'woo_exclude_categories_homepage' );

        	query_posts( $query_args );

        	if ( have_posts() ) {
        		$count = 0;
        		while ( have_posts() ) { the_post(); $count++; 
        		$url = get_post_meta($post->ID, "banneradurl", true); ?>
				
					<div class="banner-ad">
					<a href="<?php echo $url; ?>" target="_blank"><?php the_post_thumbnail(); ?></a>
					</div>	
				
				<?php 
        		} // End WHILE Loop

        	} else {
        ?>
      
        <?php } // End IF Statement ?>

        <?php woo_loop_after(); ?>
        <?php wp_reset_query(); ?>

			<div id="header-inside">

				<?php woo_header_inside(); ?>

				<span class="nav-toggle"><a href="#navigation"><span><?php _e( 'Navigation', 'woothemes' ); ?></span></a></span>

			    <hgroup>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
					<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
				</hgroup>

				<?php

					// Load the slider or hero product/intro message.
					$settings = woo_get_dynamic_values( array( 
						'featured' => 'true', 
						'enable_hero_or_intro' => 'false',
						'hero_or_intro' => 'hero-product' ) );

					if ( is_home() && ( 'true' == $settings['featured'] ) ) {
						get_template_part( 'includes/featured', 'slider' );					
					} elseif ( !is_home() && ( 'true' == $settings['enable_hero_or_intro'] ) ) {
						get_template_part( 'includes/header', $settings['hero_or_intro'] );
					}

				?>

			</div><!-- /#header-inside -->

	        <?php woo_nav_before(); ?>
			<?php include('includes/nav.php'); ?>
			<?php woo_nav_after(); ?>
 <div class="stickit"></div>


	</header><!-- /#header -->
	<?php if(!is_page(array( 'donate', 'join', 'shop'))) { include("includes/sub-header.php"); }?>
	<?php woo_content_before(); ?>