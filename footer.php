		<section class="footer">
		    <div class="footer-info">
		        <div class="container">
		            <div class="row">
		            	<?php get_sidebar('botcont'); ?>
		                <!-- <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 width480 before-slogan">
		                    <div class="box-slogan">
		                        <h5>Miễn Phí Vận Chuyển Nội Thành Đà Nẵng</h5>
		                        <p>Miễn phí vận chuyển khu vực trung tâm thành phố Đà Nẵng</p>
		                    </div>
		                </div>
		                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 width480 before-slogan">
		                    <div class="box-slogan">
		                        <h5>Tư vấn tận tình chu đáo</h5>
		                        <p>Tư vấn tận tình cho <br>khách hàng</p>
		                    </div>
		                </div>
		                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 width480 before-slogan">
		                    <div class="box-slogan">
		                        <h5>Hỗ trợ trực tuyến</h5>
		                        <p>Hotline: 0905 338 330 <br>Hỗ trợ 24/7</p>
		                    </div>
		                </div>
		                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 width480 before-slogan">
		                    <div class="box-slogan">
		                        <h5>Ship COD Toàn Quốc</h5>
		                        <p>Ship COD - Thanh toán khi nhận hàng toàn quốc</p>
		                    </div>
		                </div> -->
		            </div>
		        </div>
		    </div>
		<!--./footer-info-->
		    <div class="footer-page">
		        <div class="container">
		            <div class="footer-page-top">
		                <div class="row">
		                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 width480">
	                        	<aside class="imgfooter">
		                        	<?php the_custom_logo( ); ?>
		                        </aside>
		                    </div>
		                    <div class="col-lg-6 col-md-3 col-sm-6 col-xs-6 width480">
		                        <div class="address-branch">
		                            <!-- <h6>Chi nhánh 1 - GIÀY ĐÀ NẴNG</h6>
		                            <p><strong>Địa chỉ</strong>: 07 Châu Thượng Văn, Đà Nẵng<br>
									<br>
									<strong>Hotline</strong>: 0905 338 330<br>
									<br>
									<em><strong>Chuyên Giày SuperFake, Giày Chính Hãng - Real, Hàng Bóng Rổ</strong></em></p> -->
									<?php get_sidebar('address'); ?>
		                        </div><!--./address-branch-->
		                    </div>
		                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 width480">
		                        <div class="logo-branch">
		                            <h6>Kết nối</h6>
		                            <p class="sosial-footer">
		                                <?php get_sidebar('connect'); ?>
		                            </p>
		                           
		                        </div><!--./address-branch-->
		                    </div>
		                </div>
		            </div><!--./footer-page-top-->
		            <div class="footer-page-bottom">
		                <p>&copy;<?php echo date('Y'); ?> Hong Quang - <a href="https://www.fb.com/Quanglh268">quanglh.com</a> - <?php bloginfo('sitename' ); ?></p>
		            </div><!--./footer-page-bottom-->
		        </div>
		    </div><!--./footer-page-->
		    
		</section><!--./footer-->
	</div>
<script type="text/javascript" src="js/jquery.min.js"></script> <!--1.11.3-->
<script type="text/javascript" src="js/jquery.touchSwipe.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery.mmenu.all.min.js"></script>
<script type="text/javascript" src="js/jquery.elevateZoom-3.0.8.min.js"></script>
<script type="text/javascript" src="js/common.js"></script>
<script type="text/javascript" src="js/init.js"></script>

<?php wp_footer(); ?>

</body>
</html>