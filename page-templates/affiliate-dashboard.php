
<?php
/**
 * Template Name: Affiliate Dashboard
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

	.affiliate-forms .col-md-6.affiliate-form-right {border-left: 1px solid #252525;}

	.affiliate-forms .gform_wrapper {
		width: 100%;
		max-width: 400px;
		margin: 0 auto;
	}

	.affiliate-forms h2 {text-align: center;}

	.gf_login_form input[type="text"],
	.gf_login_form input[type="password"] {
		width: 100% !important;
	}

	.affiliate-form-right .gform_wrapper input.large {font-size: 18px !important;}

	.gf_login_links {text-align: center;}

	.yith-wcaf.yith-wcaf-dashboard-summary .dashboard-title {margin-bottom: 0;}

	@media screen and (max-width: 768px) {
		.affiliate-forms .col-md-6.affiliate-form-right {border: none; margin-top: 50px;}
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

							<?php 
								$header_image = get_post_meta( $postid, 'bbpage_header_image', true );
								$header_text = get_post_meta( $postid, 'bbpage_header_text', true );
								$user = wp_get_current_user();
								$user_ID = $user->ID;	
								$user_name = $user->user_login;	
							?>	

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

								<div class="pagesection50">
									<div class="container affiliate-forms">

										<?php if ( !is_user_logged_in() ) { ?>

											<div class="row padbot50" style="width: 100%; max-width: 800px; margin: 0 auto;">
												<div class="col"><div style="padding:56.25% 0 0 0;position:relative;"><iframe src="https://player.vimeo.com/video/401093047?color=fff200&title=0&byline=0&portrait=0" style="position:absolute;top:0;left:0;width:100%;height:100%;" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe></div><script src="https://player.vimeo.com/api/player.js"></script></div>
											</div>

											<div class="row">
												<div class="col-md-6 affiliate-form-left">
													<h2>Login</h2>
													<?php echo do_shortcode('[gravityform action="login" title="false" description="false" logged_in_message="Yay! You are logged in!" registration_link_display="false" forgot_password_text="Forget your password?" /]'); ?>
												</div>
												<div class="col-md-6 affiliate-form-right">
													<h2>Register</h2>
													<?php echo do_shortcode('[gravityform id="8" title="false" description="false"]'); ?>
												</div>
											</div>
										<?php } else { ?>			

											<?php the_content(); ?>

										<?php } ?>
									
									</div>
								</div>

							</div><!-- .entry-content -->

						</article><!-- #post-## -->

					<?php endwhile; // end of the loop. ?>

				</main><!-- #main -->

			</div><!-- #primary -->

		</div><!-- .row end -->

	</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer( 'dashboard' ); ?>
