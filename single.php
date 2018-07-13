<!DOCTYPE html>
<html lang="ja">
    <head>
        <title><?php the_title(); ?> | <?php bloginfo('name'); ?></title>
        <?php wp_head();?>
    </head>
    <body>

    <!-- ヘッダエリア -->
    <header>
        <?php dynamic_sidebar('header'); ?>
        <nav>
            <p>
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo('name'); ?></a> &gt;
                <?php if(!is_page()){?>カテゴリー: <?php the_category(', '); ?> &gt;<?php } ?>
            </p>
        </nav>
        <h1><?php the_title(); ?></h1>
    </header>

<?php if(have_posts()): while(have_posts()): the_post(); ?>

    <p><?php the_post_thumbnail('post-thumbnails-single'); ?></p>
    <?php if(!is_page()){?><?php echo get_the_date(); ?><?php } ?>
    <p><?php the_content(); ?></p>

<?php if(!is_page()){?>
    <p><?php previous_post_link(); ?> | <?php next_post_link(); ?></p>
    <?php get_template_part('parts/social-share'); ?>
    <?php comments_template('/parts/comments.php'); ?>
<?php } ?>

<?php endwhile; endif; ?>


        <footer>
            <?php dynamic_sidebar('profile'); ?>
            <?php dynamic_sidebar('footer'); ?>
            <p>&copy;<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo('name'); ?></a></p>
            <?php wp_footer();?>
        </footer>

    </body>
</html>