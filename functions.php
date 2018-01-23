<?php
function template_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
}
add_action( 'after_setup_theme', 'template_setup' );

function custom_document_title_parts( $title ) {
	if(is_singular('post')):
		$title['title'] = '採用情報【'.$title['title'].'】';
	endif;
	return $title;
}
add_filter( 'document_title_parts', 'custom_document_title_parts' );

function custom_document_title_separator( $sep ) {
	return '|';
}
add_filter( 'document_title_separator', 'custom_document_title_separator' );

function template_scripts() {
	// Theme stylesheet.
	wp_enqueue_style( 'template-style', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'template_scripts' );


// wp_head wp_footer remove
remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'feed_links', 2 );
remove_action( 'wp_head', 'feed_links_extra', 3 );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
remove_action( 'wp_head', 'wp_generator' );
remove_action( 'wp_head', 'rel_canonical' );
remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 );
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action('wp_head','rest_output_link_wp_head');
remove_action('wp_head','wp_oembed_add_discovery_links');
remove_action('wp_head','wp_oembed_add_host_js');
remove_action( 'wp_print_styles', 'print_emoji_styles', 10 );
remove_action( 'publish_future_post', 'heck_and_publish_future_post', 10, 1 );
remove_action( 'template_redirect', 'wp_shortlink_header', 11, 0 );
remove_action( 'init', 'check_theme_switched', 99 );
remove_action( 'after_switch_theme', '_wp_sidebars_changed' );
/*
remove_action('wp_head', '_wp_render_title_tag', 1);
remove_action( 'wp_head', 'wp_enqueue_scripts', 1 );
remove_action( 'wp_head', 'locale_stylesheet' );
remove_action( 'wp_head', 'noindex', 1 );
remove_action( 'wp_head', 'wp_print_styles', 8 );
remove_action( 'wp_head', 'wp_print_head_scripts', 9 );
remove_action( 'wp_footer', 'wp_print_footer_scripts', 20 );
remove_action( 'wp_print_footer_scripts', '_wp_footer_scripts' );
*/


/*
DNSプリフェッチの削除
*/
function remove_dns_prefetch( $hints, $relation_type ) {
	if ( 'dns-prefetch' === $relation_type ) {
		return array_diff( wp_dependencies_unique_hosts(), $hints );
	}
	return $hints;
}
add_filter( 'wp_resource_hints', 'remove_dns_prefetch', 10, 2 );


/*
画像srcsetの削除
*/
add_filter( 'wp_calculate_image_srcset_meta', '__return_null' );


/*
jqueryバージョン変更
*/
function include_jquery_cdn_loader() {
	if( !is_admin() ){
		//WP Default jQuery Load Deregister.
		wp_deregister_script('jquery');

		//jQuery CDN
		$jsCore = get_template_directory_uri() . '/js/jquery-3.2.1.min.js';

		wp_register_script( 'jquery', $jsCore, array(), null, false );
		wp_enqueue_script( 'jquery' );
	}
}
add_action('wp_enqueue_scripts', 'include_jquery_cdn_loader');



/*
*
*
*
*
*フォームの応募職種をセット
*
*
*
*
*/
function add_jobs( $children, $atts ) {
	if ( $atts['name'] == '応募職種' ) {
		$jobs = get_posts( array(
			'posts_per_page' => -1
		) );
		foreach ( $jobs as $job ) {
			$children[$job->post_title] = $job->post_title;
		}
	}
	return $children;
}
function my_mwform_after_exec_shortcode( $form_key ) {
	add_filter( 'mwform_choices_'.$form_key, 'add_jobs', 10, 2 );
}
add_action( 'mwform_after_exec_shortcode', 'my_mwform_after_exec_shortcode' );



/*
*
*
*
*
*投稿用ショートコード
*
*
*
*
*/
// サイトurl
function site_home_url() {
	return home_url('/');
}
add_shortcode( 'home_url', 'site_home_url' );

// テーマurl
function site_template_url() {
	return get_template_directory_uri();
}
add_shortcode( 'template_url', 'site_template_url' );

// リンク取得
function permalink_handler( $atts ) {
	extract( shortcode_atts( array( 'id' => ''), $atts ) );
	$link = get_permalink($id);
	return $link;
}
add_shortcode('permalink', 'permalink_handler');

/*
*
*
*
*
*管理画面カスタム
*
*
*
*
*/
// 固定ページ・MW WP Formビジュアルエディタ削除
function disable_visual_editor_in_page(){
	global $typenow;
	if( $typenow == 'mw-wp-form' || $typenow == 'page' ){
		add_filter('user_can_richedit', 'disable_visual_editor_filter');
	}
}
function disable_visual_editor_filter(){
	return false;
}
add_action( 'load-post.php', 'disable_visual_editor_in_page' );
add_action( 'load-post-new.php', 'disable_visual_editor_in_page' );

// 固定ページ自動整形無効
function disable_page_wpautop() {
	if ( is_page() ) remove_filter( 'the_content', 'wpautop' ); remove_filter('the_content', 'wptexturize'); remove_filter('the_content', 'convert_chars');
}
add_action( 'wp', 'disable_page_wpautop' );


// デフォルト投稿タイプ設定
function change_post_menu_label() {
	global $menu;
	global $submenu;
	$menu[5][0] = '採用情報';
	$submenu['edit.php'][5][0] = '採用情報一覧';
}
function change_post_object_label() {
	global $wp_post_types;
	$labels = &$wp_post_types['post']->labels;
	$labels->name = '採用情報';
	$labels->singular_name = '採用情報';
	$labels->add_new = _x('新規追加', '採用情報');
	$labels->add_new_item = '採用情報の新規追加';
	$labels->edit_item = '採用情報の編集';
	$labels->new_item = '新規採用情報';
	$labels->view_item = '採用情報を表示';
	$labels->search_items = '採用情報を検索';
}
add_action( 'init', 'change_post_object_label' );
add_action( 'admin_menu', 'change_post_menu_label' );
function remove_post_supports() {
	remove_post_type_support( 'post', 'author' );
	remove_post_type_support( 'post', 'excerpt' );
	remove_post_type_support( 'post', 'trackbacks' );
	remove_post_type_support( 'post', 'custom-fields' );
	remove_post_type_support( 'post', 'comments' );
	remove_post_type_support( 'post', 'revisions' );
	unregister_taxonomy_for_object_type( 'category', 'post' );
	unregister_taxonomy_for_object_type( 'post_tag', 'post' );
}
add_action( 'init', 'remove_post_supports' );


// カスタム投稿タイプ設定
add_action( 'init', 'custum_post_type' );
function custum_post_type() {
	register_post_type( 'recruit_common_post',
		array('labels' => array('name' => __( '会社概要' ), 'singular_name' => __( '会社概要' ), 'menu_name' => __( '会社概要' ), 'edit_item' => __( '会社概要を編集' )),
			'public' => true,
			'menu_position' => 5,
			'supports' => array('title')
		)
	);
}
