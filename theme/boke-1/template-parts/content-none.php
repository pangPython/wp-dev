<?php
/**
 * Template part for displaying a message that posts cannot be found.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package boke-1
 */

?>

<section class="no-results not-found">
	<header class="page-header">
		<h1 class="page-title"><?php esc_html_e( '找不到相关结果', 'boke-1' ); ?></h1>
	</header><!-- .page-header -->

	<div class="page-content">
		<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>
			<div>
				<?php esc_html_e( '准备好发布您的第一篇文章了吗?', 'boke-1' );  ?> <a href="<?php echo esc_url( admin_url( 'post-new.php' ) ); ?>"><?php esc_html_e( '现在开始', 'boke-1' ); ?></a>.
			</div>

		<?php elseif ( is_search() ) : ?>

			<div><?php esc_html_e( '您输入的关键字无相关结果，请尝试其他关键字。', 'boke-1' ); ?></div>
			<?php
				//get_search_form();

		else : ?>

			<div><?php esc_html_e( '无相关结果，请返回首页，或输入关键字搜索相应结果。', 'boke-1' ); ?></div>
			
			<?php
				//get_search_form();

		endif; ?>
	</div><!-- .page-content -->
</section><!-- .no-results -->
