<!DOCTYPE html>
<html lang="zh" dir="ltr">
  <head>
    <meta charset="utf-8">
    <?php wp_head(); ?>
  </head>
  <body>
  <div class="layui-container">
  <div class="layui-main">
	<?php if ( has_nav_menu( 'header_menu' )) : ?>
		
							<?php
									echo wp_nav_menu( array(
										'theme_location' => 'header_menu',
										'menu_class'     => '',
										'menu_id'	=> 'header_menu',
									 ) );
								?>
					
	<?php endif; ?>
