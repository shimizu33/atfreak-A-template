<?php get_header(); ?>
<div id="top-slider">
<?php $posts = get_posts(array(
    'posts_per_page' => 3,
    'meta_key' => 'views',
    'orderby' => 'meta_value_num',
)); ?>
<ul>
<li><img src="<?php echo get_template_directory_uri(); ?>/img/test.jpg"></li>
</ul>
</div>
<section id="notice-job" class="top-sec">
<div class="inner">
<h2>注目の求人</h2>
<?php foreach($posts as $post) : ?>
<div class="article-wrap">
<a href="<?php the_permalink(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/test.jpg"></a>
<dl>
<dt>職種</dt>
<dd><?php the_field('requirements_required1'); ?></dd>
</dl>
<dl>
<dt>勤務地</dt>
<dd><?php
$text = mb_substr(get_field('requirements_required4'),0,12,'utf-8');
$text_length = mb_strlen($text);
if ($text_length === 12) {
  $omission = '...';
}
echo $text . $omission;
$omission = '';
?>
</dd>
</dl>
<dl>
<dt>雇用形態</dt>
<dd><?php the_field('requirements_required8'); ?></dd>
</dl>
</div>
<?php endforeach; ?>
</div>
</div>
</section>
<section id="wanted-list" class="top-sec">
<div class="inner">
<h2>募集中の求人</h2>
<?php
  $args = array(
    'post_type' => 'post',
    'posts_per_page' => 5,
  );
  $q = new WP_Query( $args );
?>
<?php if($q->have_posts()): while($q->have_posts()): $q->the_post(); ?>
<div class="article-wrap">
<a href="<?php the_permalink(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/test.jpg"></a>
<div class="right-box">
<h3><?php the_title(); ?></h3>
<dl>
<dt>職種</dt>
<dd><?php the_field('requirements_required1'); ?></dd>
</dl>
<dl>
<dt>勤務地</dt>
<dd><?php
$text = mb_substr(get_field('requirements_required4'),0,12,'utf-8');
$text_length = mb_strlen($text);
if ($text_length === 12) {
  $omission = '...';
}
echo $text . $omission;
$omission = '';
?>
</dd>
</dl>
<dl>
<dt>雇用形態</dt>
<dd><?php the_field('requirements_required8'); ?></dd>
</dl>
</div>
</div>
<?php endwhile; ?>
<?php else: ?>
  <p><?php echo '記事はありません。'; ?></p>
<? endif; ?>
</div>
</section>
<div class="job-list">
<a href="#">
<p>募集中一覧</p>
</a>
</div>
<?php get_footer();
