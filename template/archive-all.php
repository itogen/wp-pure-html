<?php
/**
 * Template Name: Archive All Posts */
?>

<!DOCTYPE html>
<html lang="ja">
    <head>
        <title>すべての記事 | <?php bloginfo('name'); ?></title>
        <?php get_template_part('parts/head'); ?>
    </head>
    <body>

        <!-- ヘッダエリア -->
        <header>
            <?php dynamic_sidebar('header-apeal'); ?>
            <?php dynamic_sidebar('header'); ?>
            <!-- パンくず -->
            <nav>
                    <p>
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo('name'); ?></a> >
                    </p>
            </nav>
            <h1>すべての記事</h1>
        </header>

        <main>
            <header>
                <nav>
                    <?php get_template_part('parts/pagenator'); ?>
                </nav>
            </header>

<?php
$paged = (int) get_query_var('paged');
$args = array(
	'posts_per_page' => 3,
	'paged' => $paged,
	'orderby' => 'post_date',
	'order' => 'DESC',
	'post_type' => 'post',
	'post_status' => 'publish'
);
$the_query = new WP_Query($args);
if ( $the_query->have_posts() ) :
	while ( $the_query->have_posts() ) : $the_query->the_post();
?>

    <article>
        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <p><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('post-thumbnails-index'); ?></a></p>
        <p><?php get_template_part('parts/post-date'); ?> <?php the_category(', '); ?></p>
        <p><?php the_excerpt(); ?></p>
    </article>



<?php endwhile; endif; ?>
 
<?php
if ($the_query->max_num_pages > 1) {
	echo paginate_links(array(
		'base' => get_pagenum_link(1) . '%_%',
		'format' => 'page/%#%/',
		'current' => max(1, $paged),
		'total' => $the_query->max_num_pages
	));
}
?>
 
<?php wp_reset_postdata(); ?>



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