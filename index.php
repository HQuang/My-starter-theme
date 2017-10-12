<?php get_header(); ?>
<section class="content">
    <!--page-->
    <div class="container">
        <div class="slider-home">            
            <div class="slider-wrapper ">
                <div class="slider">
                    <div class="autoplay">
                        <?php get_sidebar(); ?>
                    </div>
                </div>
            </div>
            <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
            <script src='http://cdn.jsdelivr.net/jquery.slick/1.5.9/slick.min.js'></script>
            <script src='https://cdnjs.cloudflare.com/ajax/libs/gsap/1.18.2/TweenMax.min.js'></script>

            <script src="<?php echo get_template_directory_uri() ?>/js/index.js"></script>

            <script type="text/javascript">
                $('.autoplay').slick({
                  autoplay: true,
                  autoplaySpeed: 2000,
                });
            </script>
        </div><!--./slider-home-->
    </div>
    <div class="block-product">
        <div class="container">
        <div class="row customrownewprd">
            <div class="cold-lg6 col-md-3 col-sm-12 col-xs-12 width480 customcolnewprd">
                <p class="newprd">Sản phẩm mới nhất</p>
            </div>
        </div>
            <div class="row">            
                <?php hongquang_items_home(); ?>
            </div>
            <p class="seemore-product"><a href="<?php get_sidebar('link' ); ?>">Xem thêm sản phẩm</a></p>
        </div>
    </div><!--./block-product-->
    <div id="popup-ma" style="display: none;">
            <div class="popup-ma">
            <form method="POST">
                <input class="form-control" type="text" name="txtName" required="" placeholder="Full name..">
                <input class="form-control" type="text" name="txtEmail" required="" placeholder="Email..">
                <button class="btn btn-success" type="submit" name="func" value="dangki">Đăng kí</button>
            </form>
        </div>
    </div>
</section><!--./content-->   

<?php get_footer(); ?>