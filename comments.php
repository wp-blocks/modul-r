<?php
/**
 * The template for displaying comments
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
*/
if ( post_password_required() ) {
	return;
}

// Display Comments Section
if ( have_comments() ) : ?>
  <h3 id="comments"><?php comments_number(__('No Responses',  'modul-r'), __('One Response',  'modul-r'), __('% Responses',  'modul-r'));?> <?php printf(__('to %s',  'modul-r'), the_title('', '', false)); ?></h3>

  <div class="navigation">
    <div class="alignleft"><?php previous_comments_link() ?></div>
    <div class="alignright"><?php next_comments_link() ?></div>
  </div>


  <ol class="commentlist">
	  <?php
	  wp_list_comments(array(
		  // see http://codex.wordpress.org/Function_Reference/wp_list_comments
		   'avatar_size' => 90
	  ));
	  ?>
  </ol>

	<?php
	if ( ! comments_open() ) : // There are comments but comments are now closed
		echo"<p class='nocomments'>".__( 'Comments are closed.',  'modul-r' )."</p>";
	endif;

else : // I.E. There are no Comments
	if ( comments_open() ) : // Comments are open, but there are none yet
		echo "<p>".__( 'Be the first to write a comment.',  'modul-r' )."</p>";
	else : // comments are closed
		 echo "<p class='nocomments'>".__( 'Comments are closed.',  'modul-r' )."</p>";
	endif;
endif;

comment_form( array(
	'title_reply' => __( 'Comments',  'modul-r' ),
	'comment_notes_after' => ''
) );