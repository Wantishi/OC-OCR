<?php
/**
 * @package oc-ocr
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header>
		<h2 class="post-category"><?php the_category(); ?></h2>
		<h1 class="page-title"><?php the_title(); ?></h1>

		<div class="entry-meta">
			<!-- <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><?php the_author(); ?></a> // <?php the_modified_date(); ?> -->
			<span class="author"><?php the_author(); ?></span> // <?php the_modified_date(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content">
		<div class="row mast">
			<div class="entry-content-thumbnail">
				<?php the_post_thumbnail(); ?>
			</div>
		</div>
		
		<?php the_content(); ?>
	</div><!-- .entry-content -->

</article><!-- #post-## -->
