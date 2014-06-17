<?php
/**
 * Template Name: Donate
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
$script_config['css'] = array('donate');
$script_config['js'] = array();

get_header(); ?>

		<div class="content">
		    <h1><?php the_title(); ?></h1>
			<div class="section left green">
				<span class="notch"></span>
				<div class="section1">
					<?php echo apply_filters('the_content', $post->post_content); ?>
					<!--h2>I want to donate</h2>
					<p>Address: Flat G  5/fl Lok Fu Mansion , 201  Fa Yuen street, Mongkok , Kowloon</p>
					<p>E-mail: <a href="mailto:uniskies@yahoo.com.hk">uniskies@yahoo.com.hk</a></p>
					<p>HK$ saving account: 012-349-1-007647-0</p>
					<p>Bank: Bank of China (Hong Kong) Ltd</p-->
				</div>
				<div class="clear"></div>
			</div>
			<div class="section section2 right gray">
				<div class="portlet" id="portletAmount">
					<p class="title">累計捐款總額（港幣）</p>
					<p class="amount"><?php echo get_field('total_amount'); ?></p>
					<p class="title">捐款人數</p>
					<p class="amount"><?php echo get_field('total_donors'); ?></p>
					<p><?php echo get_field('donation_description'); ?></p>
				</div>
				<span class="notch"></span>
				<!--h2>Donation FAQ</h2-->
				<br><br><br><br><br>
				<?php echo(types_render_field( "qna", array( 'output' => 'html' ) )); ?>
				<!--h3>1. Lorem ipsum</h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam sit amet lorem nisl. Quisque suscipit condimentum velit at semper. Donec non turpis id lacus luctus blandit eu at turpis Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam sit amet lorem nisl. Quisque suscipit condimentum velit at semper. Donec non turpis id lacus luctus blandit eu at </p>
				<h3>2. Lorem ipsum</h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam sit amet lorem nisl. Quisque suscipit condimentum velit at semper. Donec non turpis id lacus luctus blandit eu at turpis Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam sit amet lorem nisl. Quisque suscipit condimentum velit at semper. Donec non turpis id lacus luctus blandit eu at </p>
				<h3>3. Lorem ipsum</h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam sit amet lorem nisl. Quisque suscipit condimentum velit at semper. Donec non turpis id lacus luctus blandit eu at turpis Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam sit amet lorem nisl. Quisque suscipit condimentum velit at semper. Donec non turpis id lacus luctus blandit eu at </p>
				<h3>4. Lorem ipsum</h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam sit amet lorem nisl. Quisque suscipit condimentum velit at semper. Donec non turpis id lacus luctus blandit eu at turpis Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam sit amet lorem nisl. Quisque suscipit condimentum velit at semper. Donec non turpis id lacus luctus blandit eu at </p>
				<h3>5. Lorem ipsum</h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam sit amet lorem nisl. Quisque suscipit condimentum velit at semper. Donec non turpis id lacus luctus blandit eu at turpis Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam sit amet lorem nisl. Quisque suscipit condimentum velit at semper. Donec non turpis id lacus luctus blandit eu at </p>
				<h3>6. Lorem ipsum</h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam sit amet lorem nisl. Quisque suscipit condimentum velit at semper. Donec non turpis id lacus luctus blandit eu at turpis Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam sit amet lorem nisl. Quisque suscipit condimentum velit at semper. Donec non turpis id lacus luctus blandit eu at </p-->
			</div>
		</div>
<?php get_footer(); ?>