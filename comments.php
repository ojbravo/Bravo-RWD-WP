<!-- Enable facebook comments -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=406678076071790";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<!-- end facebook comments -->

<div class="c100ip bg-lighter roundedcorners-small textshadow p-tb"><h2 style="margin:0;">Questions, Comments, Concerns?</h2>Contribute something positive to the conversation.  I'd love to hear what you think!</div>
<br class="clr"><br>
<div id="comments" class="comments-area">
	<div class="fb-comments" data-href="<?php the_permalink() ?>" data-num-posts="50"></div>
</div><!-- #comments .comments-area -->
