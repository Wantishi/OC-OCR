<?php
/**
 * Template Name: Category-events
 *
 *
 * @package oc-ocr
 */

get_header();
?>
	<div class="container clearfix">

        <div id="page-content" class="">

            <h2><?php $cat = 'event'; ?></h2>

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
                            <span class="author"><?php the_author_posts_link(); ?></span> 
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

