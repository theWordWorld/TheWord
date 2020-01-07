<?php if ( has_nav_menu( 'mobile-menu' ) ) : ?>
	<nav id="site-navigation" class="main-navigation" role="navigation">
		<?php wp_nav_menu( array( 'theme_location' => 'mobile-menu' ) ); ?>
	</nav>
<?php endif; ?>