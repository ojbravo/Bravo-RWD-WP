<?php
/**
 * @package bravodms
 * @since bravodms 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>

		<div class="entry-meta">
		<!-- <h4>
				<?php bravodms_posted_by(); ?> | <?php the_category(', ') ?>
			</h4><br>
		-->
			<?php bravodms_posted_on(); ?> 
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'bravodms' ), 'after' => '</div>' ) ); ?>
	</div><!-- .entry-content -->
	<br>
</article><!-- #post-<?php the_ID(); ?> -->


