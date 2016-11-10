<?php

/**
 * @package Datattach
 * @version 0.1
 */
/*
Plugin Name: Datattach
Plugin URI: http://github.com/paleolimbot/datattach
Description: Add dynamic plotting of data to posts using plot.ly
Author: Dewey Dunnington
Version: 0.1
Author URI: http://www.fishandwhistle.net/
*/

/*
 * Add the plot.ly JS library to the header
 * 
 */
function datattach_enqueue_scripts() {
    wp_enqueue_script( 'plot.ly', plugins_url( 'plotly-latest.min.js', __FILE__ ) , false );
}

add_action( 'wp_enqueue_scripts', 'datattach_enqueue_scripts' );

/*
 * Add the [plotly] shortcode
 */
function datattach_plotly_shortcode( $atts, $content = null ) {
    if(!is_array($atts)) {
        $atts = array();
    }
    if(!array_key_exists('style', $atts)) {
        $atts['style'] = 'width:100%;height:400px;padding:0px'; 
    }
    $divatts = join(' ', array_map(function($key) use ($atts) {
            return $key.'="'. esc_attr($atts[$key]).'"';
        }, array_keys($atts)));
    
    $plotly_div_id = 'plotly_' . rand(567, 56789);
    return '<div ' . $divatts . ' id="' . $plotly_div_id . '"></div>
    <script type="text/javascript">
        TESTER = document.getElementById("' . $plotly_div_id . '");
        Plotly.plot( TESTER, ' . $content . ' );
        /* Current Plotly.js version */
        console.log( Plotly.BUILD );
    </script>';
}
add_shortcode( 'plotly', 'datattach_plotly_shortcode' );

function datattach_shortcodes_to_exempt_from_wptexturize( $shortcodes ) {
    $shortcodes[] = 'plotly';
    return $shortcodes;
}
add_filter( 'no_texturize_shortcodes', 'datattach_shortcodes_to_exempt_from_wptexturize' );
remove_filter( 'the_content', 'wpautop' );
add_filter( 'the_content', 'wpautop' , 99);
