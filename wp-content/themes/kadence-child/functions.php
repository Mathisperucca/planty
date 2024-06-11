<?php
/**
** activation theme
**/// 



// in case of deliting accidently the admin from the data base, the next function will reintall all rights and users 
// if ( !function_exists( 'populate_roles' ) ) {
// 	require_once( ABSPATH . 'wp-admin/includes/schema.php' );
//   }
  
//   populate_roles();



function child_enqueue_styles() {
	wp_enqueue_style( 'child-theme', get_stylesheet_directory_uri() . '/style.css', array(), 100 );
}

add_action( 'wp_enqueue_scripts', 'child_enqueue_styles' ); 

add_filter( 'wp_nav_menu_items','add_admin_link', 10, 2 );

function add_admin_link( $items, $args ) {

    if (is_user_logged_in() && $args->theme_location == 'primary') {

        $items .= '<li class="linkadmin"><a href="'. get_admin_url() .'">Admin</a></li>';

    }

    return $items;

}





