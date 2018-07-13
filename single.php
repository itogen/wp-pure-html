<!DOCTYPE html>
<html lang="ja">
    <head>
        <title><?php the_title(); ?> | <?php bloginfo('name'); ?></title>
        <?php get_template_part('parts/head'); ?>
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
    <?php if(!is_page()){?><?php get_template_part('parts/post-date'); ?><?php } ?>
    <p><?php the_post_thumbnail('post-thumbnails-single'); ?></p>
    <p><?php the_content(); ?></p>

<?php if(!is_page()){?>
    <p><?php previous_post_link(); ?> | <?php next_post_link(); ?></p>
    <?php get_template_part('parts/social-share'); ?>
    <?php comments_template('/parts/comments.php'); ?>
<?php } ?>

<?php endwhile; endif; ?>


        <footer>
<?php if(!is_page()){?>
            <?php dynamic_sidebar('profile'); ?>
<?php } ?>
            <?php dynamic_sidebar('footer'); ?>
            <p>&copy;<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo('name'); ?></a></p>
            <?php wp_footer();?>
        </footer>

    </body>
</html>