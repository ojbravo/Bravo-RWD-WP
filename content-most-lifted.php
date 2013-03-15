<?php if ( have_posts() ) : ?>

	<?php /* Start the Loop */ ?>
	<?php while ( have_posts() ) : the_post(); ?>


		<article class="post c33ip">
	        <?php the_post_thumbnail(); ?>
	        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>


	     	<h4><?php bravodms_posted_by(); ?></h4>
	        <?php edit_post_link('Edit', ' &#124; ', ''); ?> | Elevation: <?php echo getLiftCount(get_the_ID());?>
	        <br />
	        <div class="excerpt">
				<?php the_excerpt(); ?><br />
	        </div><!-- end excerpt -->
	    </article>

	<?php endwhile; ?>

<?php elseif ( current_user_can( 'edit_posts' ) ) : ?>

	<?php get_template_part( 'no-results', 'index' ); ?>

<?php endif; ?>
<?php wp_reset_query(); ?>