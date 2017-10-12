<?php 
//Khai báo đường dẫn tương đối
define('HQ_URL', get_stylesheet_directory());
define('CORE', HQ_URL . '/core');

//Nhúng file core
require(CORE . "/init.php");

// Nhúng file css - script
function hongquang_style(){
	// CSS
	wp_register_style('css1', get_template_directory_uri() . "/css/normalize.css", 'all' );
	wp_enqueue_style('css1' );
	wp_register_style('css2', get_template_directory_uri() . "/css/bootstrap.min.css", 'all' );
	wp_enqueue_style('css2' );
	wp_register_style('css3', get_template_directory_uri() . "/css/tab-bootstrap.css", 'all' );
	wp_enqueue_style('css3' );
	wp_register_style('css4', get_template_directory_uri() . "/css/animation.css", 'all' );
	wp_enqueue_style('css4' );
	wp_register_style('css5', get_template_directory_uri() . "/css/jquery.mmenu.all.css", 'all' );
	wp_enqueue_style('css5' );
	wp_register_style('css6', get_template_directory_uri() . "/css/navigation.css", 'all' );
	wp_enqueue_style('css6' );
	wp_register_style('css7', get_template_directory_uri() . "/css/font-awesome.min.css", 'all' );
	wp_enqueue_style('css7' );
	wp_register_style('css8', get_template_directory_uri() . "/css/common.css", 'all' );
	wp_enqueue_style('css8' );
	wp_register_style('css9', get_template_directory_uri() . "/css/cart.css", 'all' );
	wp_enqueue_style('css9' );
	wp_register_style('css10', get_template_directory_uri() . "/css/media.css", 'all' );
	wp_enqueue_style('css10' );
	wp_register_style('css', get_template_directory_uri() . "/style.css", 'all' );
	wp_enqueue_style('css' );
	wp_register_style('css11',"https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css", 'all' );
	wp_enqueue_style('css11' );
	wp_register_style('css12',"http://cdn.jsdelivr.net/jquery.slick/1.5.9/slick.css", 'all' );
	wp_enqueue_style('css12' );

}
add_action('wp_enqueue_scripts', 'hongquang_style' );

function alpha_store_theme_js() {
	wp_register_script('js1', get_template_directory_uri() . "/js/jquery.min.js", 'all' );
	wp_enqueue_script('js1' );
	wp_register_script('js2', get_template_directory_uri() . "/js/jquery.touchSwipe.min.js", 'all' );
	wp_enqueue_script('js2' );
	wp_register_script('js3', get_template_directory_uri() . "/js/bootstrap.min.js", 'all' );
	wp_enqueue_script('js3' );
	wp_register_script('js4', get_template_directory_uri() . "/js/jquery.mmenu.all.min.js", 'all' );
	wp_enqueue_script('js4' );
	wp_register_script('js5', get_template_directory_uri() . "/js/jquery.elevateZoom-3.0.8.min.js", 'all' );
	wp_enqueue_script('js5' );
	wp_register_script('js6', get_template_directory_uri() . "/js/common.js", 'all' );
	wp_enqueue_script('js6' );
	wp_register_script('js7', get_template_directory_uri() . "/js/init.js", 'all' );
	wp_enqueue_script('js7' );
}
add_action( 'wp_enqueue_scripts', 'alpha_store_theme_js' );



//Thiết lập chiều rộng
// if(!isset($content_with)){
// 	$content_width=820;
// }

//Khai báo chức năng trong theme
if(!function_exists('hongquang_theme_setup')){
	function hongquang_theme_setup(){
		// Thiết lập textdomain
		$language_folder = HQ_URL . '/languages';
		load_theme_textdomain('hongquang', $language_folder);

		// Logo header
		add_theme_support('custom-logo',array(
			'height'		 => 40,
			'width'			 => 120,
			'flex-height'	 => true,
			'flex-width'	 => true,
			'header-text'	 => array( 'site-title', 'site-description' ),
		));

		// Tự động thêm link RSS lên thẻ head
		add_theme_support('automatic-feed-links' );

		// Thêm post thumbnail 
		add_theme_support('post-thumbnails' );

		
		// thay đổi class
		function helpwp_custom_logo_output( $html ) {
			$html = str_replace('custom-logo-link', 'brand', $html );
			return $html;
		}
		add_filter('get_custom_logo', 'helpwp_custom_logo_output', 10);

		//Thêm title-tag
		add_theme_support('title-tag' );

		// Thêm custom background
		$default_background = array('default-color' => '#e8e8e8');
		add_theme_support('custom-background', $default_background );

		// Thêm menu
		register_nav_menus(array(
			'menu-header'=>__('Menu header','hongquang')
		));
		// custome for header menus
		if (!function_exists('header_menu')) {
			function header_menu(){
				wp_nav_menu( array(
					'theme_location' 	=> 'menu-header', // tên location cần hiển thị
					'container'			=> '', // thẻ container của menu
					'container_class' 	=> '', //class của container
					'menu_class' 		=> '' // class của menu bên trong
				) );
			}
		}

		// Thiết lập menu
		if(!function_exists('hongquang_menu_header')){
			function hongquang_menu_header(){
				wp_nav_menu(array(
					'theme_location'=>'menu-header',
					'items_wrap'=>'<ul id"%1$s top-navigation" class="%2$s nav">%3$s</ul>'
				));
			}
		}
		

		// Thêm widget sidebar
		// widget slide
		$slide = array(
			'name'=>__('Slide', 'hongquang'),
			'id'=>'header-slide',
			'description'=>__('Header slide (1140px - 550px)', 'hongquang'),
			'before_widget' => '<img class="slider--item" src="',
			'after_widget' => '',
			'before_title' => '<h3 class="widget_title">',
			'after_title'  => '</h3>'
		);
		register_sidebar($slide);

		$sidebar_bot_content = array(
			'name'			=>__('Sidebar bottom content', 'hongquang'),
			'id'			=>'bot_content',
			'description'	=>__( 'This is sidebar bottom contnent', 'hongquang' ),
			'before_widget'	=>'',
			'after_widget'	=>'',
		);
		register_sidebar($sidebar_bot_content);

		$sidebar_connect = array(
			'name'			=>__('Sidebar connect', 'hongquang'),
			'id'			=>'footer_connect',
			'description'	=>__( 'This is sidebar connect', 'hongquang' ),
			'before_widget'	=>'<article>',
			'after_widget'	=>'</article>',
			'before_title' 	=> '<h6>',
			'after_title' 	=> '</h6>'
		);
		register_sidebar($sidebar_connect);

		$sidebar_address = array(
			'name'			=>__('Sidebar address', 'hongquang'),
			'id'			=>'footer_address',
			'description'	=>__( 'This is sidebar address', 'hongquang' ),
			'before_widget'	=>'<article>',
			'after_widget'	=>'</article>',
			'before_title' 	=> '<h6>',
			'after_title' 	=> '</h6>'
		);
		register_sidebar($sidebar_address);

		$sidebar_addresscontact = array(
			'name'			=>__('Sidebar address contact page', 'hongquang'),
			'id'			=>'footer_addresscontact',
			'description'	=>__( 'This is sidebar address contact page', 'hongquang' ),
			'before_widget'	=>'<article>',
			'after_widget'	=>'</article>',
			'before_title' 	=> '<h6>',
			'after_title' 	=> '</h6>'
		);
		register_sidebar($sidebar_addresscontact);

		$sidebar_address = array(
			'name'			=>__('View more prt in homepage', 'hongquang'),
			'id'			=>'view_more_link',
			'description'	=>__( 'This is sidebar add link view more in every page', 'hongquang' ),
			'before_widget'	=>'',
			'after_widget'	=>'',
			'before_title' 	=> '',
			'after_title' 	=> ''
		);
		register_sidebar($sidebar_address);

		$sidebar_address = array(
			'name'			=>__('hotline', 'hongquang'),
			'id'			=>'add_the_phone_hotline',
			'description'	=>__( 'This is sidebar add the number phone in hotline top', 'hongquang' ),
			'before_widget'	=>'',
			'after_widget'	=>'',
			'before_title' 	=> '',
			'after_title' 	=> ''
		);
		register_sidebar($sidebar_address);

		$sidebar_formcontact = array(
			'name'			=>__('form contact', 'hongquang'),
			'id'			=>'form_contact',
			'description'	=>__( 'This is sidebar form contact', 'hongquang' ),
			'before_widget'	=>'<article>',
			'after_widget'	=>'</article>',
			'before_title' 	=> '<h6>',
			'after_title' 	=> '</h6>'
		);
		register_sidebar($sidebar_formcontact);


		// Create widget
		





	}
	add_action('init', 'hongquang_theme_setup');
}

/*----- Template function -----*/
/* header */
if (!function_exists('hongquang_header')) {
	function hongquang_header(){?>
		<div class="site-name">
			<?php 
				if (is_home()) {
					printf('<h1><a href="%1$s" title="%2$s">%3$s</a></h1>',
						get_bloginfo('url'),
						get_bloginfo('description' ),
						get_bloginfo('sitename' )
					);
				}else{
					printf('<h2><a href="%1$s" title="%2$s">%3$s</a></h2>',
						get_bloginfo('url'),
						get_bloginfo('description' ),
						get_bloginfo('sitename' )
					);
				}
			?>
		</div>
		<div class="site-description"><?php bloginfo('description' ); ?></div>
		<?php
	}
}



/* Tạo phân trang */
if ( ! function_exists( 'hongquang_phantrang' ) ) {
  function hongquang_phantrang() {
    /*
     * Không hiển thị phân trang nếu trang đó có ít hơn 2 trang
     */
    if ( $GLOBALS['wp_query']->max_num_pages < 1 ) {
      return '';
    }
  ?>
 
  <nav class="pagination" role="navigation">
    <?php if ( get_next_post_link() ) : ?>
      <div class="prev"><?php next_posts_link( __('Older Posts', 'hongquang') ); ?></div>
    <?php endif; ?>
 
    <?php if ( get_previous_post_link() ) : ?>
      <div class="next"><?php previous_posts_link( __('Newer Posts', 'hongquang') ); ?></div>
    <?php endif; ?>
 
  </nav><?php
  }
}
if(!function_exists('hongquang_items_home')){
	function hongquang_items_home(){
	 	if( is_home()) : 
			if(have_posts()) : while(have_posts()) : the_post(); ?>
				<div class="col-lg-3 col-md-3 col-sm-4 col-xs-6 width480">
		                <div class="box-product">
		                    <div class="img-product">
		                        <?php echo get_the_post_thumbnail(get_the_id(), 'medium', array('alt'=>'get_the_title()', 'class'=>'img-responsive')) ?>
		                        <p class="xemchitiet"><a href="<?php the_permalink(); ?>">Xem chi tiết</a></p>
		                    </div>
		                    <div class="info-product">
		                        <div>
		                            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		                            <span><?php hongquang_entry_content(); ?></span>
		                        </div>
		                        <div class="clear"></div>
		                    </div>
		                    <span class="discount-product"></span>
		                </div>
		            </div>
		        <?php endwhile; ?>	        
	                <?php hongquang_phantrang_new(); ?>            
		    <?php else:  ?>
		        <?php get_template_part('content', 'none'); ?>
	        <?php endif; ?>
        <?php elseif(is_category()): 
        	if(have_posts()) : while(have_posts()) : the_post(); ?>
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-6 width480">
		                <div class="box-product">
		                    <div class="img-product">
		                        <?php echo get_the_post_thumbnail(get_the_id(), 'medium', array('alt'=>'get_the_title()', 'class'=>'img-responsive')) ?>
		                        <p class="xemchitiet"><a href="<?php the_permalink(); ?>">Xem chi tiết</a></p>
		                    </div>
		                    <div class="info-product">
		                        <div>
		                            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		                            <span><?php hongquang_entry_content(); ?></span>
		                        </div>
		                        <div class="clear"></div>
		                    </div>
		                    <span class="discount-product"></span>
		                </div>
		            </div>
		        <?php endwhile; ?>	        
	                <?php hongquang_phantrang_new(); ?>            
		    <?php else:  ?>
		        <?php get_template_part('content', 'none'); ?>
	        <?php endif; ?>
	    <?php endif; 
	}
}

// phân trang mới
if(!function_exists('hongquang_phantrang_new')){
	function hongquang_phantrang_new(){
		if(paginate_links()!='') {?>
			<div class="quatrang">
				<div class="navigation">
					<span class="page_item">
						<?php
						global $wp_query;
						$big = 999999999;
						echo paginate_links( array(
							'base'		=> str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
							'format' 	=> '?paged=%#%',
							'prev_text' => '« Quay lại',
							'next_text' => ' Đi tới »',
							'current' 	=> max( 1, get_query_var('paged') ),
							'total' 	=> $wp_query->max_num_pages
							) );
					    ?>
				    </span>
			    </div>
			</div>
		<?php }
	}
}

/* Hiển thị thumbnail */
if (!function_exists('hongquang_thumbnail')) {
	function hongquang_thumbnail($size){
		if(has_post_thumbnail() && !post_password_required() || has_post_format('image')): ?>
		<figure class="post-thumbnail">
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
				<?php the_post_thumbnail($size); ?>
			</a>
		</figure>
	<?php endif; ?>
	<?php }
}

/* hongquang_entry_header = hiển thị tiêu đề post */
if(!function_exists('hongquang_entry_header')){
	function hongquang_entry_header(){ ?>
		<?php if(is_single() || is_category()) : ?>
			<h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h1>
		<?php else : ?>
			<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
		<?php endif; ?>
	<?php }
}

// Show item product
if(!function_exists('hongquang_item_prd')){
	function hongquang_item_prd(){ ?>
		<?php $getposts = new WP_query(); $getposts->query('post_status=publish&showposts=12&post_type=post&cat=236'); ?>
            <?php global $wp_query; $wp_query->in_the_loop = true; ?>
            <?php while ($getposts->have_posts()) : $getposts->the_post(); ?>
				<div class="col-lg-3 col-md-3 col-sm-4 col-xs-6 width480">
	                <div class="box-product">
	                    <div class="img-product">
	                        <?php echo get_the_post_thumbnail(get_the_id(), 'medium', array('alt'=>'get_the_title()', 'class'=>'img-responsive')) ?>
	                        <p class="xemchitiet"><a href="<?php the_permalink(); ?>">Xem chi tiết</a></p>
	                    </div>
	                    <div class="info-product">
	                        <div>
	                            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
	                            <span><?php hongquang_entry_content(); ?></span>
	                        </div>
	                        <div class="clear"></div>
	                    </div>
	                    <span class="discount-product"></span>
	                </div>
	            </div>
            <?php endwhile; wp_reset_postdata(); ?>
	<?php }
}

if(!function_exists('hongquang_items_page_prd')){
	function hongquang_items_page_prd(){ ?>
		<?php $getposts = new WP_query(); $getposts->query('post_status=publish&showposts=12&post_type=post&cat=236'); ?>
            <?php global $wp_query; $wp_query->in_the_loop = true; ?>
            <?php while ($getposts->have_posts()) : $getposts->the_post(); ?>
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-6 width480">
	                <div class="box-product">
	                    <div class="img-product">
	                        <?php echo get_the_post_thumbnail(get_the_id(), 'medium', array('alt'=>'get_the_title()', 'class'=>'img-responsive')) ?>
	                        <p class="xemchitiet"><a href="<?php the_permalink(); ?>">Xem chi tiết</a></p>
	                    </div>
	                    <div class="info-product">
	                        <div>
	                            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
	                            <span><?php hongquang_entry_content(); ?></span>
	                        </div>
	                        <div class="clear"></div>
	                    </div>
	                    <span class="discount-product"></span>
	                </div>
	            </div>
            <?php hongquang_phantrang_new(); ?>
            <?php endwhile; wp_reset_postdata(); ?>

	<?php }
}
   



/* hongquang_entry_meta = lấy dữ liệu post */
if(!function_exists('hongquang_entry_meta')){
	function hongquang_entry_meta(){ ?>
		<?php if(!is_page()) : ?>
			<div class="entry-meta">
				<?php 
					printf(__('<span class="author">Posted by %1$s','hongquang'),get_the_author());
					printf(__('<span class="date-published">at %1$s','hongquang'),get_the_date());
					printf(__('<span class="category">in %1$s', 'hongquang'),get_the_category_list( ', ')  );
					if(comments_open()) : echo '<span class="meta-reply"';
					comments_popup_link(
						__('Leave a comment', 'hongquang'),
						__('One comment', 'hongquang'),
						__('% comments', 'hongquang'),
						__('Read all comments', 'hongquang')
						);
					echo '</span>';
					endif;
				?>
			</div>
		<?php endif; ?>
	<?php }
}

/* hongquang_entry_content = hàm hiển thị nội dung của post/page */
if(!function_exists('hongquang_entry_content')){
	function hongquang_entry_content(){
		if(!is_single() && !is_page() || !is_category()){
			the_excerpt();
		}else{
			the_content();

			/* Phân trang trong single */
			$link_pages = array(
				'before'			=> __('<p>Page:', 'hongquang'),
				'after' 			=> '</p>',
				'nextpagelink' 		=> __('Next Page', 'hongquang'),
				'previouspagelink' 	=> __('Previous Page', 'hongquang')
			);
			wp_link_pages($link_pages );
		}
	}
}
/* Hiển thị readmore ở trang chủ */
function hongquang_readmore(){
	return ' <a class="read-more" href="'.get_permalink(get_the_ID() ). '">'.__('[Read More]', 'hongquang').'</a>';
}
add_filter('excerpt_more', 'hongquang_readmore');

/* hongquang_entry_tag = hiển thị tag bài viết */
if(!function_exists('hongquang_entry_tag')){
	function hongquang_entry_tag(){
		if(has_tag()):
			echo '<div class="entry-tag">';
			printf(__('Tagged in %1$s', 'hongquang'), get_the_tag_list('', ', '));
			echo '</div>';
		endif;
	}
}

// Hiển thị nội dung bài viết
if(!function_exists('hongquang_content')){
	function hongquang_content(){
		if(the_content()):
			printf(__('Tagged in %1$s', 'hongquang'), get_the_content('', ', '));
		endif;
	}
}




// Tạo customizer 




// Tạo widget và plugins //
// Khởi tạo widget
add_action( 'widgets_init', 'create_connect' );
function create_connect() {
        register_widget('Hongquang_connect');
}

 // Create widget
class Hongquang_connect extends WP_Widget{
	// Thông tin widget
	function __construct(){
		parent::__construct(
			'hongquang_connect', // ID Đại diện của widget
			'Connect',			// Tên widget
			array(
				'description' => 'Sort link icons website'
			)
		);
	}

	// Thiết lập trường nhập liệu
	function form($instance){
		$default = array(
			'twitter' 		=> 'Địa chỉ twitter' ,
			'facebook'  	=> 'https://www.fb.com/Quanglh268',
			'youtube' 		=> 'Địa chỉ youtube',
			'instagram' 	=> 'Địa chỉ instagram',
		);
		$instance = wp_parse_args($instance, $default );
		$twitter = esc_attr( $instance['twitter'] );
		$facebook = esc_attr( $instance['facebook'] );
		$youtube = esc_attr( $instance['youtube'] );
		$instagram = esc_attr( $instance['instagram'] );


		echo ('Liên kết twitter: <input type="text" class="widefat" name="'.$this->get_field_name('twitter').'"value="'.$twitter.'" />');
		echo ('Liên kết facebook: <input type="text" class="widefat" name="'.$this->get_field_name('facebook').'"value="'.$facebook.'" />');
		echo ('Liên kết youtube: <input type="text" class="widefat" name="'.$this->get_field_name('youtube').'"value="'.$youtube.'" />');
		echo ('Liên kết instagram: <input type="text" class="widefat" name="'.$this->get_field_name('instagram').'"value="'.$instagram.'" />');		
	}

	// lưu dữ liệu từ form
	function update($new_instance, $old_instance){
		$instance = $old_instance;
		$instance['twitter'] 	= $new_instance['twitter'];
		$instance['facebook'] 	= $new_instance['facebook'];
		$instance['youtube'] 	= $new_instance['youtube'];
		$instance['instagram'] 	= $new_instance['instagram'];
		return $instance;
	}

	// Hiển thị widget ra bên ngoài
	function widget($args, $instance){
		extract($args);
		echo '<a href="'.$instance['twitter'].'" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>';
		echo '<a href="'.$instance['facebook'].'" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>';
		echo '<a href="'.$instance['youtube'].'" target="_blank"><i class="fa fa-youtube" aria-hidden="true"></i></a>';
		echo '<a href="'.$instance['instagram'].'" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>';
		
	}
}

// Khởi tạo widget addlink button view more
add_action( 'widgets_init', 'create_buttonviewmore' );
function create_buttonviewmore() {
        register_widget('Hongquang_viewmore');
}

 // Create widget
class Hongquang_viewmore extends WP_Widget{
	// Thông tin widget
	function __construct(){
		parent::__construct(
			'hongquang_viewmore', // ID Đại diện của widget
			'Add links button',			// Tên widget
			array(
				'description' => 'add link view more link'
			)
		);
	}

	// Thiết lập trường nhập liệu
	function form($instance){
		$default = array(
			'link' 		=> 'Địa chỉ liên kết' ,
		);
		$instance = wp_parse_args($instance, $default );
		$link = esc_attr( $instance['link'] );

		echo ('Liên kết: <input type="text" class="widefat" name="'.$this->get_field_name('link').'"value="'.$link.'" />');
	}

	// lưu dữ liệu từ form
	function update($new_instance, $old_instance){
		$instance = $old_instance;
		$instance['link'] 	= $new_instance['link'];
		return $instance;
	}

	// Hiển thị widget ra bên ngoài
	function widget($args, $instance){
		extract($args);
		echo $instance['link'];
		
	}
}




// Chèn 5 sao vào bài viết
function woo_star_hk(){ ?>
	<p class="ster"> Đánh giá chất lượng: 
		<span><i class="fa fa-star"></i></span>
		<span><i class="fa fa-star"></i></span>
		<span><i class="fa fa-star"></i></span>
		<span><i class="fa fa-star"></i></span>
		<span><i class="fa fa-star"></i></span>
	</p>
<?php }
add_action('woocommerce_single_product_summary', 'woo_star_hk', 7);

// Chèn like share facbook - google
function woo_share_and_ontact_hk(){ ?>
	<div class="sosial_pro_detail">
		<div class="fb-like" data-href="<?php the_permalink(); ?>" data-layout="button_count" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
        <div class="right_xh">
            <script >
              window.___gcfg = {
                lang: 'vi',
                parsetags: 'onload'
              };
            </script>
             <script src="https://apis.google.com/js/platform.js" async defer></script>
            <g:plus action="share" Annotation="bubble" size="medium"></g:plus>
        </div>
        <div class="printer">
            <a target="_blank" href=""><img src="<?php echo get_template_directory_uri(); ?>/images/printer.png" alt="<?php the_title(); ?>" /></a>
        </div>
    </div><!--./sosial_logo-->
    <div id="fb-root"></div>
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.9";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>
<?php }
add_action('woocommerce_single_product_summary', 'woo_share_and_ontact_hk', 60);



// Danh mục sản phẩm
if(!function_exists('hongquang_danhmuc')){
	function hongquang_danhmuc(){
	    $args = array(
	        'child_of'  => 0,
	        '<strong>orderby</strong>'    => 'íd',
	    );
	    $categories = get_categories( $args ); ?>
			<div class="box-right marginb15">
	            <h2 class="title-right"><span class="cl-red">Danh mục</span></h2>
	    <?php foreach ( $categories as $category ) { ?>
		    
		        <div class="left_one">
		            <h5>
		                <a href="<?php echo get_term_link($category->slug, 'category');?>">
		                    <?php echo $category->name ; ?>
		                    (<?php echo $category->count;  ?>)
		                </a>
		            </h5>
	        	</div> 
	    <?php } ?>
			</div>
	    <?php
	}
}

// Danh mục sản phẩm 404 page
if(!function_exists('hongquang_danhmuc_404')){
	function hongquang_danhmuc_404(){
	    $args = array(
	        'child_of'  => 0,
	        '<strong>orderby</strong>'    => 'íd',
	    );
	    $categories = get_categories( $args ); ?>
			<ul class="list-unstyled">
            	<li>Dưới đây là một số liên kết hữu ích thay thế:</li>
	    <?php foreach ( $categories as $category ) { ?>		    
		        	<li>
		                <a href="<?php echo get_term_link($category->slug, 'category');?>">
		                    <?php echo $category->name ; ?>
		                    (<?php echo $category->count;  ?>)
		                </a>
		           	</li>
	    <?php } ?>
			</ul>
	    <?php
	}
}



// Register script upload images
add_action('admin_enqueue_scripts', 'estore_admin_scripts');

function estore_admin_scripts( $hook ) {
	global $post_type;

	if( $hook == 'widgets.php' || $hook == 'customize.php' ) {
		// Image Uploader
		wp_enqueue_media();
		wp_enqueue_script( 'estore-script', get_template_directory_uri() . '/js/image-uploader.js', false, '1.0', true );
	}	
}

// Create sidebar upload images
register_widget( "hongquang_728x90_ad" );

// 728 X 90 Advertisement Widget
class hongquang_728x90_ad extends WP_Widget {
	function __construct() {
		$widget_ops = array(
			'classname'   => 'widget_image_with_link',
			'description' => esc_html__( 'Add your Advertisement here', 'hongquang')
		);
		$control_ops = array(
			'width'  => 200,
			'height' => 250
		);
		parent::__construct( false,$name= esc_html__( 'TG: Advertisement', 'hongquang' ),$widget_ops);
	}

	function form( $instance ) {
		$instance                = wp_parse_args( (array) $instance, array( 'title' => '', '728x90_image_url' => '', '728x90_image_link' => '') );
		$title                   = esc_attr( $instance[ 'title' ] );

		$image_link              = '728x90_image_link';
		$image_url               = '728x90_image_url';

		$instance[ $image_link ] = esc_url( $instance[ $image_link ] );
		$instance[ $image_url ]  = esc_url( $instance[ $image_url ] );

	?>

	<p>
		<label for="<?php echo $this->get_field_id('title'); ?>"><?php esc_html_e( 'Title:', 'hongquang' ); ?></label>
		<input id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
	</p>
	<label><?php esc_html_e( 'Add your Advertisement Images Here. Any size supported.', 'hongquang' ); ?></label>
	<p>
		<label for="<?php echo $this->get_field_id( $image_link ); ?>"> <?php esc_html_e( 'Advertisement Image Link ', 'hongquang' ); ?></label>
		<input type="text" class="widefat" id="<?php echo $this->get_field_id( $image_link ); ?>" name="<?php echo $this->get_field_name( $image_link ); ?>" value="<?php echo $instance[$image_link]; ?>"/>
	</p>
	<p>
		<label for="<?php echo $this->get_field_id( $image_url ); ?>"> <?php esc_html_e( 'Advertisement Image ', 'hongquang' ); ?></label>
		<div class="media-uploader" id="<?php echo $this->get_field_id( $image_url ); ?>">
			<div class="custom_media_preview">
				<?php if ( $instance[ $image_url ] != '' ) : ?>
					<img class="custom_media_preview_default" src="<?php echo esc_url( $instance[ $image_url ] ); ?>" style="max-width:100%;" />
				<?php endif; ?>
			</div>
			<input type="text" class="widefat custom_media_input" id="<?php echo $this->get_field_id( $image_url ); ?>" name="<?php echo $this->get_field_name( $image_url ); ?>" value="<?php echo esc_url( $instance[$image_url] ); ?>" style="margin-top:5px;" />
			<button class="custom_media_upload button button-secondary button-large" id="<?php echo $this->get_field_id( $image_url ); ?>" data-choose="<?php esc_attr_e( 'Choose an image', 'hongquang' ); ?>" data-update="<?php esc_attr_e( 'Use image', 'hongquang' ); ?>" style="width:100%;margin-top:6px;margin-right:30px;"><?php esc_html_e( 'Select an Image', 'hongquang' ); ?></button>
		</div>
	</p>

	<?php }
	function update( $new_instance, $old_instance ) {
		$instance                = $old_instance;
		$instance[ 'title' ]     = sanitize_text_field( $new_instance[ 'title' ] );

		$image_link              = '728x90_image_link';
		$image_url               = '728x90_image_url';

		$instance[ $image_link ] = esc_url_raw( $new_instance[ $image_link ] );
		$instance[ $image_url ]  = esc_url_raw( $new_instance[ $image_url ] );

		return $instance;
	}

	function widget( $args, $instance ) {
		extract( $args );
		extract( $instance );

		$title      = apply_filters( 'widget_title', isset( $instance[ 'title' ] ) ? $instance[ 'title' ] : '' );

		$image_link = '728x90_image_link';
		$image_url  = '728x90_image_url';

		$image_link   = isset( $instance[ $image_link ] ) ? $instance[ $image_link ] : '';
		$image_url    = isset( $instance[ $image_url ] ) ? $instance[ $image_url ] : '';


		// For Multilingual compatibility
		if ( function_exists( 'icl_register_string' ) ) {
			icl_register_string( 'hongquang', 'TG: Advertisement Image' . $this->id, $image_url );
			icl_register_string( 'hongquang', 'TG: Advertisement Image Link' . $this->id, $image_link );
		}
		if ( function_exists( 'icl_t' ) ) {
			$image_url  = icl_t( 'hongquang', 'TG: Advertisement Image'. $this->id, $image_url );
			$image_link = icl_t( 'hongquang', 'TG: Advertisement Image Link'. $this->id, $image_link );
		}

		echo $before_widget; ?>

		<div class="image_with_link">
			<?php if ( !empty( $title ) ) { ?>
			<div class="image_with_link-title">
				<?php echo $before_title. esc_html( $title ) . $after_title; ?>
			</div>
			<?php }
			$output = '';
			if ( !empty( $image_url ) ) {
				$output .= '<div class="image_with_link-content">';
				if ( !empty( $image_link ) ) {
				$output .= '<a href="'.esc_url($image_link).'" class="single_image_with_link" target="_blank" rel="nofollow">
								<img src="'.esc_url($image_url).'" />
							</a>';
				} else {
					$output .= '<img src="'.esc_url($image_url).'" />';
				}
				$output .= '</div>';
				echo $output;
			} ?>
		</div>
		<?php
		echo $after_widget;
	}
}