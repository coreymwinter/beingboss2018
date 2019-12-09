<div class="row">
	<div class="col-md-12">
		<div class="dashboard-widget">
			<h3>UPCOMING EVENT</h3>
			<div class="widget-wrapper graysection">

			<?php 
				$upcoming_event_args = array(
						'post_type' => array( 'events' ),
						'posts_per_page' => 1,
						'tax_query' => array(
							array(
								'taxonomy' => 'eventtype',
								'field'    => 'slug',
								'terms'    => 'club',
							),
						),
						'post_status' => 'future',
				);

				$upcoming_event_query = new WP_Query( $upcoming_event_args );

				if ( $upcoming_event_query->have_posts() ) { ?>
					<div class="club_upcoming_event">	
							<?php while ($upcoming_event_query->have_posts()) {
								$upcoming_event_query->the_post();
								$event_id = get_the_ID();
								$emily_check = get_post_meta( $event_id, 'bbeventsclub_emily_host', true );
								$kathleen_check = get_post_meta( $event_id, 'bbeventsclub_kathleen_host', true );
								$event_guest_one = get_post_meta( $event_id, 'bbeventsclub_guest_one_image', true );
								$event_guest_two = get_post_meta( $event_id, 'bbeventsclub_guest_two_image', true );
								$event_time = get_post_meta( $event_id, 'bbeventsclub_event_time', true );
								$event_link = get_post_meta( $event_id, 'bbeventsclub_event_link', true );
								$event_label = get_post_meta( $event_id, 'bbeventsclub_event_label', true );
							?>

							<?php if (!empty ($event_guest_one) && empty ($event_guest_two) ) { ?>
								<div class="three-guests">
									<img src="<?php echo $event_guest_one; ?>">
									<img src="/wp-content/uploads/2018/01/Clubhouse_Emily.png">
									<img src="/wp-content/uploads/2018/01/Clubhouse_Kathleen.png">
								</div>
							<?php } else if (!empty ($event_guest_one) && !empty ($event_guest_two) ) { ?>
								<div class="four-guests">
									<img src="<?php echo $event_guest_one; ?>">
									<img src="<?php echo $event_guest_two; ?>">
									<img src="/wp-content/uploads/2018/01/Clubhouse_Emily.png">
									<img src="/wp-content/uploads/2018/01/Clubhouse_Kathleen.png">
								</div>
							<?php } else { ?>
								<div class="two-hosts">
									<img src="/wp-content/uploads/2018/01/Clubhouse_Emily.png">
									<img src="/wp-content/uploads/2018/01/Clubhouse_Kathleen.png">
								</div>
							<?php } ?>

							<p class="padtop30 padbot0"><a class="center upper fs24 brandon blacklink" href="<?php echo $event_link; ?>" title="<?php the_title(); ?>"> <?php the_title(); ?></a></p>
							<p class="center italic fs16"><?php echo $event_time; ?></p>

							<a class="button" href="<?php echo $event_link; ?>"><?php echo $event_label; ?></a>

							<?php } ?>
					</div>
				<?php } else { ?>
					<p style="width: 75%; margin: 0 auto;" class="center fs20">No events are currently scheduled, but stay tuned!</p>

					<p style="width: 75%; margin: 0 auto;" class="center fs20">We'll have something announced here soon.</p>
				<?php } ?>	

			<?php wp_reset_postdata(); ?>


			</div>
		</div>
	</div>
</div>