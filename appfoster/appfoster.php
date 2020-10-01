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

   add_filter( 'generate_rewrite_rules', function ( $wp_rewrite ){
       $wp_rewrite->rules = array_merge(
           ['appfoster/test' => 'index.php?custom=1'],
           $wp_rewrite->rules
       );
   } );
   add_filter( 'query_vars', function( $query_vars ){
       $query_vars[] = 'custom';
       return $query_vars;
   } );
   add_action( 'template_redirect', function(){
       $custom = intval( get_query_var( 'custom' ) );
       if ( $custom ) {
         //echo "Test";
           include plugin_dir_path( __FILE__ ) . 'test_template.php';
           die;
       }
   } );
?>
