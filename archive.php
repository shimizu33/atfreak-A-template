<?php
/*
Template Name: archive(固定ページテンプレート)
 */
?>
<?php get_header(); ?>
<article id="article-wrap">
<?php if(have_posts()): while(have_posts()): the_post(); ?>
<p><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
<?php endwhile; ?>
<?php else: ?>
  <p>投稿がありません。</p>
<?php endif; ?>
<p>hello</p>
</article>
<?php get_footer(); ?>
