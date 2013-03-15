<?php get_header(); ?>

	<section class="c80p bg-light main">
		<article class="c66p">
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', 'page' ); ?>
			<?php endwhile; // end of the loop. ?>
		</article>
		<aside class="c33p">
			<?php get_sidebar(); ?>
		</aside>
	</section>

<?php get_footer(); ?>