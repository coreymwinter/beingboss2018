<?php
/**
 * The template for displaying all single posts.
 *
 * @package understrap
 */

get_header();
$postid = get_the_ID();
?>
<!-- custom css -->
<style>
	.bbpage-header .headertext img {
	    display: inline-block;
	    width: 30%;
	    padding-right: 50px;
	}
	.bbpage-header .headertext .headerright {
	    width: 65%;
	    display: inline-block;
	    text-align: left;
	    vertical-align: middle;
	}

	.bbpage-header .headertext hr {
	    width: 140px;
	    height: 0px;
	    margin: 0 auto 15px 0;
	    background: #fff;
	}

	#learndash_course_status {display: none;}

</style>
<!-- custom css -->


<div class="wrapper" id="full-width-page-wrapper">

	<div class="container-fluid" id="content" tabindex="-1">

			<main class="site-main" id="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

						<header class="entry-header">
							<?php $header_image = get_post_meta( $postid, 'bbcoursedetails_header_background', true ); ?>
							<?php $header_logo = get_post_meta( $postid, 'bbcoursedetails_header_logo', true ); ?>
							<?php $header_text = get_post_meta( $postid, 'bbcoursedetails_header_text', true ); ?>	
							<figure class="bbpage-header" style="background-image: url('<?php echo $header_image; ?>');">
									<div class="container">
										<div class="headertext">
											<img src="<?php echo $header_logo; ?>">

											<div class="headerright">

												<p class="white brandon upper"><?php echo $header_text; ?></p>
												<hr>
												<?php 
													$course_id = get_the_ID();
													$user = wp_get_current_user();
													$course_status = learndash_course_status( $course_id, $user );

													if ( is_user_logged_in() ) {
															echo "<span class='white'><strong>COURSE STATUS:</strong> <em>";
															echo $course_status;
															echo "</em></span>";
													} else {
													    echo "<span class='white'><strong>COURSE STATUS:</strong> <em>You're not enrolled</em></span>";
													}
												?>
											</div>
										</div>
									</div>
							</figure>

						</header><!-- .entry-header -->

						<?php get_template_part( '/template-parts/course-menu' ); ?>

						<div class="container pagesection50">

							<div class="entry-content">

								<?php 
									if ( !is_user_logged_in() ) { ?>
										<div class="padbot30">
											<img src="<?php echo get_post_meta( get_the_ID(), 'bbcoursedetails_banner_ad', true ); ?>">
										</div>
								<?php	}
								?>
								<div class="row">
									<div class="col-md-8">

										<?php the_content(); ?>
			
									</div>
									<div class="col-md-4">
										<div class="shownote_sponsors">
											<h2>COURSE PROGRESS</h2>
											<?php 
												if ( is_user_logged_in() ) {
													dynamic_sidebar( 'right-sidebar' ); 
												}
											?>

											<?php $lessonmaterials = get_post_meta( get_the_ID(), 'bblessons_files', true ); ?>
										
												<?php if ( !empty( $lessonmaterials ) ) { ?>

													<div style="background-color: #eaeaea; width: 100%; display: table; padding: 25px;">
														<h2 class="center">COURSE MATERIALS</h2>
														<ul>
														<?php foreach ( (array) $lessonmaterials as $key => $entry ) {

																$filelabel = $filedownload = $filelink = '';

																if ( isset( $entry['bblessons_resource_label'] ) ) {
																	$filelabel = esc_html( $entry['bblessons_resource_label'] );
																}

																if ( isset( $entry['bblessons_resource_file'] ) ) {
																	$filedownload = esc_html( $entry['bblessons_resource_file'] );
																}

																if ( isset( $entry['bblessons_resource_link'] ) ) {
																	$filelink = esc_html( $entry['bblessons_resource_link'] );
																}

																if ( !empty( $filedownload ) ) {
																	echo "<li><a href='";
																	echo $filedownload;
																	echo "' target='_blank'>";
																	echo $filelabel;
																	echo "</a></li>";
																}
																else {
																	echo "<li><a href='";
																	echo $filelink;
																	echo "' target='_blank'>";
																	echo $filelabel;
																	echo "</a></li>";
																}
															} 
														?>
														</ul>
													</div>
												<?php } ?>



											<?php $coursebonuses = get_post_meta( get_the_ID(), 'bbbonuses_shortcode_group', true ); ?>

											<?php if ( is_user_logged_in() && !empty( $coursebonuses ) ) { ?>
												<div class="coursebonuses">
													<h2 class="center">YOUR COURSE BONUSES</h2>

													<div class="bonus-list">
														<?php foreach ( (array) $coursebonuses as $key => $entry ) {

															$bonusshortcode = '';

															if ( isset( $entry['bbbonuses_shortcode'] ) ) {
																$bonusshortcode = esc_html( $entry['bbbonuses_shortcode'] );
															}

															echo do_shortcode( $bonusshortcode );

															} 
														?>
													</div>
												</div>
											<?php } ?>

											<?php 
												if ( !is_user_logged_in() ) {
													echo get_post_meta( get_the_ID(), 'bbcoursedetails_testimonial_quote', true );
													echo get_post_meta( get_the_ID(), 'bbcoursedetails_testimonial_author', true ); 
												}
											?>
										</div>
									</div> <!-- end sidebar -->
								</div>
								
							</div><!-- .entry-content -->

						</div>
						

					</article><!-- #post-## -->

				<?php endwhile; // end of the loop. ?>

			</main><!-- #main -->

	</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
