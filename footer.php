<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package commpart
 */

?>

		<aside id="footer-widget-area" class="widget-area">
			<?php dynamic_sidebar("footer-area"); ?>
		</aside>
	</div><!-- #content -->

	<?php if ( $post->post_name == "home" ) : ?>
		<aside id="homepage-widget-area" class="widget-area">
			<?php dynamic_sidebar("homepage-area"); ?>
		</aside>
	<?php endif; ?>


	<footer id="colophon" class="site-footer">
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'commpart' ) ); ?>"><?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf( esc_html__( 'Proudly powered by %s', 'commpart' ), 'WordPress' );
			?></a>
			<span class="sep"> | </span>
			<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Theme: %1$s by %2$s.', 'commpart' ), 'commpart', 'Joshua' );
			?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
