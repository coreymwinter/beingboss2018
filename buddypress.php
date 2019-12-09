<?php 
get_header(); ?>

<div class="wrapper dashboard" id="full-width-page-wrapper">

	<?php 
	if ( !is_user_logged_in() ) {
		 get_template_part( '/template-parts/register-block' );
	} else 
	{ ?>	
		<div class="container-fluid">
			<?php if (have_posts()) : while(have_posts()) : the_post(); ?>
							
				<?php the_content(); ?>
			
			<?php endwhile; endif; ?>
		</div><!--/container-wrap-->
	<?php } ?>
</div>

<?php get_footer( 'dashboard' ); ?>