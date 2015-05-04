<?php

/*
Plugin Name: Slider Carousel by Ramón Serrano
Plugin URI: https://github.com/RamEduard/serrano-slider-with-carousel
Description: Slider Carousel with OwlCarousel by Ramón Serrano
Author: Ramón Serrano
Version: 1.0
Author URI: https://github.com/RamEduard
*/

if (!defined('URL_PLUGIN'))
    define ('URL_PLUGIN', plugin_dir_url (__FILE__));

$loader = require_once 'lib/autoloader.php';
$loader->add('SerranoSliderWithCarousel', __DIR__ . '/lib');

// Register Custom Post Type and Categories
// Area de Negocios - Logos
add_action('init', 'SerranoSliderWithCarousel\\AreaNegociosPostType::customPostTypeRegister');
add_action('init', 'SerranoSliderWithCarousel\\AreaNegociosPostType::customCategoriesRegister');

// Register SliderWithCarouselShortcode
SerranoSliderWithCarousel\SliderWithCarouselShortcode::getInstance()->register();
add_shortcode('slider_with_carousel', 'SerranoSliderWithCarousel\SliderWithCarouselShortcode::shortcode');