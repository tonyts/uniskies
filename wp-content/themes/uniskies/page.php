<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Uniskies
 * @since Uniskies 1.0
 */

$script_config = array();
$script_config['css'] = array('page','portlet-latest');
$script_config['js'] = array();

get_header(); ?>

	<div class="content">
		<?php
			$parent = get_post($post->post_parent);
		?>
		<h1><?php echo $parent->post_title ?></h1>
		<div class="section left gray">
			<span class="notch"></span>
			<h2><?php the_title(); ?></h2>
			<?php echo apply_filters('the_content', $post->post_content); ?>
<div class="clear"></div>
		</div>
		<?php get_sidebar("latestnews"); ?>
	</div>


<?php get_footer(); ?>