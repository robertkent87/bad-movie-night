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
        <p class="lead">Whether you're having friends over bored on your own, you'll find the best cinematic garbage here</p>
    </div>

    <!-- Search Form -->
    <form action="" class="form-inline justify-content-center" id="search-form">
        <label class="sr-only" for="keywords">Keywords</label>
        <input type="text" name="keywords" id="keywords" class="form-control mr-sm-2" placeholder="Keywords">

        <label class="sr-only" for="genres">Genre</label>
        <select name="genres" id="genres" class="form-control mr-sm-2">
            <option value="">Genres</option>
            <option value=""></option>
            <option value=""></option>
        </select>

        <label class="sr-only" for="director">Director</label>
        <select name="director" id="director" class="form-control mr-sm-2">
            <option value="">Joe Bloggs</option>
            <option value="">Jane Doe</option>
            <option value="">Some Person</option>
        </select>

        <label class="sr-only" for="year">Year</label>
        <select name="year" id="year" class="form-control mr-sm-2">
            <option value="">2018</option>
            <option value="">2017</option>
            <option value="">2016</option>
        </select>

        <label class="sr-only" for="collection">Collection</label>
        <select name="collection" id="collection" class="form-control mr-sm-2">
            <option value="">Christmas</option>
            <option value="">80s</option>
            <option value="">Heros</option>
        </select>
        <button type="submit" class="btn btn-primary">Filter</button>
    </form>
    <!-- /Search Form -->

    <div class="row" id="movie-listing">
        <!-- Movie listing -->
        <div class="row">
            <?php
                $args = [
                    'post_type' => 'movie',
                    'post_status' => 'publish',
                ];

                $movies = new WP_Query($args);

                if ( $movies->have_posts() ) :
                    /* Start the Loop */
                    while ( $movies->have_posts() ) : $movies->the_post();
                        /*
                         * Include the Post-Format-specific template for the content.
                         * If you want to override this in a child theme, then include a file
                         * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                         */
                        get_template_part( 'template-parts/content', 'movie' );
                    endwhile;
                    the_posts_navigation();
                else :
                    get_template_part( 'template-parts/content', 'none' );
                endif; ?>
        </div>
        <nav id="pagination">
            <ul class="pagination justify-content-center">
                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul>
        </nav>
        <!-- /Movie listing -->
    </div>

<?php
get_footer();
