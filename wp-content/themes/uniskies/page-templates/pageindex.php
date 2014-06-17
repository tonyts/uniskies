<?php
/**
 * Template Name: Page Index
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
$script_config['css'] = array('pageindex','portlet-latest');
$script_config['js'] = array();


$page_index = isset($_REQUEST["i"])?$_REQUEST["i"]:1;
$posts_per_page = isset($_REQUEST["j"])?$_REQUEST["j"]:10;
$offset = ($page_index - 1) * $posts_per_page;
$cid = get_field('post_category');
$args = array(
	'cat'      => $cid,
	'posts_per_page'     => $posts_per_page,
	'orderby' => 'post_date',
	'order' => 'DESC',
	'offset' => $offset
);

$the_query = new WP_Query( $args );

$max_num_pages = $the_query->max_num_pages;
$show_num_pages = 5;

$cur_page_url = get_permalink();

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
				<span class="notch"></span>
				<?php get_sidebar("latestnews"); ?>
				<h2><?php the_title(); ?></h2>
				<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
				<h3><a class="noLine" href="<?php echo get_permalink() ?>"><?php echo $post->post_title ?></a></h3>
				<p><?php echo cut_content($post->post_content,400) ?><br>
				<span class="date"><?php echo mysql2date('jS F, Y', $post->post_date) ?></span></p>
				<?php endwhile; ?>
				<div class="pageIndicator">
					<?php
						if($max_num_pages != 1 && $max_num_pages>$show_num_pages){
							if($page_index<=ceil($show_num_pages/2)){
								if($page_index!=1)
									echo "<a class='prev' href='$cur_page_url&i=".($page_index-1)."'>Previous</a>";
								for ($i = 1; $i <= $show_num_pages; $i++) {
									$active = ($i==$page_index)?"class='active'":"";
									//$comma = ($i!=$show_num_pages)?", ":"";
									echo ($i==$page_index)? "<a $active >$i</a>" : "<a $active href='$cur_page_url&i=$i'>$i</a>";
								}
								echo "<a class='next' href='$cur_page_url&i=".($page_index+1)."'>Next</a>";
								echo "<a class='last' href='$cur_page_url&i=$max_num_pages'>Last</a>";
							}
							else if($page_index>=($max_num_pages-(int)($show_num_pages/2))){
								echo "<a class='first' href='$cur_page_url&i=1'>First</a>";
								echo "<a class='prev' href='$cur_page_url&i=".($page_index-1)."'>Previous</a>";
								for ($i = ($max_num_pages-$show_num_pages+1); $i <= $max_num_pages; $i++) {
									$active = ($i==$page_index)?"class='active'":"";
									//$comma = ($i!=$max_num_pages)?", ":"";
									echo ($i==$page_index)? "<a $active >$i</a>" : "<a $active href='$cur_page_url&i=$i'>$i</a>";
								}
								if($page_index!=$max_num_pages)
									echo "<a class='next' href='$cur_page_url&i=".($page_index+1)."'>Next</a>";
							}
							else{
								echo "<a class='first' href='$cur_page_url&i=1'>First</a>";
								echo "<a class='prev' href='$cur_page_url&i=".($page_index-1)."'>Previous</a>";
								for ($i = ($page_index-(int)($show_num_pages/2)); $i <= ($page_index+(int)($show_num_pages/2)); $i++) {
									$active = ($i==$page_index)?"class='active'":"";
									//$comma = ($i!=($page_index+(int)($show_num_pages/2)))?", ":"";
									echo ($i==$page_index)? "<a $active >$i</a>" : "<a $active href='$cur_page_url&i=$i'>$i</a>";
								}
								echo "<a class='next' href='$cur_page_url&i=".($page_index+1)."'>Next</a>";
								echo "<a class='last' href='$cur_page_url&i=$max_num_pages'>Last</a>";
							}
						}
						else if($max_num_pages != 1){
							if($page_index!=1)
								echo "<a class='prev' href='$cur_page_url&i=".($page_index-1)."'>Previous</a>";
							for ($i = 1; $i <= $max_num_pages; $i++) {
								$active = ($i==$page_index)?"class='active'":"";
								//$comma = ($i!=$max_num_pages)?", ":"";
								echo ($i==$page_index)? "<a $active >$i</a>" : "<a $active href='$cur_page_url&i=$i'>$i</a>";
							}
							if($page_index!=$max_num_pages)
								echo "<a class='next' href='$cur_page_url&i=".($page_index+1)."'>Next</a>";
						}
					?>
				</div>
				<div class="clear"></div>
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