<?php if ( have_posts() ) : ?>

	<?php /* Start the Loop */ ?>
	<?php while ( have_posts() ) : the_post(); ?>

		<article class="post">
	        <?php the_post_thumbnail(); ?>
	        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
	 		<br>	
	    <!-- 
	     	<h4><?php bravodms_posted_by(); ?></h4>
	        <?php edit_post_link('Edit', ' &#124; ', ''); ?>
	        <br />
	    -->
	        <div class="excerpt">
				<?php the_excerpt(); ?><br />
	            <a href="<?php echo get_permalink(); ?>">Continue Reading...</a>
	        </div><!-- end excerpt -->
	        <br /><hr /><br />
	    </article>

	<?php endwhile; ?>

	<h4>More <?php the_category(', ') ?> Notes...</h4>
	<br><br><br><br>

<?php elseif ( current_user_can( 'edit_posts' ) ) : ?>

	<?php get_template_part( 'no-results', 'index' ); ?>

<?php endif; ?>
<?php wp_reset_query(); ?>