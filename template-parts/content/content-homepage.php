<?php
/**
 * Template part for displaying homepage
 */

?>

<div id="primary" class="content-area">
  <main id="main" class="site-main" role="main">

    <div class="entry-content">
		  <?php the_content(); ?>
    </div><!-- /entry-content -->

    <footer class="entry-footer main-width">
	    <?php modul_r_social_sharer(); ?>
	    <?php modul_r_relateds(); ?>
    </footer>

  </main>
</div>

