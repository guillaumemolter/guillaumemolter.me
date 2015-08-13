			<footer class="footer" role="contentinfo">
				<?php if ( is_active_sidebar( 'footer-1' ) || is_active_sidebar( 'footer-2' ) || is_active_sidebar( 'footer-3' ) || is_active_sidebar( 'footer-4' ) ) : ?>
				<div class="footer-widgets wrap">

						<div class="footer-item"><?php dynamic_sidebar( 'footer-1' ); ?></div>
						<div class="footer-item"><?php dynamic_sidebar( 'footer-2' ); ?></div>
						<div class="footer-item"><?php dynamic_sidebar( 'footer-3' ); ?></div>
						<div class="footer-item"><?php dynamic_sidebar( 'footer-4' ); ?></div>
					
					<div class="clear"></div>
				</div>
				<?php endif; ?>
				<div id="inner-footer" class="wrap cf">

					<p class="source-org copyright">
						 &#169; <?php echo date('Y'); ?> Kristen & Guillaume Molter
					</p>

				</div>

			</footer>
			<a href="#" class="scrollToTop"><span class="fa fa-chevron-circle-up"></span></a>
		</div>

		<?php wp_footer(); ?>
	</body>

</html> <!-- end of site. what a ride! -->