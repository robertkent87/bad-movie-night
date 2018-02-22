<?php
	/**
	 * The main template file
	 *
	 * This is the most generic template file in a WordPress theme
	 * and one of the two required files for a theme (the other being style.css).
	 * It is used to display a page when nothing more specific matches a query.
	 * E.g., it puts together the home page when no home.php file exists.
	 *
	 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
	 *
	 * @package Bad_Movie_Night
	 */

	get_header(); ?>

    <div id="intro">
        <h1>The worst movies for your night in</h1>
        <p class="lead">Whether you're having friends over or bored on your own, you'll find the best cinematic garbage
            here</p>
    </div>

    <!-- Search Form -->
    <?php
        $genre_options = [];
        $genres = get_terms(['taxonomy' => 'genre']);

        foreach ($genres as $genre_term){
            $genre_options[$genre_term->slug] = $genre_term->name;
        }

        $director_options = [];
        $director_values = get_field_values('director', 'movie');

        foreach ($director_values as $director_value){
            $director_options[$director_value] = $director_value;
        }

        ksort($director_options);
        
        $year_options = [];
        $year_values = get_field_values('year', 'movie');

        foreach ($year_values as $year_value){
            $year_options[$year_value] = $year_value;
        }
        krsort($year_options);

        $collection_options = [];
        $collections = get_terms(['taxonomy' => 'collection']);
    
        foreach ($collections as $collection_term){
            $collection_options[$collection_term->slug] = $collection_term->name;
        }
        ksort($collection_options);
    ?>
    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post" class="form-inline justify-content-center" id="search-form">
<!--        <label class="sr-only" for="keywords">Keywords</label>-->
<!--        <input type="text" name="keywords" id="keywords" class="mr-sm-2" placeholder="Keywords">-->

        <label class="sr-only" for="genres">Genre</label>
        <select multiple name="genres[]" id="genres" class="select2" data-placeholder="Genre">
            <?php foreach ($genre_options as $key => $value): ?>
                <option value="<?= $key ?>"><?= $value ?></option>
            <?php endforeach; ?>
        </select>

        <label class="sr-only" for="director">Director</label>
        <select multiple name="director[]" id="director" class="select2" data-placeholder="Director">
	        <?php foreach ($director_options as $key => $value): ?>
                <option value="<?= $key ?>"><?= $value ?></option>
	        <?php endforeach; ?>
        </select>

        <label class="sr-only" for="release-year">Year</label>
        <select multiple name="release-year[]" id="release-year" class="select2" data-placeholder="Year">
	        <?php foreach ($year_options as $key => $value): ?>
                <option value="<?= $key ?>"><?= $value ?></option>
	        <?php endforeach; ?>
        </select>

        <label class="sr-only" for="collection">Collection</label>
        <select multiple name="collection[]" id="collection" class="select2" data-placeholder="Collection">
	        <?php foreach ($collection_options as $key => $value): ?>
                <option value="<?= $key ?>"><?= $value ?></option>
	        <?php endforeach; ?>
        </select>
        <button type="submit" class="btn btn-primary mr-sm-2" name="filter" id="filter">Filter</button>
        <button type="submit" class="btn btn-secondary" name="reset" id="reset">Clear</button>
    </form>
    <!-- /Search Form -->

    <div id="movie-listing">
        <!-- Movie listing -->
		<?php
            $genre_filter = '';
            $director_filter = '';
            $year_filter = '';
            $collection_filter = '';

            $meta_query = ['relation' => 'AND'];

            if (isset($_POST['genres'])){
                $genre_filter  = filter_input(INPUT_POST, 'genres', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
            }

            if (isset($_POST['director'])){
                $director_filter = filter_input(INPUT_POST, 'director', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
            }

            if (isset($_POST['release-year'])){
                $year_filter = filter_input(INPUT_POST, 'release-year', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
            }

			if (isset($_POST['collection'])){
				$collection_filter  = filter_input(INPUT_POST, 'collection', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
			}

			if (isset($_POST['reset'])){
				$genre_filter = '';
				$director_filter = '';
				$year_filter = '';
				$collection_filter = '';
            }

			$paged = (get_query_var('page')) ? get_query_var('page') : 1;
			$args  = [
				'post_type'      => 'movie',
				'post_status'    => 'publish',
				'orderby'        => 'date',
				'order'          => 'DESC',
				'posts_per_page' => 12,
				'paged'          => $paged
			];

			if ($genre_filter) {
				$args['tax_query'][] =
					[
						'taxonomy' => 'genre',
						'field'    => 'slug',
						'terms'    => $genre_filter
					];
			}

            if ($director_filter){
			    $meta_query[] = [
                    'key' => 'director',
                    'value' => $director_filter,
                    'compare' => 'IN'
                ];
            }

           if ($year_filter){
			    $meta_query[] = [
                    'key' => 'year',
                    'value' => $year_filter,
                    'compare' => 'IN'
                ];
            }

			if ($collection_filter) {
				$args['tax_query'][] =
					[
						'taxonomy' => 'collection',
						'field'    => 'slug',
						'terms'    => $collection_filter
					];
			}

            $args['meta_query'] = $meta_query;

			$movies = new WP_Query($args);
		?>
		<?php if ($movies->have_posts()) : ?>
            <div class="row">
				<?php while ($movies->have_posts()) : $movies->the_post(); ?>
					<?php get_template_part('template-parts/content', 'movie'); ?>
				<?php endwhile; ?>
            </div>

			<?php if (is_front_page()): ?>
                <nav id="pagination">
                    <ul class="pagination justify-content-center">
                        <li class="page-item"><?php previous_posts_link('&laquo; PREV', $movies->max_num_pages) ?></li>
                        <li class="page-item"><?php next_posts_link('NEXT &raquo;', $movies->max_num_pages) ?></li>
                    </ul>
                </nav>
			<?php endif; ?>

			<?php wp_reset_postdata(); ?>
		<?php else : ?>
			<?php get_template_part('template-parts/content', 'none'); ?>
		<?php endif; ?>
        <!-- /Movie listing -->
    </div>

<?php
	get_footer();
