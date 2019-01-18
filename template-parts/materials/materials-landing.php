<h2>My Material</h2>

	<?php get_template_part( '/template-parts/materials/materials-loggedout' ); ?>

	<div class="archivecontainer">
	<?php 
		$material_args = array(
			'post_type' => array( 'sfwd-courses' ),
			'orderby'        => 'title',
			'order'			=> 'ASC',
			'nopaging'		=> true,
		);

		$material_query = new WP_Query( $material_args );

		if ( $material_query->have_posts() ) { ?>

			<?php $coursecount = 0; ?>

			<?php while ($material_query->have_posts()) {
				$material_query->the_post(); 
				$courseid = get_the_ID();
				$user = wp_get_current_user();
				$course_status = learndash_course_status( $courseid, $user->ID );
				$course_byline = get_post_meta( $courseid, 'bbcoursedetails_author', true );
				$user_courses_registered = ld_get_mycourses( $user->ID );
			?>

				<?php if (in_array($courseid, $user_courses_registered) ) { ?>
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
							<div class="italic center progress_label">Progress</div>
							<?php echo do_shortcode('[learndash_course_progress course_id="'.$courseid.'"]'); ?>
						</div> 
					</article>

					<?php $coursecount++; ?>
				<?php } ?>		

			<?php } ?>

		<?php } ?>	

		<?php if ( ( is_user_logged_in() ) && ( $coursecount == '0') ) { ?>
			<p class="center xmedium">You haven't collected any material yet! Use the Material menu to find <a href="/materials/courses">courses</a>, <a href="/materials/masterclasses">masterclasses</a>, <a href="/materials/worksheets">worksheets</a>, and <a href="/materials/webinars">webinars</a>.</p>
		<?php } ?>	
	</div>
	<?php wp_reset_postdata(); ?>