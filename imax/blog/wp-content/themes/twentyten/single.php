<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

get_header(); ?>
<!--
		<div id="container">
			<div id="content" role="main">
-->
<?php get_sidebar(); ?>

<div id="right_column"style="float:left;width:590px;margin-left:30px;">
			<?php
			/* Run the loop to output the post.
			 * If you want to overload this in a child theme then include a file
			 * called loop-single.php and that will be used instead.
			 */
			get_template_part( 'loop', 'single' );
			?>
</div><!-- #right_column -->
			</div><!-- #content -->
		</div><!-- #container -->
		</div>

<?php get_footer(); ?>
