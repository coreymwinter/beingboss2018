<?php
/**
 * Template Name: Conference Agenda
 *
 * @package understrap
 */

get_header();
$container = get_theme_mod( 'understrap_container_type' );
$postid = get_the_ID();
?>
<!-- custom css -->
<style>

	.agendaheader .container {
		padding-top: 50px;
		padding-bottom: 50px;
	}

	.agendaheader .agendatitle {
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

	.tab {overflow: hidden;border-bottom: 1px solid #eaeaea;padding-bottom: 10px;}
	.tab button {
	  background-color: #eaeaea;
	  float: left;
	  border: none;
	  outline: none;
	  cursor: pointer;
	  padding: 14px 40px;
	  transition: 0.3s;
	  color: #252525;
	  margin-right: 10px;
	  font-family: brandon-grotesque, sans-serif;
	    font-style: normal;
	    font-size: 16px;
	    font-weight: 900;
	    text-transform: uppercase;
	}

	.tab button:hover {background-color: #ddd;}
	.tab button.active {background-color: #EC008C;color: #fff;}

	.tabcontent {
	  display: none;
	  padding: 6px 12px;
	  max-width: 900px;
	  margin: 0 auto;
	}

	.agenda-item {
		padding: 30px 0;
		border-bottom: 1px solid #eaeaea;
	}

	.agenda-item h3 {
		font-family: 'PT Serif', serif !important;
		font-size: 20px !important;
		text-transform: capitalize;
	}

	.agenda-host {max-width: 500px;margin: 10px -15px 10px -15px;}
	.agenda-host img.circle {width: 115px;height: 115px;}
	.agenda-host h5 {
		font-size: 16px; 
		text-transform: uppercase !important;
		font-family: brandon-grotesque, sans-serif;
	    font-weight: 900;}
	.agenda-host p {font-size: 14px !important; line-height: 1.3 !important;}

	.speaker-item {padding: 30px 0; border-bottom: 1px solid #eaeaea;}
	.speaker-item img.circle {width: 175px; height: 175px;}
	.speaker-item h5 {
		text-transform: uppercase;
		font-family: brandon-grotesque, sans-serif;
		font-weight: 900;
		font-size: 30px !important;
		margin-top: 30px;
	}
	.speaker-item h6 {
		text-transform: uppercase;
		font-family: brandon-grotesque, sans-serif;
		font-weight: 900;
		font-size: 18px !important;
	}
	.speaker-item ul.speaker-links,
	.speaker-item ul.speaker-sessions {
		list-style: none;
	    padding-inline-start: 20px;
	}
	.speaker-item ul.speaker-links li {
		padding-bottom: 0;
	}
	.speaker-item ul.speaker-sessions li {
	    display: table-row;
	}
	.speaker-item ul.speaker-sessions li:before {  
		content: "-";
	  	padding-right: 5px;
	  	display: table-cell;
	    text-align: right;
	}

	#footer-subscribe {display: none;}

	@media screen and (max-width: 767px) {
		.agendaheader .container {padding-top: 0px;padding-bottom: 0px;}
		.agendaheader .agendatitle {font-size: 46px !important;}
		.agendaheader img {width: 50px;}

		.tab button {
			width: 100%;
			float: none;
			display: table;
			margin: 0 auto 10px;
		}

		.agenda-item .col-md-3 p {
			text-align: center;
	    	font-weight: 600;
	    	font-size: 24px !important;
	    	margin-bottom: 25px;
	    	text-transform: uppercase !important;
	    	font-family: brandon-grotesque, sans-serif;
	    	font-weight: 900;
		}

		.agenda-host {margin: 10px -15px 30px -15px;}

		.agenda-host img.circle {width: 150px;height: 150px;}
		.agenda-host p {font-size: 16px !important;text-align: center;}
		.agenda-host h5 {font-size: 18px;text-align: center;}
	}

	@media screen and (min-width: 768px) and (max-width: 991px) {
		.agendaheader .agendatitle {font-size: 64px !important;}
		.tab button {
			padding: 10px 20px;
			font-size: 12px;
		}

		.speaker-item img.circle {width: 130px; height: 130px;}

	}

	@media screen and (min-width: 992px) and (max-width: 1200px) {
		.agendaheader .agendatitle {font-size: 72px !important;}

		.tab button {
			padding: 10px 25px;
			font-size: 14px;
		}
	}

</style>
<!-- custom css -->

<div class="wrapper" id="full-width-page-wrapper">

	<div class="agendaheader imagebackground" style="background-image: url('/wp-content/uploads/2020/03/Back_Laptop_5.jpg');">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 col-md-10 white offset-md-1 center"><img class="center" src="/wp-content/uploads/2020/03/Diamond_White.png" />
					<p class="agendatitle">Make Time<br />
					TO SHINE</p>
					<h2 class="padbot0 padtop0 fs22">A Virtual Conference by Being Boss<br />
					For Creative Business Owners</h2>
					<h2 class="padbot30 padtop15 fs22">April 19 - 21, 2020</h2>
					<a href="#tickets" class="button-yellow">GET TICKETS</a>
				</div>
			</div>
		</div>
	</div>

	<div class="container" id="content">
		
		<div class="row" style="margin: 0;">

			<div class="col-md-12 content-area" id="primary">

				<main class="site-main" id="main" role="main">

					<?php while ( have_posts() ) : the_post(); ?>

						<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

							<div class="entry-content pagesection80">
								<?php the_content(); ?>

								<div class="tab">
								  <button class="tablinks" onclick="openAgenda(event, 'Day1')" id="defaultOpen">Sunday, April 19</button>
								  <button class="tablinks" onclick="openAgenda(event, 'Day2')">Monday, April 20</button>
								  <button class="tablinks" onclick="openAgenda(event, 'Day3')">Tuesday, April 21</button>
								  <button class="tablinks" onclick="openAgenda(event, 'Speakers')">Speakers + Experts</button>
								</div>

								<div id="Day1" class="tabcontent">
								  <?php get_template_part( '/template-parts/conference-agenda-day1' ); ?>
								</div>

								<div id="Day2" class="tabcontent">
								  <?php get_template_part( '/template-parts/conference-agenda-day2' ); ?>
								</div>

								<div id="Day3" class="tabcontent">
								  <?php get_template_part( '/template-parts/conference-agenda-day3' ); ?>
								</div>

								<div id="Speakers" class="tabcontent">
								  <?php get_template_part( '/template-parts/conference-agenda-speakers' ); ?>
								</div>

							</div><!-- .entry-content -->

						</article><!-- #post-## -->

					<?php endwhile; // end of the loop. ?>

				</main><!-- #main -->

			</div><!-- #primary -->

		</div><!-- .row end -->

	</div><!-- Container end -->

	<div class="padbot50">
		<div class="container" style="max-width: 800px;">
			<div class="row"><div class="col"><h2 class="fs42 center padtop15">OUR SPONSORS</h2></div></div>
			<div class="row padtop15 padbot30 row-equal-height align-items-center">
			<div class="col-md-4 center"><a href="http://www.freshbooks.com/pages/beingboss" target="_blank" rel="noopener noreferrer"><img style="max-width: 300px; display: block; width: 100%; margin: 0 auto 15px;" src="/wp-content/uploads/2020/02/Freshbooks_Sponsor_White.jpg" /></a></div>
			<div class="col-md-4 center"><a href="https://podia.com/boss" target="_blank" rel="noopener noreferrer"><img style="max-width: 300px; display: block; width: 100%; margin: 0 auto 15px;" src="/wp-content/uploads/2020/02/Podia_Sponsor_White.jpg" /></a></div>
			<div class="col-md-4 center"><a href="https://shopgoodokc.com/" target="_blank" rel="noopener noreferrer"><img style="max-width: 300px; display: block; width: 100%; margin: 0 auto 15px;" src="/wp-content/uploads/2020/02/Shopgood-logo.jpg" /></a></div>
			</div>
		</div>
	</div>

	<div class="padbot50">
		<div class="container" style="max-width: 1000px;">
			<div class="row"><div class="col"><h2 class="fs42 center padtop15">OUR SWAG CONTRIBUTORS</h2></div></div>
			<div class="row padtop15 padbot30 row-equal-height align-items-center">
				<div class="col-md-2 offset-md-1 center"><a href="https://bandofweirdos.com" target="_blank" rel="noopener noreferrer"><img src="/wp-content/uploads/2020/04/BandOfWeirdos.jpg" /></a></div>
				<div class="col-md-2 center"><a href="https://www.aholmesartstudio.com" target="_blank" rel="noopener noreferrer"><img src="/wp-content/uploads/2020/04/AndreaHolmes.png" /></a></div>
				<div class="col-md-2 center"><a href="https://socialgranola.com" target="_blank" rel="noopener noreferrer"><img src="/wp-content/uploads/2020/04/SocialGranola.png" /></a></div>
				<div class="col-md-2 center"><a href="https://danessa-art.com" target="_blank" rel="noopener noreferrer"><img src="/wp-content/uploads/2020/04/Danessa.png" /></a></div>
				<div class="col-md-2 center"><a href="https://metalmarvels.com" target="_blank" rel="noopener noreferrer"><img src="/wp-content/uploads/2020/04/MetalMarvels.png" /></a></div>
			</div>
			<div class="row padtop15 padbot30 row-equal-height align-items-center">
				<div class="col-md-2 offset-md-1 center"><a href="https://www.freeperiodpress.com" target="_blank" rel="noopener noreferrer"><img src="/wp-content/uploads/2020/04/FreePeriodPress.png" /></a></div>
				<div class="col-md-2 center"><a href="https://www.chickencoopbotanicals.com" target="_blank" rel="noopener noreferrer"><img src="/wp-content/uploads/2020/04/ChickenCoop.png" /></a></div>
				<div class="col-md-2 center"><a href="https://www.shophawksanddoves.com" target="_blank" rel="noopener noreferrer"><img src="/wp-content/uploads/2020/04/HawksAndDoves.png" /></a></div>
				<div class="col-md-2 center"><a href="https://almanacsupplyco.com/" target="_blank" rel="noopener noreferrer"><img src="/wp-content/uploads/2020/04/AlmanacSupply.png" /></a></div>
				<div class="col-md-2 center"><a href="https://modernmysticshop.com" target="_blank" rel="noopener noreferrer"><img src="/wp-content/uploads/2020/04/ModernMystic.png" /></a></div>
			</div>
		</div>
	</div>

	<div class="imagebackground" style="background-image: url('/wp-content/uploads/2018/07/Header_BeingBossPodcast_Crop.jpg');">
		<div class="container pagesection50">
			<div class="row">
				<div class="col-lg-7 col-md-10 white">
					<h5 class="upper fs20" style="border-bottom: 1px solid #fff;max-width: 75%;padding-bottom: 7px;">Being Boss is Being In It Together</h5>
					<h2 class="fs50 padbot30 padtop30">Want More of the Being Boss Community?</h2>
					<p>Join our exclusive membership community for more conversations about what it takes to do the work and be boss as a creative small business owner. Two tiers are available to fit your needs.</p>
					<a href="/community" class="button-yellow alignleft">Learn More</a>
				</div>
			</div>
		</div>
	</div>

</div><!-- Wrapper end -->

<script>
	function openAgenda(evt, cityName) {
	  var i, tabcontent, tablinks;
	  tabcontent = document.getElementsByClassName("tabcontent");
	  for (i = 0; i < tabcontent.length; i++) {
	    tabcontent[i].style.display = "none";
	  }
	  tablinks = document.getElementsByClassName("tablinks");
	  for (i = 0; i < tablinks.length; i++) {
	    tablinks[i].className = tablinks[i].className.replace(" active", "");
	  }
	  document.getElementById(cityName).style.display = "block";
	  evt.currentTarget.className += " active";
	}

	// Get the element with id="defaultOpen" and click on it
	document.getElementById("defaultOpen").click();
</script>

<?php get_footer(); ?>
