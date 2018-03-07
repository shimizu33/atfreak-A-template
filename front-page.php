<?php get_header(); ?>
<div id="top-slider">
<ul>
  <li><img src="<?php echo get_template_directory_uri(); ?>/img/test.jpg"></li>
</ul>
</div>
<article id="notice-job" class="top-sec">
<div class="inner">
<h2>注目の求人</h2>
<?php get_template_part('template-post/content-feature'); ?>
</div>
</article>
<article id="wanted-list" class="top-sec">
<div class="inner">
<h2>募集中の求人</h2>
<?php get_template_part('template-post/content'); ?>
</div>
</article>
<div class="job-list">
<a href="<?php echo get_category_link(1); ?>"><p>募集中一覧</p></a>
</div>
<?php get_footer(); ?>
