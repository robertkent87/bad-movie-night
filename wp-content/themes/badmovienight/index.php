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

    <div class="jumbotron">
        <h1>This is a demo</h1>
        <p class="lead">This text is not final and should be replaced. What you are reading now is not what you will
            be reading in this space once this website goes live. This is placeholder text that our web designers
            put here to make sure words appear properly on your website.</p>
    </div>
    <div class="row" id="movie-listing">
        <!-- Search Form -->
        <div class="col-3">
            <form action="">
                <div class="form-group">
                    <label for="keywords">Keywords</label>
                    <input type="text" name="keywords" id="keywords" class="form-control">
                </div>
                <div class="form-group">

                    <label for="genres">Genre</label>
                    <div class="form-check">
                        <input type="checkbox" name="genre_1" id="genre_1" class="form-check-input">
                        <label for="genre_1" class="form-check-label">Genre one</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" name="genre_1" id="genre_1" class="form-check-input">
                        <label for="genre_1" class="form-check-label">Genre two</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" name="genre_1" id="genre_1" class="form-check-input">
                        <label for="genre_1" class="form-check-label">Genre three</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="director">Director</label>
                    <select name="director" id="director" class="form-control">
                        <option value="">Joe Bloggs</option>
                        <option value="">Jane Doe</option>
                        <option value="">Some Person</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="year">Year</label>
                    <select name="year" id="year" class="form-control">
                        <option value="">2018</option>
                        <option value="">2017</option>
                        <option value="">2016</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="collection">Collection</label>
                    <select name="collection" id="collection" class="form-control">
                        <option value="">Christmas</option>
                        <option value="">80s</option>
                        <option value="">Heros</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-block btn-primary">Filter</button>
            </form>
        </div>
        <!-- /Search Form -->

        <!-- Movie listing -->
        <div class="col-9">
            <div class="row">
                <div class="col-sm">
                    <div class="card">
                        <a href="movie-detail.php">
                            <img class="card-img-top" src="http://via.placeholder.com/270x400" alt="Card image cap">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title"><a href="movie-detail.php">Movie title</a></h5>
                            <p class="card-text">2009 5.5</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm">
                    <div class="card">
                        <img class="card-img-top" src="http://via.placeholder.com/270x400" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Movie title</h5>
                            <p class="card-text">2009 5.5</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm">
                    <div class="card">
                        <img class="card-img-top" src="http://via.placeholder.com/270x400" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Movie title</h5>
                            <p class="card-text">2009 5.5</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm">
                    <div class="card">
                        <img class="card-img-top" src="http://via.placeholder.com/270x400" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Movie title</h5>
                            <p class="card-text">2009 5.5</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm">
                    <div class="card">
                        <img class="card-img-top" src="http://via.placeholder.com/270x400" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Movie title</h5>
                            <p class="card-text">2009 5.5</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm">
                    <div class="card">
                        <img class="card-img-top" src="http://via.placeholder.com/270x400" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Movie title</h5>
                            <p class="card-text">2009 5.5</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm">
                    <div class="card">
                        <img class="card-img-top" src="http://via.placeholder.com/270x400" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Movie title</h5>
                            <p class="card-text">2009 5.5</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm">
                    <div class="card">
                        <img class="card-img-top" src="http://via.placeholder.com/270x400" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Movie title</h5>
                            <p class="card-text">2009 5.5</p>
                        </div>
                    </div>
                </div>
            </div>
            <nav>
                <ul class="pagination justify-content-center">
                    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                </ul>
            </nav>
        </div>
        <!-- /Movie listing -->
    </div>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>

			<?php
			endif;

			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_format() );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
