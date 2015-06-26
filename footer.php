<div class="footer-bg">	
	
	<footer>
		
		<?php if ( is_active_sidebar( 'footer_widget' ) ) : ?>
			<div class="span3 about-widget">
				<?php dynamic_sidebar( 'footer_widget' ); ?>
			</div>
		<?php endif; ?>

		<div class="span5">
			<?php wp_nav_menu( array(
				'theme_location' => 'footer-menu',
				'container' => false,
				'items_wrap' => '<ul class="footer-nav">%3$s</ul>'
			)); ?>
		</div>

		<div class="span2">

			<ul class="footer-nav">

				<li>
					
					<a href="/news-events" class="footer-news">News &amp; Events</a>

					<ul class="sub-menu">
						
						<?php 
						$args = array(
							'post_type' => 'news_events',
							'post_per_page' => 4
						);
						
						$the_query = new WP_Query( $args );

						if ( $the_query->have_posts() ) :
							
							while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

								<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>

							<?php endwhile;
								  wp_reset_query();
						endif; ?>

					</ul>

				</li>
		</div>

		<?php if ( is_active_sidebar( 'footer_contact' ) ) : ?>
			
			<div class="span2 contact-widget">
				
				<ul class="footer-nav">

					<li>
					
						<a href="/contact">Contact</a>

						<?php dynamic_sidebar( 'footer_contact' ); ?>

					</li>

				</ul>

			</div>

		<?php endif; ?>

	</footer>

</div>

<?php wp_footer(); ?>
</body>
</html>