<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "site-content" div and all content after.
 *
 * @package Twenty_Fifteen_child
 * @since Twenty Fifteen Child 1.0
 */
?>

	</div><!-- .site-content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<?php
				/**
				 * Fires before the Twenty Fifteen footer text for footer customization.
				 *
				 * @since Twenty Fifteen 1.0
				 */
				do_action( 'twentyfifteen__child_credits' );
			?>
		</div><!-- .site-info -->
                   <a href="#" class="back-to-top"><span class="genericon genericon-collapse"></span><?php _e (' Back to Top','twentyfifteen-child');?></a>
	</footer><!-- .site-footer -->

</div><!-- .site -->

<?php wp_footer(); ?>

</body>
</html>
