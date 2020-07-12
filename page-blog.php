<?php
/**
 * Template Name: Blog Pages
 *
 *
 * @package oc-ocr
 */

get_header();
?>
	<div class="container clearfix">

        <div id="page-content" class="">

            <h2>All Articles</h2>

            <ul class="post-loop">

            <!-- The Loop -->

            <?php 
                $temp = $wp_query; $wp_query= null;
                $args = array(  
                    'post_type' => array('post','trail_runs'),
                    'post_status' => 'publish',
                    'posts_per_page' => 5
                );
                $wp_query = new WP_Query(); $wp_query->query($args);
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
                            </span> 
                        </div>
                        <p class="entry-excerpt"><?php echo excerpt(30); ?></p>
                        <a href="<?php the_permalink(); ?>" class="read-more txt-link">Read More</a>
                    </div>
                    
                </article>

            <?php endwhile; ?>
            
            <div class="navigation">
                <div class="alignleft"><?php previous_posts_link( '&laquo; Newer Articles' ); ?></div>
                <div class="alignright"><?php next_posts_link( 'Previous Articles &raquo;', '' ); ?></div>
            </div>


            <!-- End Loop -->

            </ul>
        </div>
        <?php get_sidebar();?>
	</div>

<?php get_footer(); ?>

