<!DOCTYPE html>
<html lang="ja">
    <head>
        <title><?php the_archive_title(); ?> | <?php bloginfo('name'); ?></title>
        <?php get_template_part('parts/head'); ?>
    </head>
    <body>

        <!-- ヘッダエリア -->
        <header>
            <?php dynamic_sidebar('header'); ?>
            <!-- パンくず -->
            <nav>
                    <p>
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo('name'); ?></a> >
                    </p>
            </nav>
            <h1><?php the_archive_title(); ?></h1>
        </header>

        <main>
            <header>
                <nav>
                    <?php get_template_part('parts/pagenator'); ?>
                </nav>
            </header>
<?php if(have_posts()): while(have_posts()): the_post(); ?> <!-- ループ開始 -->
            <article>
                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <p><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('post-thumbnails-index'); ?></a></p>
                <p><?php get_template_part('parts/post-date'); ?> <?php the_category(', '); ?></p>
                <p><?php the_excerpt(); ?></p>
            </article>
<?php endwhile; endif; ?> <!-- ループ終了 -->
            <footer>
                <nav>
                    <?php get_template_part('parts/pagenator'); ?>
                </nav>
            </footer>
        </main>

        <!-- フッタ -->
        <footer>
            <?php dynamic_sidebar('footer'); ?>
            <p>&copy;<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo('name'); ?></a></p>
            <?php wp_footer();?>
        </footer>

    </body>
</html>