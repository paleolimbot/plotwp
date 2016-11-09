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

function datattach_enqueue_scripts() {
    wp_enqueue_script( 'plot.ly', plugins_url( 'plotly-latest.min.js', __FILE__ ) , false );
}

add_action( 'wp_enqueue_scripts', 'datattach_enqueue_scripts' );

