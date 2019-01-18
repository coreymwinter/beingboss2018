<?php
/**
*
 * Template Name: Materials
 * The template for displaying Material Shop pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package understrap
 */

get_header();

?>


<div class="wrapper" id="full-width-page-wrapper" style="padding: 0px 0;">

	<div class="container-fluid materials-archive" id="content" tabindex="-1">

		<div class="row">

			<main class="site-main" id="main">

				<header class="entry-header">

						<figure class="bbpage-header" style="background-image: url('/wp-content/themes/beingboss2018/img/Back_Laptop_5.jpg');">
							<div class="container">
								<div class="headertext">
									<h1 class="center white huge">MATERIALS</h1>
								</div>
							</div>
						</figure>

				</header><!-- .entry-header -->

				<?php get_template_part( '/template-parts/bp-user-menu' ); ?>

				<div class="container">
					<div class="pagesection50">
						<div class="row">
							<div class="col-md-3">
								<div id="materialsmenu">
									<?php wp_nav_menu(
										array(
											'menu' => 'materials',
										)
									); ?>
								</div>

							</div>
							<div class="col-md-9">

									<?php  
										if ( is_page(12812) ) {
											get_template_part( '/template-parts/materials/materials-courses' );
										} else if ( is_page(12813) ) {
											get_template_part( '/template-parts/materials/materials-masterclasses' );
										} else if ( is_page(12811) ) {
											get_template_part( '/template-parts/materials/materials-worksheets' );
										} else if ( is_page(12814) ) {
											get_template_part( '/template-parts/materials/materials-webinars' );
										} else {
											get_template_part( '/template-parts/materials/materials-landing' );
										}
									?>
							</div> <!-- col-md-9 -->
						</div> <!-- row -->
					</div> <!-- pagesection50 -->
				</div><!-- container -->

			</main><!-- #main -->

		</div><!-- row -->

	</div> <!-- container-fluid -->

</div><!-- Wrapper end -->

<?php 
	if ( !is_user_logged_in() ) { 
		get_footer(); 
	}
	else {
		get_footer( 'dashboard' );
	}
?>
