<?php

/**
 * @package Plotwp
 * @version 0.4
 */
/*
Plugin Name: Plot.wp
Plugin URI: http://github.com/paleolimbot/plotwp
Description: Add JSON-based plots to posts and pages using the <a href="https://plot.ly/javascript/">plotly.js</a> API
Author: Dewey Dunnington
Version: 0.4
Author URI: http://www.fishandwhistle.net/
*/

/*
 * Add the plot.ly JS library and defaultplot.css to the header
 */
function plotwp_enqueue_scripts() {
    wp_enqueue_script( 'plot.ly', plugins_url('plotly-1.19.2.min.js', __FILE__), false );
    wp_enqueue_style('plotwp_default', plugins_url('defaultplot.css', __FILE__), false);
}

add_action( 'wp_enqueue_scripts', 'plotwp_enqueue_scripts' );

/*
 * Add the [plotly] shortcode
 */
$plotwp_plotly_div_id = 1;
function plotwp_plotly_shortcode( $atts, $content = null ) {
    global $plotwp_plotly_div_id;
    
    if(empty($content)) {
        return "";
    }
    $json = json_decode($content);
    if(empty($json)) {
        return "<b>Invalid JSON in plotly shortcode</b>";
    }
    
    if(!is_array($atts)) {
        $atts = array();
    }
    $divatts = join(' ', array_map(function($key) use ($atts) {
            return $key.'="'. esc_attr($atts[$key]).'"';
        }, array_keys($atts)));
    
    $plotly_div_id = 'plotwp_plotly_' . $plotwp_plotly_div_id++;
    return '<div ' . $divatts . ' id="' . $plotly_div_id . '"></div>
    <script type="text/javascript">
        Plotly.plot( document.getElementById("' . $plotly_div_id . '"), ' . json_encode($json) . ' );
    </script>';
}
add_shortcode( 'plotly', 'plotwp_plotly_shortcode' );

function plotwp_shortcodes_to_exempt_from_wptexturize( $shortcodes ) {
    $shortcodes[] = 'plotly';
    return $shortcodes;
}
add_filter( 'no_texturize_shortcodes', 'plotwp_shortcodes_to_exempt_from_wptexturize' );
remove_filter( 'the_content', 'wpautop' );
add_filter( 'the_content', 'wpautop' , 99);
