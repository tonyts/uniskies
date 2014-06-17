<?php
/**
 * Template Name: About
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
$script_config['css'] = array('about','portlet-latest');
$script_config['js'] = array();

get_header(); ?>

		<div class="content">
		    <h1><?php the_title(); ?></h1>
			<div class="section left green" id="section1">
				<span class="notch"></span>
				<?php echo apply_filters('the_content', $post->post_content); ?>
				<!--img src="images/logo-large.jpg">
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam sit amet lorem nisl. Quisque suscipit condimentum velit at semper. Donec non turpis id lacus luctus blandit eu at turpis</p>
				<a class="viewMore" href="?c=article">View more</a-->
				<div class="clear"></div>
			</div>
			<!--div class="portlet" id="portletLatest">
				<h2>Latest from Uniskies</h2>
			    <img src="<?php echo get_template_directory_uri(); ?>/images/school.jpg">
			    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam sit amet lorem nisl. Quisque suscipit condimentum velit at semper. Donec non</p>
			</div-->
			<div class="section twoColumn">
				<div class="column">
					<?php echo get_field('main_content_column_left'); ?>
					<!--h3>Annual report/audit report</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam sit amet lorem nisl. Quisque suscipit condimentum velit at semper. Donec non turpis id lacus luctus blandit eu at turpis Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam sit amet lorem nisl. Quisque suscipit condimentum velit at semper. Donec non turpis id lacus luctus blandit eu at turpis Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam sit amet lorem nisl. Quisque suscipit condimentum velit at semper. Donec non turpis id lacus </p>
					<h3>Constitution</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam sit amet lorem nisl. Quisque suscipit condimentum velit at semper. Donec non turpis id lacus luctus blandit eu at turpis</p>
					<h3>O-chart</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam sit amet lorem nisl. Quisque suscipit condimentum velit at semper.</p>
					<img src="<?php echo get_template_directory_uri(); ?>/images/lady.jpg" style="float:left;margin-right:20px;">
					<ul>
						<li><a class="withArrow noLine" href="?c=article">Lorem ipsum dolor sit</a></li>
						<li><a class="withArrow noLine" href="?c=article">Lorem ipsum dolor sit amet</a></li>
						<li><a class="withArrow noLine" href="?c=article">Lorem ipsum dolor</a></li>
						<li><a class="withArrow noLine" href="?c=article">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam sit ame</a></li>
						<li><a class="withArrow noLine" href="?c=article">Lorem ipsum dolor sit a</a></li>
					</ul-->
				</div>
				<div class="column col2">
					<?php echo get_field('main_content_column_right'); ?>
					<!--h3>Annual report/audit report</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam sit amet loreym nisl.</p>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam sit amet loreym nisl.</p>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam sit amet loreym nisl.</p>
					<h3>Contact us</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam sit amet lorem nisl. consectetur adipiscing elit. Nam sit amet lorem nisl.</p-->
				</div>
				<div class="clear"></div>
			</div>
			<!--div class="section left gray mediaCoverage">
			    <h2>Media Coverage</h2>
			    <div class="column">
			        <h3><a class="withArrowBold noLine" href="?c=article">Lorem ipsum dolor sit a</a></h3>
			        <img src="<?php echo get_template_directory_uri(); ?>/images/children05.jpg">
			        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam sit amet lorem nisl. Quisque suscipit condimentum</p>
			    </div>
			    <div class="column">
			        <h3><a class="withArrowBold noLine" href="?c=article">Lorem ipsum dolor sit a</a></h3>
			        <img src="<?php echo get_template_directory_uri(); ?>/images/children05.jpg">
			        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam sit amet lorem nisl. Quisque suscipit condimentum</p>
			    </div>
			    <div class="column">
			        <h3><a class="withArrowBold noLine" href="?c=article">Lorem ipsum dolor sit a</a></h3>
			        <img src="<?php echo get_template_directory_uri(); ?>/images/children05.jpg">
			        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam sit amet lorem nisl. Quisque suscipit condimentum</p>
			    </div>
			    <div class="column last">
			        <h3><a class="withArrowBold noLine" href="?c=article">Lorem ipsum dolor sit a</a></h3>
			        <img src="<?php echo get_template_directory_uri(); ?>/images/children05.jpg">
			        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam sit amet lorem nisl. Quisque suscipit condimentum</p>
			    </div>
			    <div class="clear"></div>
			</div-->
			<?php get_sidebar("latestnews"); ?>
		</div>
<?php get_footer(); ?>