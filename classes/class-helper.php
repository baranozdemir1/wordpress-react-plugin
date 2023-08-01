<?php

/**
 * This class is helper class for WP React
 */

require_once WP_REACT_PLUGIN_DIR . 'classes/class-create-admin-menu.php';

class WP_React_Helper
{
  public static function get_post_types()
  {
    $post_types = get_post_types(array('public' => true), 'objects');
    $post_types = array_map(function ($post_type) {
      return [
        'name' => $post_type->name,
        'label' => $post_type->label
      ];
    }, $post_types);
    return $post_types;
  }

  public static function get_taxonomies()
  {
    $taxonomies = get_taxonomies(array('public' => true), 'objects');
    $taxonomies = array_map(function ($taxonomy) {
      return [
        'name' => $taxonomy->name,
        'label' => $taxonomy->label
      ];
    }, $taxonomies);
    return $taxonomies;
  }

  public static function get_post_type_taxonomies($post_type)
  {
    $taxonomies = get_object_taxonomies($post_type, 'objects');
    $taxonomies = array_map(function ($taxonomy) {
      return [
        'name' => $taxonomy->name,
        'label' => $taxonomy->label
      ];
    }, $taxonomies);
    return $taxonomies;
  }

  public static function get_post_type_meta($post_type)
  {
    $meta = get_post_meta($post_type);
    $meta = array_map(function ($meta) {
      return [
        'name' => $meta->name,
        'label' => $meta->label
      ];
    }, $meta);
    return $meta;
  }

  public static function get_post_type_meta_keys($post_type)
  {
    global $wpdb;
    $meta_keys = $wpdb->get_col(
      $wpdb->prepare(
        "SELECT meta_key
      FROM $wpdb->postmeta
      WHERE meta_key NOT LIKE '\_%'
      GROUP BY meta_key
      ORDER BY meta_key"
      )
    );
    $meta_keys = array_map(function ($meta_key) {
      return [
        'name' => $meta_key,
        'label' => $meta_key
      ];
    }, $meta_keys);
    return $meta_keys;
  }

  public static function get_post_type_meta_values($post_type, $meta_key)
  {
    global $wpdb;
    $meta_values = $wpdb->get_col(
      $wpdb->prepare(
        "SELECT meta_value
      FROM $wpdb->postmeta
      WHERE meta_key = %s
      GROUP BY meta_value
      ORDER BY meta_value",
        $meta_key
      )
    );
    $meta_values = array_map(function ($meta_value) {
      return [
        'name' => $meta_value,
        'label' => $meta_value
      ];
    }, $meta_values);
    return $meta_values;
  }

  public static function get_post_type_terms($post_type, $taxonomy)
  {
    $terms = get_terms(
      array(
        'taxonomy' => $taxonomy,
        'hide_empty' => false,
      )
    );
    $terms = array_map(function ($term) {
      return [
        'name' => $term->name,
        'label' => $term->name
      ];
    }, $terms);
    return $terms;
  }

  public static function is_wp_react_page()
  {
    global $pagenow;
    return $pagenow === 'admin.php' && isset($_GET['page']) && $_GET['page'] === WP_React_Create_Admin_Page::$slug;
  }
}