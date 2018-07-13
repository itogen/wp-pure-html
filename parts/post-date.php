<?php echo get_the_date(); ?>
<?php if(get_the_date() !== get_the_modified_date()) { ?>
(最終更新: <?php echo get_the_modified_date(); ?>)
<?php } ?>
