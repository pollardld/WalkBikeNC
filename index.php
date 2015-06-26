<?php get_header(); ?>

	<section class="hero">

		<div class="intro slick-container">

				<div class="featured-post">

					<?php get_template_part( 'content', 'featured' ); ?>

				</div>

				<div>
					<em>WalkBikeNC is your guide to</em>
					<h1>Walking &amp; Bicycling<br /><span>in</span> North Carolina</h1>
					<a href="/about/" class="more-detail">Find Out More <span>&rsaquo;</span></a>
				</div>

		</div>

		<section class="beta-notice">This is the initial, beta release of this website.  Please provide comments and suggestions <a href="/contact/">here</a>.</section>

	</section>

	<?php get_template_part( 'content', 'callout' ); ?>

	<section class="hero pillars-hero">
		<div class="pillars-hero-title">
			<h1>The 5 Pillars<br /><span><em>of the</em></span> Plan</h1>
		</div>
	</section>

	<?php get_template_part( 'content', 'pillars' ); ?>

	<?php get_template_part( 'content', 'bikeroutes' ); ?>

<?php get_footer(); ?>
