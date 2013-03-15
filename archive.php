<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package bravodms
 * @since bravodms 1.0
 */

get_header(); ?>
<br><br>
		<section class="c90p">
			<article class="c66p">

			<?php if ( have_posts() ) : ?>

				<header class="page-header">
					<h1 class="page-title">
						<?php
							if ( is_category() ) {
								printf( __( '%s Notes', 'bravodms' ), '<span>' . single_cat_title( '', false ) . '</span>' );

							} elseif ( is_tag() ) {
								printf( __( 'Tag Archives: %s', 'bravodms' ), '<span>' . single_tag_title( '', false ) . '</span>' );

							} elseif ( is_author() ) {
								/* Queue the first post, that way we know
								 * what author we're dealing with (if that is the case).
								*/
								the_post();
								printf( __( 'Notes by %s', 'bravodms' ), '<span class="vcard"><a class="url fn n" href="' . get_author_posts_url( get_the_author_meta( "ID" ) ) . '" title="' . esc_attr( get_the_author() ) . '" rel="me">' . get_the_author() . '</a></span>' );
								/* Since we called the_post() above, we need to
								 * rewind the loop back to the beginning that way
								 * we can run the loop properly, in full.
								 */
								rewind_posts();

							} elseif ( is_day() ) {
								printf( __( 'Daily Archives: %s', 'bravodms' ), '<span>' . get_the_date() . '</span>' );

							} elseif ( is_month() ) {
								printf( __( 'Monthly Archives: %s', 'bravodms' ), '<span>' . get_the_date( 'F Y' ) . '</span>' );

							} elseif ( is_year() ) {
								printf( __( 'Yearly Archives: %s', 'bravodms' ), '<span>' . get_the_date( 'Y' ) . '</span>' );

							} else {
								_e( 'Archives', 'bravodms' );

							}
						?>
					</h1>
					<?php
						if ( is_category() ) {
							// show an optional category description
							$category_description = category_description();
							if ( ! empty( $category_description ) )
								echo apply_filters( 'category_archive_meta', '<div class="taxonomy-description">' . $category_description . '</div>' );

						} elseif ( is_tag() ) {
							// show an optional tag description
							$tag_description = tag_description();
							if ( ! empty( $tag_description ) )
								echo apply_filters( 'tag_archive_meta', '<div class="taxonomy-description">' . $tag_description . '</div>' );
						}
					?>
				</header><!-- .page-header -->
				<br><br>

				<?php bravodms_content_nav( 'nav-above' ); ?>

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<div class="post">
				        <?php the_post_thumbnail(); ?>
				        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				 		

				     	<h4><?php bravodms_posted_by(); ?>
				         | <?php the_category(', '); ?></h4><br>
				         <h5><?php bravodms_posted_on(); ?></h5>
				        <?php edit_post_link('Edit', ' &#124; ', ''); ?>
				        <br />
				        <div class="excerpt">
							<?php the_excerpt(); ?><br />
				            <a href="<?php echo get_permalink(); ?>">Continue Reading...</a>
				        </div><!-- end excerpt -->
				        <br /><hr /><br />
				    </div>

				<?php endwhile; ?>

				<?php bravodms_content_nav( 'nav-below' ); ?>

			<?php else : ?>

				<?php get_template_part( 'no-results', 'archive' ); ?>

			<?php endif; ?>

			</article>
			<aside class="c33p">
				<br>
				<?php get_sidebar(); ?>
			</aside>
		</section>
		<br><br>
<?php get_footer(); ?>