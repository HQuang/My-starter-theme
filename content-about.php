
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>         
		<?php if ( has_post_thumbnail() ) : ?>                                
				<?php
			$sizes	 = get_post_thumbnail_id( $post->ID );
			$img	 = wp_get_attachment_image_src( $sizes, 'full' );
			$width	 = $img[ 1 ];
			$height	 = $img[ 2 ];
			?>
			                          
	<?php endif; ?>          
	<div <?php post_class( 'rsrc-post-content' ); ?>>                            
		<header>                              
			<h1 class="entry-title page-header" itemprop="headline">
				<?php the_title(); ?>
			</h1>                                                        
		</header>                            
		<div class="entry-content" itemprop="articleBody">                              
			<?php the_content(); ?>                            
		</div>                               
		<?php wp_link_pages(); ?>                                                                                  
		                        
	</div>        
<?php endwhile; ?>        
<?php endif; ?>  
