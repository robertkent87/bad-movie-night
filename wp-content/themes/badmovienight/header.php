<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Bad_Movie_Night
 */

?>

<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a href="/" class="navbar-brand">
            <img src="<?php print get_template_directory_uri(); ?>/images/logo-1line-small.png" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <?php
            wp_nav_menu( array(
                'theme_location' => 'menu-1',
                'container' => 'div',
                'container_class' => 'collapse navbar-collapse mr-auto',
                'container_id' => 'navbarNav',
                'menu_class' => 'navbar-nav',
            ) );
        ?>
        <a href="/submit-movie" class="btn btn-outline-light">Submit movie</a>
    </nav>
    <div class="container">
