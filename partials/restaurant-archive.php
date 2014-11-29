<?php
/**
 * @package Make
 */

?>

<tr id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<td class="menu-title">
		<a href="<?php the_permalink(); ?>" title="<?php echo wp_kses_post( get_the_excerpt() ); ?>"><?php the_title(); ?></a>
	</td>

	<td class="menu-price">
		<?php rp_formatted_menu_item_price(); ?>
	</td>

</tr>
