<?php

/**
 * Plugin Name: WP React
 * Plugin URI:
 * Description: React app in WordPress
 * Version: 1.0.0
 * Author: Baran Özdemir
 * Author URI: https://baranozdemir.com
 * License: GPL2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: wp-react
 */

if (!defined('ABSPATH'))
  exit();

/**
 * Define Plugin Constants
 */
define('WP_REACT_PLUGIN_DIR', trailingslashit(plugin_dir_path(__FILE__)));
define('WP_REACT_PLUGIN_URL', trailingslashit(plugins_url('/', __FILE__)));

/**
 * Load Scripts
 */
add_action('admin_enqueue_scripts', 'wp_react_admin_scripts');
function wp_react_admin_scripts()
{
  wp_enqueue_style('wp-react', WP_REACT_PLUGIN_URL . 'dist/output.css', array(), filemtime(WP_REACT_PLUGIN_DIR . 'dist/output.css'));

  wp_enqueue_script('wp-react', WP_REACT_PLUGIN_URL . 'dist/bundle.js', array('jquery', 'wp-element'), filemtime(WP_REACT_PLUGIN_DIR . 'dist/bundle.js'), true);
  wp_localize_script('wp-react', 'appLocalizer', [
    'ajaxUrl' => admin_url('admin-ajax.php'),
    'apiUrl' => rest_url(),
    'nonce' => wp_create_nonce('wp_rest')
  ]);
}

require_once WP_REACT_PLUGIN_DIR . 'classes/class-create-admin-menu.php';