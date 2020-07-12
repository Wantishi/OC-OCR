<?php
/**
 * Template Name: Category
 *
 *
 * @package oc-ocr
 */

get_header();
?>
	<div class="container clearfix">

        <div id="page-content" class="">

            <h2><?php $cat = get_the_category(); echo $cat[0]->cat_name; ?></h2>

            <ul class="post-loop">

            <!-- The Loop -->

            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
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
                            </span> 
                        </div>
                        <p class="entry-excerpt"><?php echo excerpt(30); ?></p>
                        <a href="<?php the_permalink(); ?>" class="read-more txt-link">Read More</a>
                    </div>
                    
                </article>

            <?php endwhile; else: ?>
                <p><?php _e('No posts in this category.'); ?></p>

            <?php endif; ?>

            <!-- End Loop -->

            </ul>
        </div>
        <?php get_sidebar();?>
	</div>

<?php get_footer(); ?>

