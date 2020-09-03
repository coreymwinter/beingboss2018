<?php
/**
 * Template Name: Podcast Landing
 *
 *
 * @package understrap
 */

get_header();
$container = get_theme_mod( 'understrap_container_type' );
$postid = get_the_ID();
?>

<div class="wrapper" id="full-width-page-wrapper">

	<div class="container-fluid" id="content">
		
		<div class="row" style="margin: 0;">

			<div class="col-md-12 content-area" id="primary">

				<main class="site-main" id="main" role="main">

					<?php while ( have_posts() ) : the_post(); ?>

						<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

							<?php $showtitle = get_post_meta( $postid, 'bbpodcast_showtitle', true ); ?>
							<?php $showtagline = get_post_meta( $postid, 'bbpodcast_showtagline', true ); ?>
							<?php $showdescription = get_post_meta( $postid, 'bbpodcast_showdescription', true ); ?>
							<?php $showfeeds = wpautop(get_post_meta( $postid, 'bbpodcast_showfeeds', true )); ?>									

							<header class="entry-header podcastlandingheader">

								<div class="pagesection80 graysection">
									<div class="container">
										<div class="row align-items-center">
											<div class="col-md-5">
												<img src="<?php echo get_the_post_thumbnail_url(); ?>">
											</div>
											<div class="col-md-7">
												<h1><?php echo $showtitle; ?></h1>
												<h2><?php echo $showtagline; ?></h2>
												<p><?php echo $showdescription; ?></p>
												<div class="showfeeds"><?php echo $showfeeds; ?></div>
											</div>
										</div>
									</div>
								</div>

							</header><!-- .entry-header -->

							<div class="container pagesection80">
								<div class="entry-content">
									<?php the_content(); ?>
								</div><!-- .entry-content -->
							</div><!-- .container -->

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
