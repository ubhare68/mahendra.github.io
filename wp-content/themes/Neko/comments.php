<?php // Do not delete these lines
if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
die ('Please do not load this page directly. Thanks!');
if (!empty($post->post_password)) { // if there's a password
if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
?>
<p class="nocomments">This post is password protected. Enter the password to view comments.</p>
<?php
return;
}
}

/* This variable is for alternating comment background */
$oddcomment = 'class="alt" ';
?>
<?php if ('open' == $post->comment_status) : ?>
<?php else : // comments are closed ?>
<p class="nocomments">Comments are closed.</p>
<?php endif; ?>
<?php if ('open' == $post->comment_status) : ?>
<fieldset>
<legend>Comments</legend>
<?php if ($comments) : ?>
<ol class="commentlist">
<?php foreach ($comments as $comment) : ?>
<li <?php echo $oddcomment; ?>id="comment-<?php comment_ID() ?>">
<img border="0" style="padding:1px; float:left; margin:0px 10px 5px 0px; border:1px solid #ccc;" src="<?php gravatar("R", 48, get_option('home')."/wp-content/themes/Neko/img/avatar.gif"); ?>" /><span class="author-name"><?php comment_author_link() ?></span><br />
<strong><?php comment_date();?></strong>
<?php if ($comment->comment_approved == '0') : ?>
<em>Your comment is awaiting moderation.</em>
<?php endif; ?>
<br />
<div class="c-txt"><?php comment_text() ?></div>
<span style="display:block; text-align:right; margin-top:8px;" class="rss-feed"><img border="0" style="border:0px; margin:0px 5px 0px 0px;" class="float-none" src="<?php echo get_option('home'); ?>/wp-content/themes/Neko/img/comm.gif" /><strong><a style="color:#333333; font-size:13px; text-decoration:underline; margin:0px;" href="#Leave-Comment">Leave a reply</a></strong></span></li>
<?php
/* Changes every other comment to a different class */
$oddcomment = ( empty( $oddcomment ) ) ? 'class="alt" ' : '';
?>
<?php endforeach; /* end for each comment */ ?>
</ol>
<?php else : // this is displayed if there are no comments so far ?>
<?php endif; ?>
</fieldset>
<?php endif; ?>
<?php if ('open' == $post->comment_status) : ?>
<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<p>You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">logged in</a> to post a comment.</p>
<?php else : ?>
<fieldset>
<legend>Leave a Comment Below &raquo;<a name="LeaveComment" id="LeaveComment"></a></legend>
<a name="Leave-Comment" id="Leave-Comment"></a>
<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
<div class="label-comments"><strong>Your Name</strong></div>
<input class="comment-box-field" type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="42" tabindex="1" />
<div class="label-comments"><strong>Your Email Address</strong></div>
<input class="comment-box-field" type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="42" tabindex="2" />
<div class="label-comments"><strong>Your Comment</strong></div>
<textarea class="comment-box-text" name="comment" id="comment" cols="50%" rows="6" tabindex="4"></textarea>
<div style="margin:5px 0px 5px 0px; padding:8px 8px 8px 0px;">
<img src="<?php echo get_option('home'); ?>/wp-content/themes/Neko/img/avatar.gif" width="40" height="40" style="float:left; border:1px solid #ccc; margin:3px 8px 0px 0px;" /><strong>Want your picture next to your comment?</strong><br />
<a target="_blank" href="http://site.gravatar.com/signup">Join Gravatar</a> and upload your photo, completely free! <span style="font-size:11px;"><strong>(opens in new window)</strong></span></div>
<input class="comment-box-submit" name="submit" type="submit" id="submit" tabindex="5" value="Submit Comment" />
<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
<?php do_action('comment_form', $post->ID); ?>
</form>
</fieldset>
<?php endif; // If registration required and not logged in ?>
<?php endif; // if you delete this the sky will fall on your head ?>