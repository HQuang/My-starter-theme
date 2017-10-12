<?php get_header(); ?>
<section class="content">
    <!--page-->
    <div class="container">
        <div class="block-news">
            <ul class="breadcrumb-page">
                <li><a href="<?php echo get_template_directory_uri(); ?>../../../../">Home</a> » </li>
                <li class="active"><a href="javascript:;">
                    <?php 
                        if(is_tag()): 
                            printf( __(' %1$s', 'hongquang'), single_tag_title('',false ));
                        elseif(is_category()):
                            printf( __( ' %1$s', 'hongquang' ), single_cat_title('', false ));
                        endif;
                    ?>
                </a></li>
            </ul>
            <div class="row">
                <div class="col-lg-9 col-md-9 col-sm-12 margintb10">
                    <div class="row">
                        <?php hongquang_items_home(); ?>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12 margintb10">
                    <?php hongquang_danhmuc(); ?>
                </div>
            </div>
        </div>
    </div><!--./block-news-->    <!--/end page-->
</section><!--./content-->
    

<?php get_footer(); ?>