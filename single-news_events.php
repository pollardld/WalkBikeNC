<?php get_header();

$post_type = get_post_type(); ?>

<div class="overflow-hidden">

	<?php get_template_part( 'content', 'single_bg' ); ?>

	<main class="overflow-visible">

		<div class="container spread overflow-visible">

			<?php while ( have_posts() ) : the_post(); ?>

				<article class="content spread news-post">

					<div class="span9 news-content">

						<span class="post-date">
							<span class="day"><?php the_time('j'); ?></span>
							<span class="month"><?php the_time('M'); ?></span>
						</span>
						
						<h1><?php the_title(); ?></h1>

						<div class="news-image">
							<?php the_post_thumbnail( 'news_thumb' ); ?>
						</div>
						
						<div class="news-content">
							<?php the_content(); ?>
						</div>

					</div>

					<div class="span3">
						<?php get_template_part( 'content', 'sidebar_pillars' ); ?>
					</div>

				</article>
					
			<?php endwhile; ?>

			<section class="container pagination spread">

				<div class="spread span9">
					<div class="previous span6"><?php previous_post_link( '%link', '&laquo; Prev' ); ?>&nbsp;</div>
					<div class="next span6">&nbsp;<?php next_post_link( '%link', 'Next &raquo;' );?></div>
				</div>

			</section>

		</div>

	</main>

</div>

<?php get_footer(); ?>