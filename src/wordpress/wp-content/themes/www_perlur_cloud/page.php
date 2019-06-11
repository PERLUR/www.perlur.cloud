<?php get_header(); ?>

    <div class="content" id="site-content">
		<?php
			// Start the loop.
			if (have_posts()) {
				while (have_posts()) {
					the_post();
					// Include page title.
					the_title( '<h2 class="title is-2 has-text-violet">', '</h2>' );
					// Include the page content.
					the_content();
				} // End the loop.
			} ?>
		
	</div>

<?php get_footer(); ?>
