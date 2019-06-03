<?php
/*
*
* Template Name: Full-Width
*/
?>

<?php get_header(); ?>

    <div class="content" id="site-content-full-width">
		<?php
			// Start the loop.
			if (have_posts()) {
				while (have_posts()) {
					the_post();
					// Include the page content.
					the_content();
				} // End the loop.
			} ?>

	</div>

<?php get_footer(); ?>
