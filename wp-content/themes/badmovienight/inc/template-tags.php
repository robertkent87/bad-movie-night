<?php
	/**
	 * Custom template tags for this theme
	 *
	 * Eventually, some of the functionality here could be replaced by core features.
	 *
	 * @package Bad_Movie_Night
	 */

	if ( ! function_exists('badmovienight_posted_on')) :
		/**
		 * Prints HTML with meta information for the current post-date/time.
		 */
		function badmovienight_posted_on() {
			$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
			if (get_the_time('U') !== get_the_modified_time('U')) {
				$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
			}

			$time_string = sprintf($time_string,
				esc_attr(get_the_date('c')),
				esc_html(get_the_date()),
				esc_attr(get_the_modified_date('c')),
				esc_html(get_the_modified_date())
			);

			$posted_on = sprintf(
			/* translators: %s: post date. */
				esc_html_x('Posted on %s', 'post date', 'badmovienight'),
				'<a href="' . esc_url(get_permalink()) . '" rel="bookmark">' . $time_string . '</a>'
			);

			echo '<span class="posted-on">' . $posted_on . '</span>'; // WPCS: XSS OK.

		}
	endif;

	if ( ! function_exists('badmovienight_posted_by')) :
		/**
		 * Prints HTML with meta information for the current author.
		 */
		function badmovienight_posted_by() {
			$byline = sprintf(
			/* translators: %s: post author. */
				esc_html_x('by %s', 'post author', 'badmovienight'),
				'<span class="author vcard"><a class="url fn n" href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '">' . esc_html(get_the_author()) . '</a></span>'
			);

			echo '<span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

		}
	endif;

	if ( ! function_exists('badmovienight_entry_footer')) :
		/**
		 * Prints HTML with meta information for the categories, tags and comments.
		 */
		function badmovienight_entry_footer() {
			// Hide category and tag text for pages.
			if ('post' === get_post_type()) {
				/* translators: used between list items, there is a space after the comma */
				$categories_list = get_the_category_list(esc_html__(', ', 'badmovienight'));
				if ($categories_list) {
					/* translators: 1: list of categories. */
					printf('<span class="cat-links">' . esc_html__('Posted in %1$s', 'badmovienight') . '</span>', $categories_list); // WPCS: XSS OK.
				}

				/* translators: used between list items, there is a space after the comma */
				$tags_list = get_the_tag_list('', esc_html_x(', ', 'list item separator', 'badmovienight'));
				if ($tags_list) {
					/* translators: 1: list of tags. */
					printf('<span class="tags-links">' . esc_html__('Tagged %1$s', 'badmovienight') . '</span>', $tags_list); // WPCS: XSS OK.
				}
			}

			if ( ! is_single() && ! post_password_required() && (comments_open() || get_comments_number())) {
				echo '<span class="comments-link">';
				comments_popup_link(
					sprintf(
						wp_kses(
						/* translators: %s: post title */
							__('Leave a Comment<span class="screen-reader-text"> on %s</span>', 'badmovienight'),
							array(
								'span' => array(
									'class' => array(),
								),
							)
						),
						get_the_title()
					)
				);
				echo '</span>';
			}

			edit_post_link(
				sprintf(
					wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
						__('Edit <span class="screen-reader-text">%s</span>', 'badmovienight'),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				),
				'<span class="edit-link">',
				'</span>'
			);
		}
	endif;

	if ( ! function_exists('badmovienight_post_thumbnail')) :
		/**
		 * Displays an optional post thumbnail.
		 *
		 * Wraps the post thumbnail in an anchor element on index views, or a div
		 * element when on single views.
		 */
		function badmovienight_post_thumbnail() {
			if (post_password_required() || is_attachment() || ! has_post_thumbnail()) {
				return;
			}

			if (is_singular()) :
				?>

                <div class="post-thumbnail">
					<?php the_post_thumbnail(); ?>
                </div><!-- .post-thumbnail -->

			<?php else : ?>

                <a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">
					<?php
						the_post_thumbnail('post-thumbnail', array(
							'alt' => the_title_attribute(array(
								'echo' => false,
							)),
						));
					?>
                </a>

			<?php endif; // End is_singular().
		}
	endif;

	if ( ! function_exists('badmovienight_genre_list')):
		/**
		 * Retrieves and displays the Genre list for an individual movie
		 */
		function badmovienight_genre_list() {
			print strip_tags(get_the_term_list(get_the_ID(), 'genre', '', ', ', ''));
		}
	endif;

	if ( ! function_exists('badmovienight_collection_list')):
		/**
		 * Retrieves and displays the Collection list for an individual movie
		 */
		function badmovienight_collection_list() {
			print strip_tags(get_the_term_list(get_the_ID(), 'collection', '', ', ', ''));
		}
	endif;

	if ( ! function_exists('badmovienight_get_actors')):
		/**
		 * Retrieves and displays the actors for an individual movie
		 */
		function badmovienight_get_actors() {
			$actors = '';
			foreach (get_the_terms(get_the_ID(), 'actors') as $actor) {
				$actors .= "<div class='col'>{$actor->name}</div>";
			}

			print $actors;
		}
	endif;

	if ( ! function_exists('badmovienight_bad_tags')):
		/**
		 * Retrieves and displays the 'bad' tags for an individual movie
		 */
		function badmovienight_bad_tags() {
			$badmovie_tags = '';
			foreach (get_the_terms(get_the_ID(), 'bad_movie_tags') as $badmovie_tag) {
				$badmovie_tags .= "<span class='bad-movie-tag'>{$badmovie_tag->name}</span> ";
			}

			print $badmovie_tags;
		}
	endif;

	if ( ! function_exists('badmovienight_trailer')):
		/**
		 * Retrieve and displays the trailer for an individual movie.
		 * Sets various options for the embed.
		 */
		function badmovienight_trailer() {
			// get iframe HTML
			$iframe = get_field('trailer');

			// remove width & height attributes
			$iframe = preg_replace('/(width|height)=("|\')\d*(|px)("|\')\s/', "", $iframe);

			// use preg_match to find iframe src
			preg_match('/src="(.+?)"/', $iframe, $matches);
			$src = $matches[1];

			// add extra params to iframe src
			$params = array(
				'controls'       => 1,
				'hd'             => 1,
				'autohide'       => 1,
				'modestbranding' => 1,
				'rel'            => 0,
				'showinfo'       => 0,
			);

			$new_src = add_query_arg($params, $src);
			$iframe  = str_replace($src, $new_src, $iframe);

			// add extra attributes to iframe html
			$attributes = 'frameborder="0"';

			print str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);
		}
	endif;

	if ( ! function_exists('badmovienight_rating_class')):
		/**
		 * Calculates the correct class for a movie ratings display
		 */
		function badmovienight_rating_class() {
			$score = get_field('imdb_rating');

			if ($score <= 3) {
				print 'bad';
			} elseif ($score <= 6) {
				print 'poor';
			} else {
				print 'good';
			}
		}
	endif;

	if ( ! function_exists('badmovienight_watch_options')):
		/**
		 * Retrieves and displays the watch options for an individual movie
		 */
		function badmovienight_watch_options() {
			$watch_options = '';
			while (have_rows('watch_options')): the_row();
				$watch_location_field = get_sub_field_object('watch_location');
				$watch_location_value = $watch_location_field['value'];
				$watch_location_label = $watch_location_field['choices'][$watch_location_value];
				$watch_link           = get_sub_field('watch_link');

				$watch_options .= "<div class='col'><i class='icofont icofont-brand-" . $watch_location_value . "'></i><a href='" . $watch_link . "' target='_blank'>" . $watch_location_label . "</a></div>";
			endwhile;

			print $watch_options;
		}
	endif;