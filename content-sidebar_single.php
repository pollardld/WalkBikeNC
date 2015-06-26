<aside class="span3 leftnav page-icon">
	
	<div class="span7">
		
	<?php
		
		if ( $post_type === 'safety_post' ) : 
		
			$page = get_page_by_title( 'Safety' );
			echo '<a href="' . get_permalink( $page->ID ) . '">' . get_the_post_thumbnail( $page->ID, 'featured-image' );
			echo '<a href="' . get_permalink( $page->ID ) . '"><h4>Safety</h4></a>';
		
		elseif ( $post_type === 'health_post' ) :
		
			$page = get_page_by_title( 'Health' );
			echo '<a href="' . get_permalink( $page->ID ) . '">' . get_the_post_thumbnail( $page->ID, 'featured-image' );
			echo '<a href="' . get_permalink( $page->ID ) . '"><h4>Health</h4></a>';
		
		elseif ( $post_type === 'environment_post' ) :
		
			$page = get_page_by_title( 'Environment' );
			echo '<a href="' . get_permalink( $page->ID ) . '">' . get_the_post_thumbnail( $page->ID, 'featured-image' );
			echo '<a href="' . get_permalink( $page->ID ) . '"><h4>Environment</h4></a>';
		
		elseif ( $post_type === 'economy_post' ) :
		
			$page = get_page_by_title( 'Economy' );
			echo '<a href="' . get_permalink( $page->ID ) . '">' . get_the_post_thumbnail( $page->ID, 'featured-image' );
			echo '<a href="' . get_permalink( $page->ID ) . '"><h4>Economy</h4></a>';
		
		elseif ( $post_type === 'mobility_post' ) :
		
			$page = get_page_by_title( 'Mobility' );
			echo '<a href="' . get_permalink( $page->ID ) . '">' . get_the_post_thumbnail( $page->ID, 'featured-image' );
			echo '<a href="' . get_permalink( $page->ID ) . '"><h4>Mobility</h4></a>';
		
		else : 
		
			echo '<a href="' . get_permalink( $page->ID ) . '"><h4>' . $page->title . '</h4></a>';

		endif; ?>
	

	</div>

	<div class="span10">

		<button id="showMenu"></button>

		<?php
			
		if ( $post_type === 'safety_post' ) : 
			query_posts( 'post_type=safety_post' );
		elseif ( $post_type === 'health_post' ) :
			query_posts( 'post_type=health_post' );
		elseif ( $post_type === 'environment_post' ) :
			query_posts( 'post_type=environment_post' );
		elseif ( $post_type === 'economy_post' ) :
			query_posts( 'post_type=economy_post' );
		elseif ( $post_type === 'mobility_post' ) :
			query_posts( 'post_type=mobility_post' );
		endif;
		
		while ( have_posts() ) : the_post();
			
			$post_title = get_the_title();

			if ( $post_title === 'Partnerships and Key Strategies' ) : ?>

				<a href="<?php the_permalink(); ?>" class="leftnav-link">
					<?php echo substr( $post_title, 0, 17 ); ?>
					<br />
					<?php echo substr( $post_title, 17 ); ?>
				</a>

			<?php else : ?>

				<a href="<?php the_permalink(); ?>" class="leftnav-link"><?php the_title(); ?></a>

			<?php endif; ?>

		<?php endwhile; ?>

		<?php wp_reset_query(); ?>

		<section class="downloads">
							
		<?php 

			$documents = get_posts( array(
				'post_type' => 'attachment',
			    'meta_query' => array(
			        array(
			            'key' => 'document_type',
			            'value' => $page->post_title, 
			            'compare' => 'LIKE'
			        )
			    )
			));

			if ( $documents ) : ?>

				<p><strong>Downloads</strong></p>

				<?php foreach ( $documents as $document ) : ?>

						<a href="<?php echo wp_get_attachment_url( $document->ID ); ?>" target="_blank" class="download">
						
							<div class="span3 download-icon">
								<?php include( get_stylesheet_directory() . '/img/document-icon.svg' ); ?>
							</div>
						
							<div class="span1">&nbsp;</div>
						
							<div class="span8 download-title">
								<?php echo $document->post_title ?>
							</div>

						</a>

					<?php endforeach;
				endif; ?>
					
		</section>

	</div>

</aside>