<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package boke-1
 */

/**
 * Get Post Views.
 */
if ( ! function_exists( 'boke_1_get_post_views' ) ) :

function boke_1_get_post_views($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return '<span class="view-count">0</span> 浏览';
    }
    return '<span class="view-count">' . number_format($count) . '</span> ' . __('浏览', 'boke-1');
}

endif;

/**
 * Set Post Views.
 */
if ( ! function_exists( 'boke_1_set_post_views' ) ) :

function boke_1_set_post_views($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}

endif;

/**
 * Filter the except length to 100 characters.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
if ( ! function_exists( 'boke_1_custom_excerpt_length' ) ) :

function boke_1_custom_excerpt_length( $length ) {
    return '80';
}
add_filter( 'excerpt_length', 'boke_1_custom_excerpt_length', 999 );

endif;

/**
 * Customize excerpt more.
 */
if ( ! function_exists( 'boke_1_excerpt_more' ) ) :

function boke_1_excerpt_more( $more ) {
   return '&hellip;';
}
add_filter( 'excerpt_more', 'boke_1_excerpt_more' );

endif;

/**
 * Display the first (single) category of post.
 */
if ( ! function_exists( 'boke_1_first_category' ) ) :
function boke_1_first_category() {
    $category = get_the_category();
    if ($category) {
      echo '<a href="' . esc_url( get_category_link( absint($category[0]->term_id) ) ) . ' " >' . esc_html($category[0]->name).'</a> ';
    }   
}
endif;

/**
 * Search Filter 
 */
if ( ! function_exists( 'boke_1_search_filter' ) && ( ! is_admin() ) ) :

function boke_1_search_filter($query) {
    if ($query->is_search) {
        $query->set('post_type', 'post');
    }
    return $query;
}

add_filter('pre_get_posts','boke_1_search_filter');

endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
if ( ! function_exists( 'boke_1_categorized_blog' ) ) :

function boke_1_categorized_blog() {
    if ( false === ( $all_the_cool_cats = get_transient( 'boke_1_categories' ) ) ) {
        // Create an array of all the categories that are attached to posts.
        $all_the_cool_cats = get_categories( array(
            'fields'     => 'ids',
            'hide_empty' => 1,
            // We only need to know if there is more than one category.
            'number'     => 2,
        ) );

        // Count the number of categories that are attached to the posts.
        $all_the_cool_cats = count( $all_the_cool_cats );

        set_transient( 'boke_1_categories', $all_the_cool_cats );
    }

    if ( $all_the_cool_cats > 1 ) {
        // This blog has more than 1 category so boke_1_categorized_blog should return true.
        return true;
    } else {
        // This blog has only 1 category so boke_1_categorized_blog should return false.
        return false;
    }
}

endif;

/**
 * Flush out the transients used in boke_1_categorized_blog.
 */
if ( ! function_exists( 'boke_1_category_transient_flusher' ) ) :

function boke_1_category_transient_flusher() {
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }
    // Like, beat it. Dig?
    delete_transient( 'boke_1_categories' );
}
add_action( 'edit_category', 'boke_1_category_transient_flusher' );
add_action( 'save_post',     'boke_1_category_transient_flusher' );

endif;
