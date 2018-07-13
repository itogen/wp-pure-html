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
            <nav>
                <p><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo('name'); ?></a> ></p>
            </nav>
            <h1>お探しのページは見つかりませんでした。</h1>
        </header>
        <!-- フッタ -->
        <footer>
            <?php dynamic_sidebar('navigator'); ?>
            <?php dynamic_sidebar('footer'); ?>
        <p>&copy;<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo('name'); ?></a></p>
        <?php wp_footer();?>
        </footer>

    </body>
</html>