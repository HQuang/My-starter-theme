<?php 
define('THEME_URL', get_stylesheet_directory());
define('CORE', THEME_URL . '/core');
// Load file init.php, đây là file cấu hình của theme và ko được thay đổi.
require_once( CORE . '/init.php');

// Thiết lập $content_width để khai báo kích thước chiều rộng của nội dung.
if ( ! isset( $content_width ) ) {
	$content_width = 620;
}

// Settup function theme support
if(!function_exists('hongquang_theme_settup')){
	function hongquang_theme_settup(){
		// Settup textdomain
		$language_folder=THEME_URL.'/language';
		load_theme_textdomain( 'hongquang', $language_folder );

		// Auto add RSS link on head
		add_theme_support( 'automatic-feed-links' );

		// Add post thumbnail
		add_theme_support( 'post-thumbnails' );

		// Post format
		add_theme_support('post-formats',
			array(
				'image',
				'video',
				'gallery',
			)
		);

		// Add custom logo
		add_theme_support('custom-logo',
			array(
				'height'		=>200,
				'width'			=>200,
				'flex-height'	=>true,
				'flex-width'	=>true,
			)
		);
		
		// Add title-tag
		add_theme_support( 'title-tag' );

		// Custom background
		$default_background = array('default-color' => '#f5f5f5');
		add_theme_support( 'custom-background', $default_background );

		// SETTUP MENU
		// Create menus
		register_nav_menus( array(
			'top-menu'	=> __('Top menu', 'hongquang'),
			'left-menu'	=> __('Left menu', 'hongquang'),
			'right-menu'	=> __('Right menu', 'hongquang'),
			'bottomm-menu'	=> __('Bottom menu', 'hongquang'),
		) );

		// Settup menus on more css
		if(!function_exists('top_menu')){
			function top_menu(){
				wp_nav_menu( array(
					'theme_location'  => 'top-menu', // tên location cần hiển thị
					'container'       => 'nav', // thẻ tag ngoài cùng của menu
					'container_class' => 'menu-{menu-slug}-container', // class của tag
					'container_id'    => '', //id của tag
					'menu_class'      => 'menu', // class của menu bên trong
					'menu_id'         => '', // id của menu bên trong
					'echo'            => true,
					'items_wrap'      => '<ul id = "%1$s" class = "%2$s">%3$s</ul>',
					
				) );
			}
		}
		if(!function_exists('left_menu')){
			function left_menu(){
				wp_nav_menu( array(
					'theme_location'  => 'left-menu', // tên location cần hiển thị
					'container'       => 'nav', // thẻ tag ngoài cùng của menu
					'container_class' => 'menu-{menu-slug}-container', // class của tag
					'container_id'    => '', //id của tag
					'menu_class'      => 'menu', // class của menu bên trong
					'menu_id'         => '', // id của menu bên trong
					'echo'            => true,
					'items_wrap'      => '<ul id = "%1$s" class = "%2$s">%3$s</ul>',
					
				) );
			}
		}
		if(!function_exists('right_menu')){
			function right_menu(){
				wp_nav_menu( array(
					'theme_location'  => 'right-menu', // tên location cần hiển thị
					'container'       => 'nav', // thẻ tag ngoài cùng của menu
					'container_class' => 'menu-{menu-slug}-container', // class của tag
					'container_id'    => '', //id của tag
					'menu_class'      => 'menu', // class của menu bên trong
					'menu_id'         => '', // id của menu bên trong
					'echo'            => true,
					'items_wrap'      => '<ul id = "%1$s" class = "%2$s">%3$s</ul>',
					
				) );
			}
		}
		if(!function_exists('left_menu')){
			function left_menu(){
				wp_nav_menu( array(
					'theme_location'  => 'right-menu', // tên location cần hiển thị
					'container'       => 'nav', // thẻ tag ngoài cùng của menu
					'container_class' => 'menu-{menu-slug}-container', // class của tag
					'container_id'    => '', //id của tag
					'menu_class'      => 'menu', // class của menu bên trong
					'menu_id'         => '', // id của menu bên trong
					'echo'            => true,
					'items_wrap'      => '<ul id = "%1$s" class = "%2$s">%3$s</ul>',
					
				) );
			}
		}

		// Create sodebar
		$sidebar_content_top = array(
			'name'			=> __('Content top', 'hongquang'),
			'id'			=> 'content-top',
			'description'	=> __('Sidebar in content top'),
			'class'			=> 'content-top',
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title' 	=> '<h3 class="widgettitle">',
			'after_title' 	=> '</h3>'
		);
		register_sidebar($sidebar_content_top);

		$sidebar_content_left = array(
			'name'			=> __('Content left', 'hongquang'),
			'id'			=> 'content-left',
			'description'	=> __('Sidebar in content left'),
			'class'			=> 'content-left',
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title' 	=> '<h3 class="widgettitle">',
			'after_title' 	=> '</h3>'
		);
		register_sidebar($sidebar_content_left);

		$sidebar_content_right = array(
			'name'			=> __('Content right', 'hongquang'),
			'id'			=> 'content-right',
			'description'	=> __('Sidebar in content right'),
			'class'			=> 'content-right',
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title' 	=> '<h3 class="widgettitle">',
			'after_title' 	=> '</h3>'
		);
		register_sidebar($sidebar_content_right);

		$sidebar_content_bottom = array(
			'name'			=> __('Content bottom', 'hongquang'),
			'id'			=> 'content-bottom',
			'description'	=> __('Sidebar in content bottom'),
			'class'			=> 'content-bottom',
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title' 	=> '<h3 class="widgettitle">',
			'after_title' 	=> '</h3>'
		);
		register_sidebar($sidebar_content_bottom);
	}
	add_action('init', 'hongquang_theme_settup');
}

// FUNCTION THEME
// HEADER









?>