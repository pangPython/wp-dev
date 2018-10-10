<?php
/**
*	Template Name: timeline
*
**/
get_header();

		    $args=array(
		        'cat' => 11,   // 分类ID
		        'posts_per_page' => 10, // 显示篇数
		    );
		    query_posts($args);


?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" >

<!doctype html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Responsive Timeline</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri()."/timeline/"?>css/normalize.css"/>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri()."/timeline/"?>css/main.css"/>
</head>
<body>
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
<![endif]-->
 <!--   <div class="container">-->
        <header>
            <!--<h1 style="text-align: left;font-size:40px;">7X24小时快讯</h1>-->
        </header>
        <div class="main">
            <ul class="time">
                <?php
    
                			    if(have_posts()) : while (have_posts()) : the_post();
                ?>
                <li>
                    <time><span><?php the_time('Y-m-d h:m:s');?></span></time>
                    <div class="label kuaixun-content">
                        <h2><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
                        <p><?php the_excerpt();?></p>
                    </div>
                </li>
                		<?php  endwhile; endif; wp_reset_query(); ?>
            </ul>
        </div>
    <!--</div>-->
</body>
</html>

		</main><!-- #main -->
        <?php// echo do_shortcode('[ajax_load_more]'); ?>
	</div><!-- #primary -->

<script>
$(".kuaixun-content").hover(function(){
    $(this).css("background-color","#F3F0F0");
    },function(){
    $(this).css("background-color","white");
  });
</script>


<?php get_sidebar();?>
<?php get_footer(); ?>