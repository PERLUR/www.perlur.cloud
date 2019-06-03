<?php
	function register_my_menus() {
  	register_nav_menus(
    	array(
      	'header-menu' => __( 'Header Menu' ),
        'footer-menu' => __( 'Footer Menu' ),
    	)
  	);
	}

  add_action( 'init', 'register_my_menus' );
  // Implement the Bulma custom walker.
  require get_template_directory() . '/include/class-bulma-walker.php';

?>
