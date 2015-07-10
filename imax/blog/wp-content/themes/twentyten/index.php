<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

get_header(); ?>

<?php get_sidebar(); ?>

<!--	<div id="left_column">
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


		<h2>Archivws</h2>
		<img src="../images/blog/blog_ine_w.gif">		
		<ul style="margin-bottom:30px;">		
		<?php wp_get_archives('type=monthly'); ?>
		</ul>
	</div>-->

<!--

<?php get_sidebar(); ?>
-->

	<div id="right_column"style="float:left;width:590px;margin-left:30px;">
			<?php
			 get_template_part( 'loop', 'index' );
			?>
			</div><!-- #content -->
	</div>
		</div><!-- #container -->

		</div>
	</div>
</div>
<?php get_footer(); ?>
