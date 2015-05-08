<?php

namespace SerranoSliderWithCarousel;

/**
 * Description of Shortcode
 *
 * @author Ramón Serrano <ramon.calle.88@gmail.com>
 */
class SliderWithCarouselShortcode
{
    
    static $instance;
    
    /**
     * Return Instance
     * 
     * @return SliderWithCarouselShortcode
     */
    static function getInstance()
    {
        if (!self::$instance)
            self::$instance = new self();
        
        return self::$instance;
    }
    
    /**
     * Register shortcode
     */
    function register()
    {
        // Font Awesome
        wp_register_style('font_awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css');
        //OWL Carousel CSS
        wp_register_style('owl_carousel_css', URL_PLUGIN . 'css/owl.carousel.css');
        //OWL Carousel THEME CSS
        wp_register_style('owl_carousel_theme_css', URL_PLUGIN . 'css/owl.theme.default.css');
        //OWL Carousel JS
        wp_register_script('owl_carousel_js', URL_PLUGIN . 'js/owl.carousel.js', '2.0.0');
        //Custom CSS
        wp_register_style('custom_slider_with_carousel_css', URL_PLUGIN . 'css/custom.css');
        //Custom JS
        wp_register_script('custom_slider_with_carousel_js', URL_PLUGIN . 'js/custom.js');
        
        wp_enqueue_style('font_awesome');
        wp_enqueue_style('owl_carousel_css');
        wp_enqueue_style('owl_carousel_theme_css');
        wp_enqueue_style('custom_slider_with_carousel_css');
        wp_enqueue_script('jquery');
        wp_enqueue_script('owl_carousel_js');
        wp_enqueue_script('custom_slider_with_carousel_js');
        
    }
    
    /**
     * Shortcode for Slider Carousel Items
     * 
     * @author Ramón Serrano <ramon.calle.88@gmail.com>
     * @param array $atts
     * @return string
     */
    static function shortcode($atts = null)
    {
        $atts = shortcode_atts(array(
            'id' => null,
            'class' => 'customPortholeSlider',
        ), $atts);
        
        $categories = get_terms(array('categoria-carousel'), array('hide_empty' => true));

        $html = '<div class="slider-container ' . $atts['class'] . '">';

        foreach ($categories as $category) :
            $imagenNav = get_field('imagen_de_navegacion', $category);
            $imagenFondo = get_field('imagen_de_fondo', $category);
            
            $html .= '<div class="slide-item-category-carousel slide-item-' . $category->slug . '" 
                           data-thumb-src="' . $imagenNav['url'] . '"
                           data-full-src="' . $imagenFondo['url'] . '"
                           data-title="' . $category->name . '">';
            $html .= self::getPostsCarouselFromCategory($category->slug);
            $html .= '</div>';            
        endforeach;

        $html .= '</div>';
        
        return $html;
    }
    
    /**
     * Posts carousel items from category
     * 
     * @param string $slug
     * @return string Carousel items
     */
    static function getPostsCarouselFromCategory($slug = '')
    {
        if ($slug != '') {
            $queryPosts = new \WP_Query(array(
                'post_type'     => 'area-negocios',
                'categoria-carousel' => $slug
            ));
            
            // Array posts
            $arrayPosts = $queryPosts->get_posts();
           
            if (!empty($arrayPosts))
                $html = '';
            else
                $html .= '<div class="item">
                            Empty
                          </div>';
                
            
            foreach ($arrayPosts as $post) :
                $html .= '<div class="item post-item-' . $post->ID . '">';
                
                $html .= '<div class="item-image">' . get_the_post_thumbnail($post->ID, 'full' ) . '</div>';
                
                $html .= '<div class="item-content">' .
                                $post->post_content .
                         '</div>';
                
                $html .= '</div>';
            endforeach;
        } else {
            $html = '';
        }
        
        return $html;
    }
}
