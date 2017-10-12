<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<link rel="profile" href="http://gmgp.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE">
	<meta content="telephone=no" name="format-detection">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<div class="body-wrapper">
		<section class="header">
		    <div class="banner">
		        <div class="container">
		            <div class="row">
		                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-5">
		                    <div class="logo">
		                        <h1 style="font-size: 0;">
			                        <?php the_custom_logo( ); ?>
		                        </h1>
		                        <?php //hongquang_header(); ?>
		                    </div><!--./logo -->
		                </div>
		                <div class="col-lg-push-6 col-md-push-6 col-sm-push-6 col-lg-3 col-md-3 col-sm-3 col-xs-7">
		                    <div class="hotline">
		                        <span></span>
		                        <span>
		                            Hotline<br>
		                            <a href="tel:" target="_top"><?php get_sidebar('hotline' ); ?></a>
		                        </span>
		                    </div>
		                </div>
		                <div class="col-lg-pull-3 col-md-pull-3 col-sm-pull-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
		                    <div class="search">
		                        <form action="" method="get" id="adminbarsearch" class="">
		                        	<input id="faq_search_input" placeholder="Nhập từ khóa tìm kiếm..." name="s" id="adminbar-search" type="text" value="" maxlength="150">		                        	
		                        	<button type="submit" name="fun" value="search">
		                            	<img class="find" src="<?php echo get_template_directory_uri() ?>/images/loading_icon.gif" alt="Tìm kiếm">
		                            	<span class="andi">Tìm kiếm</span>
	                            	</button>
	                        	</form>
		                        <div id="showresurt" style="display: none;"></div>
		                    </div><!--./search-->
		                </div>
		            </div>
		        </div>
		    </div><!--./banner-->
		    <div class="menu-navigation">
		        <div class="container">
		            <aside class="navbar-header col-xs-3">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar3">
							<i class="fa fa-bars menu-res" aria-hidden="true"></i>
						</button>
					</aside>
				<!-- menu_left vip -->            
					<div class="block-menu col-xs-9 col-lg-12">
					    <div id="navbar3" class="menu custom-menu">                
					        <?php header_menu(); ?>
					    </div><!--./menu-->            
				    </div>
				</div>
		    </div><!--./menu-navigation-->
		</section><!--./header-->