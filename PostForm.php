<?php

namespace SimpliCeremonyStreamingPlugin;
class PostFormPlugin
{
    public function __construct() {
        include_once plugin_dir_path( __FILE__ ).'/PostFormWidget.php';
        add_action('init', function (){ 
          new PostFormWidget();
        });
    }

    public function create_rest_endpoint(){
      register_rest_route('v2/post-form', '/submit', array(
        'methods' => 'POST',
        'callback' => function($request) {
          $post_name = $request->get_param('post_name');
          $post_content = $request->get_param('post_content');
          $post_mymeta = $request->get_param('post_mymeta');

          // Create the post
          $post_id = wp_insert_post(array(
            'post_title' => $post_name,
            'post_content' => $post_content,
            'post_status' => 'publish',
            'post_type' => 'post'
          ));

          // Add metadata
          add_post_meta($post_id, 'mymeta', $post_mymeta);

          return new \WP_REST_Response(array('status' => 'success', 'post_id' => $post_id), 200);
        }
      ));
    }
}