<?php
/**
 * Uniskies functions and definitions.
 *
 * Sets up the theme and provides some helper functions, which are used
 * in the theme as custom template tags. Others are attached to action and
 * filter hooks in WordPress to change core functionality.
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development and
 * http://codex.wordpress.org/Child_Themes), you can override certain functions
 * (those wrapped in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before the parent
 * theme's file, so the child theme functions would be used.
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are instead attached
 * to a filter or action hook.
 *
 * For more information on hooks, actions, and filters, see http://codex.wordpress.org/Plugin_API.
 *
 * @package WordPress
 * @subpackage Uniskies
 * @since Uniskies 1.0
 */

/**
 * Sets up the content width value based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 625;

/**
 * Sets up theme defaults and registers the various WordPress features that
 * Uniskies supports.
 *
 * @uses load_theme_textdomain() For translation/localization support.
 * @uses add_editor_style() To add a Visual Editor stylesheet.
 * @uses add_theme_support() To add support for post thumbnails, automatic feed links,
 * 	custom background, and post formats.
 * @uses register_nav_menu() To add support for navigation menus.
 * @uses set_post_thumbnail_size() To set a custom post thumbnail size.
 *
 * @since Uniskies 1.0
 */
function uniskies_setup() {
	/*
	 * Makes Uniskies available for translation.
	 *
	 * Translations can be added to the /languages/ directory.
	 * If you're building a theme based on Uniskies, use a find and replace
	 * to change 'uniskies' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'uniskies', get_template_directory() . '/languages' );

	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();

	// Adds RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );

	// This theme supports a variety of post formats.
	add_theme_support( 'post-formats', array( 'aside', 'image', 'link', 'quote', 'status' ) );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menu( 'primary', __( 'Primary Menu', 'uniskies' ) );

	/*
	 * This theme supports custom background color and image, and here
	 * we also set up the default background color.
	 */
	add_theme_support( 'custom-background', array(
		'default-color' => 'e6e6e6',
	) );

	// This theme uses a custom image size for featured images, displayed on "standard" posts.
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 624, 9999 ); // Unlimited height, soft crop
}
add_action( 'after_setup_theme', 'uniskies_setup' );

/**
 * Adds support for a custom header image.
 */
require( get_template_directory() . '/inc/custom-header.php' );

/**
 * Enqueues scripts and styles for front-end.
 *
 * @since Uniskies 1.0
 */
function uniskies_scripts_styles() {
	global $wp_styles;

	/*
	 * Adds JavaScript to pages with the comment form to support
	 * sites with threaded comments (when in use).
	 */
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/*
	 * Adds JavaScript for handling the navigation menu hide-and-show behavior.
	 */
	wp_enqueue_script( 'uniskies-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '1.0', true );

	/*
	 * Loads our special font CSS file.
	 *
	 * The use of Open Sans by default is localized. For languages that use
	 * characters not supported by the font, the font can be disabled.
	 *
	 * To disable in a child theme, use wp_dequeue_style()
	 * function mytheme_dequeue_fonts() {
	 *     wp_dequeue_style( 'uniskies-fonts' );
	 * }
	 * add_action( 'wp_enqueue_scripts', 'mytheme_dequeue_fonts', 11 );
	 */

	/* translators: If there are characters in your language that are not supported
	   by Open Sans, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Open Sans font: on or off', 'uniskies' ) ) {
		$subsets = 'latin,latin-ext';

		/* translators: To add an additional Open Sans character subset specific to your language, translate
		   this to 'greek', 'cyrillic' or 'vietnamese'. Do not translate into your own language. */
		$subset = _x( 'no-subset', 'Open Sans font: add new subset (greek, cyrillic, vietnamese)', 'uniskies' );

		if ( 'cyrillic' == $subset )
			$subsets .= ',cyrillic,cyrillic-ext';
		elseif ( 'greek' == $subset )
			$subsets .= ',greek,greek-ext';
		elseif ( 'vietnamese' == $subset )
			$subsets .= ',vietnamese';

		$protocol = is_ssl() ? 'https' : 'http';
		$query_args = array(
			'family' => 'Open+Sans:400italic,700italic,400,700',
			'subset' => $subsets,
		);
		wp_enqueue_style( 'uniskies-fonts', add_query_arg( $query_args, "$protocol://fonts.googleapis.com/css" ), array(), null );
	}

	/*
	 * Loads our main stylesheet.
	 */
	wp_enqueue_style( 'uniskies-style', get_stylesheet_uri() );

	/*
	 * Loads the Internet Explorer specific stylesheet.
	 */
	wp_enqueue_style( 'uniskies-ie', get_template_directory_uri() . '/css/ie.css', array( 'uniskies-style' ), '20121010' );
	$wp_styles->add_data( 'uniskies-ie', 'conditional', 'lt IE 9' );
}
add_action( 'wp_enqueue_scripts', 'uniskies_scripts_styles' );

/**
 * Creates a nicely formatted and more specific title element text
 * for output in head of document, based on current view.
 *
 * @since Uniskies 1.0
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string Filtered title.
 */
function uniskies_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() )
		return $title;

	// Add the site name.
	$title .= get_bloginfo( 'name' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 )
		$title = "$title $sep " . sprintf( __( 'Page %s', 'uniskies' ), max( $paged, $page ) );

	return $title;
}
add_filter( 'wp_title', 'uniskies_wp_title', 10, 2 );

/**
 * Makes our wp_nav_menu() fallback -- wp_page_menu() -- show a home link.
 *
 * @since Uniskies 1.0
 */
function uniskies_page_menu_args( $args ) {
	if ( ! isset( $args['show_home'] ) )
		$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'uniskies_page_menu_args' );

/**
 * Registers our main widget area and the front page widget areas.
 *
 * @since Uniskies 1.0
 */
function uniskies_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Main Sidebar', 'uniskies' ),
		'id' => 'sidebar-1',
		'description' => __( 'Appears on posts and pages except the optional Front Page template, which has its own widgets', 'uniskies' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'First Front Page Widget Area', 'uniskies' ),
		'id' => 'sidebar-2',
		'description' => __( 'Appears when using the optional Front Page template with a page set as Static Front Page', 'uniskies' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Second Front Page Widget Area', 'uniskies' ),
		'id' => 'sidebar-3',
		'description' => __( 'Appears when using the optional Front Page template with a page set as Static Front Page', 'uniskies' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
}
add_action( 'widgets_init', 'uniskies_widgets_init' );

if ( ! function_exists( 'uniskies_content_nav' ) ) :
/**
 * Displays navigation to next/previous pages when applicable.
 *
 * @since Uniskies 1.0
 */
function uniskies_content_nav( $html_id ) {
	global $wp_query;

	$html_id = esc_attr( $html_id );

	if ( $wp_query->max_num_pages > 1 ) : ?>
		<nav id="<?php echo $html_id; ?>" class="navigation" role="navigation">
			<h3 class="assistive-text"><?php _e( 'Post navigation', 'uniskies' ); ?></h3>
			<div class="nav-previous alignleft"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'uniskies' ) ); ?></div>
			<div class="nav-next alignright"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'uniskies' ) ); ?></div>
		</nav><!-- #<?php echo $html_id; ?> .navigation -->
	<?php endif;
}
endif;

if ( ! function_exists( 'uniskies_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own uniskies_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @since Uniskies 1.0
 */
function uniskies_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
		// Display trackbacks differently than normal comments.
	?>
	<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
		<p><?php _e( 'Pingback:', 'uniskies' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( '(Edit)', 'uniskies' ), '<span class="edit-link">', '</span>' ); ?></p>
	<?php
			break;
		default :
		// Proceed with normal comments.
		global $post;
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">
			<header class="comment-meta comment-author vcard">
				<?php
					echo get_avatar( $comment, 44 );
					printf( '<cite class="fn">%1$s %2$s</cite>',
						get_comment_author_link(),
						// If current post author is also comment author, make it known visually.
						( $comment->user_id === $post->post_author ) ? '<span> ' . __( 'Post author', 'uniskies' ) . '</span>' : ''
					);
					printf( '<a href="%1$s"><time datetime="%2$s">%3$s</time></a>',
						esc_url( get_comment_link( $comment->comment_ID ) ),
						get_comment_time( 'c' ),
						/* translators: 1: date, 2: time */
						sprintf( __( '%1$s at %2$s', 'uniskies' ), get_comment_date(), get_comment_time() )
					);
				?>
			</header><!-- .comment-meta -->

			<?php if ( '0' == $comment->comment_approved ) : ?>
				<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'uniskies' ); ?></p>
			<?php endif; ?>

			<section class="comment-content comment">
				<?php comment_text(); ?>
				<?php edit_comment_link( __( 'Edit', 'uniskies' ), '<p class="edit-link">', '</p>' ); ?>
			</section><!-- .comment-content -->

			<div class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', 'uniskies' ), 'after' => ' <span>&darr;</span>', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div><!-- .reply -->
		</article><!-- #comment-## -->
	<?php
		break;
	endswitch; // end comment_type check
}
endif;

if ( ! function_exists( 'uniskies_entry_meta' ) ) :
/**
 * Prints HTML with meta information for current post: categories, tags, permalink, author, and date.
 *
 * Create your own uniskies_entry_meta() to override in a child theme.
 *
 * @since Uniskies 1.0
 */
function uniskies_entry_meta() {
	// Translators: used between list items, there is a space after the comma.
	$categories_list = get_the_category_list( __( ', ', 'uniskies' ) );

	// Translators: used between list items, there is a space after the comma.
	$tag_list = get_the_tag_list( '', __( ', ', 'uniskies' ) );

	$date = sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a>',
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() )
	);

	$author = sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span>',
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		esc_attr( sprintf( __( 'View all posts by %s', 'uniskies' ), get_the_author() ) ),
		get_the_author()
	);

	// Translators: 1 is category, 2 is tag, 3 is the date and 4 is the author's name.
	if ( $tag_list ) {
		$utility_text = __( 'This entry was posted in %1$s and tagged %2$s on %3$s<span class="by-author"> by %4$s</span>.', 'uniskies' );
	} elseif ( $categories_list ) {
		$utility_text = __( 'This entry was posted in %1$s on %3$s<span class="by-author"> by %4$s</span>.', 'uniskies' );
	} else {
		$utility_text = __( 'This entry was posted on %3$s<span class="by-author"> by %4$s</span>.', 'uniskies' );
	}

	printf(
		$utility_text,
		$categories_list,
		$tag_list,
		$date,
		$author
	);
}
endif;

/**
 * Extends the default WordPress body class to denote:
 * 1. Using a full-width layout, when no active widgets in the sidebar
 *    or full-width template.
 * 2. Front Page template: thumbnail in use and number of sidebars for
 *    widget areas.
 * 3. White or empty background color to change the layout and spacing.
 * 4. Custom fonts enabled.
 * 5. Single or multiple authors.
 *
 * @since Uniskies 1.0
 *
 * @param array Existing class values.
 * @return array Filtered class values.
 */
function uniskies_body_class( $classes ) {
	$background_color = get_background_color();

	if ( ! is_active_sidebar( 'sidebar-1' ) || is_page_template( 'page-templates/full-width.php' ) )
		$classes[] = 'full-width';

	if ( is_page_template( 'page-templates/front-page.php' ) ) {
		$classes[] = 'template-front-page';
		if ( has_post_thumbnail() )
			$classes[] = 'has-post-thumbnail';
		if ( is_active_sidebar( 'sidebar-2' ) && is_active_sidebar( 'sidebar-3' ) )
			$classes[] = 'two-sidebars';
	}

	if ( empty( $background_color ) )
		$classes[] = 'custom-background-empty';
	elseif ( in_array( $background_color, array( 'fff', 'ffffff' ) ) )
		$classes[] = 'custom-background-white';

	// Enable custom font class only if the font CSS is queued to load.
	if ( wp_style_is( 'uniskies-fonts', 'queue' ) )
		$classes[] = 'custom-font-enabled';

	if ( ! is_multi_author() )
		$classes[] = 'single-author';

	return $classes;
}
add_filter( 'body_class', 'uniskies_body_class' );

/**
 * Adjusts content_width value for full-width and single image attachment
 * templates, and when there are no active widgets in the sidebar.
 *
 * @since Uniskies 1.0
 */
function uniskies_content_width() {
	if ( is_page_template( 'page-templates/full-width.php' ) || is_attachment() || ! is_active_sidebar( 'sidebar-1' ) ) {
		global $content_width;
		$content_width = 960;
	}
}
add_action( 'template_redirect', 'uniskies_content_width' );

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @since Uniskies 1.0
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 * @return void
 */
function uniskies_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
}
add_action( 'customize_register', 'uniskies_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 *
 * @since Uniskies 1.0
 */
function uniskies_customize_preview_js() {
	wp_enqueue_script( 'uniskies-customizer', get_template_directory_uri() . '/js/theme-customizer.js', array( 'customize-preview' ), '20120827', true );
}
add_action( 'customize_preview_init', 'uniskies_customize_preview_js' );

function check_script(){
	global $script_config;
    if (is_array($script_config['css']) && !empty($script_config['css'])){
		foreach($script_config['css'] as $key=>$value){
			echo '<link rel="stylesheet" href="'.get_template_directory_uri().'/css/'.$value.'.css" type="text/css" id="twentytwelve-extra_css_'.$key.'"></style>';
		}
	}
	
    if (is_array($script_config['js']) && !empty($script_config['js'])){
		foreach($script_config['js'] as $key=>$value){
			echo '<script type="text/javascript" src="'.get_template_directory_uri().'/js/'.$value.'.js" id="twentytwelve-extra_scrip_'.$key.'"></script>';
		}
	}
}

add_filter('wp_head', 'check_script');


if ( ! function_exists( 'get_header_menus' ) ) :
/**
 * Get pages first and second categories 
 * Add Html for header 
 */
function get_header_menus() {
	$html = '';
	$homeid = get_option('page_on_front');
	$args = array(
		'sort_order' => 'ASC',
		'sort_column' => 'menu_order',
		'child_of' => $homeid,
		'parent' => $homeid,
		'post_type' => 'page',
		'post_status' => 'publish'
	); 
	$pages = get_pages($args);
	global $post;
	global $post_breadcrumb;
	$_post = $post;
	$ary = array();
	if($post->post_type == "page"){
		$ary[] = $_post->ID;
		while($_post->post_type != "post" && $_post->post_parent != $homeid && $_post->ID != $homeid){
			$_post = get_post($_post->post_parent);
			$ary[] = $_post->ID;
		}
	}
	else{
		foreach ($post->post_category as $key => $cid) {
			$_post = get_page_by_cid($cid);
		}
		$_post = $_post[0];
		$ary[] = $_post->ID;
		$post_breadcrumb = "<a href='".get_permalink($_post->ID)."'>".$_post->post_title."</a> > ". $post->post_title;
		while ( $_post->ID != $homeid ) {
			$_post = get_post($_post->post_parent);
			$ary[] = $_post->ID;
			$post_breadcrumb = "<a href='".get_permalink($_post->ID)."'>".$_post->post_title."</a> > ".$post_breadcrumb;
		}
	}

	if(count($pages) > 0){
		$html .= '<ul class="headerNav">';
		foreach($pages as $key=>$value){
			$mark = in_array($value->ID, $ary) ? "current" : "";
			$html .= '<li><a class="'.$mark.'" href="'.get_page_link($value->ID).'">'.$value->post_title.'</a></li>';
		}
		$html .= '</ul>';
	}
	echo $html;
}
endif;


function get_feature_news($pid, $num = 1) {
	$args = array(
		'sort_order' => 'desc',
		'sort_column' => 'post_date',
		'child_of' => $pid,
		'parent' => $pid,
		'post_type' => 'page',
		'post_status' => 'publish',
		'hierarchical' => 0,
		'number' => $num,
		'meta_key' => 'feature_news',
		'meta_value' => true
	);
	$featureNews = get_pages($args);
	if(count($featureNews) == $num){
		return $featureNews;
	}
	else{
		$latest_news = get_latest_news($pid, $num - count($featureNews));
		return array_merge($featureNews,$latest_news);
	}
}
function get_feature_posts($pid, $num = 1) {
	$cid = get_field('post_category',$pid);
	$args = array(
		'order' => 'desc',
		'orderby' => 'post_date',
		'category' => $cid,
		'post_type' => 'post',
		'post_status' => 'publish',
		'posts_per_page' => $num,
		'meta_key' => 'feature_news',
		'meta_value' => true
	);
	$featureNews = get_posts($args);
	if(count($featureNews) == $num){
		return $featureNews;
	}
	else{
		$latest_news = get_latest_posts($pid, $num - count($featureNews));
		return array_merge($featureNews,$latest_news);
	}
}

function get_latest_news($pid, $num = 1, $featureId = "") {
	$args = array(
		'sort_order' => 'desc',
		'sort_column' => 'post_date',
		'child_of' => $pid,
		'parent' => $pid,
		'post_type' => 'page',
		'post_status' => 'publish',
		'hierarchical' => 0,
		'number' => $num,
		'exclude' => $featureId
	);
	$latest_news = get_pages($args);
	return $latest_news;
}

function get_latest_posts($pid, $num = 1, $featureId = "") {
	$cid = get_field('post_category',$pid);
	$args = array(
		'order' => 'desc',
		'orderby' => 'post_date',
		'category' => $cid,
		'post_type' => 'post',
		'post_status' => 'publish',
		'posts_per_page' => $num,
		'exclude' => $featureId
	);
	$latest_news = get_posts($args);
	return $latest_news;
}

function get_page_list($pid){
	$page_index = isset($_REQUEST["i"])?$_REQUEST["i"]:1;
	$posts_per_page = isset($_REQUEST["j"])?$_REQUEST["j"]:10;
	$offset = ($page_index - 1) * $posts_per_page;

	$args = array(
		'sort_order' => 'desc',
		'sort_column' => 'post_date',
		'child_of' => $pid,
		'parent' => $pid,
		'number' => $posts_per_page,
		'offset' => $offset,
		'post_type' => 'page',
		'post_status' => 'publish'
	); 
	$pages = get_pages($args);
	return $pages;
}

function utf8_substr($StrInput,$strStart,$strLen)
{
//對字串做URL Eecode
	$StrInput = mb_substr($StrInput,$strStart,mb_strlen($StrInput));
	$iString = urlencode($StrInput);
	$lstrResult="";
	$istrLen = 0;
	$k = 0;
	do{
		$lstrChar = substr($iString, $k, 1);
		if($lstrChar == "%"){
			$ThisChr = hexdec(substr($iString, $k+1, 2));
			if($ThisChr >= 128){
				if($istrLen+3 < $strLen){
					$lstrResult .= urldecode(substr($iString, $k, 9));
					$k = $k + 9;
					$istrLen+=3;
				}else{
					$k = $k + 9;
					$istrLen+=3;
				}
			}else{
				$lstrResult .= urldecode(substr($iString, $k, 3));
				$k = $k + 3;
				$istrLen+=2;
			}
		}else{
			$lstrResult .= urldecode(substr($iString, $k, 1));
			$k = $k + 1;
			$istrLen++;
		}
	}while ($k < strlen($iString) && $istrLen < $strLen); 
	return $lstrResult;
}

function cut_content($content,$cutLen){
	$cut_content = utf8_substr(strip_tags($content),0,$cutLen);
	if($cut_content == strip_tags($content)){
		return $cut_content;
	}
	else{
		return $cut_content."...";
	}
}

function get_post_breadcrumb(){
	global $post;
	$homeid = get_option('page_on_front');
	foreach ($post->post_category as $key => $cid) {
		$_post = get_page_by_cid($cid);
	}
	$_post = $_post[0];
	$post_breadcrumb = "<a href='".get_permalink($_post->ID)."'>".$_post->post_title."</a> > <strong>". $post->post_title ."</strong>";
	while ( $_post->ID != $homeid ) {
		$_post = get_post($_post->post_parent);
		$post_breadcrumb = "<a href='".get_permalink($_post->ID)."'>".$_post->post_title."</a> > ".$post_breadcrumb;
	}
	return $post_breadcrumb;
}

function get_page_by_cid($cid){
	$args = array(
		'post_type' => 'page',
		'post_status' => 'publish',
		'hierarchical' => 0,
		'number' => 1,
		'meta_key' => 'post_category',
		'meta_value' => $cid
	);
	return get_pages($args);
}