<?php

namespace SimpliCeremonyStreamingPlugin;
class PostFormPlugin
{
    public function __construct() {
        include_once plugin_dir_path( __FILE__ ).'/PostFormWidget.php';
        add_action('init', function (){ 
          new PostFormWidget();
        });
        add_action('rest_api_init', array($this, 'create_rest_endpoint'));

    }

    public function create_rest_endpoint(){
      register_rest_route('wp/v2', '/post-form', array(
        'methods' => 'POST',
        'callback' => array($this, 'handle_submit'),
      ));
    }

    public function handle_submit($data){

      $params = $data->get_params();
      $post_name = $params['post-name'];
      $post_content = $params['post-content'];
      $post_mymeta = $params['post-mymeta'];

      // Create the post
      $post_id = wp_insert_post(array(
        'post_title' => $post_name,
        'post_content' => $post_content,
        'post_status' => 'publish',
        'post_type' => 'post'
      ));

      // Add metadata
      add_post_meta($post_id, 'mymeta', $post_mymeta);

      return new \WP_REST_Response(array('status' => 'success', 'post_title' => $post_name, 'post_id' => $post_id), 200);
    }
}