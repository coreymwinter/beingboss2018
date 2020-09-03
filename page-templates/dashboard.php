
<?php
/**
 * Template Name: Dashboard
 *
 * 
 *
 * @package understrap
 */

get_header();
$postid = get_the_ID();
$toppadding = get_post_meta( $postid, 'bbpage_top_padding', true );
$pagecss = get_post_meta( $postid, 'bbpage_page_css', true );
?>
<!-- custom css -->
<style>
	<?php echo $pagecss; ?>
</style>
<!-- custom css -->

<div class="wrapper dashboard" id="full-width-page-wrapper">

	<div class="container-fluid" id="content">
		
		<div class="row" style="margin: 0;">

			<div class="col-md-12 content-area" id="primary">

				<main class="site-main" id="main" role="main">

					<?php while ( have_posts() ) : the_post(); ?>

						<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

							<?php 
								$header_image = get_post_meta( $postid, 'bbpage_header_image', true );
								$header_text = get_post_meta( $postid, 'bbpage_header_text', true );
								$user = wp_get_current_user();
								$user_ID = $user->ID;	
								$user_name = $user->user_login;	
							?>	


							<?php 
							if ( !is_user_logged_in() ) {
								 get_template_part( '/template-parts/register-block' );
							} else 
							{ ?>			

							<header class="entry-header">

								<figure class="bbpage-header" style="background-image: url('<?php echo $header_image; ?>');">
									<div class="container">
										<div class="headertext">
											<h1 class="center white huge"><?php the_title(); ?></h1>
										</div>
									</div>
								</figure>

							</header><!-- .entry-header -->

							<div class="entry-content" style="padding-top:<?php echo $toppadding; ?>px">

								<?php get_template_part( '/template-parts/bp-user-menu' ); ?>

									<?php the_content(); ?>

									<div class="container dashboard-content">
										<div class="pagesection50">
											<?php

												$student_check = get_user_meta($user_ID, 'bbc_user_student_tag', true);
												$club_check = get_user_meta($user_ID, 'bbc_user_club_tag', true);

											/*<!-- if user has course but not community-->*/
											if ( !empty($student_check) && empty($club_check) ) {
												get_template_part( '/template-parts/dashboard/dashboard-course' );
											}

											/*<!-- if user has community but not course-->*/
											else if ( empty($student_check) && !empty($club_check) ) {
												get_template_part( '/template-parts/dashboard/dashboard-community' );
											}

											/*<!-- if user has course and community -->*/
											else if ( !empty($student_check) && !empty($club_check) ) {
												get_template_part( '/template-parts/dashboard/dashboard-all' );
											}

											/*<!-- if user is free -->*/
											else { 
												get_template_part( '/template-parts/dashboard/dashboard-free' );
											}

											?>
										</div>
									</div>
								

							</div><!-- .entry-content -->

							<footer class="entry-footer">


							</footer><!-- .entry-footer -->
						<?php } ?>

						</article><!-- #post-## -->

					<?php endwhile; // end of the loop. ?>

				</main><!-- #main -->

			</div><!-- #primary -->

		</div><!-- .row end -->

	</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer( 'dashboard' ); ?>
