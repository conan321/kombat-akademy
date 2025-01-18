<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package customify
 */

get_header(); ?>

<div class="content-inner">
	<?php
	if ( ! customify_is_e_theme_location( 'single' ) ) {
		?>
		<?php
	}
	?>
</div><!-- #.content-inner -->
<?php
get_footer();
