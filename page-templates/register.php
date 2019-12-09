<?php
/**
 * Template Name: Register Page
 *
 *
 * @package understrap
 */

get_header();
$postid = get_the_ID();
?>

<div class="wrapper" id="full-width-page-wrapper">

	<div class="container-fluid" id="content">
		
		<div class="row" style="margin: 0;">

			<div class="col-md-12 content-area" id="primary">

				<main class="site-main" id="main" role="main">

					<?php while ( have_posts() ) : the_post(); ?>

						<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

							<div class="entry-content" id="registerpage">

								<?php if ( is_user_logged_in() ) { ?>
									<div class="imagebackground" style="background-image: url('/wp-content/uploads/2018/08/Back_Laptop_2.jpg');">
										<div class="container" style="padding: 100px 0;">
											<div style="width: 90%; max-width: 500px; margin: 0 auto; display: table;">
												<div class="whitesection" style="padding: 40px 0 50px;">
													<a href="/dashboard" class="button-yellow">GO TO YOUR DASHBOARD</a>
												</div>
											</div>
										</div>
									</div>
								<?php } else { 
									get_template_part( '/template-parts/register-block' );
								} ?>

							</div><!-- .entry-content -->

							<footer class="entry-footer">


							</footer><!-- .entry-footer -->

						</article><!-- #post-## -->

					<?php endwhile; // end of the loop. ?>

				</main><!-- #main -->

			</div><!-- #primary -->

		</div><!-- .row end -->

	</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
