<?php
   /*
   Plugin Name: Custom Page
   Plugin URI: http://localhost/appfoster
   description: Custom page creation by plugin
   Version: 1.2
   Author: Mr. Nayan Deep
   Author URI: http://localhost/appfoster
   License: GPL2
   */
   require_once( ABSPATH . "wp-includes/pluggable.php" );
   
   function language_redirect()
    {
        global $post;
        $post_slug = $post->post_name;
        if ( $post_slug=='test' && is_singular( 'appfoster' ) ) {
          include( dirname( __FILE__ ) . '/test_template.php' );
              exit;
         }
        
    }
    add_action( 'template_redirect', 'language_redirect' );
   
   function create_posttype() {
   register_post_type( 'appfoster',
   // CPT Options
   array(
     'labels' => array(
      'name' => __( 'appfoster' ),
      'singular_name' => __( 'appfoster' )
     ),
     'public' => true,
     'has_archive' => false,
     'rewrite' => array('slug' => 'appfoster'),
    )
   );
   }
   // Hooking up our function to theme setup
   add_action( 'init', 'create_posttype' );
   function wpin(){
      $page = get_page_by_path( 'test' , OBJECT );
      $post = get_page_by_path( 'test', OBJECT, 'appfoster' );
      if ( !isset($post) ) {
          $id = wp_insert_post(array(
        'post_title'=>'test', 
        'post_type'=>'appfoster', 
        'post_content'=>'demo text',
        'post_status'=>'publish'
      )); 
      }
   }
   add_action( 'init', 'wpin' );

?>