<?php
/**
 * Template Name: What We Do
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Uniskies
 * @since Uniskies 1.0
 */
$script_config = array();
$script_config['css'] = array('wedo','portlet-latest');
$script_config['js'] = array();
$mainland_id = strrpos($_SERVER["HTTP_HOST"],"local") !== false ? 71 : 73;
$hongkong_id = strrpos($_SERVER["HTTP_HOST"],"local") !== false ? 73 : 74;
get_header(); ?>

		<div class="content">
		    <h1><?php the_title(); ?></h1>
			<div class="section left gray" id="section1">
				<span class="notch"></span>
				<h2><a class="noLine" href="<?php echo get_permalink($mainland_id) ?>"><?php echo get_the_title($mainland_id); ?></a></h2>
				<div class="row row1">
					<?php
						$ml_feature = get_feature_posts($mainland_id);
						if ( has_post_thumbnail($ml_feature[0]->ID) ) {
							echo get_the_post_thumbnail( $ml_feature[0]->ID, array(470,240) );
						}
						else {
							echo '<img src="' . get_template_directory_uri() . '/images/children01.jpg"  title="" alt=""/>';
						}
					?>
					<h3><a class="noLine" href="<?php echo get_permalink($ml_feature[0]->ID) ?>"><?php echo $ml_feature[0]->post_title ?></a></h3>
					<p><?php echo cut_content($ml_feature[0]->post_content,300); ?></p>
					<div class="clear"></div>
				</div>
				<div class="row row2">
					<?php
						$ml_latest = get_latest_posts($mainland_id,2,$ml_feature[0]->ID);
					?>
					<div class="portletNews small">
						<?php
							if ( has_post_thumbnail($ml_latest[1]->ID) ) {
								echo get_the_post_thumbnail( $ml_latest[1]->ID, array(255,155) );
							}
							else {
								echo '<img src="' . get_template_directory_uri() . '/images/children02.jpg"  title="" alt=""/>';
							}
						?>
						<h3><a class="noLine" href="<?php echo get_permalink($ml_latest[1]->ID) ?>"><?php echo $ml_latest[1]->post_title ?></a></h3>
						<p><?php echo cut_content($ml_latest[1]->post_content,100); ?></p>
						<div class="clear"></div>
					</div>
					<div class="portletNews large">
						<?php
							if ( has_post_thumbnail($ml_latest[0]->ID) ) {
								echo get_the_post_thumbnail( $ml_latest[0]->ID, array(355,240) );
							}
							else {
								echo '<img src="' . get_template_directory_uri() . '/images/children03.jpg"  title="" alt=""/>';
							}
						?>
						<h3><a class="noLine" href="<?php echo get_permalink($ml_latest[0]->ID) ?>"><?php echo $ml_latest[0]->post_title ?></a></h3>
						<p><?php echo cut_content($ml_latest[0]->post_content,300); ?></p>
						<div class="clear"></div>
					</div>
				</div>
				<div class="clear"></div>
			</div>
			<div class="section twoColumn right blue" id="section2">
				<?php get_sidebar("latestnews"); ?>
				<span class="notch"></span>
				<h2><a class="noLine" href="<?php echo get_permalink($hongkong_id) ?>"><?php echo get_the_title($hongkong_id); ?></a></h2>
				<div class="column col1">
					<?php
						$hk_feature = get_feature_posts($hongkong_id);
					?>
					<h3><a class="noLine" href="<?php echo get_permalink($hk_feature[0]->ID) ?>"><?php echo $hk_feature[0]->post_title ?></a></h3>
					<p><?php echo cut_content($hk_feature[0]->post_content, 300) ?></p>

					<?php
						$hk_latest = get_latest_posts($hongkong_id,2,$hk_feature[0]->ID);
					?>
					<div class="portletNews large">
						<?php
							if ( has_post_thumbnail($hk_latest[0]->ID) ) {
								echo get_the_post_thumbnail( $hk_latest[0]->ID, array(470,240) );
							}
							else {
								echo '<img src="' . get_template_directory_uri() . '/images/children03.jpg"  title="" alt=""/>';
							}
						?>
						<h3><a class="noLine" href="<?php echo get_permalink($hk_latest[0]->ID) ?>"><?php echo $hk_latest[0]->post_title ?></a></h3>
						<p><?php echo cut_content($hk_latest[0]->post_content, 300) ?></p>
						<div class="clear"></div>
					</div>
				</div>
				<div class="column col2">
					<?php
						if ( has_post_thumbnail($hk_feature[0]->ID) ) {
							echo get_the_post_thumbnail( $hk_feature[0]->ID, array(355,240) );
						}
						else {
							echo '<img src="' . get_template_directory_uri() . '/images/children04.jpg"  title="" alt=""/>';
						}
					?>
					<div class="portletNews small">
						<?php
							if ( has_post_thumbnail($hk_latest[1]->ID) ) {
								echo get_the_post_thumbnail( $hk_latest[1]->ID, array(255,155) );
							}
							else {
								echo '<img src="' . get_template_directory_uri() . '/images/children02.jpg"  title="" alt=""/>';
							}
						?>
						<h3><a class="noLine" href="<?php echo get_permalink($hk_latest[1]->ID) ?>"><?php echo $hk_latest[1]->post_title ?></a></h3>
						<p><?php echo cut_content($hk_latest[1]->post_content, 100) ?></p>
						<div class="clear"></div>
					</div>
				</div>
				<div class="clear"></div>
			</div>
		</div>
<?php get_footer(); ?>