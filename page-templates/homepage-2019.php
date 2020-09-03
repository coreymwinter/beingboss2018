<?php
/**
 * Template Name: Home - 2019
 *
 *
 * @package understrap
 */
get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>

<style>
	#home-wrapper .headersection {background-image: url('/wp-content/uploads/2020/08/Background_Magic_1.jpg'); padding-top: 75px;}

	#home-wrapper .headersection a.home-header-link {background: transparent; z-index: 1000;}

	#home-wrapper .headersection .headertext .button-yellow {margin: 25px auto auto;}

	h1 {
		font-family: lust, serif;
	    font-weight: 400;
	    font-size: 100px !important;
	    line-height: 1.2 !important;
	    text-transform: uppercase;
		font-style: italic !important;
		color: #fff;
		padding-bottom: 0px !important;
	    padding-top: 15px !important;
	}

	.lusthighlight {
		font-family: lustscript, serif;
	    font-weight: 300;    
		font-size: 26px !important;
	    line-height: 32px !important;
	    text-transform: lowercase;
	    font-style: italic !important;
	}

	.gatheringimage {
		position: absolute;
	    left: 15%;
	    transform: rotate(-10deg);
	    top: 0;
	}

	@media screen and (max-width: 767px) {
		.gatheringimage {
			left: 0;
			top: 50px;
			width: 90%;
		}
	}
	@media screen and (max-width: 598px) {
		.gatheringimage {top: 50px;}
		#home-wrapper .headersection img {max-width: 100%;}
	}
	@media screen and (min-width: 768px) and (max-width: 991px) {.gatheringimage {left: 1%;width: 70%;top: 15px;}}
	@media screen and (min-width: 992px) and (max-width: 1149px) {.gatheringimage {left: 1%;width: 65%;}}
	@media screen and (min-width: 1150px) and (max-width: 1500px) {.gatheringimage {left: 5%;}}

	@media screen and (min-width: 992px) and (max-width: 1199px) {.fs100 {font-size: 84px !important;}}
	@media screen and (min-width: 768px) and (max-width: 991px) {.fs100 {font-size: 72px !important;}}
	@media screen and (max-width: 767px) {.fs100 {font-size: 64px !important;}}
	@media screen and (max-width: 500px) {.fs100 {font-size: 46px !important; margin-bottom: 15px;}}
</style>

<div class="wrapper" id="home-wrapper">

	<div class="container-fluid" id="content">

		<div class="row" style="margin: 0;">

			<div class="col-md-12 content-area" id="primary">

				<main class="site-main" id="main" role="main">

					<?php while ( have_posts() ) : the_post(); ?>

						<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

							<header class="entry-header">

								<!-- <div class="imagebackground" style="background-image: url('/wp-content/uploads/2020/03/Back_Laptop_5.jpg');">
									<div class="container pagesection80">
										<div class="row">
											<div class="col-lg-8 offset-lg-2 col-md-10 white offset-md-1 center">
												<img class="center mobilehide" src="/wp-content/uploads/2020/03/Diamond_White.png" style="margin: 0 auto;">
												<img class="center mobileshow" src="/wp-content/uploads/2020/03/Diamond_White.png" style="width: 50px; margin: 0 auto;">
												<p class="white fs100 mfs46 bold italic lust upper padbot0 padtop15">Make Time<br>
												TO SHINE</p>
												<h2 class="padbot0 padtop15 fs22 mfs18">A Virtual Conference by Being Boss<br>
												For Creative Business Owners</h2>
												<h2 class="padbot30 padtop15 fs22 mfs18">April 19 – 21, 2020</h2>
												<p><a href="/conference" class="button-yellow">GET TICKETS</a></p>
											</div>
										</div>
									</div>
								</div> -->

								<!-- <div class="headersection">
									<a class="home-header-link" href="/community"></a>
									<div class="container">
										<div class="headertext">
											<div class="row align-items-center">
												<div class="col-md-12">
													<a href="/community">
														<p class="brandon giant white upper">Being Boss is<br />Being In it Together</p>

														<p class="white medium brandon mobilehide">Join a community of BUSINESS OWNERS CREATIVES,<br /> + ENTREPRENEURS who are committed to<br />making money doing work they love.</p>

														<p class="white brandon fs16 mobileshow">Join a community of BUSINESS OWNERS CREATIVES, + ENTREPRENEURS who are committed to making money doing work they love.</p>
													</a>
													<a class="button-yellow" href="/community">JOIN THE COMMUNITY >></a>
												</div>
											</div>
										</div>
									</div>
								</div> -->

								<div class="headersection">
									<a class="home-header-link" href="/gathering"></a>
									<div class="container">
										<img class="gatheringimage" src="/wp-content/uploads/2020/08/Gathering_Gathering.png">
										<div class="headertext">
											<div class="row">
												<div class="col-lg-8 offset-lg-2 col-md-10 white offset-md-1 center">
													<h1 class="fs100">Guided by<br>Intuition</h1>
													<h2 class="padbot0 padtop0 fs22"><span class="lusthighlight">a</span> Virtual Event <span class="lusthighlight">for</span> Creative Business Owners<br>
													<span class="lusthighlight">with</span> Woo Woo Vibes</h2>
													<h2 class="padbot30 padtop15 fs22">· October 8 – 10, 2020 ·</h2>
													<p><a href="/gathering" class="button-yellow">GET TICKETS</a></p>
												</div>
											</div>
										</div>
									</div>
								</div>

							</header><!-- .entry-header -->

							<div class="entry-content">

								<?php the_content(); ?>
								<div class="container">
									<div class="twmsection">
										<?php
												$query_args = array(
														'post_type' => array( 'homeposts' ),
														'posts_per_page' => 3,
														'meta_key'   => 'bbhome_order',
														'orderby'    => 'meta_value_num',
														'order'      => 'ASC'
												);
											
												$home_query = new WP_Query( $query_args );
											if ( $home_query->have_posts() ) {
												while ( $home_query->have_posts() ) {
													$home_query->the_post();
													$post_link = get_post_meta( get_the_ID(), 'bbhome_link', true );
													$post_top_label = get_post_meta( get_the_ID(), 'bbhome_top_label', true );
													$post_link_label = get_post_meta( get_the_ID(), 'bbhome_link_label', true );
													$post_description = get_post_meta( get_the_ID(), 'bbhome_description', true );
										?>
													<div class="twmpostbox">
														<div class="twmpostimage">
															<a href="<?php echo $post_link; ?>" target="_blank" title="<?php the_title(); ?>">
																<span class="twmposticon"><?php echo get_the_post_thumbnail( get_the_ID(), 'full' ); ?></span>
															</a>
														</div>
														<div class="twmpostbottom">
															<h5>
																<a href="<?php echo $post_link; ?>" target="_blank" title="<?php the_title(); ?>">
																	<span class="twmposttitle"> <?php the_title(); ?></span>
																</a>
															</h5>
															<a href="<?php echo $post_link; ?>" target="_blank" class="twmpostdescription"><p><?php echo $post_description; ?></p></a>
															<a href="<?php echo $post_link; ?>" target="_blank" class="twmpostlistennow"><?php echo $post_link_label; ?></a>
														</div>
													</div>
										<?php
												}
												/* Restore original Post Data */
												wp_reset_postdata();
											} else {
												// no posts found
											}
										?>

									</div>
									<p class="featuredon" style="padding-top: 50px;">AS FEATURED ON: <img class="aligncenter wp-image-3927 size-full" src="/wp-content/uploads/2017/11/Press_FeaturedLogos.png" alt="" width="974" height="124"></p>
									<h2 class="center xlarge" style="padding-top: 80px;">LISTEN TO OUR PODCASTS</h2>
									<hr class="even">
									<div class="container" id="homepodcasts">
										<div class="padtop15 padbot30">
											<div class="row">
												<div class="col-md-3">
													<a href="/podcast">
														<img src="/wp-content/uploads/2020/09/iTunesAvatar_2020_500.jpg">
														<h3>Being Boss</h3>
														<p><?php echo do_shortcode('[bb-main-count]'); ?></p>
													</a>
												</div>
												<div class="col-md-3">
													<a href="/10minutes">
														<img src="/wp-content/uploads/2020/04/iTunesAvatar_Minisodes_2020_500.jpg">
														<h3>:10 Minutes to Being Boss</h3>
														<p><?php echo do_shortcode('[bb-10minutes-count]'); ?></p>
													</a>
												</div>
												<div class="col-md-3">
													<a href="/making-a-business">
														<img src="/wp-content/themes/beingboss2018/img/MakingABiz_Avatar_2.jpg">
														<h3>Making a Business</h3>
														<p><?php echo do_shortcode('[bb-mab-count]'); ?></p>
													</a>
												</div>
												<div class="col-md-3">
													<a href="/minisodes">
														<img src="/wp-content/uploads/2020/08/BB-Minisodes-Avatar.jpg">
														<h3>Being Boss Minisodes</h3>
														<p><?php echo do_shortcode('[bb-minisodes-count]'); ?></p>
													</a>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="imagebackground" style="background-image: url('/wp-content/uploads/2018/02/Back_Smoke_1.jpg'); margin-top: 75px;">
									<div class="container">
										<div class="capsule pagesection50">
											<p class="lustscript white fs50 center">Being Boss is owning who you are,<br />knowing what you want,<br />and actually making it happen.</p>
										</div>
									</div>
								</div>
								<div class="container pagesection80">
									<div class="discoversection">
										<div class="capsule pagesection50">
											<div class="row">
												<div class="col-lg-5">
													<div style="display: table; margin: -100px auto 50px;"><img src="/wp-content/uploads/2020/01/StartHere_TimeManagement.jpg" style="box-shadow: 0px 0px 15px #888;"></div>
													<p class="brandon large italic">"It's a reframe of mindset. You do have enough time."</p><p class="right brandon smallmedium">- Emily Thompson</p></div>
												<div class="col-lg-7">
													<h3 class="xxmedium">PODCAST EPISODES</h3>
													<div class="episodelist padbot30">
														<div class="episodeitem"><div class="itemleft podcast"></div><div class="itemright"><a href="/podcast/boundaries" target="_blank">EPISODE #214 // Boundaries</a></div></div>
														<div class="episodeitem"><div class="itemleft podcast"></div><div class="itemright"><a href="/podcast/boundaries" target="_blank">EPISODE #209 // Rest for Productivity</a></div></div>
														<div class="episodeitem"><div class="itemleft podcast"></div><div class="itemright"><a href="/podcast/episode-156-design-thinking-jeremy-bailey" target="_blank">EPISODE #156 // Design Thinking with Jeremy Bailey</a></div></div>
														<div class="episodeitem"><div class="itemleft podcast"></div><div class="itemright"><a href="/10minutes/minisode-time-management" target="_blank">10 MINUTES // Time Management for Creative Entrepreneurs</a></div></div>
														<div class="episodeitem"><div class="itemleft podcast"></div><div class="itemright"><a href="/10minutes/minisode-devote-time-to-side-hustle" target="_blank">10 MINUTES // How to Devote Time To Your Side Hustle</a></div></div>
														<div class="episodeitem"><div class="itemleft podcast"></div><div class="itemright"><a href="/10minutes/minisode-scheduling-white-space" target="_blank">10 MINUTES // Scheduling White Space</a></div></div>
													</div>
													<h3 class="xxmedium">ARTICLES</h3>
													<div class="episodelist">
														<div class="episodeitem"><div class="itemleft article"></div><div class="itemright"><a href="/articles/do-the-work-post-it-note-method" target="_blank">Post-It Note Method</a></div></div>
														<div class="episodeitem"><div class="itemleft article"></div><div class="itemright"><a href="/articles/become-boss-of-your-time" target="_blank">5 Ways to Become a Boss of Your Own Time</a></div></div>
														<div class="episodeitem"><div class="itemleft article"></div><div class="itemright"><a href="/articles/time-tracking-know-youre" target="_blank">Time Tracking: Know What You’re Doing</a></div></div>
													</div>
												</div>
											</div>
										</div>
										<div class="discoversubscribe">
											<div class="capsule">
												<div class="row">
													<div class="col-lg-5"><h3 class="xxmedium">FREE TIME MANAGEMENT<br />TRAINING FOR BOSSES</h3></div>
													<div class="col-lg-7"><div style="margin: 20px auto;"><?php echo do_shortcode('[content_block id=13751]'); ?></div></div>
												</div>
											</div>
										</div>
									</div>
									<div style="display: table; text-align: right; width: 100%;"><a class="carousel_link right" href="/resources">VIEW ALL RESOURCES >></a></div>
							</div>
							</div><!-- .entry-content -->

						</article><!-- #post-## -->				

					<?php endwhile; // end of the loop. ?>

				</main><!-- #main -->

			</div><!-- #primary -->

		</div><!-- .row end -->

	</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>