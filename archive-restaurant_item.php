<?php
/**
 * @package Make
 */

get_header();
global $post;
?>

<?php ttfmake_maybe_show_sidebar( 'left' ); ?>

<main id="site-main" class="site-main" role="main">
<?php if ( have_posts() ) : ?>

	<header class="section-header">
		<h1 class="section-title"><?php post_type_archive_title(); ?></h1>
		<?php echo wp_kses_post( get_post_type_object( get_query_var( 'post_type' ) )->description ); ?>
	</header>

	<table>

	<?php while ( have_posts() ) : the_post(); ?>
		<?php
		/**
		 * Allow for changing the template partial.
		 *
		 * @since 1.2.3.
		 *
		 * @param string     $type    The default template type to use.
		 * @param WP_Post    $post    The post object for the current post.
		 */
		$template_type = apply_filters( 'make_template_content_archive', 'archive', $post );
		get_template_part( 'partials/restaurant', $template_type );
		?>
	<?php endwhile; ?>

	</table>

	<?php get_template_part( 'partials/nav', 'paging' ); ?>

	<?php else : ?>
		<?php get_template_part( 'partials/content', 'none' ); ?>
	<?php endif; ?>
</main>

<?php ttfmake_maybe_show_sidebar( 'right' ); ?>

<?php get_footer(); ?>
