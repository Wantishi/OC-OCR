<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package oc-ocr
 */

get_header();
?>
	<div class="container clearfix">

        <div id="page-content" class="">

		<h2>Upcoming Events</h2>

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
                            <div class="loc-date">
                                <p class="event-location">
                                    <?php if( get_field('event_location') ): ?>
                                        <?php the_field('event_location'); ?>
                                    <?php endif; ?>
                                </p>
                                <p class="event-dates">
                                    <?php the_field('event_date_1'); 
                                    if( get_field('event_date_2') ): ?>
                                        - <?php the_field('event_date_2'); ?>
                                    <?php endif; ?>
                                </p>
                            </div>
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

