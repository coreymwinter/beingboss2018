<?php
/**
 * The template for displaying all single posts.
 *
 * @package understrap
 */

get_header();
global $post;
?>

<style>
	.episode-transcript {display: none;}
</style>

<div class="wrapper" id="shownote-wrapper">

	<div class="container-fluid" id="content" tabindex="-1">

			<main class="site-main" id="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
							<?php $postid = get_the_ID(); ?>
							<?php $shownote_soundcloud = get_post_meta ( $postid, 'bbshownotes_soundcloud', true ); ?>
							<?php $shownote_quote = get_post_meta( $postid, 'bbshownotes_top_quote', true ); ?>
							<?php $shownote_quoteauthor = get_post_meta( $postid, 'bbshownotes_quote_author', true ); ?>
							<?php $shownote_quoteauthortwitter = get_post_meta( $postid, 'bbshownotes_quote_author_twitter', true ); ?>
							<?php $shownote_topics = get_post_meta( $postid, 'bbshownotes_topics', true ); ?>
							<?php $shownote_resources = get_post_meta( $postid, 'bbshownotes_resources', true ); ?>
							<?php $fullwidth_optin = get_post_meta( get_the_ID(), 'bbshownotes_optin_select', true ); ?>
							<?php $comment_prompt = get_post_meta( $postid, 'bbshownotes_comment_prompt', true ); ?>
							<?php $transcript = get_post_meta( $postid, 'bbshownotes_transcript', true ); ?>
						
						<div class="graysection">
							<div class="container">
								<div class="entry-intro">
									<div class="row row-eq-height align-items-center pagesection30">
										<div class="col-md-8 shownote_intro">
											<span class="shownote_date">
												<?php echo get_the_date(); ?>
											</span>
											<?php the_title( '<h1 class="shownote-title">', '</h1>' ); ?>
											<div class="shownote_description"><?php the_content(); ?></div>
										</div>
										<div class="col-md-4">
											<?php echo $shownote_soundcloud; ?>
										</div>
									</div>
								</div>
							</div>
						</div>

						<?php if ( !empty( $fullwidth_optin ) ) { ?>
							<div class="optinwrapper optin-id-<?php echo $fullwidth_optin; ?>">
								<div class="container">
									<div class="row row-eq-height align-items-center">
										<div class="col">
											<img class="center padbot5" src="/wp-content/themes/beingboss2018/img/Optin_Icon_White.png">
											<h3 class="center white padbot15 large">FREE RESOURCE: <?php echo get_the_title($fullwidth_optin); ?></h3>
											<?php echo apply_filters('the_content', get_post_field('post_content', $fullwidth_optin)); ?>
										</div>
<!-- 										<div class="col-lg-6">
											<h3 class="center white padbot0 large">ACCESS <u>ALL</u> OF OUR RESOURCES</h3>
											<p class="center white italic xxmedium">Free access to exclusive member-only<br />content - including worksheets,<br /> webinar replays, and more!</p>
											<a href="/materials" class="button-yellow">ACCESS NOW</a>
										</div> -->
									</div>
								</div>
							</div>
						<?php } ?>

						<?php get_template_part( '/template-parts/optinbar' ); ?>

						<div class="container">

							<?php if ( !empty( $shownote_quote ) ) { ?>
								<div class="row padtop80 padbot50">
									<div class="col-md-8 offset-md-2">
										<div class="shownote_quote">"<?php echo $shownote_quote; ?>"</div>
										<div class="shownote_quoteauthor">- <?php echo $shownote_quoteauthor; ?></div>
									</div>
								</div>
							<?php } ?>

							<div class="entry-content">
								<div class="row">
									<div class="col-md-8">

										<?php if ( !empty( $shownote_topics ) ) { ?>
											<h2>TOPICS DISCUSSED IN THIS EPISODE:</h2>
											<div class="shownote_topics"><?php echo $shownote_topics; ?></div>
										<?php } ?>		
										
										<?php if ( !empty( $shownote_resources ) ) { ?>
											<h3 class="gray">RESOURCES DISCUSSED IN THIS EPISODE</h3>
											<div class="shownote_resources"><?php echo $shownote_resources; ?></div>
										<?php } ?>	
										
										<?php $guestdetails = get_post_meta( get_the_ID(), 'bbshownotes_morefrom', true ); ?>
										
										<?php if ( !empty( $guestdetails ) ) { ?>
											<?php foreach ( (array) $guestdetails as $key => $entry ) {

													$guestname = $guestinfo = '';

													if ( isset( $entry['bbshownotes_guestname'] ) ) {
														$guestname = esc_html( $entry['bbshownotes_guestname'] );
													}

													if ( isset( $entry['bbshownotes_guestinfo'] ) ) {
														$guestinfo = wpautop( $entry['bbshownotes_guestinfo'] );
													}
												
													echo "<h3 class='gray'>MORE FROM ";
													echo $guestname;
													echo "</h3>";
													echo "<div class='shownote_guestinfo'>";
													echo $guestinfo;
													echo "</div>";
												} 
											?>
										<?php } ?>

										<div class="emilyandkathleen">

											<?php 
												$compare_date = strtotime( "2020-08-19" );
												$post_date = strtotime( "$post->post_date" );

												if ($compare_date > $post_date) { ?>

													<h3 class="gray">MORE FROM KATHLEEN</h3>
													<?php echo do_shortcode('[content_block slug=more-from-kathleen]'); ?>

											<?php } ?>
											
											<h3 class="gray">MORE FROM EMILY</h3>
											<?php echo do_shortcode('[content_block slug=more-from-emily]'); ?>
										</div>

										<?php if($transcript) { ?>
											<h2>Episode Transcript</h2>
											<div class="button-yellow transcript-link">Show Transcript</div>
											<div class="episode-transcript">
												<?php echo $transcript; ?>
											</div>
										<?php } ?>

										<?php $shownote_pinterest = get_post_meta( $postid, 'bbshownotes_pinitimages', true ); ?>
										<?php if ( !empty( $shownote_pinterest ) ) { ?>
											<h3 class="gray">PIN IT:</h3>
											<div class="shownote_pinit"><?php cmb2_bbshownotes_pinterest_images( 'bbshownotes_pinitimages', 'large' ); ?></div>
										<?php } ?>
										
									</div>
									<div class="col-md-4">
										<div class="shownote_sponsors">
											<?php 
												$sponsor_list = get_post_meta( get_the_ID(), 'bbshownotes_sponsor_select', true );

												if ( !empty( $sponsor_list ) ) {
													$sponsor_args = array(
															'post_type' => array( 'sponsors' ),
															'post__in' => $sponsor_list,
															'meta_key'   => 'bbsponsors_weight',
															'orderby'    => 'meta_value_num',
															'order'      => 'ASC'
													);
												
													$sponsor_query = new WP_Query( $sponsor_args );

												if ( $sponsor_query->have_posts() ) {
														echo "<h5 class='lightgray'>BROUGHT TO YOU BY:</h5>";
														while ( $sponsor_query->have_posts() ) {
															$sponsor_query->the_post();
												?>
																	<a href="<?php echo get_post_meta( $post->ID, 'bbsponsors_link', true ); ?>" target="_blank" rel="nofollow noopener noreferrer" class="<?php echo get_post_meta( $post->ID, 'bbsponsors_event', true ); ?>" onClick="ga('send', 'event', 'sponsor', 'Click', '<?php echo get_post_meta( $post->ID, 'bbsponsors_event', true ); ?>', '0');"><?php echo get_the_post_thumbnail( $post->ID ); ?></a>
												<?php		}
													} }
											?>
										</div>

										<div class="shownote_ceoday">
											<a href="https://courses.beingboss.club/" target="_blank"><img src="/wp-content/themes/beingboss2018/img/CEODAYKITAd300x500_New.png"></a>
										</div>
									</div>
								</div>

							</div><!-- .entry-content -->

						</div>

					</article><!-- #post-## -->

				<?php endwhile; // end of the loop. ?>
				<?php wp_reset_postdata(); ?>

				<div class="container">
					<div class="shownote_nav">
						<div class="previouslink"><?php previous_post_link('%link', '<< PREVIOUS EPISODE'); ?></div>
						<div class="nextlink"><?php next_post_link('%link', 'NEXT EPISODE >>'); ?></div>
					</div>
				</div>

				<footer class="entry-footer" style="background: #eaeaea;">
							<div class="container pagesection80">
								<h2 class="large center">YOU MAY ALSO LIKE</h2>
								<hr class="short">
							
							<?php
								// The Query
								
								$related_terms = get_the_terms($postid, 'related-resources');
								if ( $related_terms && !is_wp_error( $related_terms ) ) {
									$term_list = wp_list_pluck( $related_terms, 'slug' );
								
									$related_args = array(
											'post_type' => array( 'post', 'articles' ),
											'posts_per_page' => 3,
											'post__not_in' => array($post->ID),
											'orderby' => 'rand',
											'tax_query' => array(
												'relation' => 'OR',
												array(
													'taxonomy' => 'related-resources',
													'field'	   => 'slug',
													'terms'    => $term_list,
												),
												array(
													'taxonomy' => 'related-resources-articles',
													'field'	   => 'slug',
													'terms'    => $term_list,
												),
											),
									);
								
									$related_query = new WP_Query( $related_args );
								} else {
									$related_args = array(
											'post_type' => array( 'post' ),
											'posts_per_page' => 3,
											'post__not_in' => array($post->ID),
											'orderby' => 'rand',
									);
								
									$related_query = new WP_Query( $related_args );
								}

								// The Loop
								if ( $related_query->have_posts() ) {
									echo '<div class="relatedpostsection">';
									while ( $related_query->have_posts() ) {
										$related_query->the_post();
							?>
										<div class="relatedpostbox">
											<div class="relatedpostimage"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail('archive-thumb'); ?></a></div>
											<div class="relatedpostbottom">
												<img src="/wp-content/themes/beingboss2018/img/BBClubhouse_SecretEpisodes.png">
												<h5><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><span class="relatedposttitle"> <?php the_title(); ?></span></a></h5>
												<a href="<?php the_permalink(); ?>" class="relatedpostlistennow">READ MORE >></a>
											</div>
										</div>
							<?php
									}
									echo '</div>';
									/* Restore original Post Data */
									wp_reset_postdata();
								} else {
									// no posts found
								}
							?>
							</div>

						</footer><!-- .entry-footer -->

			</main><!-- #main -->

	</div><!-- Container end -->

</div><!-- Wrapper end -->

<script>
	jQuery(document).ready(function(){
	    jQuery('.transcript-link').click(function(event) {
	        jQuery('.episode-transcript').is(":visible")?jQuery(this).text("Show Transcript"):jQuery(this).text("Hide Transcript");       
	        jQuery('.episode-transcript').toggle('show');
	    });
	});
</script>

<?php get_footer(); ?>
