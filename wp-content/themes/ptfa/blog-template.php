<?php
/**
*Template Name: Custom Template
*/

get_header(); ?>
<section class="blog_section">
    <div>
        <?php

        //THE QUERY
        $args = array(
            'post_type'      => 'post',
            'posts_per_page' => 10,
            'order'          => 'DESC
            ',
            'orderby'        => 'title'
            );
        $the_query = new WP_Query ($args);

        //THE LOOP...checks if there is posts for this new query
        if ($the_query-> have_posts() ) {
            echo '<ul>';
            while ( $the_query-> have_posts() ) {
                $the_query->the_post();
                echo '<li>';
                echo '<div class="ptfa_blog">';
                echo get_the_post_thumbnail();
                echo '<h2><a href=" ' .esc_url( get_permalink() ) . '"' . get_the_title() . '</a></h2>';
                echo '</div>';
                echo '</li>';
            }
            echo '</ul>';
        } else {
            echo '<div class="noblog">';
            echo '<img src="http://localhost/ptfa/wp-content/uploads/2018/04/no-articles-ptfa.png"/>';
            echo '<h1> We unfortunately don\'t any news for you!</h1><p> Sorry....Please check back later.</p> ';
            echo '</div>';
        }
        /*Restore Original Post Data */
        wp_reset_postdata();
        ?>
    </div>
</section>

<?php get_footer(); ?>
