<?php 

$title = get_the_title();
$page_id = get_the_ID();
	
if ( $title === 'Safety' ) : 
	query_posts( 'post_type=safety_post' );
elseif ( $title === 'Health' ) :
	query_posts( 'post_type=health_post' );
elseif ( $title === 'Environment' ) :
	query_posts( 'post_type=environment_post' );
elseif ( $title === 'Economy' ) :
	query_posts( 'post_type=economy_post' );
elseif ( $title === 'Mobility' ) :
	query_posts( 'post_type=mobility_post' );
elseif ( $title === 'About' || $title === 'Pillars of Plan' || $title === 'Resources' ) : 
	query_posts( 'post_type=page&post_parent=' . $page_id );
	$no_title = true;
else :
	$no_query = true;
endif; 

// Did we run a query? if so add sidebar and run the loop
if ( $no_query != true ) : ?>

	<aside class="span3 leftnav page-icon">

		<div class="span7">
			
			<?php the_post_thumbnail( 'featured-image' ); ?>
			
			<h4>
				<?php if ( $no_title != true ) :
					the_title(); 
				endif; ?>
			</h4>

		</div>

		<div class="span10">

			<button id="showMenu"></button>
			
			<?php while ( have_posts() ) : the_post();

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
				            'value' => $title, 
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

<?php 
// No query, exit the sidebar
endif; ?>