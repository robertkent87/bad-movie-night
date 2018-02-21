<?php
	/**
	 * Template part for displaying movie posts
	 *
	 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
	 *
	 * @package Bad_Movie_Night
	 */

?>

<?php if ( ! is_front_page()) : ?>
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
            <!-- Mobile header -->
            <h1 class="mt-0 d-md-none d-lg-none d-xl-none"><?php the_title(); ?>
                <small class="text-muted">(<?php the_field('year') ?>)</small>
            </h1>
            <!-- /Mobile header -->

			<?php the_post_thumbnail('large', [
				'class' => 'img-fluid mb-4',
				'title' => get_the_title(),
				'alt'   => get_the_title()
			]) ?>

            <!-- Desktop meta -->
            <table class="table borderless d-none d-md-block">
	            <?php if (get_field('imdb_rating')): ?>
                <tr>
                    <th>Rating</th>
                    <td><?php the_field('imdb_rating'); ?></td>
                </tr>
                <?php endif; ?>
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
            <!-- /Desktop meta -->
        </div>

        <div class="col-md-9">
            <!-- Desktop title -->
            <h1 class="d-none d-md-block mt-0"><?php the_title(); ?>
                <small class="text-muted">(<?php the_field('year') ?>)</small>
            </h1>
            <!-- /Desktop title -->
            
            <p><em><?php the_field('synopsis') ?></em></p>
			<?php the_content(); ?>

            <!-- Mobile meta -->
            <table class="table borderless d-md-none d-lg-none d-xl-none">
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
            <!-- /Mobile meta -->

            <ul class="nav nav-tabs mb-3" id="movie-detail-tabs" role="tablist">
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

                </div>
                <div class="tab-pane" id="user_reviews" role="tabpanel">
                    <p>Coming in a later release...</p>
                    <!--                    <div class="media">-->
                    <!--                        <img class="mr-3" src="http://via.placeholder.com/64x64?text=Avatar"-->
                    <!--                             alt="Generic placeholder image">-->
                    <!--                        <div class="media-body">-->
                    <!--                            <h5 class="mt-0 mb-1">List-based media object</h5>-->
                    <!--                            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante-->
                    <!--                            sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce-->
                    <!--                            condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.-->
                    <!--                        </div>-->
                    <!--                    </div>-->
                    <!--                    <div class="media my-4">-->
                    <!--                        <img class="mr-3" src="http://via.placeholder.com/64x64?text=Avatar"-->
                    <!--                             alt="Generic placeholder image">-->
                    <!--                        <div class="media-body">-->
                    <!--                            <h5 class="mt-0 mb-1">List-based media object</h5>-->
                    <!--                            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante-->
                    <!--                            sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce-->
                    <!--                            condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.-->
                    <!--                        </div>-->
                    <!--                    </div>-->
                    <!--                    <div class="media">-->
                    <!--                        <img class="mr-3" src="http://via.placeholder.com/64x64?text=Avatar"-->
                    <!--                             alt="Generic placeholder image">-->
                    <!--                        <div class="media-body">-->
                    <!--                            <h5 class="mt-0 mb-1">List-based media object</h5>-->
                    <!--                            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante-->
                    <!--                            sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce-->
                    <!--                            condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.-->
                    <!--                        </div>-->
                    <!--                    </div>-->
                </div>
                <div class="tab-pane" id="stream_options" role="tabpanel">
                    <p>Coming in a later release...</p>
                    <!--                    <table class="table borderless">-->
                    <!--                        <tr>-->
                    <!--                            <th>Netflix</th>-->
                    <!--                            <td>https://www.link.com</td>-->
                    <!--                        </tr>-->
                    <!--                        <tr>-->
                    <!--                            <th>Amazon</th>-->
                    <!--                            <td>https://www.link.com</td>-->
                    <!--                        </tr>-->
                    <!--                        <tr>-->
                    <!--                            <th>YouTube</th>-->
                    <!--                            <td>https://www.link.com</td>-->
                    <!--                        </tr>-->
                    <!--                        <tr>-->
                    <!--                            <th>Other</th>-->
                    <!--                            <td>https://www.link.com</td>-->
                    <!--                        </tr>-->
                    <!--                    </table>-->
                </div>
            </div>
        </div>
        <!-- /Movie listing -->
    </div>
<?php else: ?>
    <article class="col-md-3 movie clearfix" id="post-<?php the_ID(); ?>">
        <a href="<?php the_permalink(); ?>">
			<?php the_post_thumbnail('list-thumb', [
				'class' => 'img-fluid mb-3',
				'title' => get_the_title(),
				'alt'   => get_the_title()
			]); ?>
        </a>
		<?php if (get_field('imdb_rating')): ?>
			<?php
			$score = get_field('imdb_rating');
			switch ($score) {
				case $score <= 3:
					$rating = 'bad';
					break;
				case $score <= 5;
					$rating = 'poor';
					break;
				default:
					$rating = 'good';
					break;
			}
			?>
            <span class="movie-rating <?= $rating ?>"><?= $score ?></span>
		<?php endif; ?>
        <p class="movie-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
    </article>
<?php endif; ?>
