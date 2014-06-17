<?php
/**
 * The Template for displaying all single posts.
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
			$parent = "";
			foreach ($post->post_category as $key => $cid) {
				$parent = get_page_by_cid($cid);
			}
			$parent = $parent[0];
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

<!--?php get_sidebar(); ?-->
<?php get_footer(); ?>