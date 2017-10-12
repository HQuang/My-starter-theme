<?php get_header(); ?>
<section class="content">
    <!--page-->
    <div class="container">
        <div class="block-news">
            <ul class="breadcrumb-page">
                <li><a href="<?php echo get_template_directory_uri(); ?>../../../../">Trang chủ</a> »</li>
                <li class="active"><a href=""><?php the_title(); ?></a></li>
            </ul>
            <div class="row">
                <h3 style="height: 1px;overflow: hidden;margin:0px;padding:0px;">Giày Bóng rổ Đà Nẵng</h3>
                <h4 style="height: 1px;overflow: hidden;margin:0px;padding:0px;">Giày</h4>
                <div class="col-md-8 col-sm-12">
                    <div class="row">
                        <div class="col-xs-12">
                            <?php the_post_thumbnail($size); ?>
                        </div>
                    </div>        
                </div>
                <div class="col-md-4 col-sm-12">
                    <h1 class="name_pro_detail"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
                    <div class="note_pr_detail">
                        <div style="box-sizing: border-box; color: rgb(51, 51, 51); font-family: RobotoL, Arial, sans-serif; font-size: 14px;">
                            <small><?php the_time('F jS, Y') ?> <!-- by <?php the_author() ?> --></small>
                            <p class="postmetadata">
                                <?php the_tags('Tags: ', ', ', '<br />'); ?> 
                                Posted in <?php the_category(', ') ?> 
                            </p> 
                            <p>
                                <?php edit_post_link('Chỉnh sửa bài đăng', '', '  '); ?>  
                                <?php //comments_popup_link('No Comments »', '1 Comment »', '% Comments »'); ?>
                            </p> 
                            <?php woo_star_hk(); ?>
                            <?php woo_share_and_ontact_hk(); ?>
                        </div>                    
                    </div>
                    <div>                              
                        <div class="order_pro_detail">
                            <a class="botton" rel="92" href="#">liên hệ đặt hàng</a>
                        </div><!--./order_pro_detail-->
                        <div class="slogan_pro_detail">
                            <p>GIAO HÀNG NHANH TRONG VÒNG 12-24h</p>
                            <p>MIỄN PHÍ GIAO HÀNG NỘI THÀNH</p>
                        </div><!--./slogan_pro_detail-->
                    </div>
                </div>
            </div>
            <div class="clear"></div>
            <div>
                <div class="row">
                    <div class="cold-lg6 col-md-9 col-sm-12 col-xs-12 width480 content-products">
                        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                            <p class="ttsp">Thông tin sản phẩm</p>                
                            <?php the_content(); ?>                                       
                        <?php endwhile; endif; ?>
                    </div>
                    <div class="cold-lg6 col-md-3 col-sm-12 col-xs-12 width480 content-danhmuc">
                        <div class="row">
                           <?php hongquang_danhmuc(); ?>
                        </div>
                    </div>
                    <div class="cold-lg6 col-md-3 col-sm-12 col-xs-12 width480 content-splq">
                        <div class="row">
                            <p class="splq">Sản phẩm liên quan</p>
                            <?php
                                $tags = wp_get_post_tags($post->ID);
                                if ($tags) 
                                {
                                    $tag_ids = array();
                                    foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
                                // lấy danh sách các tag liên quan
                                    $args=array(
                                    'tag__in' => $tag_ids,
                                    'post__not_in' => array($post->ID), // Loại trừ bài viết hiện tại
                                    'showposts'=>5, // Số bài viết bạn muốn hiển thị.
                                    'caller_get_posts'=>1
                                    );
                                    $my_query = new wp_query($args);
                                    if( $my_query->have_posts() ) 
                                    {                                        
                                        while ($my_query->have_posts()) 
                                        {
                                            $my_query->the_post();
                                            ?>
                                            <div class="col-lg-12 col-md-4 col-sm-4 col-xs-6 width480">
                                                <div class="box-product">
                                                    <div class="img-product">
                                                        <?php echo get_the_post_thumbnail(get_the_id(), 'medium', array('alt'=>'get_the_title()', 'class'=>'img-responsive')) ?>
                                                        <p class="xemchitiet"><a href="<?php the_permalink(); ?>">Xem chi tiết</a></p>
                                                    </div>
                                                    <div class="info-product">
                                                        <div>
                                                            <h2><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></a></h2>
                                                            <span><?php hongquang_entry_content(); ?></span>
                                                        </div>
                                                        <div class="clear"></div>
                                                    </div>
                                                    <span class="discount-product"></span>
                                                </div>
                                            </div>
                                            <?php
                                        }                                        
                                    }
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="spnb">
                <h5 class="nam_other_pro">Sản phẩm mới nhất</h5>
                <div class="row">
                    <?php hongquang_item_prd(); ?>
                    
                </div>
                <p class="seemore-product"><a href="<?php get_sidebar('link' ); ?>">Xem thêm sản phẩm</a></p>
            </div>
        </div>
    </div><!--./block-news-->    <!--/end page-->
</section><!--./content-->
    

<?php get_footer(); ?>