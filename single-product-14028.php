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

<style>
	.single-product .btn-outline-primary {display: block;}
	.woocommerce tbody {background: transparent;}

	.woocommerce-product-gallery,
	.woocommerce-tabs,
	.product_meta,
	.woocommerce div.product form.cart div.quantity {display: none !important;}

	.woocommerce #content div.product div.summary, 
	.woocommerce div.product div.summary, 
	.woocommerce-page #content div.product div.summary, 
	.woocommerce-page div.product div.summary {
		float: none;
		width: 100%;
		max-width: 600px;
		display: block;
		margin: 0 auto;
	}

	.woocommerce div.product form.cart table {width: 100%;}
	.woocommerce tbody,
	.woocommerce tbody td {background: transparent; width: 100%; display: table;}

	.woocommerce tbody tr.product,
	.woocommerce tbody tr.product:nth-of-type(2) {
		display: inline-block;
	    width: 50%;
	    height: 125px;
	    margin: 0 auto;
	    float: left;
	    text-align: center;
	    position: relative;
	    padding: 0 5%;
	}

	.woocommerce tbody tr.product:nth-of-type(2) {float: right; border-left: 1px solid #eaeaea;}

	.woocommerce div.product form.cart .group_table td.woocommerce-grouped-product-list-item__quantity {
		display: table;
	    position: absolute;
	    bottom: 0;
	    left: 0;
	    right: 0;
	    width: 80%;
	    margin: 0 10%;
	}

	.single-product .btn-outline-primary {width: 100%;max-width: 100%;font-size: 16px;}

	.woocommerce div.product form.cart .group_table td.woocommerce-grouped-product-list-item__label,
	.woocommerce div.product form.cart .group_table td.woocommerce-grouped-product-list-item__price {
		display: table;
    	width: 100%;
    	background: transparent;
	}

	.woocommerce div.product form.cart .group_table td.woocommerce-grouped-product-list-item__label,
	.woocommerce div.product form.cart .variations label {
		font-family: brandon-grotesque, sans-serif;
	    font-style: normal;
	    font-size: 22px;
	    font-weight: 900;
	    text-transform: uppercase;
	}

	.woocommerce div.product form.cart .variations label {
		text-align: center;
		display: table;
    	margin: 0 auto;}

	.woocommerce div.product form.cart .group_table td.woocommerce-grouped-product-list-item__price {font-style: italic;}
	.woocommerce div.product p.price {display: none;}
	.woocommerce div.product .product_title {text-align: center; margin-bottom: 50px;}

	.woocommerce div.product form.cart .variations select {
		display: table;
    	margin-right: auto;
    	margin: 15px auto;
    	height: 40px;
	}

	.woocommerce div.product form.cart .reset_variations {display: none !important;}

	.variations_button button.btn-primary {
	    width: 100%;
    	max-width: 400px;
	    text-align: center;
	    border-radius: 10px;
	    font-family: brandon-grotesque, sans-serif;
	    font-size: 16px;
	    font-weight: 900;
	    padding: 10px 50px;
	    border: 0;
	    text-transform: uppercase;
	    -webkit-appearance: none;
	    -moz-appearance: none;
	    appearance: none;
	    background-color: #FFF200;
    	color: #252525;
    	margin: 0 auto;
	}

	.variations_button button.btn-primary:hover {
		background-color: #EC008C;
    	color: #fff;
	}

	.woocommerce div.product .single_variation_wrap span.price {
		font-family: brandon-grotesque, sans-serif;
	    font-size: 36px;
	    font-weight: 900;
	    color: #252525;
	    display: table;
	    margin: 15px auto 50px;
	}

	.woocommerce div.product form.bundle_form div.bundled_product_summary, 
	.woocommerce div.product.bundled_product_summary {
		display: table;
    	width: 100%;
	}

	div.bundled_product_summary:not(.thumbnail_hidden) .details {float: none;}

	.woocommerce div.product form.bundle_form .product_title {
		text-align: center;
		margin-bottom: 15px;
	}

	.woocommerce div.product form.bundle_form select {margin: 0 auto; max-width: 75%;}

	.single-product div.product .bundled_item_cart_details span.price {
		text-align: center;
		margin: 25px auto 0;
	}

	.woocommerce div.product form.bundle_form button.button {
	    text-align: center;
	    background-color: #FFF200;
    	color: #252525;
    	margin: 0 auto;
	    border-radius: 10px;
	    font-family: brandon-grotesque, sans-serif;
	    font-size: 16px;
	    font-weight: 900;
	    padding: 15px 50px;
	    border: 0;
	    text-transform: uppercase;
	    -webkit-appearance: none;
	    -moz-appearance: none;
	    appearance: none;
	    display: block;
	    float: none;
	    width: 100%;
    	max-width: 250px;
	}

	.woocommerce div.product form.bundle_form button.button:hover {
	    background-color: #EC008C;
    	color: #fff;
    }

	@media screen and (max-width: 767px) {
		.woocommerce tbody tr.product,
		.woocommerce tbody tr.product:nth-of-type(2) {
			display: table;
    		width: 100%;
    		margin: 0 auto 75px;
    		float: none;
    		border: none;
		}

		.woocommerce tbody tr.product:nth-of-type(2) {margin: 0 auto 25px;}
	}

</style>

<div class="wrapper single-product-14028" id="page-wrapper">

	<?php get_template_part( '/template-parts/bp-user-menu' ); ?>

	<div class="container pagesection50" id="content" tabindex="-1">

		<div class="row">

			<main class="site-main" id="main">

				<?php while ( have_posts() ) : the_post(); ?>

						<?php 

							wc_get_template_part( 'content', 'single-product' ); 
						?>

				<?php endwhile; // end of the loop. ?>

			</main><!-- #main -->

		</div><!-- .row -->

	</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
