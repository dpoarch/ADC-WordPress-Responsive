<?php

wp_register_script ( 'modaljs' , get_stylesheet_directory_uri() . '/js/modal.js', array( 'jquery' ), '1', true );
wp_register_script ( 'validationjs' , get_stylesheet_directory_uri() . '/js/validation.js', array( 'jquery' ), '1', true );
wp_register_style ( 'modalcss' , get_stylesheet_directory_uri() . '/css/style.css', '' , '', 'all' );

wp_enqueue_script( 'modaljs' );
wp_enqueue_script( 'validationjs' );
wp_enqueue_style( 'modalcss' );

function get_meta($val)
{
	global $wp_query;
	$postid = $wp_query->post->ID;
	$meta_val = get_post_meta($postid, $val, true);
	
	return ($meta_val!="") ? $meta_val: "";
}

register_sidebar( array('id' => 'commitment','name'=> __( 'Commitment Menu', $text_domain ),'description' => __( 'This Commitment menu is located on every page.', $text_domain )) );
register_sidebar( array('id' => 'pledge','name'=> __( 'Pledge Menu', $text_domain ),'description' => __( 'This Pledge menu is located on every page.', $text_domain )) );
register_sidebar( array('id' => 'poster','name'=> __( 'Poster Menu', $text_domain ),'description' => __( 'This Poster menu is located on the Take the Pledge page.', $text_domain )) );
register_sidebar( array('id' => 'toolkit','name'=> __( 'Toolkit Menu', $text_domain ),'description' => __( 'This Toolkit menu is located on the African Americans and T2D page.', $text_domain )) );

class MyExtendedMenuWalker extends Walker_Nav_Menu {
 
    private $counter = 0;
 
    /**
     * Starting an element
     * If this is not the first, add separator here
     */
    function start_el(&$output, $item, $depth, $args) {
 
        if($this->counter && isset($args->ex_separator))
            $output .= $args->ex_separator;
        parent::start_el($output, $item, $depth, $args);
        $this->counter ++;
    }
}

function do_sidebar($atts) {
    ob_start();
    dynamic_sidebar($atts[0]);
    $output = ob_get_contents();
    ob_end_clean();
    return $output;
    
}
add_shortcode('do_sidebar','do_sidebar'); 

add_action('init', 'myStartSession', 1);
add_action('wp_logout', 'myEndSession');
add_action('wp_login', 'myEndSession');

function myStartSession() {
    if(!session_id()) {
        session_start();
    }
}

function myEndSession() {
    session_destroy ();
}




?>