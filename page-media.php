<?php 
/* Template Name: Media Template */
get_header(); ?>
<?php remove_filter ('the_content',  'wpautop'); ?>
<script type="text/javascript" src="//cdn.sublimevideo.net/js/kz6ldefh.js"></script>

	<section class="c80ip bg-light main">
		<article class="c66ip">
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', 'page' ); ?>
			<?php endwhile; // end of the loop. ?>
		</article>
		<aside class="c33ip">
			<?php get_sidebar(); ?>
		</aside>
	</section>

<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/includes/fancybox/jquery.fancybox.css" type="text/css" media="screen" />
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/includes/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/includes/fancybox/jquery.fancybox.pack.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $(".video").fancybox({
            maxWidth    : 800,
            maxHeight   : 600,
            fitToView   : false,
            width       : '70%',
            height      : '70%',
            autoSize    : false,
            closeClick  : false,
            openEffect  : 'none',
            closeEffect : 'none'
        });
    });
</script>


<?php get_footer(); ?>