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
						$args = array(  
							'post_type' => array('post','trail_runs'),
							'post_status' => 'publish',
							'posts_per_page' => 7
						);
						// query_posts( $args );
						$wp_query = new WP_Query($args); $wp_query->query($args);
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
									<span class="author">
										<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author_meta( 'nickname' ); ?></a>
									</span>  // 
									<span class="post-category"><?php the_category(); ?></span>
								</div>
								<p class="entry-excerpt"><?php echo excerpt(40); ?></p>
								<a href="<?php the_permalink(); ?>" class="read-more txt-link">Read More</a>
							</div>
							
						</article>

					<?php endwhile; ?>
					<div class="navigation home-page">
						<div class="alignright"><a href="/blog/">All Articles &raquo;</a></div>
					</div>
				</div>
				
			</div> <!-- .container -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
// get_sidebar();
get_footer();
