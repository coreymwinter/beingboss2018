
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
	
	.bbpage-header .headertext {
		width: 60%;
		margin: auto auto auto 0;
	}

</style>
<!-- custom css -->

<div class="wrapper dashboard" id="full-width-page-wrapper">

	<div class="container-fluid" id="content">
		
		<div class="row" style="margin: 0;">

			<div class="col-md-12 content-area" id="primary">

				<main class="site-main" id="main" role="main">

					<?php while ( have_posts() ) : the_post(); ?>

						<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

							<?php $header_image = get_post_meta( $postid, 'bbpage_header_image', true ); ?>
							<?php $header_text = get_post_meta( $postid, 'bbpage_header_text', true ); ?>							

							<header class="entry-header">

								<figure class="bbpage-header" style="background-image: url('<?php echo $header_image; ?>');">
									<div class="container">
										<div class="headertext">
											<?php echo $header_text; ?>
										</div>
										<div class="dashboard-user">
											<div class="capsule">
												<?php 
													$current_user = wp_get_current_user();
															
													echo get_avatar( $current_user->ID, 125, $default, $alt, array( 'class' => 'dash-user-avatar' ) );
												?>
												<ul class="dash-vert-menu">
													<li><a href="<?php echo bp_loggedin_user_domain(); ?>">Profile</a></li>
													<li><a href="#">Notifications</a></li>
													<li><a href="#">Messages</a></li>
													<li><a href="#">Log Out</a></li>
												</ul>

											</div>
										</div>
									</div>
								</figure>

							</header><!-- .entry-header -->

							<div class="entry-content" style="padding-top:<?php echo $toppadding; ?>px">

								<?php get_template_part( '/template-parts/bp-user-menu' ); ?>

								<?php the_content(); ?>

								<div class="container">
									<div class="pagesection50">
										<div class="row">
											<div class="col-md-9">
												test
											</div>

											<div class="col-md-3">
												<div class="graysection">
													
												</div>
											</div>
										</div>
									</div>
								</div>
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
