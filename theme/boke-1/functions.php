<?php
/**
 * revenue functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package boke-1
 */

if ( ! function_exists( 'boke_1_setup' ) ) :

function boke_1_setup() {

	load_theme_textdomain( 'boke-1', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( '顶部导航菜单', 'boke-1' ),
		'footer' => esc_html__( '底部导航菜单', 'boke-1' ),		
        'page' => esc_html__( '页面内菜单', 'boke-1' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Add theme support for Custom Logo.
	add_theme_support( 'custom-logo', array(
		'width'       => 250,
		'height'      => 75,
		'flex-width'  => true,
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'boke_1_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

    add_editor_style( array( 'assets/css/editor-style.css', '' ) ); 
}
endif;
add_action( 'after_setup_theme', 'boke_1_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function boke_1_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'boke_1_content_width', 760 );
}
add_action( 'after_setup_theme', 'boke_1_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function boke_1_sidebar_init() {

	register_sidebar( array(
		'name'          => esc_html__( '侧边栏', 'boke-1' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'boke-1' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( '底部 1', 'boke-1' ),
		'id'            => 'footer-1',
		'description'   => esc_html__( 'Add widgets here.', 'boke-1' ),
		'before_widget' => '<div id="%1$s" class="widget footer-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( '底部 2', 'boke-1' ),
		'id'            => 'footer-2',
		'description'   => esc_html__( 'Add widgets here.', 'boke-1' ),
		'before_widget' => '<div id="%1$s" class="widget footer-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( '底部 3', 'boke-1' ),
		'id'            => 'footer-3',
		'description'   => esc_html__( 'Add widgets here.', 'boke-1' ),
		'before_widget' => '<div id="%1$s" class="widget footer-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( '底部 4', 'boke-1' ),
		'id'            => 'footer-4',
		'description'   => esc_html__( 'Add widgets here.', 'boke-1' ),
		'before_widget' => '<div id="%1$s" class="widget footer-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

}
add_action( 'widgets_init', 'boke_1_sidebar_init' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Enqueues scripts and styles.
 */
function boke_1_scripts() {

    // load jquery if it isn't

    wp_enqueue_script('jquery');

    //  Enqueues Javascripts
    wp_enqueue_script( 'superfish', get_template_directory_uri() . '/assets/js/superfish.js', array(), '', true );
    wp_enqueue_script( 'slicknav', get_template_directory_uri() . '/assets/js/jquery.slicknav.js', array(), '', true );
    wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/assets/js/modernizr.js',array(), '', true ); 
    wp_enqueue_script( 'html5', get_template_directory_uri() . '/assets/js/html5.js', array(), '', true );
	wp_enqueue_script( 'bxslider', get_template_directory_uri() . '/assets/js/jquery.bxslider.js', array(), '', true );                                                        
    wp_enqueue_script( 'boke-1-custom', get_template_directory_uri() . '/assets/js/jquery.custom.js', array(), '20180505', true );

    wp_enqueue_script( 'jq-scrollSomething', get_template_directory_uri() . '/assets/js/jQuery.scrollSomething-1.0.0.js', array(), '20180815', true );
    wp_enqueue_script( 'index-sidebar-scroll', get_template_directory_uri() . '/assets/js/index-sidebar-scroll.js', array(), '20180815', true );
    // Enqueues CSS styles
    wp_enqueue_style( 'boke-1-style', get_stylesheet_uri(), array(), '20180608' );     
    wp_enqueue_style( 'genericons-style',   get_template_directory_uri() . '/genericons/genericons/genericons.css' );
    wp_enqueue_style( 'boke-1-responsive-style',   get_template_directory_uri() . '/responsive.css', array(), '20180505' ); 
	wp_enqueue_style( 'jq-scrollSomething-style',   get_template_directory_uri() . '/assets/css/jQuery.scrollSomething-1.0.0.css', array(), '20180815' ); 
    
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }    
}
add_action( 'wp_enqueue_scripts', 'boke_1_scripts' );

/**
 * Post Thumbnails.
 */
if ( function_exists( 'add_theme_support' ) ) { 
    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 300, 200, true ); // default Post Thumbnail dimensions (cropped)
    add_image_size( 'boke_1_post_thumb', 740, 414, true );
    add_image_size( 'boke_1_widget_post_thumb', 120, 80, true );                                    
}

/**
 * Registers custom widgets.
 */
function boke_1_widgets_init() {										
	require trailingslashit( get_template_directory() ) . 'inc/widgets/widget-popular.php';
	register_widget( 'boke_1_Popular_Widget' );		

	require trailingslashit( get_template_directory() ) . 'inc/widgets/widget-recent.php';
	register_widget( 'boke_1_Recent_Widget' );		

	require trailingslashit( get_template_directory() ) . 'inc/widgets/widget-random.php';
	register_widget( 'boke_1_Random_Widget' );		

	require trailingslashit( get_template_directory() ) . 'inc/widgets/widget-views.php';
	register_widget( 'boke_1_Views_Widget' );		

	require trailingslashit( get_template_directory() ) . 'inc/widgets/widget-ad.php';
	register_widget( 'boke_1_Ad_Widget' );	

}
add_action( 'widgets_init', 'boke_1_widgets_init' );
function get_qr($url,$path,$qrpic){    
 
 set_time_limit (10); //设置十秒超时
 $destination_folder = $path?$path.'/':'';
 $localname = $destination_folder .$qrpic;    
 $file = fopen ($url, "rb"); //fopen函数的r+模式: 读写方式打开 文件指针指向文件头
 if ($file) {    
  $newf = fopen ($localname, "wb"); // w+,读写方式打开 文件指针指向文件头 如果文件不存在则尝试创建之
  if ($newf)    
   while(!feof($file)) {    
    fwrite( $newf, fread($file, 1024 * 2 ), 1024 * 2 ); //写入文件,fread控制文件最大的大小,这里是2M
   }    
 }    
 if ($file) {    
  fclose($file);  //关闭fopen打开的文件  
 }    
 if ($newf) {    
  fclose($newf);    
 }    
 
}
/*
根据用户角色移除菜单项
*/
function my_wp_remove_menu_page(){
    //移除"分类目录"子菜单
	remove_submenu_page( 'edit.php', 'edit-tags.php?taxonomy=category' ); 
    //页面管理
    remove_menu_page( 'edit.php?post_type=page' );
    //工具页面
	remove_menu_page('tools.php');
    //评论页面
	remove_menu_page('edit-comments.php');
}
//移除编辑的一些菜单
if(current_user_can( 'publish_pages' ) && !current_user_can( 'manage_options' )){
add_action('admin_menu', 'my_wp_remove_menu_page');
}
function get_pagenavi( $range = 4 ) {
 global $paged,$wp_query;
 if ( !$max_page ) {
 $max_page = $wp_query->max_num_pages;
 }
 if( $max_page >1 ) { 
 if( !$paged ){
 $paged = 1;
 }
 echo "<li>"; previous_posts_link('上一页');echo"</li>";
 if ( $max_page >$range ) {
 if( $paged <$range ) {
 for( $i = 1; $i <= ($range +1); $i++ ) {
 echo "<li><a href='".get_pagenum_link($i) ."'";
 if($i==$paged) echo " class='current'";echo ">$i</a></li>";
 }
 }elseif($paged >= ($max_page -ceil(($range/2)))){
 for($i = $max_page -$range;$i <= $max_page;$i++){
 echo "<li><a href='".get_pagenum_link($i) ."'";
 if($i==$paged)echo " class='current'";echo ">$i</a></li>";
 }
 }elseif($paged >= $range &&$paged <($max_page -ceil(($range/2)))){
 for($i = ($paged -ceil($range/2));$i <= ($paged +ceil(($range/2)));$i++){
 echo "<li><a href='".get_pagenum_link($i) ."'";if($i==$paged) echo " class='current'";echo ">$i</a></li>";
 }
 }
 }else{
 for($i = 1;$i <= $max_page;$i++){
 echo "<li><a href='".get_pagenum_link($i) ."'";
 if($i==$paged)echo " class='current'";echo ">$i</a></li>";
 }
 }
 echo "<li>";next_posts_link('下一页');echo"</li>"; 
 echo '<li><span>共'.$max_page.'页</span></li>'; 
 }
}
