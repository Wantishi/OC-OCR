<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package oc-ocr
 */

?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="feat-img-wrap">
			<img class="feat-img" src="<?php the_post_thumbnail_url( 'medium_large' ); ?>">
		</div>
		<div class="content-wrap">
			<div class="entry-meta">
				<a href="<?php the_permalink(); ?>" class="">
					<h1 class="page-title"><?php the_title(); ?></h1>
				</a>
				<span class="author"><?php the_author_posts_link(); ?></span>
			</div>
			<p class="entry-excerpt"><?php echo excerpt(30); ?></p>
			<a href="<?php the_permalink(); ?>" class="read-more txt-link">Read More</a>
		</div>
	</article><!-- #post-<?php the_ID(); ?> -->
