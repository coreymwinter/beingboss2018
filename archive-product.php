<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package understrap
 * @version 3.4.0
 */

get_header();

?>


<div class="wrapper" id="full-width-page-wrapper" style="padding: 0px 0;">

	<div class="container product-archive" id="content" tabindex="-1">

		<div class="row">

			<div class="col">

			<main class="site-main" id="main">

				<header class="entry-header" style="padding-top: 30px;">
					<div class="row">
						<div class="col">
							<ul class="shopmenu">
								<li><a href="#courses">COURSES</a></li>
								<li><a href="#masterclasses">MASTERCLASSES</a></li>
								<li><a href="#books">BOOKS</a></li>
								<li><a href="#tools">TOOLS</a></li>
							</ul>
						</div>
					</div>
				</header><!-- .entry-header -->


				<div class="pagesection50">
					<h2 id="courses">COURSES</h2>
					<div class="row">
						<div class="col-md-6">
							<div class="archive-product">
								<a href="https://courses.beingboss.club">
									<span class="product-image">
										<img src="/wp-content/themes/beingboss2018/img/Shop_CEODAYKit.jpg">
									</span>
									<span class="product-meta">
										<span class="product-title">CEO DAY KIT</span>
										<span class="product-price">$279</span>
									</span>
								</a>
							</div>
						</div>
						<div class="col-md-6">
							<div class="archive-product">
								<a href="https://podcastlikeaboss.com" target="_blank">
									<span class="product-image">
										<img src="/wp-content/themes/beingboss2018/img/Shop_PLAB.jpg">
									</span>
									<span class="product-meta">
										<span class="product-title">PODCAST LIKE A BOSS</span>
										<span class="product-price">$219</span>
									</span>
								</a>
							</div>
						</div>
					</div>


					<h2 id="masterclasses" class="padtop50">MASTERCLASSES</h2>
					<div class="masterclasscontainer">

						<?php 
							$masterclasses_args = array(
								'post_type' => array( 'product' ),
								'tax_query' => array(
									array(
										'taxonomy' => 'product_cat',
										'field'    => 'slug',
										'terms'    => 'masterclass',
									),
								),
								'orderby'        => 'title',
								'order'			=> 'ASC',
							);

							$masterclass_query = new WP_Query( $masterclasses_args );

							if ( $masterclass_query->have_posts() ) { ?>
								<?php while ($masterclass_query->have_posts()) {
									$masterclass_query->the_post(); 
									$masterclassid = get_the_ID();
								?>
									<div class="masterclassitem" id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
										<a href="<?php the_permalink(); ?>">
											<span class="masterclass-image">
												<?php the_post_thumbnail('archive-thumb'); ?>
											</span>
											<span class="masterclass-meta">
												<span class="masterclass-title"><?php the_title(); ?></span>
												<span class="masterclass-price">$<?php echo $product->get_regular_price(); ?></span>
											</span> 
										</a>
									</div>														
								<?php } ?>

							<?php } ?>	

					</div> <!-- masterclasscontainer -->
					<?php wp_reset_postdata(); ?>


					<h2 id="books" class="padtop50 padbot5">BOOKS</h2>
					<p class="helvetica fs14">ALL FOLLOWING LINKS ARE AMAZON AFFILIATE LINKS</p>
					<div class="bookscontainer">

						<?php 
							$books_args = array(
								'post_type' => array( 'affiliates' ),
								'tax_query' => array(
									array(
										'taxonomy' => 'affiliatecategories',
										'field'    => 'slug',
										'terms'    => 'book',
									),
								),
								'meta_key'   => 'bbaffiliates_weight',
								'orderby'    => 'meta_value_num',
								'order'      => 'ASC'
							);

							$books_query = new WP_Query( $books_args );

							if ( $books_query->have_posts() ) { ?>
								<?php while ($books_query->have_posts()) {
									$books_query->the_post(); 
									$bookid = get_the_ID();
									$booklink = get_post_meta( $bookid, 'bbaffiliates_link', true );
								?>
									<div class="bookitem" id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
										<a href="<?php echo $booklink; ?>" target="_blank">
											<span class="book-image">
												<?php the_post_thumbnail('archive-thumb'); ?>
											</span>
											<span class="book-meta">
												<span class="book-title"><?php the_title(); ?></span>
											</span> 
										</a>
									</div>														
								<?php } ?>

							<?php } ?>	

					</div> <!-- bookscontainer -->
					<?php wp_reset_postdata(); ?>


					<h2 id="tools" class="padtop50 padbot5">TOOLS</h2>
					<p class="helvetica fs14 upper">All following links may include affiliate links or sponsorship partners. We only endorse products we actually use and love – and when you use our links it shows your support for our podcast and free resources! Thanks!</p>
					<div class="toolscontainer">

						<?php 
							$tools_args = array(
								'post_type' => array( 'affiliates' ),
								'tax_query' => array(
									array(
										'taxonomy' => 'affiliatecategories',
										'field'    => 'slug',
										'terms'    => 'tool',
									),
								),
								'meta_key'   => 'bbaffiliates_weight',
								'orderby'    => 'meta_value_num',
								'order'      => 'ASC'
							);

							$tools_query = new WP_Query( $tools_args );

							if ( $tools_query->have_posts() ) { ?>
								<?php while ($tools_query->have_posts()) {
									$tools_query->the_post(); 
									$toolid = get_the_ID();
									$toollink = get_post_meta( $toolid, 'bbaffiliates_link', true );
								?>
									<div class="toolitem" id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
										<a href="<?php echo $toollink; ?>" target="_blank">
											<span class="tool-image">
												<?php the_post_thumbnail('archive-thumb'); ?>
											</span>
											<span class="tool-meta">
												<span class="tool-title"><?php the_title(); ?></span>
											</span> 
										</a>
									</div>														
								<?php } ?>

							<?php } ?>	

					</div> <!-- toolscontainer -->
					<?php wp_reset_postdata(); ?>

				</div><!-- pagesection -->

			</main><!-- #main -->

			</div>

		</div><!-- #primary -->

	</div> <!-- .row -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
