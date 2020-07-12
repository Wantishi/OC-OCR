<?php
/**
 * Template Name: Author
 *
 *
 * @package oc-ocr
 */

get_header();
?>
	<div class="container clearfix">
	
		<!-- <section class="pad-wrapper"> -->

			<div id="page-content" class="">

			    <?php
				global $curauth, $userID;
				$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
				$userID = $curauth->ID;
				$nickname = $curauth->nickname;
				$names = explode(" ", $nickname); 
			    ?>
				
				<div class="intro">
					<div class="pic-wrap">
						<div class="author-frame"></div>
						<div class="avatar-wrap" style="background-image: url('<?php echo get_avatar_url( $curauth->user_email); ?>')"></div>	
					</div>

					<div class="author-info">
						<h2 class="author-name"><?php echo $curauth->nickname; ?></h2>
						<p class="author-city"><span class="label">City:</span> <?php the_field('city', 'user_'.$userID); ?></p>
						<div class="social-accounts">
							<?php if( get_field('facebook', 'user_'.$userID) ): ?>
								<a href="<?php the_field('facebook', 'user_'.$userID); ?>" target="_blank"><span class="social facebook"></span></a>
							<?php endif; ?>
							<?php if( get_field('twitter', 'user_'.$userID) ): ?>
								<a href="<?php the_field('twitter', 'user_'.$userID); ?>" target="_blank"><span class="social twitter"></span></a>
							<?php endif; ?>
							<?php if( get_field('instagram', 'user_'.$userID) ): ?>
								<a href="<?php the_field('instagram', 'user_'.$userID); ?>" target="_blank"><span class="social instagram"></span></a>
							<?php endif; ?>
						</div>
						<div class="image-gallery">
							<?php 

							$images = get_field('image_gallery', 'user_'.$userID);

							if( $images ): ?>
								<div id="author-carousel" class="gallery">
									<?php foreach( $images as $image ): ?>

										<a href="<?php echo $image['url']; ?>" target="_blank" class="thumbnail"> 
											<img src="<?php echo $image['sizes']['medium']; ?>" alt="<?php the_title(); ?>" /> 
										</a> 

									<?php endforeach; ?>
								</div>
							<?php endif; ?>
						</div>

					</div>
				</div>
			     
			    
			    <div class="profile">
			        <p><?php echo $curauth->user_description; ?></p>
			    </div>

			    <h3>Posts by <?php echo $curauth->nickname; ?>:</h3>

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
								<span class="author"><?php the_author_posts_link(); ?></span> // 
								<span class="post-category"><?php the_category(); ?></span>
							</div>
							<p class="entry-excerpt"><?php echo excerpt(30); ?></p>
							<a href="<?php the_permalink(); ?>" class="read-more txt-link">Read More</a>
						</div>
						
					</article>

			    <?php endwhile; else: ?>
			        <p><?php _e('No posts by this author.'); ?></p>

			    <?php endif; ?>

				<!-- End Loop -->

			    </ul>
			</div>
		
			<aside id="secondary" class="widget-area manual">
				<section id="gear-widget" class="widget athlete_widget">
					<h3 class="widget-title">Favorite Gear</h3>
					<p><span class="label">Top:</span> 
						<?php if( get_field('tops', 'user_'.$userID) ): ?>
							<?php the_field('tops', 'user_'.$userID); ?>
						<?php endif; ?>
					</p>
					<p><span class="label">Bottom:</span> 
						<?php if( get_field('bottoms', 'user_'.$userID) ): ?>
							<?php the_field('bottoms', 'user_'.$userID); ?>
						<?php endif; ?>
					</p>
					<p><span class="label">Shoes:</span> 
						<?php if( get_field('shoes', 'user_'.$userID) ): ?>
							<?php the_field('shoes', 'user_'.$userID); ?>
						<?php endif; ?>
					</p>
					<p><span class="label">Socks:</span> 
						<?php if( get_field('socks', 'user_'.$userID) ): ?>
							<?php the_field('socks', 'user_'.$userID); ?>
						<?php endif; ?>
					</p>
					<p><span class="label">Hydration Pack:</span> 
						<?php if( get_field('hydration', 'user_'.$userID) ): ?>
							<?php the_field('hydration', 'user_'.$userID); ?>
						<?php endif; ?>
					</p>
				</section>

				<section id="nutrition-widget" class="widget athlete_widget">
					<h3 class="widget-title">Nutrition</h3>
					<p><span class="label">Pre:</span> 
						<?php if( get_field('pre', 'user_'.$userID) ): ?>
							<?php the_field('pre', 'user_'.$userID); ?>
						<?php endif; ?>
					</p>
					<p><span class="label">During:</span> 
						<?php if( get_field('race', 'user_'.$userID) ): ?>
							<?php the_field('race', 'user_'.$userID); ?>
						<?php endif; ?>
					</p>
					<p><span class="label">Recovery:</span> 
						<?php if( get_field('recovery', 'user_'.$userID) ): ?>
							<?php the_field('recovery', 'user_'.$userID); ?>
						<?php endif; ?>
					</p>
				</section>

				<section id="race-widget" class="widget athlete_widget">
					<h3 class="widget-title">Upcoming Races</h3>
					<ul class="racelist">
						<?php 
							if( get_field('race_list', 'user_'.$userID) ):
								$racelist = get_field('race_list', 'user_'.$userID);
								$racelistArray = explode(',', $racelist);
								foreach( $racelistArray as $race ): 
									echo '<li class="race">' . $race . '</li>';
								endforeach;
							endif; ?>
					</ul>
				</section>

				<section id="athlete-poppost-widget" class="widget athlete_widget">
					<h3 class="widget-title"><?php echo $names[0]; ?>'s Popular Posts</h3>
					<?php
						if (function_exists('wpp_get_mostpopular')) {
							wpp_get_mostpopular(array(
								'limit' => 5,
								'author' => $userID,
								'post_html' => '<li><a href="{url}">{text_title}</a></li>'
							));
						}
						?>

				</section>
			</aside>

		<!-- </section> -->

	</div>

<?php get_footer(); ?>


<script>
$(document).ready(function(){ 
	$('#author-carousel').slick({
		dots: false,
		infinite: true,
  		slidesToShow: 3,
  		slidesToScroll: 1,
		variableWidth: true
  	});
   	$('.gallery').slickLightbox({ 
		itemSelector: '.thumbnail' 
   	}); 
});
</script>
