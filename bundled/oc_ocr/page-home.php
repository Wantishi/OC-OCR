<?php
/**
 * Template Name: Home
 *
 *
 * @package oc-ocr
 */

get_header();
?>

	<div id="primary" class="content-area">

		<div id="hero-slider">
			<div class="slider-frame"></div>
			<div class="slider-wrap-desktop">
				<div class="slider slider-left">
					<?php 
					echo do_shortcode('[smartslider3 slider=2]');
					?>
				</div>
				<div class="slider slider-center">
					<?php echo do_shortcode('[smartslider3 slider=8]');?>
				</div>
				<div class="slider slider-right">
			    	<?php 
					echo do_shortcode('[smartslider3 slider=9]');
					?>
			  	</div>
			</div>
			<div class="slider-wrap-mobile">
				<div class="slider">
					<?php 
					echo do_shortcode('[smartslider3 slider=10]');
					?>
				</div>
			</div>
		</div>
		
		<main id="main" class="site-main">

			<section class="text-banner">
			  	<div class="container">
			    	<h2>A network of obstacle course racing athletes and enthusiasts<br> around Orange County, California</h2>
			  	</div>
			</section>

			<div class="container">
				<div class="post-loop">
					<?php 
						$temp = $wp_query; $wp_query= null;
						$wp_query = new WP_Query(); $wp_query->query('posts_per_page=5' . '&paged='.$paged);
						while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
						
						<article>
							<div class="feat-img-wrap">
								<img class="feat-img" src="<?php the_post_thumbnail_url( 'medium_large' ); ?>">
							</div>
							<div class="content-wrap">
								<div class="entry-meta">
									<a href="<?php the_permalink(); ?>" class="">
										<h1 class="page-title"><?php the_title(); ?></h1>
									</a>
									<span class="author"><?php the_author_posts_link(); ?></span> // 
									<span class="post-category"><?php the_category(); ?></span>
								</div>
								<p class="entry-excerpt"><?php echo excerpt(40); ?></p>
								<a href="<?php the_permalink(); ?>" class="read-more txt-link">Read More</a>
							</div>
							
						</article>

					<?php endwhile; ?>
				</div>
			</div> <!-- .container -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
// get_sidebar();
get_footer();
