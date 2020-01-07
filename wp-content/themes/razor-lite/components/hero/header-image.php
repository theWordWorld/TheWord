<?php if ( get_header_image() && is_front_page() ) : ?>
	<div class="hero-image feature-header" style="background-image: url(<?php esc_url( header_image() ); ?>);">
		<div class="intro-content">
			<h1><?php echo esc_html( get_theme_mod( 'header_intro_title' ) ); ?></h1>
			<p><?php echo wp_kses_post( get_theme_mod( 'header_intro' ) ); ?></p>
<?php
	if ( get_theme_mod( 'intro_link_url' ) ) { ?>
		<a href="<?php echo esc_url( get_theme_mod( 'intro_link_url' ) ); ?>"><?php echo esc_html( get_theme_mod( 'intro_link_text' ) ); ?></a>
<?php
	} ?>

		</div>
	</div>
<?php endif; ?>