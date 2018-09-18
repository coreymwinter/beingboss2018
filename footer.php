<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */

$the_theme = wp_get_theme();
$container = get_theme_mod( 'understrap_container_type' );
?>

<?php get_sidebar( 'footerfull' ); ?>

<?php if (! get_post_meta( get_the_ID(), 'bbpage_hide_subscribe', 1 ) )  : ?>
	<div class="wrapper" id="footer-subscribe">

		<div class="<?php echo esc_attr( $container ); ?>">

			<div class="row">

				<div class="col-md-5 footer-subscribe-left">

					<img src="/wp-content/themes/beingboss2018/img/Footer_HeadphonesBoss2.png">

				</div><!--col end -->
				<div class="col-md-7 footer-subscribe-right">
					<div class="pagesection">
						<p class="brandon large">CREATIVE + ENTREPRENEUR</p>
						<p class="xmedium italic">Get the scoop on how to be more boss.</p>
						<form action="https://www.getdrip.com/forms/458596298/submissions" method="post" data-drip-embedded-form="458596298" class="fullwidthform">
						  <div data-drip-attribute="description"></div>
						    <div>
						        <input type="text" id="drip-Name" name="fields[Name]" value="" placeholder="name" />
						    </div>
						    <div>
						        <input type="email" id="drip-email" name="fields[email]" value="" placeholder="email address" />
						    </div>
						  <div>
						    <input type="submit" class="button" value="SUBMIT" data-drip-attribute="sign-up-button" />
						  </div>
						</form>
						<p class="center small padtop15">Subscribing indicates your consent to our <a href="/terms" target="_blank" class="blacklink underline">Terms of Use</a> &amp; <a href="/privacy" target="_blank" class="blacklink underline">Privacy Policy.</a></p>
					</div>
				</div><!--col end -->

			</div><!-- row end -->

		</div><!-- container end -->

	</div><!-- pagesection end -->
	
	<footer class="wrapper" id="wrapper-footer">
	
	<?php else: ?>
		<footer class="wrapper" id="wrapper-footer">
		
<?php endif; ?>


	<div class="<?php echo esc_attr( $container ); ?>">

		<div class="row">

			<div class="col-md-4">
				<div class="row">
					<div class="col-sm-4">
						<?php if ( dynamic_sidebar('footer_menu_1') ) : else : endif; ?>
					</div>
					<div class="col-sm-4">
						<?php if ( dynamic_sidebar('footer_menu_2') ) : else : endif; ?>
					</div>
					<div class="col-sm-4">
						<?php if ( dynamic_sidebar('footer_menu_3') ) : else : endif; ?>
					</div>
				</div>
			</div>
			<div class="col-md-8">
			</div>

		</div><!-- row end -->
		<div class="row bottom-row">

			<div class="col-md-4">
				<div class="row" id="footer-social">
					<div class="col-sm-6">
						<h3>LISTEN</h3>
						<ul style="font-size: 24px;">
							<li><a href="https://itunes.apple.com/us/artist/being-boss/1359403924" target="_blank"><i class="fab fa-apple"></i></a></li>
							<li><a href="https://play.google.com/music/listen?u=0#/ps/Ijagnvf6ruqcxffbhnjxmxl52zy" target="_blank"><i class="fab fa-google-play"></i></a></li>
							<li><a href="https://soundcloud.com/beingboss" target="_blank"><i class="fab fa-soundcloud"></i></a></li>
						</ul>
					</div>
					<div class="col-sm-6">
						<h3>FOLLOW</h3>
						<ul style="font-size: 24px;">
							<li><a href="https://www.instagram.com/beingbossclub/" target="_blank"><i class="fab fa-instagram"></i></a></li>
							<li><a href="https://twitter.com/beingbossclub" target="_blank"><i class="fab fa-twitter"></i></a></li>
							<li><a href="https://www.facebook.com/beingbossclub/" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
							<li><a href="https://www.pinterest.com/beingboss/" target="_blank"><i class="fab fa-pinterest"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-md-3">
				
			</div>
			<div class="col-md-5">
				<div class="site-info">
					<?php if ( dynamic_sidebar('footer_copyright') ) : else : endif; ?>
				</div><!-- .site-info -->
			</div>

		</div><!-- row end -->

	</div><!-- container end -->

</div><!-- wrapper end -->

</div><!-- #page we need this extra closing tag here -->




<?php wp_footer(); ?>

<?php $pagescripts = get_post_meta( get_the_ID(), 'bbpage_footer_scripts', true );

	if (! empty($pagescripts) ) { 
		echo $pagescripts;
	} 
?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/iScroll/5.1.3/iscroll.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/js/bootstrap.min.js"></script>
<script src="/wp-content/themes/beingboss2018/drawer/drawer.min.js" charset="utf-8"></script>
<script>
    jQuery(document).ready(function() {
        jQuery('.drawer').drawer();
    });
</script>
<!-- Drip -->
<script type="text/javascript">
  var _dcq = _dcq || [];
  var _dcs = _dcs || {};
  _dcs.account = '5427386';

  (function() {
    var dc = document.createElement('script');
    dc.type = 'text/javascript'; dc.async = true;
    dc.src = '//tag.getdrip.com/5427386.js';
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(dc, s);
  })();
</script>
<!-- end Drip -->
<script>
		window.onload = onPageLoad();
		function onPageLoad() {
		  // document.getElementById("wcdrip_subscribe").checked = true;
		  jQuery("input[name=wcdrip_subscribe]").attr('checked', true); // Deprecated
		  jQuery("input[name=wcdrip_subscribe]").prop('checked', true);
		}
	</script>
<script>
	jQuery(document).ready(function(){
	  jQuery(window).bind('scroll', function() {
	    var distance = 50;
	    if (jQuery(window).scrollTop() > distance) {
	      jQuery('.bg-light').addClass('scrolled');
	      jQuery('.navbar-brand').addClass('blacklogo');
	    }
	    else {
	      jQuery('.bg-light').removeClass('scrolled');
	      jQuery('.navbar-brand').removeClass('blacklogo');
	    }
	  });
	});
</script>
</body>

</html>

