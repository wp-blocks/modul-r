<div class="share-buttons">

  <?php
  $sharer_page_link = urlencode(esc_attr(get_page_link()));
  $sharer_blog_title = urlencode(esc_attr(get_bloginfo('title')));
  $sharer_page_title = urlencode(esc_attr(get_the_title()));
  ?>

  <!-- Facebook -->
  <a href="http://www.facebook.com/sharer.php?u=<?php echo $sharer_page_link; ?>" target="_blank" title="<?php esc_attr_e( 'Share on Facebook', 'modul-r' ) ; ?>">
    <i class="social-ico facebook"></i>
  </a>


  <!-- LinkedIn -->
  <a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo $sharer_page_link; ?>" target="_blank" title="<?php esc_attr_e( 'Share on Linkedin', 'modul-r' ) ; ?>">
    <i class="social-ico linkedin"></i>
  </a>

  <!-- Twitter -->
  <a href="https://twitter.com/intent/tweet?url=<?php echo $sharer_page_link; ?>&amp;text=<?php echo $sharer_blog_title; ?>+<?php echo $sharer_page_title; ?>" target="_blank" title="<?php esc_attr_e( 'Share on Twitter', 'modul-r' ); ?>">
    <i class="social-ico twitter"></i>
  </a>

  <!-- Email -->
  <a href="mailto:?Subject=<?php echo $sharer_blog_title; ?>&amp;Body=<?php echo $sharer_page_link; ?>" target="_blank" title="<?php esc_attr_e( 'Send by mail', 'modul-r' ); ?>">
    <i class="social-ico email"></i>
  </a>

  <!-- Print -->
  <a href="javascript:" onclick="window.print()" title="<?php esc_attr_e( 'Print this page', 'modul-r' ); ?>">
    <i class="social-ico print"></i>
  </a>

</div>