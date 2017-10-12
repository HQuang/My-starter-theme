<?php get_header(); ?>
	

<section class="content">
    <!--page-->
    <div class="container">
        <div class="block-news">
            <ul class="breadcrumb-page">
                <li><a href="">Search</a> » </li>
                <li class="active"><a href="javascript:;">
                    <?php  
						$search_query = new WP_Query('s='.$s.'&showposts=-1');
						$search_keyword = _wp_specialchars($s, 1);
						$search_count = $search_query->post_count;
						printf( '%1$s', $search_keyword, $search_count );
					?>
                </a></li>
            </ul>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 margintb10">
                	<div class="row">
                		<?php  
                		if(have_posts()) :
							$search_query = new WP_Query('s='.$s.'&showposts=-1');
							$search_keyword = _wp_specialchars($s, 1);
							$search_count = $search_query->post_count;
							printf( '<p class="tdsearch">Chúng tôi tìm thấy <strong>%2$s</strong> sản phẩm từ truy vấn tìm kiếm <strong>%1$s</strong> của bạn.</p>', $search_keyword, $search_count );
						?>
                	</div>
                    <div class="row">
                        <?php  while(have_posts()) : the_post() ?>
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
					    <?php endwhile; else: ?>
					        <?php printf( '<p class="tdsearch">Chúng tôi không tìm thấy sản phẩm <strong>%1$s</strong> trong cửa hàng.</p>', $search_keyword, $search_count ); ?>
					    <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div><!--./block-news-->    <!--/end page-->
</section><!--./content-->
<?php get_footer(); ?>