<?php

namespace SimpliCeremonyStreamingPlugin;

use SimpliCeremonyStreamingPlugin\Models\View;

class PostFormWidget
{
    public $postFormView;

    public function __construct()
    {
        //TODO use extend WP_Widget parent::__construct('tunob_widget', 'Tunob', array('description' => 'Un super tunob'));
        add_shortcode('post_form_widget', array($this, 'PostFormWidgetShortCode'));
        // add_action('init', array($this, 'register_script'));
        add_action('wp_enqueue_scripts', array($this, 'register_script'));
    }


    public function widget($args, $instance)
    {
        echo 'widget tunooob';
    }

    public function PostFormWidgetShortCode($atts = [])
    {
        $this->postFormView = new View(plugin_dir_path(__FILE__) . 'Views/PostFormView.php', array("postForm"));
        $this->postFormView->Render(array('postForm' => $this));
    }

    public function register_script()
    {
        wp_register_script('post_form_script', plugin_dir_url(__FILE__) . 'assets/PostForm/index.js', '1.0.0', true);
        wp_enqueue_script('post_form_script');
      }
      
      public function load_scripts()
      {
    }
}