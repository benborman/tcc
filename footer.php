<?php
if ( ! defined( 'ABSPATH' ) ) exit;
/**
 * Footer Template
 *
 * Here we setup all logic and XHTML that is required for the footer section of all screens.
 *
 * @package WooFramework
 * @subpackage Template
 */
	global $woo_options;


?>


<?php
	$total = 4;
	if ( isset( $woo_options['woo_footer_sidebars'] ) && ( $woo_options['woo_footer_sidebars'] != '' ) ) {
		$total = $woo_options['woo_footer_sidebars'];
	}

	if ( ( ( woo_active_sidebar( 'footer-1' ) ||
		   woo_active_sidebar( 'footer-2' ) ||
		   woo_active_sidebar( 'footer-3' ) ||
		   woo_active_sidebar( 'footer-4' ) ) && $total > 0 ) || woo_active_sidebar( 'footer-full' ) ) {

?>

	<?php woo_footer_before(); ?>

	<section id="footer-widgets">

		<?php
			if ( woo_active_sidebar( 'footer-full' ) ) {
		?>

			<section id="footer-full">

				<div class="col-full">

					<div class="block">
						<?php woo_sidebar( 'footer-full' ); ?>
					</div>

				</div><!-- /.col-full  -->

			</section><!-- /#footer-full  -->

		<?php
			}
		?>

		<div class="col-full col-<?php echo $total; ?> fix">

			<?php $i = 0; while ( $i < $total ) { $i++; ?>
				<?php if ( woo_active_sidebar( 'footer-' . $i ) ) { ?>

				<div class="block footer-widget-<?php echo $i; ?>">
		        	<?php woo_sidebar( 'footer-' . $i ); ?>
				</div>

		        <?php } ?>
			<?php } // End WHILE Loop ?>

		</div><!-- /.col-full  -->

	</section><!-- /#footer-widgets  -->
<?php } // End IF Statement ?>
	<footer id="footer">

		<div class="col-full">

			<?php if ( function_exists( 'has_nav_menu' ) && has_nav_menu( 'footer-menu' ) ) {
				wp_nav_menu( array( 'depth' => 1, 'sort_column' => 'menu_order', 'container' => 'ul', 'menu_id' => 'footer-nav', 'menu_class' => 'nav', 'theme_location' => 'footer-menu' ) );
			} ?>

			<div id="copyright" class="col-left">
			<?php if( isset( $woo_options['woo_footer_left'] ) && $woo_options['woo_footer_left'] == 'true' ) {
					echo stripslashes( $woo_options['woo_footer_left_text'] );
			} else { ?>
				<p><?php bloginfo(); ?> &copy; <?php echo date( 'Y' ); ?>. <?php _e( 'All Rights Reserved.', 'woothemes' ); ?></p>
			<?php } ?>
			</div>

			<div id="credit" class="col-right">
	        <?php if( isset( $woo_options['woo_footer_right'] ) && $woo_options['woo_footer_right'] == 'true' ) {
	        	echo stripslashes( $woo_options['woo_footer_right_text'] );
			} else { ?>
				<p><?php _e( 'Powered by', 'woothemes' ); ?> <a href="<?php echo esc_url( 'http://www.wordpress.org' ); ?>">WordPress</a>. <?php _e( 'Designed by', 'woothemes' ); ?> <a href="<?php echo ( isset( $woo_options['woo_footer_aff_link'] ) && ! empty( $woo_options['woo_footer_aff_link'] ) ? esc_url( $woo_options['woo_footer_aff_link'] ) : esc_url( 'http://www.woothemes.com/' ) ) ?>"><img src="<?php echo esc_url( get_template_directory_uri() . '/images/woothemes.png' ); ?>" width="74" height="19" alt="Woo Themes" /></a></p>
			<?php } ?>
			</div>

		</div><!-- /.col-full  -->

	</footer><!-- /#footer  -->
	</div><!-- /#inner-wrapper -->
</div><!-- /#wrapper -->


<script>

jQuery('.tabcontainer').basicTabs({
  active_class: "current",
  list_class: "tabs",
  content_class: 'tab_content',
  starting_tab: 1
});

</script>


<?php wp_footer(); ?>
<?php woo_foot(); ?>
</body>
</html>