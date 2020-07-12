<?php
/**
 * Template Name: Author List
 *
 *
 * @package oc-ocr
 */

get_header();
?>

    <div class="container clearfix">
        
            <div id="page-content" class="">
                        <h1>Our Athletes</h1>
                        
                        <?php
                            $display_admins = true;
                            $order_by = 'post_count'; // 'nicename', 'email', 'url', 'registered', 'display_name', or 'post_count'
                            $order = 'DESC'; // ASC, DESC
                            $role = ''; // 'subscriber', 'contributor', 'editor', 'author' - leave blank for 'all'
                            $avatar_size = 250;
                            $hide_empty = false; // hides authors with zero posts
                            

                            if(!empty($display_admins)) {
                                $blogusers = get_users('orderby='.$order_by.'&order='.$order.'&role='.$role);
                            } else {
                                $admins = get_users('role=administrator');
                                $exclude = array();
                                foreach($admins as $ad) {
                                    $exclude[] = $ad->ID;
                                }
                                $exclude = implode(',', $exclude);
                                $blogusers = get_users('exclude='.$exclude.'&orderby='.$order_by.'&role='.$role);
                            }
                            $authors = array();
                            foreach ($blogusers as $bloguser) {
                                $user = get_userdata($bloguser->ID);
                                if(!empty($hide_empty)) {
                                    $numposts = count_user_posts($user->ID);
                                    if($numposts < 1) continue;
                                }
                                $authors[] = (array) $user;
                            }

                            echo '<ul class="authors">';
                            foreach($authors as $author) {
                                $display_name = $author['data']->display_name;
                                $avatar = get_avatar($author['ID'], $avatar_size);
                                $avatarsrc = (string) reset(simplexml_import_dom(DOMDocument::loadHTML($avatar))->xpath("//img/@src"));
                                $author_profile_url = get_author_posts_url($author['ID']);
                                $description = get_userdata($author['ID'])->user_description;
                                $facebook = get_field('facebook', 'user_'.$author['ID']);
                                $twitter = get_field('twitter', 'user_'.$author['ID']);
                                $instagram = get_field('instagram', 'user_'.$author['ID']);

                                echo 
                                '<li class="author">
                                    <div class="author-img-wrap" style="background: url(\'', $avatarsrc, '\')  no-repeat center top; background-size:cover;" >
                                        
                                    </div>
                                    <a href="', $author_profile_url, '" class="author-name">', $display_name, '</a>
                                    <div class="social-accounts">';
                                
                                if (!empty($facebook)) {
                                    echo '<a href="', $facebook, '" target="_blank"><span class="social facebook"></span></a>';
                                }
                                if (!empty($twitter)) {
                                    echo '<a href="', $twitter, '" target="_blank"><span class="social twitter"></span></a>'; 
                                }
                                if (!empty($instagram)) {
                                    echo '<a href="', $instagram, '" target="_blank"><span class="social instagram"></span></a>'; 
                                }
                                    '</div>
                                </li>';
                            }
                            echo '</ul>';
                        ?>
                    </section>


            </div><!-- #page-content -->
            <?php get_sidebar('sidebar-1'); ?>
	</div><!-- .container -->

<?php

get_footer();
?>

