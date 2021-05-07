<?php 


if( !defined("ABSPATH")){
  exit;
}

function plugin_boilerplate_render_plugin(){

  $args = array(
    "post_per_page" => 3,
  );

  
  $view["data"] = get_posts( $args );
  
  extract($view);

  ob_start();
  require_once plugin_dir_path( __FILE__ ) . "view.php";
  $output = ob_get_clean();

  return $output;
}

add_shortcode( "pluginboilerplate", "plugin_boilerplate_render_plugin" );