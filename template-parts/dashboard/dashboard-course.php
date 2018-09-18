<div class="row">
	<div class="col-md-4">
		<?php get_template_part( '/template-parts/dashboard/dashboard-notice' ); ?>

		<div class="dashboard-widget">
			<?php get_template_part( '/template-parts/communitycomingsoon' ); ?>
		</div>

	</div>

	<div class="col-md-8">

		<div class="dashboard-widget">
			<h3>PURCHASED MATERIAL</h3>
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

			<a href="/courses" class="carousel_link">VIEW ALL MATERIAL</a>
		</div>

		<div class="dashboard-widget">
			<h3>PURCHASED MATERIAL</h3>
			<?php 
				$material_args = array(
						'post_type' => array( 'library' ),
						'tax_query' => array(
								array(
									'taxonomy' => 'librarytype',
									'field'    => 'slug',
									'terms'    => 'resources',
								),
							),
					);
			
				$material_query = new WP_Query( $material_args );

				if ( $material_query->have_posts() ) { ?>
					<div class="archivecontainer">
					
						<?php while ($material_query->have_posts() && $materialcount < 2) {
							$material_query->the_post(); 
							$materialid = get_the_ID();
							$user = wp_get_current_user();
						?>

							<article class="archiveitem" id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
								<div class="archiveitemcontent">
									<h5><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><span class="archiveitemtitle"> <?php the_title(); ?></span></a></h5>
								</div> 
							</article>

							<?php $materialcount++; ?>															
						<?php } ?>
						
					</div>
		
				<?php } ?>	

			<?php wp_reset_postdata(); ?>

			<a href="/library" class="carousel_link">VIEW ALL MATERIAL</a>
		</div>
	</div>
</div>