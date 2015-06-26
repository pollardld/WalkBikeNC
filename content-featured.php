<section class="featured">

<?php
	$featured_post = array(
		'post_type' => array( 'post', 'news_events' ),
		'posts_per_page' => 1,
		'meta_key' => 'featured_post',
		'meta_value' => '1'
	);

	query_posts( $featured_post );

	// Latest Posts Loop
	while ( have_posts() ) : the_post(); ?>

		<em>Plan Update</em>
		<h1><?php the_title(); ?></h1>
		<div class="featured-excerpt">
			<?php the_excerpt(); ?>
		</div>

	<?php endwhile;
		wp_reset_query(); ?>

</section>
