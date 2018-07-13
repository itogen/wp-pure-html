<?php
// サムネイル設定
add_theme_support('post-thumbnails');
add_image_size( 'post-thumbnails-index', 160, 90 );
add_image_size( 'post-thumbnails-single', 320, 180 );

// ウィジェットエリア設定
register_sidebar(array(
    'name' => 'Header',
    'id' => 'header',
    'before_widget' => '<div>',
    'after_widget' => '</div>',
    'before_title' => '<h2>',
    'after_title' => '</h2>'
));
register_sidebar(array(
    'name' => 'Footer',
    'id' => 'footer',
    'before_widget' => '<div>',
    'after_widget' => '</div>',
    'before_title' => '<h2>',
    'after_title' => '</h2>'
));
register_sidebar(array(
    'name' => 'Navigator',
    'id' => 'navigator',
    'before_widget' => '<div>',
    'after_widget' => '</div>',
    'before_title' => '<h2>',
    'after_title' => '</h2>'
));
register_sidebar(array(
    'name' => 'Profile',
    'id' => 'profile',
    'before_widget' => '<div>',
    'after_widget' => '</div>',
    'before_title' => '<h2>',
    'after_title' => '</h2>'
));
register_sidebar(array(
    'name' => 'After Content',
    'id' => 'after-content',
    'before_widget' => '<div>',
    'after_widget' => '</div>',
    'before_title' => '<h2>',
    'after_title' => '</h2>'
));

// 続きを読むでスクロールさせない
function remove_more_link_scroll( $link ) {
	$link = preg_replace( '|#more-[0-9]+|', '', $link );
	return $link;
}
add_filter( 'the_content_more_link', 'remove_more_link_scroll' );

// 自動読み込み抑制
remove_action('wp_head','wp_generator' );
remove_action('wp_head','wlwmanifest_link' );
remove_action('wp_head','adjacent_posts_rel_link_wp_head' );
remove_action('wp_head','rsd_link' );
remove_action('wp_head','wp_shortlink_wp_head' );
remove_action('wp_head','feed_links', 2 );
remove_action('wp_head','feed_links_extra', 3 );

remove_action( 'wp_head',             'print_emoji_detection_script',     7    );
remove_action( 'wp_head','rest_output_link_wp_head');
remove_action( 'wp_head',                'wp_oembed_add_discovery_links'         );
remove_action( 'wp_head',                'wp_oembed_add_host_js'                 );

remove_action( 'wp_print_styles',     'print_emoji_styles'                     );
// remove_action( 'plugins_loaded',             'wp_maybe_load_embeds',                     0    );
// remove_action( 'rest_api_init',          'wp_oembed_register_route'              );
// remove_action( 'embed_head',             'enqueue_embed_scripts',           1    );
// remove_action( 'embed_head',             'print_emoji_detection_script'          );
// remove_action( 'embed_head',             'print_embed_styles'                    );
// remove_action( 'embed_head',             'wp_print_head_scripts',          20    );
// remove_action( 'embed_head',             'wp_print_styles',                20    );
// remove_action( 'embed_head',             'wp_no_robots'                          );
// remove_action( 'embed_head',             'rel_canonical'                         );
// remove_action( 'embed_head',             'locale_stylesheet',              30    );
// remove_action( 'embed_content_meta',     'print_embed_comments_button'           );
// remove_action( 'embed_content_meta',     'print_embed_sharing_button'            );
// remove_action( 'embed_footer',           'print_embed_sharing_dialog'            );
// remove_action( 'embed_footer',           'print_embed_scripts'                   );
// remove_action( 'embed_footer',           'wp_print_footer_scripts',        20    );


// 抜粋設定
function wpdocs_excerpt_more( $more ) {
    return '...';
}
add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );

function my_get_the_excerpt( $post_excerpt, $post ) {
    $more = sprintf( '<a class="more-link" href="%1$s">%2$s</a>',
        get_permalink( $post->ID ),
        '続きを読む'
    );
    return $post_excerpt . $more;
}
add_filter( 'get_the_excerpt', 'my_get_the_excerpt', 10, 2 );