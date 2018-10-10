<?php

//引入css和js
function add_css_js(){
  //css
  wp_enqueue_style( 'layui_css', get_template_directory_uri() . '/css/layui.css');
  wp_enqueue_style( 'layui_mobile_css', get_template_directory_uri() . '/css/layui.mobile.css');
  // js
  wp_enqueue_script( 'layui_all_js', get_template_directory_uri() . '/js/layui.all.js');
}
add_action( 'wp_enqueue_scripts', 'add_css_js' );

//注册菜单
//register_nav_menus( array(
	//'header_menu' => 'Header Menu',
	//'footer_menu' => 'My Custom Footer Menu'
//) );
?>
