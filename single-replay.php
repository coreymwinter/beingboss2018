<?php
/**
 * The template for displaying all single replay posts.
 *
 * @package understrap
 */

get_header( 'squeeze' );
?>

<div class="wrapper" id="webinar-wrapper">
	<div class="container-fluid" id="content" tabindex="-1">

			<main class="site-main" id="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
						<?php $postid = get_the_ID();
						 $relatedwebinar = get_post_meta ($postid, 'bbreplay_webinar_select', true );
						 $webinar_header_image = get_post_meta($relatedwebinar, 'bbwebinar_header_image', true ); 
						 $webinar_main_title = get_post_meta($relatedwebinar, 'bbwebinar_main_title', true );
						 $webinar_header_text = get_post_meta($relatedwebinar, 'bbwebinar_header_text', true );
						 $webinar_guest_one_name = get_post_meta($relatedwebinar, 'bbwebinar_guest_one_name', true );
						 $webinar_guest_one_image = get_post_meta($relatedwebinar, 'bbwebinar_guest_one_image', true );
						 $webinar_guest_two_name = get_post_meta($relatedwebinar, 'bbwebinar_guest_two_name', true );
						 $webinar_guest_two_image = get_post_meta($relatedwebinar, 'bbwebinar_guest_two_image', true ); 
						 $webinar_replay_video = get_post_meta( $postid, 'bbreplay_replay_video', true ); ?>

						<header class="entry-header">

							<?php if($webinar_header_image) { ?>
								<figure class="bbpage-header" style="background-image: url('<?php echo $webinar_header_image; ?>');">
							<?php } else { ?>
								<figure class="bbpage-header" style="background-image: url('/wp-content/uploads/2018/01/Clubhouse_Back1.jpg');">
							<?php } ?>
									<div class="container">
										<div class="row align-items-center row-eq-height">
											<?php if($webinar_guest_two_name) { ?>
												<div class="col-md-6 headertext">
													<?php echo $webinar_header_text; ?>
													<h1 class="webinar-title"><?php echo $webinar_main_title; ?></h1>
												</div>
												<div class="col-md-6 headerguests">
													<div class="row align-items-center row-eq-height">
														<div class="col-md-6 guest">
															<img class="guest-image" src="<?php echo $webinar_guest_one_image; ?>">
															<p><?php echo $webinar_guest_one_name; ?></p>
														</div>

														<div class="col-md-6 guest">
															<img class="guest-image" src="<?php echo $webinar_guest_two_image; ?>">
															<p><?php echo $webinar_guest_two_name; ?></p>
														</div>
													</div>
												</div>
											<?php } else { ?>
												<div class="col-md-8 headertext">
													<?php echo $webinar_header_text; ?>
													<h1 class="webinar-title"><?php echo $webinar_main_title; ?></h1>
												</div>
												<div class="col-md-4 headerguests">
													<div class="guest">
														<img class="guest-image" src="<?php echo $webinar_guest_one_image; ?>">
														<p><?php echo $webinar_guest_one_name; ?></p>
													</div>
												</div>
											<?php } ?>
										</div>
									</div>
								</figure>

						</header><!-- .entry-header -->

						<div class="container">
							<div class="row">
								<div class="col-md-12">
									<div class="top-subscribe">
										<div class="inner">
											<?php echo $webinar_replay_video; ?>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="entry-content">
							<div class="container pagesection80">
								<div class="row">			
									<div class="col-md-6 offset-md-3">
										<?php the_content(); ?>
									</div>		
								</div>
							</div>

						</div><!-- .entry-content -->


<!-- 						<?php if ( !empty( $fullwidth_optin ) ) { ?>
							<footer class="entry-footer optinwrapper">
								<div class="container">
									<img class="center" src="/wp-content/themes/beingboss2018/img/Optin_Icon_White.png">
									<h2 class="center white padbot0">FREE RESOURCE: <?php echo get_the_title($fullwidth_optin); ?></h2>
									<?php echo apply_filters('the_content', get_post_field('post_content', $fullwidth_optin)); ?>
								</div>
							</footer>
						<?php } ?> -->


					</article><!-- #post-## -->

				<?php endwhile; // end of the loop. ?>

			</main><!-- #main -->

		</div><!-- #primary -->

</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer( 'squeeze' ); ?>
