<?php
	
$bg_image = get_field( 'background_image' );
$large = 'bg_large';
$bg_large = $bg_image['sizes'][ $large ];

if( !empty( $bg_image ) ) : ?>

	<div class="page-bg">
		<img src="<?php echo $bg_large; ?>" alt="featured image for page" class="large-bg" />
	</div>

<?php endif;