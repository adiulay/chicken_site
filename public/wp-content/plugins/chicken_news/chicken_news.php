<?php
/**
 * Plugin Name: Chicken News Plugin
 * Description: Simple plugin that shows news about, Chicken
 * Text Domain: chicken_news
 * Version: 2.2.1
 * Requires at least: 5.2
 * Requires PHP: 7.0
 * Author: Jimmy Truong
 * License: GPL v2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */

 add_action('wp_enqueue_scripts', 'chicken_news_enqueue_styles');
 function chicken_news_enqueue_styles() {
     wp_enqueue_style('chicken_news', plugin_dir_url(__FILE__) . 'style.css');
 }

require_once plugin_dir_path(__File__) . 'short_codes.php';
require_once plugin_dir_path(__File__) . 'chicken_news_functions.php';

?>