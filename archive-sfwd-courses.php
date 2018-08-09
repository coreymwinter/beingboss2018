<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package understrap
 */

get_header();
?>

<?php
$container   = get_theme_mod( 'understrap_container_type' );
$sidebar_pos = get_theme_mod( 'understrap_sidebar_position' );
?>

<div class="wrapper" id="archive-wrapper" style="padding: 0px 0;">

	<div class="container-fluid" id="content" tabindex="-1">

		<div class="row">

			<main class="site-main" id="main">

					<div class="imagebackground" style="background-image: url('/wp-content/uploads/2018/02/Back_Smoke_1.jpg');">
						<div class="container">
							<div class="capsule pagesection50">
								<p class="brandon white lustbig center">CEO Day Kit</p>
								<p class="center white large italic">12 months of focused<br /> 
									planning for your business<br />
									in just one day.
								</p>
								<a class="button-yellow center margintop30" href="https://courses.beingboss.club" target="_blank">LEARN MORE</a>
							</div>
						</div>
					</div>

			</main><!-- #main -->


		</div><!-- #primary -->


	</div> <!-- .row -->

</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
