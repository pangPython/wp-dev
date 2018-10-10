<?php 
/**
*	Template Name: index-page
*
**/
		get_header();		
			?>
 <?php
echo do_shortcode('[smartslider3 slider=1]');
//echo do_shortcode('[foogallery id="363"]');
?>
<div id="index-2-gallery">
    <div id="index-2-gallery-wide">
         <?php
echo do_shortcode('[smartslider3 slider=3]');
?>
    </div>
    <div id="index-2-gallery-some">
     <?php
echo do_shortcode('[foogallery id="363"]');
?>
    </div>
    <br>
    <br>
    <br>
</div>
<br>
    <br>
    <br>
<br>
    <br>
    <br>
<div style="clear:both;width:100%;margin-top:10px;">
    <br>
    <br>
    <br>
    <h1>强力推荐</h1>
<?php //echo do_shortcode('[ultimate_post_list id="852"]'); ?>    
    <?php //echo do_shortcode( '[the-post-grid id="856" title="强力推荐"]' ); ?>
    <?php //echo do_shortcode( '[post_gallery]' ); ?>
</div>


	<div id="primary" class="content-area clear">	

	<?php		

		$sticky = get_option( 'sticky_posts' );
		$args = array(
		    'posts_per_page' => 4,
		    'post__in'  => $sticky,
		    'ignore_sticky_posts' => 1
		);

		// The Query
		$the_query = new WP_Query( $args );

		$i = 1;

		if ( ( isset($sticky[0]) ) && (!get_query_var('paged')) ) {	

	?>

	<div id="featured-content">
		
		<div class="featured-wrap">

		<ul class="bxslider" style="width: 100%; height:100%;">	

		<?php
			// The Loop
			while ( $the_query->have_posts() ) : $the_query->the_post();
		?>	

		<li class="featured-slide hentry">

			<a class="thumbnail-link" href="<?php the_permalink(); ?>">
				
				<div class="thumbnail-wrap">
					<?php 
					if ( has_post_thumbnail() ) {
						the_post_thumbnail('boke_1_post_thumb');  
					} else {
						echo '<img src="' . esc_url(get_template_directory_uri()) . '/assets/img/no-featured.png" alt="" />';
					}
					?>
				</div><!-- .thumbnail-wrap -->
				<div class="gradient">
				</div>
			</a>

			<div class="entry-header clear">
				<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			</div><!-- .entry-header -->

			<div class="entry-summary">
				<?php the_excerpt(); ?>
			</div><!-- .entry-summary -->

		</li><!-- .featured-slide .hentry -->

		<?php

			$i++;
			endwhile;
		?>

		</ul><!-- .bxslider -->
		
		<div class="ribbon"><span><?php echo esc_html_e('强力推荐', 'boke-1'); ?></span></div>
		
		</div><!-- .featured-wrap -->

		</div><!-- #featured-content -->

		<?php
			} //end if has featured posts
			wp_reset_query();
			wp_reset_postdata();				
		?>
			<!-- 菜单 -->
<div class="index-sub-menu">
<?php 
				wp_nav_menu( array( 'theme_location' => 'page', 'menu_id' => 'primary-menu', 'menu_class' => 'sf-menu' ) );
			?>
</div>
		<main id="main" class="site-main clear">

			<div id="recent-content" class="content-list">

				<?php
				// Define custom query args
				$custom_query_args = array( 
				    // exclude all sticky posts
				    'post__not_in' => get_option( 'sticky_posts' ) ,
				    // don't forget to paginate!
      				'paged' => get_query_var('paged')
				);  
				// globalize $wp_query
				global $wp_query;
				// Merge custom args with default query args
				$merged_query_args = array_merge( $wp_query->query, $custom_query_args );
				// process the query
				query_posts( $merged_query_args );

				if ( $wp_query->have_posts() ) :	
				
				$i = 1;

				/* Start the Loop */
				while ( $wp_query->have_posts() ) : $wp_query->the_post();

					get_template_part('template-parts/content', 'list');

				endwhile;

				else :

					get_template_part( 'template-parts/content', 'none' );

				endif; 

				wp_reset_query();

				?>

			</div><!-- #recent-content -->		

		</main><!-- .site-main -->

		<?php get_template_part( 'template-parts/pagination', '' ); ?>

	</div><!-- #primary -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>