<?php
/*
Plugin Name: Wordpress Fancybox for Media
Plugin URI: https://github.com/RyanMauroDesign/Wordpress_Fancybox_Media
Description: <p>This plugin utilizes <a href="http://www.fancyapps.com/fancybox/" target="_blank" title="fancyBox">fancyBox</a> to open any YouTube video in a modal window when the link is given a class of "fancybox-media". It's as simple as that. <strong>Example: </strong></p><pre><code>&lt;a href="http://www.youtube.com/watch?v=yxxO6EG1Wqc" class="fancybox-media"&gt;Youtube Video&lt;/a&gt;</code></pre>
Version: 1.0
Author: Ryan Mauro
Author URI: http://www.ryanmaurodesign.com
License: GPL2
*/
/*  Copyright 2013  Ryan Mauro  (email : creative@ryanmaurodesign.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

// Define a constant for referencing the plugin directory
$file = dirname(__FILE__) . '/fancybox-video.php';
define( 'FANCYBOX_PATH', plugin_dir_url(__FILE__) );

// Register and then enqueue scripts and stylesheets
function fancybox() {
	if ( !is_admin()) { // Prevents Script & Styles from loading in Wordpress Admin
		// Register Scripts & Styles
		wp_register_script( 'fancybox-script', FANCYBOX_PATH . 'fancybox/jquery.fancybox.pack.js', array('jquery'), false, false); // enqueue in wp_head
		wp_register_script( 'fancybox-media', FANCYBOX_PATH . 'fancybox/helpers/jquery.fancybox-media.js', array('jquery', 'fancybox-script'), false, false); // enqueue in wp_head
		wp_register_script( 'fancybox-init', FANCYBOX_PATH . 'jquery.fancybox.init.js', array('jquery', 'fancybox-script'), false, false); //enqueue in wp_footer
		wp_register_style( 'fancybox-style', FANCYBOX_PATH . 'fancybox/jquery.fancybox.css', array(), false, 'all' );
		// Enqueue Scripts & Styles
		wp_enqueue_script( 'jquery' ); // jQuery First! (Part of Wordpress Core - doesn't need to be registered)
		wp_enqueue_script( 'fancybox-script');
		wp_enqueue_script( 'fancybox-media');
		wp_enqueue_script( 'fancybox-init');
		wp_enqueue_style( 'fancybox-style');
	}
}
add_action('wp_enqueue_scripts', 'fancybox');