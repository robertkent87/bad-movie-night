<?php
	/**
	 * The template for displaying the footer
	 *
	 * Contains the closing of the #content div and all content after.
	 *
	 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
	 *
	 * @package Bad_Movie_Night
	 */

?>

</div>

<footer class="bg-black text-white mt-5">
    <div class="container pt-4">
        <div class="row">
            <div class="col-md-4">
                <h3>Latest News</h3>

				<?php if (have_posts()): ?>
					<?php while (have_posts()) : the_post(); ?>
                        <div class="media my-4">
                            <div class="media-body">
                                <h5 class="mt-0 mb-1"><a href="<?php print get_field('link') ?>" target="_blank" class=""><?php the_title(); ?></a></h5>
                                <p class="news-date">
                                    <small><?php print get_the_date('l, F j Y') ?></small>
                                </p>
                            </div>
                        </div>
					<?php endwhile; // End of the loop.?>
				<?php else: ?>
                    <p>No news found</p>
				<?php endif; ?>
            </div>
            <div class="col-md-4">
				<?php if (is_active_sidebar('footer_column_1')): ?>
					<?php dynamic_sidebar('footer_column_1'); ?>
				<?php endif; ?>
            </div>

            <div class="col-md-4" id="footer-contact">
                <h3>Get In Touch</h3>
				<?php echo do_shortcode('[contact-form-7 id="55" title="Contact form 1" html_id="contact-form"]'); ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="container">
            <p>
                <small>&copy; <?= date('Y') ?> <a href="https://robert-kent.com" target="_blank">Robert Kent</a>. All
                    rights
                    reserved.
                </small>
            </p>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>