<?php get_header(); ?>

<section class="content">
    <!--page-->
    <div class="container">
        <div class="block-news">
			<!-- start content container -->
			<?php get_template_part( 'content' ); ?>

			<?php if(is_page('gioi-thieu' )) : ?>
			<?php get_template_part( 'content', 'about' ); ?>
			<!-- end content container -->
			<?php endif; ?>

        </div>
    </div><!--./block-news-->    <!--/end page-->
</section><!--./content-->
<?php get_footer(); ?>
