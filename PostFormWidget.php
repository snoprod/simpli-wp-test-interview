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
    }


    public function widget($args, $instance)
    {
        echo 'widget tunooob';
    }

    public function PostFormWidgetShortCode($atts = [])
    {
        $this->postFormView = new View(plugin_dir_path(__FILE__) . 'Views/PostFormView.php', array("postForm"));
        $this->postFormView->Render(array('postForm' => $this));
        // $this->postFormView->Render();
    }

    public function register_script()
    {
    }

    public function load_scripts()
    {
    }
}