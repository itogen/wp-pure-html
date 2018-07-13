<!DOCTYPE html>
<html lang="ja">
    <head>
        <title><?php bloginfo('name'); ?></title>
        <?php get_template_part('parts/head'); ?>
    </head>
    <body>

        <!-- ヘッダエリア -->
        <header>
            <?php dynamic_sidebar('header'); ?>
            <h1><?php bloginfo('name'); ?></h1>
            <p><?php bloginfo('description'); ?></p>
        </header>

        <section>
            <h2>最新記事</h2>
<?php if(have_posts()): while(have_posts()): the_post(); ?>
            <article>
            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                <p><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('post-thumbnails-index'); ?></a></p>
                <p><?php echo get_the_date(); ?> <?php the_category(', '); ?></p>
                <p><?php the_excerpt(); ?></p>
            </article>
<?php endwhile; endif; ?>

        <p><a href="<?php echo home_url(); ?>/all-post">すべての記事</a></p>
        </section>

        <footer>
            <?php dynamic_sidebar('profile'); ?>
            <?php dynamic_sidebar('navigator'); ?>
            <?php dynamic_sidebar('footer'); ?>
            <p>&copy;<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo('name'); ?></a></p>
            <?php wp_footer();?>
        </footer>

    </body>
</html>