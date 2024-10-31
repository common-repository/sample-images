<?php
/**
 * Plugin Name: Sample Images
 * Description: Runtime media path replacement, used for generate sample images on front side, without any db changes
 * Version:     1.0
 * Author:      Leandro Berg
 * Author URI:  https://virtuemasters.com.br
 * License:     GPL2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */

if( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if(!is_admin()){
    
    # LOAD STYLES & SCRIPTS
    add_action( 'wp_enqueue_scripts', function(){
        
        # AJAX OBJECT
        $ajaxobject = array(
            'themeurl' => get_template_directory_uri(),
            'ajaxurl' => admin_url('admin-ajax.php'),
            'sitename' => get_bloginfo('name'),
            'home' => get_bloginfo('home')
        );

        wp_enqueue_script( 'si-sample-image', plugins_url( 'sample-images.js', __FILE__ ), array('jquery'), '1.0', true );        
        wp_localize_script( 'si-sample-image', 'ajaxobject', $ajaxobject);

    });

    define('SI_SAMPLE_IMAGE',plugins_url( 'sample.jpg', __FILE__ ));

    add_filter('wp_get_attachment_image_src', function(){
        return array(SI_SAMPLE_IMAGE,960,720);
    });
    
    add_filter('wp_get_attachment_url', function(){
        return SI_SAMPLE_IMAGE;
    });

}