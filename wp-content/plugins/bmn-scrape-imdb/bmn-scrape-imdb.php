<?php
	/**
	 * Plugin Name: Scrape IMDb
	 * Plugin URI: https://robert-kent.com
	 * Description: Adds ability to scrap movie meta data from IMDb
	 * Version: 1.0
	 * Author: Robert Kent
	 * Author URI: https://robert-kent.com
	 * License: GPL2
	 */

	function imdb_meta_box_markup(){
		wp_nonce_field(basename(__FILE__), 'imdb_ajax_nonce');
		?>
		<div>
			<label for="imdb-box-title" style="display: none">Title</label>
			<input type="text" name="imdb-box-title" id="imdb-box-title" value="" placeholder="Search by title..." />
			<button id="scrape-imdb" class="button" type="submit">Search IMDb</button>
		</div>
		<?php
	}

	add_action('add_meta_boxes', 'add_imdb_meta_box');
	function add_imdb_meta_box(){
		add_meta_box(
			'bmn-imdb-meta-box',
			'Get data from IMDb',
			'imdb_meta_box_markup',
			'movie',
			'normal',
			'high',
			null
		);
	}

	function imdb_ajax_action(){
		$data = [];

		if (isset($_POST['form_data'])){
			foreach ($_POST['form_data'] as $pair){
				$data[$pair['name']] = $pair['value'];
			}
		}

		if (!wp_verify_nonce($data['imdb_ajax_nonce'], basename(__FILE__))){
			die(-1);
		}

		$api_meta = null;

		if ($data['imdb-box-title']){
			$search_title = $data['imdb-box-title'];
			$api_url = 'http://www.omdbapi.com/?apikey=a6cae185&t='.urlencode($search_title);
			$api_response = json_decode(file_get_contents($api_url));

			$api_meta = [
				'year' => $api_response->Year,
				'synopsis' => $api_response->Plot,
				'director' => $api_response->Director,
				'runtime' => $api_response->Runtime,
				'rating' => $api_response->imdbRating,
				'genre' => $api_response->Genre,
				'actors' => $api_response->Actors
			];
		}

		print json_encode($api_meta);
		wp_die();
	}

	function imdb_ajax_action_init(){
		if ($_POST['action'] == 'imdb_ajax_action'){
			do_action('wp_ajax_imdb_ajax_action');
		}
	}

	if (is_admin()){
		add_action('wp_ajax_imdb_ajax_action', 'imdb_ajax_action');
	}

	add_action('init', 'imdb_ajax_action_init');

	function imdb_enqueue_scripts(){
		wp_enqueue_script('imdb_ajax_action', plugins_url('js/imdb-ajax.js', __FILE__), ['jquery'], null, true);
	}

	add_action('admin_enqueue_scripts', 'imdb_enqueue_scripts');