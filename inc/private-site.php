<?php

function private_mode() {
  if ( !is_user_logged_in() ) {
    header('Location: '. wp_login_url($_SERVER['REQUEST_URI']));
  }
}

add_action("get_header", "private_mode");