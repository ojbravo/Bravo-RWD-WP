<?php
/**
 * The Template for displaying all single posts.
 *
 * @package bravodms
 * @since bravodms 1.0
 */

get_header(); ?>

		<section class="c80p bg-light main">
			<article class="c66p">
				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'single' ); ?>
					<br><br>
					<?php bravodms_content_nav( 'nav-below' ); ?>
					<br><br>
					<?php comments_template( '', true ); ?>
				<?php endwhile; // end of the loop. ?>
			</article>
			<aside class="c33p">
				<?php get_sidebar(); ?>
			</aside>
		</section>


<?php get_footer(); ?>