<?php
if (post_password_required()) {
	return;
}
?>


<section id="comments">
<?php if (have_comments()) :?>
    <h2><?php echo get_comments_number().' 件のコメント'; ?></h2>
    <ul id="comments-list">
        <?php wp_list_comments(array('avatar_size'=>48,'style'=>'ul','type'=>'comment',)); ?>
    </ul>
<?php if (get_comment_pages_count() > 1) : ?>
    <p><?php previous_comments_link(); ?> | <?php next_comments_link(); ?></p>
<?php endif; ?>

<?php else: ?>
    <h2>コメント</h2>
<?php endif; ?>
    <?php comment_form(); ?>
    </div><!-- comments -->

</section>