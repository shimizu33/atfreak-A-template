<?php get_header(); ?>

<?php while ( have_posts() ) : the_post();  ?>

<article id="lower_page">

<h2 class="common_title"><span><?php the_title(); ?></span></h2>

<?php the_content(); ?>

</article>

<?php endwhile; ?>

<?php get_footer();