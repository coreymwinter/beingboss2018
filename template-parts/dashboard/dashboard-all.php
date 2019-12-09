<div class="row">
	<div class="col-md-4">
		<?php get_template_part( '/template-parts/dashboard/parts/notices' ); ?>

		
	</div>

	<div class="col-md-8">

		<?php get_template_part( '/template-parts/dashboard/parts/upcomingevent' ); ?>

		<div class="row padtop30 padbot30">
			<div class="col-md-12">
				<?php if ( dynamic_sidebar('dashboard_2') ) : else : endif; ?>	
			</div>
		</div>

		<?php get_template_part( '/template-parts/dashboard/parts/purchasedmaterial' ); ?>

		<div class="dashboard-widget recent-topics">
			<h3>Recent Forum Topics</h3>
			<?php 
				$ceo_topic_args = array(
						'post_type' => array( 'topic' ),
						'posts_per_page' => 5,
						'meta_key' => '_bbp_forum_id',
						'meta_value' => array(12136, 12137, 12138, 12139, 12140, 12141, 12142, 12144),
				);
			
				$ceo_topic_query = new WP_Query( $ceo_topic_args );

				if ( $ceo_topic_query->have_posts() ) { ?>
						<ul>
						
							<?php while ($ceo_topic_query->have_posts()) {
								$ceo_topic_query->the_post();
								$ceo_topic_id = get_the_ID();
							?>

							<li><a class="bbp-forum-title" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"> <?php the_title(); ?></a></li>

							<?php } ?>

						</ul>
				<?php } ?>	

			<?php wp_reset_postdata(); ?>
							
		</div>

	</div>
</div>