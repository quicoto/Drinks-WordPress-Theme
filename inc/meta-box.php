<?php

// Adds custom meta box for price field
function drinks_price_meta_box() {
  add_meta_box(
    'drinks_price_meta_box',
    __( 'Drink Price', 'drinks' ),
    'drinks_price_meta_box_callback',
    'drinks',
    'side',
    'default'
  );
}

add_action( 'add_meta_boxes', 'drinks_price_meta_box' );

function drinks_price_meta_box_callback( $post ) {
  wp_nonce_field( basename( __FILE__ ), 'drinks_price_meta_box_nonce' );
  $drinks_stored_meta = get_post_meta( $post->ID );
  ?>
  <div>
      <input required type="number" size=10 id="price" name="price" value="<?php if ( ! empty ( $drinks_stored_meta['price'] ) ) echo esc_attr( $drinks_stored_meta['price'][0] ); ?>" />
  </div>
  <?php
}

function drinks_meta_save( $post_id ) {
  $is_autosave = wp_is_post_autosave( $post_id );
  $is_revision = wp_is_post_revision( $post_id );
  $is_valid_nonce = ( isset( $_POST['drinks_price_meta_box_nonce'] ) && wp_verify_nonce( $_POST['drinks_price_meta_box_nonce'], basename( __FILE__ ) ) ) ? 'true' : 'false';

  if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
    return;
  }

  if ( isset( $_POST['price'] ) ) {
    update_post_meta( $post_id, 'price', sanitize_text_field( $_POST['price'] ) );
  }
}

add_action( 'save_post', 'drinks_meta_save' );

