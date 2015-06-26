<?php get_header(); ?>

	<div class="overflow-hidden">

		<main class="overflow-visible">

			<div class="container spread overflow-visible">

				<?php get_template_part( 'content', 'sidebar_page' ); ?>

				<article class="content spread">

					<div class="span9">
						<h1>Did you have a plan of your own?</h1>

						<p>There is not a page at this URL. Maybe try a search:</p>
						
						<?php get_search_form(); ?>
					</div>

					<div class="span3">
						<?php get_template_part( 'content', 'sidebar_pillars' ); ?>
					</div>

				</article>

			</div>

		</main>

	</div>

<?php get_footer(); ?>