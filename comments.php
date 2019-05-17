<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
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
  <h3 id="comments"><?php comments_number('No Responses', 'One Response', '% Responses');?> <?php printf('to “%s”', the_title('', '', false)); ?></h3>

  <div class="navigation">
    <div class="alignleft"><?php previous_comments_link() ?></div>
    <div class="alignright"><?php next_comments_link() ?></div>
  </div>


  <ol class="commentlist">
	  <?php
	  wp_list_comments(array(
		  // see http://codex.wordpress.org/Function_Reference/wp_list_comments
		  // 'login_text'        => 'Login to reply',
		  // 'callback'          => null,
		  // 'end-callback'      => null,
		  // 'type'              => 'all',
		   'avatar_size'       => 90,
		  // 'reverse_top_level' => null,
		  // 'reverse_children'  =>
	  ));
	  ?>
  </ol>

	<?php
	if ( ! comments_open() ) : // There are comments but comments are now closed
		echo"<p class='nocomments'>Comments are closed.</p>";
	endif;

else : // I.E. There are no Comments
	if ( comments_open() ) : // Comments are open, but there are none yet
		echo "<p>Be the first to write a comment.</p>";
	else : // comments are closed
		 echo "<p class='nocomments'>Comments are closed.</p>";
	endif;
endif;

$comments_settings = array(
	'title_reply' => __( 'Comments', 'modu' ),
	'comment_notes_after' => ''
);

comment_form($comments_settings);
