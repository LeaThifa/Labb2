<?php

//Theme support
add_action("after_setup_theme", "surfOn_theme_support");
function surfOn_theme_support(){

    //Thumbnail support
    add_theme_support("post-thumbnail");
}

// Show 4 product categories on homepage
add_filter('storefront_product_categories_shortcode_args','custom_storefront_category_per_page' );
 
function custom_storefront_category_per_page( $args ) {
 $args['number'] = 4;
 $args['columns'] = 4;
 return $args;
}

//Hide sidebar in checkout
add_action("wp_head", "surfOn_hide_sidebar" ); 
function surfOn_hide_sidebar(){ 
  if(is_checkout()){ 
  ?>
<style type="text/css">
 #secondary {
        display: none;
    }
    #primary {
       width:100%;
    }
    
   </style>
  <?php
 }
}

//Custom post type for employees


function surfOn_employees()
{
    $args = array(
        "labels" => array(
            "name" => "Employees",
            "singular_name" => "Employee"
        ),
        "hierarchical" => true,
        "public" => true,
        "has_archive" => true,
        "menu_icon" => "dashicons-universal-access",
        "supports" => array("title", "thumbnail", "custom-fields"),

    );

    register_post_type("surfOn_employees", $args);
}
add_action("init", "surfOn_employees");

//Display all posts of employees on the page
function cdxn_portfolio_post_type( $query ) {
    if ( is_archive() ) {
        $query->set( 'posts_per_page', -1 );
        return;
    }
}
add_action( 'pre_get_posts', 'cdxn_portfolio_post_type', 1 );


   








