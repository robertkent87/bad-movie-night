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
                    <td><?php badmovienight_genre_list(); ?></td>
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
                    <td><?php badmovienight_collection_list(); ?></td>
                </tr>
            </table>
            <!-- /Desktop meta -->
        </div>

        <div class="col-md-9">
            <!-- Desktop title -->
            <h1 class="d-none d-md-block mt-0"><?php the_title(); ?>
                <small class="text-muted">(<?php the_field('year') ?>)</small>
            </h1>
            <?php if (get_the_terms(get_the_ID(), 'bad_movie_tags')): ?>
                <div id="bad-movie-tags" class="mb-3">
                    <?php badmovienight_bad_tags(); ?>
                </div>
            <?php endif; ?>
            <!-- /Desktop title -->
            
            <p><em><?php the_field('synopsis') ?></em></p>
			<?php the_content(); ?>

            <h3>Cast</h3>
            <div class="row">
				<?php badmovienight_get_actors(); ?>
            </div>

            <!-- Mobile meta -->
            <table class="table borderless d-md-none d-lg-none d-xl-none">
                <tr>
                    <th>Rating</th>
                    <td>4.1</td>
                </tr>
                <tr>
                    <th>Genres</th>
                    <td><?php badmovienight_genre_list(); ?></td>
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
                    <td><?php badmovienight_collection_list() ?></td>
                </tr>
            </table>
            <!-- /Mobile meta -->

			<?php if (get_field('trailer') || get_field('images')): ?>
                <div class="mt-5" id="movie-media">
                    <h2>Movie media</h2>

					<?php if (get_field('trailer')): ?>
                        <div class="embed-container"><?php badmovienight_trailer(); ?></div>
					<?php endif; ?>

					<?php if (get_field('images')): ?>
                        <div class="simple-lightbox mt-3">
							<?php foreach (get_field('images') as $image): ?>
                                <a href="<?php print $image['url'] ?>" class="d-inline-block mb-1">
                                    <img src="<?php print $image['sizes']['gallery-thumb'] ?>"
                                         alt="<?php print $image['alt'] ?>">
                                </a>
							<?php endforeach; ?>
                        </div>
					<?php endif; ?>
                </div>
			<?php endif; ?>

			<?php if (have_rows('watch_options')): ?>
                <div class="mt-5" id="stream-options">
                    <h2 class="mb-3">Watch Options</h2>

                    <div class="row">
						<?php while (have_rows('watch_options')): the_row(); ?>
							<?php
							$watch_location_field = get_sub_field_object('watch_location');
							$watch_location_value = $watch_location_field['value'];
							$watch_location_label = $watch_location_field['choices'][$watch_location_value];
							?>
                            <div class="col"><i class="icofont icofont-brand-<?= $watch_location_value ?>"></i><a href="<?php the_sub_field('watch_link'); ?>"
                                                target="_blank"><?= $watch_location_label; ?></a></div>
						<?php endwhile; ?>
                    </div>
                </div>
			<?php endif; ?>

<!--            <div class="mt-5" id="user-reviews">-->
<!--                <h2>User Reviews</h2>-->
<!--                <p>Coming in a later release...</p>-->
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
<!--            </div>-->
        </div>
        <!-- /Movie listing -->
    </div>
<?php else: ?>
    <article class="col-lg-3 col-md-4 col-sm-6 col-6 movie clearfix" id="post-<?php the_ID(); ?>">
        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('list-thumb', ['class' => 'img-fluid', 'title' => get_the_title(), 'alt'   => get_the_title()]); ?></a>
		<?php if (get_field('imdb_rating')): ?>
            <span class="movie-rating <?php badmovienight_rating_class(); ?>"><?php the_field('imdb_rating') ?></span>
		<?php endif; ?>
        <p class="movie-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
    </article>
<?php endif; ?>
