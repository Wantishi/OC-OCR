<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package oc-ocr
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) :
			?>
        <?php endif; ?>
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

	</header><!-- .entry-header -->



	<div class="entry-content">
		<?php
		the_content( sprintf(
			wp_kses(
				/* translators: %s: Name of current post. Only visible to screen readers */
				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'oc-ocr' ),
				array(
					'span' => array(
						'class' => array(),
					),
				)
			),
			get_the_title()
        ) );
        ?>
        <div class="website">
            <p class="event-link">
                <?php if( get_field('event_link') ): ?>
                    <a href="<?php the_field('event_link'); ?>" target="new"><?php the_field('event_link'); ?></a>
                <?php endif; ?>
            </p>
        </div>
        <?php

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'oc-ocr' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php oc_ocr_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
