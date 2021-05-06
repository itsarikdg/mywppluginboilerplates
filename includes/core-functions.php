<?php 


if( !defined("ABSPATH")){
  exit;
}

function plugin_boilerplate_render_plugin(){

  $view["data"] = 3;
  
  extract($view);

  ob_start();
  require_once plugin_dir_path( __FILE__ ) . "view.php";
  $output = ob_get_clean();

  return $output;
}

add_shortcode( "pluginboilerplate", "plugin_boilerplate_render_plugin" );