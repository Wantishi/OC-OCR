<?php
/**
 * The template for displaying all single EVENT posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package oc-ocr
 */

get_header();
?>
	<div class="container clearfix">

		<div id="page-content" class="">

			<?php
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content-trails', get_post_type() );

				// the_post_navigation(); ?>
				<div class="post-navigation">
					<div class="alignleft">
						<?php previous_post_link(); ?>
					</div>
					<div class="alignright">
						<?php next_post_link(); ?>
					</div>
				</div> <!-- end navigation -->

			<?php endwhile; // End of the loop.
			?>

		</div><!-- #page-content -->
		<?php get_sidebar();?>
	</div><!-- .container -->

<?php get_footer(); ?>
