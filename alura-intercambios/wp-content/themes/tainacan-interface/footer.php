<?php if ( ! is_404() ) : ?>
	<footer class="container-fluid p-4 p-sm-5 mt-5 tainacan-footer <?php echo ('tainacan-footer-' . get_theme_mod( 'tainacan_footer_color', 'dark' )) ?>" style="padding-bottom: 0 !important;">
		<?php if ( is_active_sidebar( 'tainacan-sidebar-footer' ) ) { ?>
			<div class="row tainacan-footer-widgets-area">
				<div class="col-12 col-lg">
					<ul class="pt-3 pb-3 pl-0 pr-0 d-lg-flex justify-content-xs-center mb-md-0">
						<?php dynamic_sidebar( 'tainacan-sidebar-footer' ); ?>
					</ul>
				</div>
			</div>
		<?php } ?>
		<hr class="bg-scooter"/>
		<div class="row pt-3 pb-4 pl-0 pr-0 tainacan-footer-info">
			<div class="col text-white font-weight-normal">
				<p class="tainacan-footer-info--blog">
					<?php echo bloginfo( 'title' );
					if ( ! wp_is_mobile() ) {
						echo '<br>';
					} else {
						echo '</p><p>';
					}
					if ( get_theme_mod( 'tainacan_blogaddress' ) ) {
						echo wp_filter_nohtml_kses( get_theme_mod( 'tainacan_blogaddress', '' ) );
					} ?>
					<?php if ( get_theme_mod( 'tainacan_blogemail' ) ) {
						printf( __( 'E-mail: %s', 'tainacan-interface' ), sanitize_email( get_theme_mod( 'tainacan_blogemail', '' ) ) );
					}
					if ( get_theme_mod( 'tainacan_blogemail' ) && get_theme_mod( 'tainacan_blogphone' ) ) {
						if ( wp_is_mobile() ) :
							echo '<br>';
						else :
							echo ' - ';
						endif;
					}
					if ( get_theme_mod( 'tainacan_blogphone' ) ) {
						printf( __( 'Telephone: %s', 'tainacan-interface' ), wp_filter_nohtml_kses( get_theme_mod( 'tainacan_blogphone', '' ) ) );
					} ?>
				</p>
			</div>
			<div class="col-auto pr-0 pr-md-3 d-none d-md-block align-self-md-top">
					<?php
					
					if ( get_theme_mod( 'tainacan_footer_logo' ) ) {
						$footerImage = esc_attr( get_theme_mod( 'tainacan_footer_logo' ) );
					} else {
						$footerImage = get_theme_mod( 'tainacan_footer_color', 'dark' ) == 'light' ? esc_url( get_template_directory_uri() ) . '/assets/images/logo.svg' : esc_url( get_template_directory_uri() ) . '/assets/images/logo-footer.svg';
					}
					?>
					<img src="<?php echo $footerImage; ?>" class="tainacan-footer-info--logo" >
			</div>
			<div class="col-12 tainacan-powered">
				<span>
					<?php if ( true == get_theme_mod( 'tainacan_display_powered', false ) ) {
						/* translators: 1: WordPress; 2: Tainacan*/
						printf( __( 'Proudly powered by %1$s and %2$s.', 'tainacan-interface' ), '<a href="https://wordpress.org/">WordPress</a>', '<a href="http://tainacan.org/">Tainacan</a>' ); } ?>
				</span>
			</div>
		</div>
	</footer>
<?php endif; ?>
<?php wp_footer(); ?>
</body>

</html>
