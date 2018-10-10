<form id="searchform" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<input type="search" name="s" class="search-input" placeholder="<?php esc_html_e('请输入关键字&hellip;', 'boke-1'); ?>" autocomplete="off">
	<button type="submit" class="search-submit"><?php esc_html_e('搜索', 'boke-1'); ?></button>		
</form>