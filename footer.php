<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package bootstrapwp
 */
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="container">
			<div class="row">
				<div class="site-info">
					<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'bootstrapwp' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'bootstrapwp' ), 'WordPress' ); ?></a>
					<span class="sep"> | </span>
					<?php printf( __( 'Theme: %1$s by %2$s.', 'bootstrapwp' ), 'bootstrapwp', '<a href="http://automattic.com/" rel="designer">Automattic</a>' ); ?>
				</div><!-- .site-info -->
			</div><!-- .row -->
		</div><!-- .container -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
