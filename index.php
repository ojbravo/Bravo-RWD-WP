<?php
/**
 * The main template file.
 *
 *
 * @package bravodms
 * @since bravodms 1.0
 */

get_header(); ?>
	<section class="c80p bg-light main">
		<article class="c66p">
			<?php include "content-excerpts.php" ?>
		</article> 
		<aside class="c33p">
			<?php get_sidebar(); ?>	
		</aside>
	</section><!-- end local -->


<?php get_footer(); ?>