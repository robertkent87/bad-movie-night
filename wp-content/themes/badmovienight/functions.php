<?php
	/**
	 * Bad Movie Night functions and definitions
	 *
	 * @link https://developer.wordpress.org/themes/basics/theme-functions/
	 *
	 * @package Bad_Movie_Night
	 */

	if ( ! function_exists('badmovienight_setup')) :
		/**
		 * Sets up theme defaults and registers support for various WordPress features.
		 *
		 * Note that this function is hooked into the after_setup_theme hook, which
		 * runs before the init hook. The init hook is too late for some features, such
		 * as indicating support for post thumbnails.
		 */
		function badmovienight_setup() {
			/*
			 * Make theme available for translation.
			 * Translations can be filed in the /languages/ directory.
			 * If you're building a theme based on Bad Movie Night, use a find and replace
			 * to change 'badmovienight' to the name of your theme in all the template files.
			 */
			load_theme_textdomain('badmovienight', get_template_directory() . '/languages');

			// Add default posts and comments RSS feed links to head.
			add_theme_support('automatic-feed-links');

			/*
			 * Let WordPress manage the document title.
			 * By adding theme support, we declare that this theme does not use a
			 * hard-coded <title> tag in the document head, and expect WordPress to
			 * provide it for us.
			 */
			add_theme_support('title-tag');

			/*
			 * Enable support for Post Thumbnails on posts and pages.
			 *
			 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
			 */
			add_theme_support('post-thumbnails');

			add_image_size('list-thumb', 510, 764, true);

			// This theme uses wp_nav_menu() in one location.
			register_nav_menus(array(
				'menu-1' => esc_html__('Primary', 'badmovienight'),
			));

			/*
			 * Switch default core markup for search form, comment form, and comments
			 * to output valid HTML5.
			 */
			add_theme_support('html5', array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			));

			// Set up the WordPress core custom background feature.
			add_theme_support('custom-background', apply_filters('badmovienight_custom_background_args', array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)));

			// Add theme support for selective refresh for widgets.
			add_theme_support('customize-selective-refresh-widgets');

			/**
			 * Add support for core custom logo.
			 *
			 * @link https://codex.wordpress.org/Theme_Logo
			 */
			add_theme_support('custom-logo', array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			));
		}
	endif;
	add_action('after_setup_theme', 'badmovienight_setup');

	/**
	 * Set the content width in pixels, based on the theme's design and stylesheet.
	 *
	 * Priority 0 to make it available to lower priority callbacks.
	 *
	 * @global int $content_width
	 */
	function badmovienight_content_width() {
		$GLOBALS['content_width'] = apply_filters('badmovienight_content_width', 640);
	}

	add_action('after_setup_theme', 'badmovienight_content_width', 0);

	/**
	 * Register widget area.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
	 */
	function badmovienight_widgets_init() {
		register_sidebar(array(
			'name'          => esc_html__('Sidebar', 'badmovienight'),
			'id'            => 'sidebar-1',
			'description'   => esc_html__('Add widgets here.', 'badmovienight'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		));

		register_sidebar([
			'name' => 'Footer Column 1',
			'id' => 'footer_column_1',
			'before_widget' => '<div>',
			'after_widget' => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		]);
	}

	add_action('widgets_init', 'badmovienight_widgets_init');

	/**
	 * Enqueue scripts and styles.
	 */
	function badmovienight_scripts() {
		// Select2
		wp_enqueue_style('select2-min', get_template_directory_uri() . '/css/select2.min.css');

		// Bootstrap
		wp_enqueue_style('bootstrap-min', get_template_directory_uri() . '/css/bootstrap.min.css');

		// Fonts
        wp_enqueue_style('open_sans', 'https://fonts.googleapis.com/css?family=Open+Sans');
//        wp_enqueue_style('signika', 'https://fonts.googleapis.com/css?family=Signika:400,700');
        wp_enqueue_style('roboto', 'https://fonts.googleapis.com/css?family=Roboto+Condensed:700');

		wp_enqueue_style('badmovienight-style', get_stylesheet_uri());

		wp_deregister_script('jquery');
		wp_enqueue_script('jquery', get_template_directory_uri() . '/js/jquery-3.3.1.min.js', array(), '3.3.1');
		wp_enqueue_script('bootstrap-min', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '20180201', true);
		wp_enqueue_script('badmovienight-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20180201', true);
		wp_enqueue_script('badmovienight-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20180201', true);
		wp_enqueue_script('select2-min', get_template_directory_uri() . '/js/select2.min.js', array(), '20180201', true);
		wp_enqueue_script('badmovienight-script', get_template_directory_uri() . '/js/script.js', array(), '20180201', true);

		if (is_singular() && comments_open() && get_option('thread_comments')) {
			wp_enqueue_script('comment-reply');
		}
	}

	add_action('wp_enqueue_scripts', 'badmovienight_scripts');

	/**
	 * Custom columns for movie list in admin
	 */
	function set_custom_edit_movie_columns($columns){
		$date = $columns['date'];
		$title = $columns['title'];

		unset($columns['date']);
		unset($columns['title']);

		$columns['poster'] = __('Poster');
		$columns['title'] = $title;
		$columns['release_year'] = __('Year');
		$columns['date'] = $date;

		return $columns;
	}
	add_filter('manage_movie_posts_columns', 'set_custom_edit_movie_columns');

	function custom_movie_column($column, $post_id){
		switch ($column){
			case 'release_year':
				echo intval(get_field('year', $post_id));
				break;
			case 'poster':
				the_post_thumbnail('thumbnail');
				break;
		}
	}
	add_action('manage_movie_posts_custom_column', 'custom_movie_column', 10, 2);

	function custom_sortable_movie_columns($columns){
		$columns['release_year'] = 'year';

		return $columns;
	}
	add_filter('manage_edit-movie_sortable_columns', 'custom_sortable_movie_columns');

	add_action('pre_get_posts', 'movie_custom_orderby');
	function movie_custom_orderby($query){
		if (!is_admin()) return;

		$orderby = $query->get('orderby');

		if ('year' == $orderby){
			$query->set('meta_key', 'year');
			$query->set('orderby', 'meta_value_num');
		}
	}

	/**
	 * Implement the Custom Header feature.
	 */
	require get_template_directory() . '/inc/custom-header.php';

	/**
	 * Custom template tags for this theme.
	 */
	require get_template_directory() . '/inc/template-tags.php';

	/**
	 * Functions which enhance the theme by hooking into WordPress.
	 */
	require get_template_directory() . '/inc/template-functions.php';

	/**
	 * Customizer additions.
	 */
	require get_template_directory() . '/inc/customizer.php';

	/**
	 * Load Jetpack compatibility file.
	 */
	if (defined('JETPACK__VERSION')) {
		require get_template_directory() . '/inc/jetpack.php';
	}

	/**
   * Custom class on nav links
   */
  function bmn_menu_classes($classes, $item, $args) {
    if ($args->theme_location == 'menu-1') {
      $classes[] = 'nav-item';
    }
    return $classes;
  }

  add_filter('nav_menu_css_class', 'bmn_menu_classes', 1, 3);

  function add_link_atts($atts) {
    $atts['class'] = "nav-link";
    return $atts;
  }
  add_filter( 'nav_menu_link_attributes', 'add_link_atts');

  /**
   * Custom class on pagination links
   */
	add_filter('next_posts_link_attributes', 'posts_link_attributes');
	add_filter('previous_posts_link_attributes', 'posts_link_attributes');

	function posts_link_attributes() {
		return 'class="page-link"';
	}

	/**
	 * Get possible field values
	 * @param $field_key
	 * @param string $post_type
	 * @return array $field_values
	 */
	function get_field_values($field_key, $post_type = 'post'){
		$posts = get_posts([
			'post_type' => $post_type,
			'meta_key' => $field_key,
			'posts_per_page' => -1,
		]);

		$field_values = [];

		foreach ($posts as $post){
			$field_values[] = trim(get_field($field_key, $post->ID));
		}

		return $field_values;
	}
