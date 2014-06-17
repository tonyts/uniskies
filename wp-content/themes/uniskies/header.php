<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Uniskies
 * @since Uniskies 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<meta name="Keywords" content="<?php echo get_field('meta_keywords'); ?>">
<meta name="description" content="<?php echo get_field('meta_description'); ?>">
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery-1.10.1.min.js"></script>
<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php wp_head(); ?>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-46909426-1', 'uniskies.org');
  ga('send', 'pageview');

</script>
</head>

<body <?php body_class(); ?>>
	<div class="container">
		<div class="social">
			<div class="socialNode" id="facebook"><a href="https://www.facebook.com/Official.Uniskies" target="_blank" title="Click to visit Uniskies Facebook"></a></div>
			<div class="socialNode" id="twitter"><a href="javascript:;" target="_blank"></a></div>
		</div>
	    <div class="header">
	        <!--a class="headerLogo" href="/"><img src="images/logo.jpg"></a-->
	        <?php $header_image = get_header_image();
			if ( ! empty( $header_image ) ) : ?>
				<a class="headerLogo" href="<?php echo icl_get_home_url(); //esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( $header_image ); ?>" class="header-image" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="" /></a>
			<?php endif; ?>
	    	<?php get_header_menus(); ?>
	        <!--ul class="headerNav">
	            <li><a class="{#$currentAbout}" href="?c=about">About</a></li>
	            <li><a class="{#$currentWeDo}" href="?c=wedo">What We Do</a></li>
	            <li><a class="{#$currentDonate}" href="?c=donate">Donate</a></li>
	            <li><a class="{#$currentMember}" href="?c=member">Member Area</a></li>
	        </ul-->
	        <!--?php do_action('icl_language_selector'); ?-->
	        <div class="clear"></div>
	    </div>
	    <?php if(!is_front_page()){ ?>
		<div class="breadCrumb">
			<span><?php if ( function_exists( 'bread_crumb' ) && $post->post_type == "page" ) {bread_crumb( 'type=string' );}else{ echo get_post_breadcrumb(); } ?></span>
		</div>
		<?php } ?>