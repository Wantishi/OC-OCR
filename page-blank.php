<?php
/**
 * Template Name: Blank
 *
 *
 * @package oc-ocr
 */

get_header();
?>

<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<div class="container">

		        <?php if (have_posts()):while (have_posts()):the_post();?>

                    <p><?php the_content(__('(more...)'));?></p>
                
                    <?php endwhile;?>
                <?php endif;?>
            </div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
// get_sidebar();
get_footer();
