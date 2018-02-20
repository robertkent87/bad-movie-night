<?php
	/**
	 * Template part for displaying page content in page.php
	 *
	 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
	 *
	 * @package Bad_Movie_Night
	 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="row">
		<?php if (has_post_thumbnail()): ?>
            <div class="col-md-4">
				<?php the_post_thumbnail('large', ['class' => 'img-fluid mb-3']); ?>
            </div>
            <div class="col-md-8">
                <header class="entry-header">
		            <?php the_title('<h2 class="entry-title">', '</h2>'); ?>
                    <p class="news-date">
                        <small><?php print get_the_date('l, F j Y') ?></small>
                    </p>
                </header><!-- .entry-header -->
				<?php the_content() ?>
                <p><a href="<?php print get_field('link') ?>" target="_blank" class="btn btn-outline-light">Read more &raquo;</a></p>
            </div>
		<?php else: ?>
            <div class="col">
                <header class="entry-header">
		            <?php the_title('<h2 class="entry-title">', '</h2>'); ?>
                    <p class="news-date">
                        <small><?php print get_the_date('l, F j Y') ?></small>
                    </p>
                </header><!-- .entry-header -->
				<?php the_content() ?>
                <p><a href="<?php get_field('link') ?>">Read more &raquo;</a></p>
            </div>
		<?php endif; ?>
    </div>
</article><!-- #post-<?php the_ID(); ?> -->
