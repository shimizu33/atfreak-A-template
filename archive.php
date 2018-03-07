<?php
/*
Template Name: archive(固定ページテンプレート)
 */
?>
<?php get_header(); ?>
<article id="wanted-list" class="top-sec">
<div class="inner">
<h2>募集中の求人一覧</h2>
<?php get_template_part('template-post/content-archive'); ?>
</div>
</article>
<?php
  echo paginate_links(array(
  'prev_text' => '<',
  'next_text' => '>',
  'type' => 'list',
));
?>
<?php get_footer(); ?>
