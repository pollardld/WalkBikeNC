<?php
	
$single_bg = get_field( 'background_image' );

if ( empty( $single_bg ) ) {
	
	if ( $post_type === 'safety_post' ) : 
	
		$page = get_page_by_title( 'Safety' );
		$bg_image = get_field('background_image', $page->ID);
	
	elseif ( $post_type === 'health_post' ) :
	
		$page = get_page_by_title( 'Health' );
		$bg_image = get_field('background_image', $page->ID);
	
	elseif ( $post_type === 'environment_post' ) :
	
		$page = get_page_by_title( 'Environment' );
		$bg_image = get_field('background_image', $page->ID);
	
	elseif ( $post_type === 'economy_post' ) :
	
		$page = get_page_by_title( 'Economy' );
		$bg_image = get_field('background_image', $page->ID);
	
	elseif ( $post_type === 'mobility_post' ) :
	
		$page = get_page_by_title( 'Mobility' );
		$bg_image = get_field('background_image', $page->ID);
	
	endif;

} else {
	
	$bg_image = $single_bg;
}

$large = 'bg_large';
$bg_large = $bg_image['sizes'][ $large ];

if( !empty( $bg_image ) ) : ?>

	<div class="page-bg">
		<img src="<?php echo $bg_large; ?>" alt="featured image for page" class="large-bg" />
	</div>

<?php endif;