<div class="entry-meta">

	<span class="entry-category"><?php boke_1_first_category(); ?></span>

	<span class="entry-date"><?php echo esc_html(get_the_date()); ?></span>

	<span class="meta-right">

		<span class="entry-views"><?php echo boke_1_get_post_views(get_the_ID()); ?></span>
		<span class="entry-comment"><?php comments_popup_link( esc_html__('评论','boke-1'), esc_html__('1 评论', 'boke-1'), esc_html__('% 评论', 'boke-1'), 'comments-link', esc_html__('评论已经关闭', 'boke-1'));?></span>

	</span><!-- .meta-right -->
	
</div><!-- .entry-meta -->