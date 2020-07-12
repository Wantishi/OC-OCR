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

            <?php 
            global $wp;
            $s_array = array( 
                'posts_per_page'    => 50, 
                'meta_key'		    => 'event_date_1',
                'orderby'			=> 'meta_value',
                'order'             =>'ASC' 
            );  
            $new_query = array_merge( $s_array, (array) $wp->query_vars );
            
            $the_query = new WP_Query( $new_query );

            // The Loop
            if ( $the_query->have_posts() ) {
                
                while ( $the_query->have_posts() ) {
                    $the_query->the_post(); 
                    
                    $todayDate = time(); 
                    $postDate = get_field('event_date_1');
                    $postDateTime = strtotime($postDate);
                    // echo $todayDate; 
                    // echo "<br>";
                    // echo $postDate;
                    // echo "<br>";
                    // echo $postDateTime;
                    if ( $postDateTime >= $todayDate ) {  ?>
                        
                        <article class="clearfix">
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
                            
                        </article><?php
                    }
                }
            
                /* Restore original Post Data */
                wp_reset_postdata();
            } ?>

            <!-- End Loop -->

            </ul>
        </div>
        <?php get_sidebar();?>
	</div>

<?php get_footer(); ?>