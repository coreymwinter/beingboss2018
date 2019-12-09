<?php
/**
 * Template Name: Resources - Landing
 *
 * Template for displaying the resources landing page.
 *
 * @package understrap
 */
get_header();

$container = get_theme_mod( 'understrap_container_type' );
$postid = get_the_ID();
$toppadding = get_post_meta( $postid, 'bbpage_top_padding', true );
$pagecss = get_post_meta( $postid, 'bbpage_page_css', true );
?>
<!-- custom css -->
<style><?php echo $pagecss; ?></style>
<!-- custom css -->

<div class="wrapper" id="resource-wrapper">

	<div class="container-fluid" id="content">
		
		<div class="row" style="margin: 0;">

			<div class="col-md-12 content-area" id="primary">

				<main class="site-main" id="main" role="main">

					<?php while ( have_posts() ) : the_post(); ?>

						<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

							<div class="entry-content" style="padding-top:<?php echo $toppadding; ?>px">

								<?php the_content(); ?>
								
								<div class="container">
									<div class="row">
										<div class="col-md-10 offset-md-1">
											<div class="row">
												<div class="col-md-6 padbot50">

												<h2>Being Boss foundations</h2>

												<?php
													$related_args = array(
															'post_type' => 'resources',
															'posts_per_page' => 20,
															'orderby' => 'date',
															'order'   => 'ASC',
															'tax_query' => array(
																	array(
																		'taxonomy' => 'resourcecategory',
																		'field'    => 'slug',
																		'terms'    => 'being-boss-foundations',
																	),
																),
													);
																
													$related_query = new WP_Query( $related_args );

													if ( $related_query->have_posts() ) {
														while ( $related_query->have_posts() ) {
															$related_query->the_post();
												?>
														<div class="resourcechild">
															<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
														</div>
												<?php
														}
														/* Restore original Post Data */
														wp_reset_postdata();
													} else {
														// no posts found
													}
												?>

												<h2 class="padtop50">Business 101</h2>
												
												<?php
													$related_args = array(
															'post_type' => 'resources',
															'posts_per_page' => 20,
															'orderby' => 'date',
															'order'   => 'ASC',
															'tax_query' => array(
																	array(
																		'taxonomy' => 'resourcecategory',
																		'field'    => 'slug',
																		'terms'    => 'business-101',
																	),
																),
													);
																
													$related_query = new WP_Query( $related_args );

													if ( $related_query->have_posts() ) {
														while ( $related_query->have_posts() ) {
															$related_query->the_post();
												?>
														<div class="resourcechild">
															<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
														</div>
												<?php
														}
														/* Restore original Post Data */
														wp_reset_postdata();
													} else {
														// no posts found
													}
												?>

												</div>
												<div class="col-md-6">
												<h2>Taking it to the next level</h2>
												
												<?php
													$related_args = array(
															'post_type' => 'resources',
															'posts_per_page' => 20,
															'orderby' => 'date',
															'order'   => 'ASC',
															'tax_query' => array(
																	array(
																		'taxonomy' => 'resourcecategory',
																		'field'    => 'slug',
																		'terms'    => 'next-level'
																	),
																),
													);
																
													$related_query = new WP_Query( $related_args );

													if ( $related_query->have_posts() ) {
														while ( $related_query->have_posts() ) {
															$related_query->the_post();
												?>
														<div class="resourcechild">
															<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
														</div>
												<?php
														}
														/* Restore original Post Data */
														wp_reset_postdata();
													} else {
														// no posts found
													}
												?>
												
												<h2 class="padtop50">Living a Boss Life</h2>
												
												<?php
													$related_args = array(
															'post_type' => 'resources',
															'posts_per_page' => 20,
															'orderby' => 'date',
															'order'   => 'ASC',
															'tax_query' => array(
																	array(
																		'taxonomy' => 'resourcecategory',
																		'field'    => 'slug',
																		'terms'    => 'boss-life'
																	),
																),
													);
																
													$related_query = new WP_Query( $related_args );

													if ( $related_query->have_posts() ) {
														while ( $related_query->have_posts() ) {
															$related_query->the_post();
												?>
														<div class="resourcechild">
															<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
														</div>
												<?php
														}
														/* Restore original Post Data */
														wp_reset_postdata();
													} else {
														// no posts found
													}
												?>

												</div><!-- .col-md-6 -->
											</div><!-- .row-->
										</div>
									</div>
										
								</div><!-- .container -->

							</div><!-- .entry-content -->

						</article><!-- #post-## -->

					<?php endwhile; // end of the loop. ?>

				</main><!-- #main -->

			</div><!-- #primary -->

		</div><!-- .row end -->

	</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
