<div class="row">
	<div class="col-md-4">
		<?php get_template_part( '/template-parts/dashboard/dashboard-notice' ); ?>

		<div class="dashboard-widget recent-topics mobilehide">
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

		<div class="dashboard-widget">
			<?php get_template_part( '/template-parts/communitycomingsoon' ); ?>
		</div>

	</div>

	<div class="col-md-8">

		<div class="dashboard-widget">
			<h3>MY COURSES</h3>
			<?php 
				$course_args = array(
						'post_type' => array( 'sfwd-courses' ),
					);
			
				$course_query = new WP_Query( $course_args );

				if ( $course_query->have_posts() ) { ?>
					<div class="archivecontainer">
					
						<?php while ($course_query->have_posts() && $coursecount < 2) {
							$course_query->the_post(); 
							$courseid = get_the_ID();
							$user = wp_get_current_user();
							$course_status = learndash_course_status( $courseid, $user->ID );
							$course_byline = get_post_meta( $courseid, 'bbcoursedetails_author', true );
							$user_courses_registered = ld_get_mycourses( $user->ID );
						?>

							<?php if (in_array($courseid, $user_courses_registered)) { ?>
								<article class="archiveitem" id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
									<div class="archiveitemimage">
										<?php if ( has_post_thumbnail() ) : ?>
											<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail('archive-thumb'); ?></a>
										<?php endif; ?>
										<div class="course-status"><?php echo $course_status; ?></div>
									</div>
									<div class="archiveitemcontent">
										<h5><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><span class="archiveitemtitle"> <?php the_title(); ?></span></a></h5>
										<p class="archiveitemauthor"><?php echo $course_byline; ?></p>
										<div class="italic center">Progress</div>
										<?php echo do_shortcode('[learndash_course_progress course_id="'.$courseid.'"]'); ?>
									</div> 
								</article>

								<?php $coursecount++; ?>
							<?php } ?>																
						<?php } ?>
						
					</div>
		
				<?php } ?>	

			<?php wp_reset_postdata(); ?>

			<a href="/courses" class="carousel_link">VIEW ALL COURSES</a>
		</div>

		<div class="dashboard-widget recent-topics mobileshow">
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

		<div class="row padtop30">
			<div class="col-md-12">
					<div class="dashboard-widget">
						<h3>CURRENTLY ONLINE</h3>
						<div class="widget-wrapper">
							<?php get_template_part( '/template-parts/communitycomingsoon' ); ?>
						</div>
					</div>
			</div>
		</div>
	</div>
</div>