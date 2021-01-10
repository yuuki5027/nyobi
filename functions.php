<?php 
// アイキャッチ画像を表示させる。
add_theme_support( 'post-thumbnails' );
// 長さを変える関数
function custom_excerpt_length( $length ) {
  return 30;	//表示したい文字数
}	
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
// 抜粋の最後の・・・
function new_excerpt_more($post) {
  return ' <a href="'. esc_url( get_permalink() ) . '">' . '…もっと読む' . '</a>';    
}    
add_filter('excerpt_more', 'new_excerpt_more');
// 個別ページのページャー
$args = array(
  'before' => '<div class="pager">',
  'after' => '</div>',
  'link_before' => '<span>',
  'link_after' => '</span>',
);
wp_link_pages($args);
// jQuaryの読み込み
function my_scripts() {
  wp_enqueue_script( 'jquery' );
  wp_enqueue_script( 'javascript',get_template_directory_uri().'/js/sample.js',array('jquery'));

}
add_action( 'wp_enqueue_scripts', 'my_scripts' );
// カスタム投稿タイプの表示件数を変更
function change_posts_per_page($query) {
	/* 管理画面,メインクエリに干渉しないために必須 */
	if( is_admin() || ! $query->is_main_query() ){  return; }
	
	/* カテゴリーページの表示件数を5件にする */
	if ( $query->is_post_type_archive('member') ) { $query->set( 'posts_per_page', '5' );  return;  } 
} add_action( 'pre_get_posts', 'change_posts_per_page' );
?>