<?php
/**
 * The template for displaying all single product posts.
 *
 * @package understrap
 * @version 1.6.4
 */

get_header();
$product = get_the_ID();
?>

<?php if ( is_product() && has_term( 'Ticket', 'product_cat' ) ) { ?>
    <style>
    	.cart .quantity {
    		display: inline-block !important;
    		width: 15%;
    	}
    	.woocommerce .quantity .qty {height: 41px;width: 100%;}
    	.cart .btn {
    		display: inline-block !important;
    		margin-top: -5px !important;
    	    padding: 10px 0 !important;
    		margin: 0 5%;
    	    width: 70%;
    		max-width: 70%;
    	}

    	.woocommerce-tabs {display: none;}

    	@media screen and (max-width: 767px) {
    		.cart .quantity {
			    display: table !important;
			    width: 15%;
			    margin: 15px auto !important;
			}

			.cart .btn {
				display: table !important;
    			margin: 0 auto !important;
			}
    	}
    </style>
<?php } ?>

<div class="wrapper single-product" id="page-wrapper">

	<?php get_template_part( '/template-parts/bp-user-menu' ); ?>

	<div class="container pagesection50" id="content" tabindex="-1">

		<div class="row">

			<main class="site-main" id="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php if ( has_term( 'Masterclass', 'product_cat' ) ) { ?>

						<div class="row padbot50">
							<div class="col-md-6 padbot50">
								<?php if ( has_post_thumbnail() ) : ?>
									<?php the_post_thumbnail('full'); ?>
								<?php endif; ?>
							</div>
							<div class="col-md-6 colextrapadding">
								<div class="row padbot30">
									<div class="col-sm-9"><h1 class="mobilecenter"><?php the_title(); ?></h1></div>
									<div class="col-sm-3">
										<p class="right brandon fs32 lightgray mobilecenter">$<?php echo $product->get_regular_price(); ?></p>
									</div>
								</div>
								<div class="padbot50">
									<?php the_content(); ?>
									<div class="row padtop30 align-items-center">
										<div class="col-sm-2 offset-sm-2">
											<p class="right brandon fs32 lightgray mobilecenter">$<?php echo $product->get_regular_price(); ?></p>
										</div>
										<div class="col-sm-8">
											<?php woocommerce_simple_add_to_cart(); ?>
										</div>
									</div>
									<div class="row padtop50">
										<div class="col">
											<?php if (is_single(12823)) { ?>
												<p class="center">Need more help with Opt-Ins? <a href="/product/opt-in-upgrades-masterclass">Check out our Opt-Ins and Upgrades Masterclass.</a></p>
											<?php } elseif (is_single(12821)) { ?>
												<p class="center">Looking for more help on overall Email Marketing? <a href="/product/email-marketing-masterclass">Check out our Email Marketing Masterclass.</a></p>
											<?php } else {} ?>
										</div>
									</div>
								</div>
							</div>
						</div>

					<?php } else { ?>

						<?php wc_get_template_part( 'content', 'single-product' ); ?>

					<?php } ?>

				<?php endwhile; // end of the loop. ?>

			</main><!-- #main -->

		</div><!-- .row -->

	</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
