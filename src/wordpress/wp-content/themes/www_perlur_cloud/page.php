<?php get_header(); ?>

    <div class="content" id="site-content">
		<?php
			// Start the loop.
			if (have_posts()) {
				while (have_posts()) {
					the_post();
					// Include page title.
					the_title( '<h3>', '</h3>' );
					// Include the page content.
					the_content();
				} // End the loop.
			} ?>
		
	</div>

<?php get_footer(); ?>
