<h2>Masterclasses</h2>
<div class="archivecontainer">
<?php 
	$material_args = array(
		'post_type' => array( 'sfwd-courses' ),
		'tax_query' => array(
			array(
				'taxonomy' => 'ld_course_category',
				'field'    => 'slug',
				'terms'    => 'masterclass',
			),
		),
		'orderby'        => 'title',
		'order'			=> 'ASC',
		'nopaging'		=> true,
	);

	$material_query = new WP_Query( $material_args );

	if ( $material_query->have_posts() ) { ?>
		<?php while ($material_query->have_posts()) {
			$material_query->the_post(); 
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
						<div class="italic center progress_label">Progress</div>
						<?php echo do_shortcode('[learndash_course_progress course_id="'.$courseid.'"]'); ?>
					</div> 
				</article>

			<?php } ?>																
		<?php } ?>

	<?php } ?>	

<?php 
	$material_args_two = array(
		'post_type' => array( 'sfwd-courses' ),
		'tax_query' => array(
			array(
				'taxonomy' => 'ld_course_category',
				'field'    => 'slug',
				'terms'    => 'masterclass',
			),
		),
		'orderby'        => 'title',
		'order'			=> 'ASC',
	);

	$material_query_two = new WP_Query( $material_args_two );

	if ( $material_query_two->have_posts() ) { ?>
		<?php while ($material_query_two->have_posts()) {
			$material_query_two->the_post(); 
			$courseid = get_the_ID();
			$user = wp_get_current_user();
			$course_status = learndash_course_status( $courseid, $user->ID );
			$course_byline = get_post_meta( $courseid, 'bbcoursedetails_author', true );
			$associated_product = get_post_meta( $courseid, 'bbcoursedetails_product_select', true );
			$enroll_link = get_post_meta( $courseid, 'bbcoursedetails_enroll_now_link', true );
			$user_courses_registered = ld_get_mycourses( $user->ID );
		?>
			<?php if (! in_array($courseid, $user_courses_registered) ) { ?>
				<article class="archiveitem" id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
					<div class="archiveitemimage" style="opacity: 0.5;">
						<?php if ( has_post_thumbnail() ) : ?>
							<?php the_post_thumbnail('archive-thumb'); ?>
						<?php endif; ?>
						<div class="course-status">NOT ENROLLED</div>
					</div>
					<div class="archiveitemcontent">
						<h5 style="opacity: 0.5;"><span class="archiveitemtitle"> <?php the_title(); ?></span></h5>
						<p class="archiveitemauthor" style="opacity: 0.5;"><?php echo $course_byline; ?></p>
						<br />
						<?php if ($associated_product) { ?>
							<a href="<?php echo get_permalink($associated_product); ?>" class="button-yellow">Enroll Now</a>
						<?php } elseif ($enroll_link) { ?>
							<a href="<?php echo $enroll_link; ?>" class="button-yellow">Enroll Now</a>
						<?php } else { ?>
							<a href="<?php the_permalink(); ?>" class="button-yellow">Enroll Now</a>
						<?php } ?>
					</div> 
				</article>
			<?php } ?>															
		<?php } ?>

	<?php } ?>	

</div>
<?php wp_reset_postdata(); ?>