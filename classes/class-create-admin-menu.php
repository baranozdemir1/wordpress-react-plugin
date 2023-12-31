<?php

/**
 * This class is responsible for creating admin menu
 */

class WP_React_Create_Admin_Page
{
  // create a variable for storing the admin menu slug
  static $slug = "wp-react-settings";

  public function __construct()
  {
    add_action('admin_menu', [$this, 'create_admin_menu']);
  }

  public function create_admin_menu()
  {
    $capability = 'manage_options';

    add_menu_page(
      __('WP React Settings', 'wp-react'),
      __('WP React', 'wp-react'),
      $capability,
      self::$slug,
      [$this, 'render_admin_page'],
      'dashicons-admin-generic',
      99
    );
  }

  public function render_admin_page()
  {
    echo '<div class="wrap"><div id="wp-react-admin-app"></div></div>';
  }
}

new WP_React_Create_Admin_Page();