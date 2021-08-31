<?php
/**
 * Template part for displaying related post under the article (so it will be very concise)
 */

?>
<li class="related">
  <a href="<?php the_permalink() ?>">
	  <?php if ( has_post_thumbnail()) : // Check if thumbnail exists ?>
		  <?php the_post_thumbnail('thumbnail'); ?>
	  <?php endif; ?>
  </a>
  <a href="<?php the_permalink() ?>">
    <h5 class="has-primary-color"><?php the_title() ?></h5>
  </a>
  <span class="display-table">
    <?php the_excerpt() ?>
  </span>
</li>