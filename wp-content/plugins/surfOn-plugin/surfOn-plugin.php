<?php

/*
Plugin Name: surfOn Contact Form Plugin
Plugin URI: http://localhost/labb2-linneathifa/surfon-plugin
Description: Contact from plugin
Version: 1.0.0
Author: Linnea Thifa
Author URI: http://localhost/labb2-linneathifa/surfon-plugin
License: GPL v3 or later
Text Domain: surfOn Contact Form
*/

if ( ! defined( 'ABSPATH' )){
    echo 'Access denied, you silly human!';
    exit;
}

class surfOnContactForm{

    //Create custom post type - Contact Form
    public function __construct(){
        add_action("init", array($this, "create_custom_post_type"));

        //Add assets
        add_action("wp_enqueue_scripts", array($this, "load_assets"));

        //Add shortcodes
        add_shortcode("contact-form", array($this, "load_shortcode"));

        //Load javascript
        add_action("wp_footer", array($this, "load_scripts"));

        //Register REST API

        add_action('rest_api_init', array($this, 'register_rest_api'));
    }

    public function create_custom_post_type(){
        
        $args = array(
            "public" => true,
            "has_archive" => true,
            "supports" => array("title"),
            "exclude_from_search" => true,
            "publicly_queryable" => false,
            "capability" => "manage_option",
            "labels" => array(
                "name" => "Contact Form",
                "singular_name" => "Contact Form Entry"
            ),
            "menu_icon" => "dashicons-media-text", 
        );
        register_post_type("simple_contact_form", $args);
    }

    public function load_assets(){
        wp_enqueue_style(
            "simple_contact_form",
            plugin_dir_url(__FILE__) . "css/simple-contact-form.css",
            array(),
            1,
            "all"
        );

        wp_enqueue_script(
            "simple_contact_form",
            plugin_dir_url(__FILE__) . "js/simple-contact-form.js",
            array("jquery"),
            1,
            true
        );
    }


    public function load_shortcode()
    {?>
        <div class="surfon-contact-form">
            <h3>Send us an email</h3>
            <p>Please fill the below form to get intouch with us</p>
            <form id="simple-contact-form"> 
                <input name="name" type="text" placeholder="Name"  />
                <input name="email" type="email" placeholder="Email"  />
                <textarea name="message" placeholder="Type your message"></textarea>
                </form>
                <button type="submit" class="single_add_to_cart_button button">Send</button>
            
        </div>

   <?php }

public function load_scripts()
{?>
    <script>

        
        (function($){
            $('#simple-contact-form').submit(function(event){

                event.preventDefault();

                var form = $(this).serialize();
                console.log(form);

                $.ajax({

                    method: 'post',
                    url: '<?php echo get_rest_url(null, null); ?>',
                    data: form

                })

            });

        })(jQuery)
        

    </script>

<?php }

public function register_rest_api(){


}






}

new surfOnContactForm;
