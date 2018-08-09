<?php 
get_header(); ?>

<div class="wrapper dashboard" id="full-width-page-wrapper">

	<div class="container-fluid">
		<?php if (have_posts()) : while(have_posts()) : the_post(); ?>
						
			<?php the_content(); ?>
		
		<?php endwhile; endif; ?>
	</div><!--/container-wrap-->

</div>

<?php get_footer(); ?>