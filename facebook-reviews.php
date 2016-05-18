<?php
/*
Plugin Name: Facebook Reviews
Plugin URI: http://jonathanloescher.com
Description: Display Facebook reviews on page.
Version: 1.0
Author: Jonathan Loescher
Author URI: http://jonathanloescher.com
*/
define( 'FACEBOOK_REVIEWS_VERSION', 1 );
require_once 'src/Facebook/autoload.php';
include('includes/facebook-config.php');




function facebook_reviews_enqueue_script() {
    
}
add_action('wp_enqueue_scripts', 'facebook_reviews_enqueue_script');

include('includes/like_shortcode.php');
include('includes/reviews_shortcode.php');