<?php
/**
 * The Sidebar containing the primary and secondary widget areas.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
?>

	<div id="left_column">
		<h2>Recent Entry</h2>
		<img src="../images/blog/blog_ine_w.gif">
		<ul style="margin-bottom:30px;">
		<?php wp_get_archives('type=postbypost&limit=10&format=html'); ?>	
		</ul>

		<h2>Search</h2>		
		<img src="../images/blog/blog_ine_w.gif">
		<?php get_search_form(); ?>
		<ul style="margin-bottom:30px;">		
		</ul>


		<h2>Archives</h2>
		<img src="../images/blog/blog_ine_w.gif">		
		<ul style="margin-bottom:30px;">		
		<?php wp_get_archives('type=monthly'); ?>
		</ul>
	</div>