<?php

function drinks_scripts()
{
  wp_enqueue_script( 'drinks_scripts', get_template_directory_uri() . '/main.js', array(), _S_VERSION, true );
  wp_localize_script( 'drinks_scripts', 'drinks_ajax', array( 'ajax_url' => admin_url( 'admin-ajax.php' ), 'nonce' => wp_create_nonce( 'drinks-nonce' ) ) );
}
add_action('wp_enqueue_scripts', 'drinks_scripts');

function drink_checkin_callback()
{
		// Check the nonce - security
		check_ajax_referer( 'drinks-nonce', 'nonce' );

		global $wpdb;

		$post_ID = $_POST['drinkid'];

		if ( get_post_status ( $post_ID ) == 'private' && !is_user_logged_in()) {
			die( 'This post is private' );
		}

		$times_drank = get_post_meta($post_ID, 'times_drank', true) != '' ? get_post_meta($post_ID, 'times_drank', true) : '0';
		$times_drank = $times_drank + 1;

		// Update the meta value
		update_post_meta($post_ID, 'times_drank', $times_drank);
		update_post_meta($post_ID, 'last_drank', date('Y-m-d'));

		die($times_drank);
	}

	add_action( 'wp_ajax_drink_checkin', 'drink_checkin_callback' );
	add_action('wp_ajax_nopriv_drink_checkin', 'drink_checkin_callback');