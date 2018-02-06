<?php
/**
 * Template part for displaying movie posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bad_Movie_Night
 */

?>

<?php if ( is_singular() ) : ?>
    <!-- Single movie post here -->
<?php else: ?>
<article class="col-md-4 movie d-flex align-items-stretch" id="post-<?php the_ID(); ?>">
    <div class="card clearfix">
        <a href="<?php the_permalink(); ?>">
            <?php the_post_thumbnail('post-thumbnail', ['class' => 'card-img-top']); ?>
        </a>
        <div class="card-body">
            <h5 class="card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
            <p class="card-text"><?php the_field('year'); ?> <span class="float-right">5.5</span></p>
        </div>
    </div>
</article>
<?php endif; ?>
