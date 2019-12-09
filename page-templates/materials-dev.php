<?php
/**
*
 * Template Name: Materials Dev
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

								<h2>Worksheets</h2>

								<?php get_template_part( '/template-parts/materials/materials-loggedout' ); ?>

								<div class="archivecontainer">
								<?php 
									$material_args = array(
										'post_type' => array( 'dlm_download' ),
										'orderby' => 'title',
										'order'			=> 'ASC',
										'nopaging'		=> true,
									);

									$material_query = new WP_Query( $material_args );

									if ( $material_query->have_posts() ) { ?>
											
											<?php while ($material_query->have_posts() ) {
												$material_query->the_post(); 
												$materialid = get_the_ID();
												$material_byline = get_post_meta( $materialid, 'bbdownload_byline', true );
											?>
											<?php if ( is_user_logged_in() ) { ?>
												<article class="archiveitem worksheets" id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
													<div class="archiveitemimage">
														<?php if ( has_post_thumbnail() ) : ?>
															<a href="<?php echo do_shortcode('[download_data version="materials" id="' . $materialid . '" data="download_link"]') ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail('archive-thumb'); ?></a>
														<?php endif; ?>
													</div>
													<div class="archiveitemcontent">
														<h5 class="center"><a href="<?php echo do_shortcode('[download_data version="materials" id="' . $materialid . '" data="download_link"]') ?>" class="blacklink" title="<?php the_title(); ?>" target="_blank"><span class="archiveitemtitle"> <?php the_title(); ?></span></a></h5>
														<p class="center fs14 italic"><?php echo $material_byline; ?></p>
														<a href="<?php echo do_shortcode('[download_data version="materials" id="' . $materialid . '" data="download_link"]') ?>" class="button-yellow">Download Now</a>
													</div> 
												</article>
											<?php } else { ?>
												<article class="archiveitem worksheets" id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
													<div class="archiveitemimage" style="opacity: 0.5">
														<?php if ( has_post_thumbnail() ) : ?>
															<?php the_post_thumbnail('archive-thumb'); ?>
														<?php endif; ?>
													</div>
													<div class="archiveitemcontent">
														<h5 class="center" style="opacity: 0.5"><span class="archiveitemtitle"> <?php the_title(); ?></span></h5>
														<p class="center fs14 italic" style="opacity: 0.5"><?php echo $material_byline; ?></p>
														<a href="/login" class="button-yellow">LOGIN TO ACCESS</a>
													</div> 
												</article>
											<?php }	?>				
											<?php } ?>		

									<?php } ?>	
								</div>
								<?php wp_reset_postdata(); ?>
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
