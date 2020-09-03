<?php
/**
 * Template Name: WC - Account
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

							<figure class="bbpage-header" style="background-image: url('/wp-content/themes/beingboss2018/img/Back_Laptop_5.jpg');">
								<div class="container">
																
								</div>
							</figure>

							<?php get_template_part( '/template-parts/bp-user-menu' ); ?>

							<div class="container pagesection50">
								<div class="entry-content">
									<?php the_content(); ?>
								</div><!-- .entry-content -->
							</div>

						</article><!-- #post-## -->

					<?php endwhile; // end of the loop. ?>

				</main><!-- #main -->

			</div><!-- #primary -->

		</div><!-- .row end -->

	</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
