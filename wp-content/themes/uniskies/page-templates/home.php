<?php
/**
 * Template Name: Homepage
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
$script_config['css'] = array('home');
$script_config['js'] = array();

$mainland_id = strrpos($_SERVER["HTTP_HOST"],"local") !== false ? 71 : 73;
$hongkong_id = strrpos($_SERVER["HTTP_HOST"],"local") !== false ? 73 : 74;
$wedo_id = strrpos($_SERVER["HTTP_HOST"],"local") !== false ? 61 : 71;

$ml_feature = get_feature_posts($mainland_id, 2);
$hk_feature = get_feature_posts($hongkong_id, 2);
$last_feature = $ml_feature[1]->post_date > $hk_feature[1]->post_date ? $ml_feature[1] : $hk_feature[1];

get_header(); ?>

		<div class="content">
		    <div class="banner" style="background: url('<?php echo get_field('banner_image'); ?>') center top no-repeat;">
		    	<?php echo apply_filters('the_content', $post->post_content); ?>
		        <!--h2>What we do</h2>
		        <p>To provide a platform for individuals to get in touch with organisations that are in need of services or financial assistance.</p>
		        <a class="button blue" href="?c=article">Find out more</a-->
		    </div>
		    <div class="featureNews">
		    	<div class="column">
		    		<h3><a class="noLine" href="<?php echo get_permalink($hk_feature[0]->ID) ?>"><?php echo $hk_feature[0]->post_title ?></a></h3>
		    		<p><?php echo cut_content($hk_feature[0]->post_content,300); ?></p>
		    	</div>
		    	<div class="column">
		    		<h3><a class="noLine" href="<?php echo get_permalink($ml_feature[0]->ID) ?>"><?php echo $ml_feature[0]->post_title ?></a></h3>
		    		<p><?php echo cut_content($ml_feature[0]->post_content,300); ?></p>
		    	</div>
		    	<div class="column">
		    		<h3><a class="noLine" href="<?php echo get_permalink($last_feature->ID) ?>"><?php echo $last_feature->post_title ?></a></h3>
		    		<p><?php echo cut_content($last_feature->post_content,300); ?></p>
		    	</div>
		    	<div class="readMore">
		    		<a href="<?php echo get_permalink($wedo_id) ?>">更多活動</a>
		    	</div>
		    </div>
		    <div class="donate">
		    	<?php echo get_field('donate_content'); ?>
		    	<!--h3>Ready to work with us?</h3>
		    	<a class="button green" href="?c=donate">Donate</a>
		    	<div class="readMore">
		    		<a href="?c=donate">or find out more</a>
		    	</div-->
		    </div>
		    <div class="about">
		    	<div class="aboutContainer">
		    		<?php echo get_field('about_content'); ?>
			    	<!--img src="<?php echo get_template_directory_uri(); ?>/images/man-and-woman.png">
			    	<h2>About Uniskies</h2>
			    	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam sit amet lorem nisl. Quisque suscipit condimentum velit at semper. Donec non turpis id lacus luctus blandit eu at turpis:</p-->
			    	<div class="clear"></div>
		    	</div>
		    </div>
		    <div class="aboutDetail">
		    	<span class="notch"></span>
		    	<div class="aboutDetailContainer">
		    		<?php echo get_field('about_detail_content'); ?>
		    	</div>
		    	<!--div class="row1">
			    	<h3>Promoting education in China</h3>
			    	<ul>
			    		<li>Promoting education amongst the poor in China and other social charities (including those for orphans and the disable, medical help and people affected by disasters)</li>
			    		<li>Assisting the poor high school students with their school fees, books and boarding and other sundry expenses;<br>
			    		Organising and supervising the construction of schools</li>
			    		<li>Formulating plans for the running of schools and managing and monitoring the administration and finance of schools</li>
			    		<li>Liaising with schools, teachers, parents and students</li>
			    	</ul>
		    		<div class="clear"></div>
		    	</div>
		    	<div class="row2">
			    	<h3>Organising community activities for seniors in Hong Kong</h3>
			    	<p>Regular activities are organised in various districts for seniors, which include the giving of gifts, to enable the community to show their care for the seniors who have contributed so much for Hong Kong. Such activities also help to motivate the reclusive elders to take part in community events.</p>
			    	<div class="readMore">
			    		<a href="?c=about">More about our Services...</a>
			    	</div>
		    	</div-->
		    </div>
		    <!--div class="member">
		    	<?php echo get_field('cloud_content'); ?>
				<img id="figure1" src="<?php echo get_template_directory_uri(); ?>/images/dialog-figure1.png">
				<img id="figure2" src="<?php echo get_template_directory_uri(); ?>/images/dialog-figure2.png">
				<img id="figure3" src="<?php echo get_template_directory_uri(); ?>/images/dialog-figure3.png">
		    </div-->
		    <!--div class="member">
		    	<h2>Member Area</h2>
		    	<div class="readMore">
		    		<a href="?c=member">Find out more</a>
		    	</div>
		    	<div class="dialogContainer">
					<div class="dialog" id="dialog1">
						<p>Cum sociis natoque penatibus et magnis dis parturient montes, nasc ridiculus mus.</p>
						<span class="notch left"></span>
					</div>
					<div class="dialog" id="dialog2">
						<p>Vestibulum at tempor ante. Curabitur justo nunc, aliquam at faucibus ac, lacinia a nulla. In hac habitasse platea dictumst. Sed eget lacus tellus.</p>
						<span class="notch right"></span>
					</div>
					<div class="dialog" id="dialog3">
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam sit amet!</p>
						<span class="notch right"></span>
					</div>
				</div>
				<img id="figure1" src="<?php echo get_template_directory_uri(); ?>/images/dialog-figure1.png">
				<img id="figure2" src="<?php echo get_template_directory_uri(); ?>/images/dialog-figure2.png">
				<img id="figure3" src="<?php echo get_template_directory_uri(); ?>/images/dialog-figure3.png">
		    </div-->
	    </div>
<?php get_footer(); ?>