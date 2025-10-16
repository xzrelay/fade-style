<?php
/*
Plugin Name: Fade Style
Plugin URI: https://oss.randomsense.jp/fade-style/
Description: Adds smooth fade-in effects to images on your WordPress site
Version: 1.0
Author: RandomSense
Author URI: https://oss.randomsense.jp/
License: GPLv2 or Later
Text Domain: fade-style
Requires at least: 6.2
Requires PHP: 7.4
*/

if (!defined('ABSPATH')) exit;

define('FADE_STYLE_VERSION', '1.0');

/**
 * Add fade-img class to images in content
 */
function fade_style_add_image_class($content)
{
    if (is_admin() || is_feed() || empty($content)) {
        return $content;
    }

    $tags = new WP_HTML_Tag_Processor($content);

    while ($tags->next_tag('img')) {
        $existing_class = $tags->get_attribute('class') ?? '';

        if (strpos($existing_class, 'fade') !== false) {
            continue;
        }

        $new_class = trim($existing_class . ' fade');
        $tags->set_attribute('class', $new_class);
    }

    return $tags->get_updated_html();
}
add_filter('the_content', 'fade_style_add_image_class', 20);

/**
 * Enqueue scripts and styles
 */
function fade_style_enqueue_assets()
{
    if (is_admin()) {
        return;
    }

    wp_register_style('fade-style-css', false);
    wp_enqueue_style('fade-style-css');
    wp_add_inline_style('fade-style-css', 'img.fade { opacity: 0; transition: opacity 0.75s ease} img.fade.loaded { opacity: 1;}');
    wp_enqueue_script('fade-style-js', plugin_dir_url(__FILE__) . 'fade-style.js', array(), FADE_STYLE_VERSION, true);
}
add_action('wp_enqueue_scripts', 'fade_style_enqueue_assets');
