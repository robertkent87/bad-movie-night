<?php
	/**
	 * Template part for displaying movie posts
	 *
	 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
	 *
	 * @package Bad_Movie_Night
	 */

?>

<?php if (is_singular()) : ?>
	<?php
	$genre_list      = strip_tags(get_the_term_list($post->ID, 'genre', '', ', ', ''));
	$collection_list = strip_tags(get_the_term_list($post->ID, 'collection', '', ', ', ''));
	$actors          = get_the_terms($post->ID, 'actors');

	// get iframe HTML
	$iframe = get_field('trailer');

	// remove width & height attributes
	$iframe = preg_replace('/(width|height)=("|\')\d*(|px)("|\')\s/', "", $iframe);

	// use preg_match to find iframe src
	preg_match('/src="(.+?)"/', $iframe, $matches);
	$src = $matches[1];

	// add extra params to iframe src
	$params = array(
		'controls' => 1,
		'hd'       => 1,
		'autohide' => 1
	);

	$new_src = add_query_arg($params, $src);
	$iframe  = str_replace($src, $new_src, $iframe);

	// add extra attributes to iframe html
	$attributes = 'frameborder="0"';
	$iframe     = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);

	?>
    <div class="row" id="movie-detail">
        <div class="col-md-3">
			<?php the_post_thumbnail('large', ['class' => 'img-fluid']) ?>
            <table class="table">
                <tr>
                    <th>Rating</th>
                    <td>4.1</td>
                </tr>
                <tr>
                    <th>Genres</th>
                    <td><?= $genre_list; ?></td>
                </tr>
                <tr>
                    <th>Runtime</th>
                    <td><?php the_field('runtime'); ?></td>
                </tr>
                <tr>
                    <th>Director</th>
                    <td><?php the_field('director'); ?></td>
                </tr>
                <tr>
                    <th>Collection</th>
                    <td><?= $collection_list; ?></td>
                </tr>
            </table>
        </div>

        <div class="col-md-9">
            <h1 class="mt-0"><?php the_title(); ?>
                <small class="text-muted">(<?php the_field('year') ?>)</small>
            </h1>
			<?php the_field('synopsis') ?>

            <ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
                <li class="nav-item">
                    <a href="#details" id="details-tab" data-toggle="tab" role="tab"
                       class="nav-link active">Details</a>
                </li>
                <li class="nav-item">
                    <a href="#user_reviews" id="reviews-tab" data-toggle="tab" role="tab" class="nav-link">User
                        Reviews</a>
                </li>
                <li class="nav-item">
                    <a href="#stream_options" id="stream-tab" data-toggle="tab" role="tab" class="nav-link">Where to
                        watch it</a></li>
            </ul>

            <div class="tab-content" id="myTabContent">
                <div class="tab-pane show active" id="details" role="tabpanel">
                    <div class="embed-container">
						<?= $iframe; ?>
                    </div>

                    <h3>Cast</h3>
                    <div class="row">
						<?php foreach ($actors as $actor): ?>
                            <div class="col"><?= $actor->name; ?></div>
						<?php endforeach; ?>
                    </div>

                    <h3>Why it's bad</h3>
					<?php the_content(); ?>

                </div>
                <div class="tab-pane" id="user_reviews" role="tabpanel">
                    <ul class="list-unstyled">
                        <li class="media">
                            <img class="mr-3" src="http://via.placeholder.com/64x64?text=Avatar"
                                 alt="Generic placeholder image">
                            <div class="media-body">
                                <h5 class="mt-0 mb-1">List-based media object</h5>
                                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante
                                sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce
                                condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                            </div>
                        </li>
                        <li class="media my-4">
                            <img class="mr-3" src="http://via.placeholder.com/64x64?text=Avatar"
                                 alt="Generic placeholder image">
                            <div class="media-body">
                                <h5 class="mt-0 mb-1">List-based media object</h5>
                                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante
                                sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce
                                condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                            </div>
                        </li>
                        <li class="media">
                            <img class="mr-3" src="http://via.placeholder.com/64x64?text=Avatar"
                                 alt="Generic placeholder image">
                            <div class="media-body">
                                <h5 class="mt-0 mb-1">List-based media object</h5>
                                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante
                                sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce
                                condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="tab-pane" id="stream_options" role="tabpanel">
                    <table class="table">
                        <tr>
                            <th>Netflix</th>
                            <td>https://www.link.com</td>
                        </tr>
                        <tr>
                            <th>Amazon</th>
                            <td>https://www.link.com</td>
                        </tr>
                        <tr>
                            <th>YouTube</th>
                            <td>https://www.link.com</td>
                        </tr>
                        <tr>
                            <th>Other</th>
                            <td>https://www.link.com</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <!-- /Movie listing -->
    </div>
<?php else: ?>
    <article class="col-md-3 movie clearfix" id="post-<?php the_ID(); ?>">
        <a href="<?php the_permalink(); ?>">
			<?php the_post_thumbnail('post-thumbnail', ['class' => 'img-fluid']); ?>
        </a>
        <p class="movie-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
    </article>
<?php endif; ?>
