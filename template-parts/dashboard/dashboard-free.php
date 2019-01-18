<?php
	$user = wp_get_current_user();
	$user_ID = $user->ID;	
	$user_name = $user->user_login;	
?>

<div class="row">
	<div class="col-md-4">
		<?php get_template_part( '/template-parts/dashboard/parts/notices' ); ?>

	</div>

	<div class="col-md-8">

		<div class="dashboard-widget user-orders padbot30">
			<h3>YOUR ORDERS</h3>
			<?php get_template_part( '/template-parts/dashboard/parts/myorders' ); ?>
			<a href="/members/<?php echo $user_name ?>/shop/" class="button">MANAGE MY ACCOUNT</a>
		</div>

		<div class="dashboard-widget padbot30">
			<h3>PURCHASED MATERIAL</h3>
			<p class="center padtop30">What?! You haven't purchased any material yet.</p>
			<p class="center">Just purchase something but it's not showing here? Don't worry. It can take a minute or two to show up!</p>
			<a href="/materials" class="button">SHOP ALL MATERIAL</a>
		</div>

		<?php get_template_part( '/template-parts/dashboard/parts/freematerial' ); ?>

	</div>
</div>