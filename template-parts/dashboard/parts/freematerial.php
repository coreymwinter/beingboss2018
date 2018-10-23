<div class="dashboard-widget">
	<h3 class="padbot30">FREE MATERIAL</h3>
	<?php 
		$material_args = array(
			'post_type' => array( 'library' ),
			'tax_query' => array(
				array(
					'taxonomy' => 'librarytype',
					'field'    => 'slug',
					'terms'    => 'club-free',
				),
			),
			'posts_per_page' => 2,
			'orderby'        => 'rand',
		);
	
		$material_query = new WP_Query( $material_args );

		if ( $material_query->have_posts() ) { ?>
			<div class="row">
			
				<?php while ($material_query->have_posts() ) {
					$material_query->the_post(); 
					$materialid = get_the_ID();
					$material_link = get_post_meta( $materialid, 'bblibrary_download_link', true );
					$material_byline = get_post_meta( $materialid, 'bblibrary_byline', true );
				?>
				<div class="col-md-6">
					<div class="dashboard-widget">
						<article class="widget-wrapper" id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
							<h5 class="center"><a href="<?php echo $material_link; ?>" class="blacklink" title="<?php the_title(); ?>" target="_blank"><span class="archiveitemtitle"> <?php the_title(); ?></span></a></h5>
							<p class="center fs14 italic"><?php echo $material_byline; ?></p>
						</article>
					</div>	
				</div>						
				<?php } ?>
				
			</div>

		<?php } ?>	

	<?php wp_reset_postdata(); ?>
</div>