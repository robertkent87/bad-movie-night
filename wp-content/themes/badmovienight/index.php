<?php
	/**
	 * The template for displaying all pages
	 *
	 * This is the template that displays all pages by default.
	 * Please note that this is the WordPress construct of pages
	 * and that other 'pages' on your WordPress site may use a
	 * different template.
	 *
	 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
	 *
	 * @package Bad_Movie_Night
	 */

	get_header(); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main">
            <h1>Latest News</h1>

			<?php if (have_posts()): ?>
				<?php while (have_posts()) : the_post(); ?>
                    <div class="row">
						<?php get_template_part('template-parts/content', 'post'); ?>
                    </div>
				<?php endwhile; // End of the loop.?>
			<?php else: ?>
                <p>No news found</p>
			<?php endif; ?>

        </main><!-- #main -->
    </div><!-- #primary -->

<?php
	get_footer();
