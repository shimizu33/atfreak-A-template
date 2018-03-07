<?php query_posts('cat=3&posts_per_page=3&order=DESC'); ?>
<?php if(have_posts()): while(have_posts()): the_post(); ?>
    <div class="article-wrap">
      <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('medium'); ?></a>
    <div class="right-box">
    <dl>
      <dt><span><img src="<?php echo get_template_directory_uri(); ?>/img/common/job_icon.png"></span>職種</dt>
    <dd>
<?php
$text = mb_substr(get_field('requirements_required1'),0,12,'utf-8');
$text_length = mb_strlen($text);
if ($text_length === 11) {
  $omission = '...';
}
echo $text . $omission;
$omission = '';
?>
    </dd>
    </dl>
    <dl>
      <dt><span><img src="<?php echo get_template_directory_uri(); ?>/img/common/map_icon.png"></span>勤務地</dt>
      <dd>
<?php
$text = mb_substr(get_field('requirements_required4'),0,12,'utf-8');                 $text_length = mb_strlen($text);
if ($text_length === 11) {
  $omission = '...';
}
echo $text . $omission;
$omission = '';
?>
      </dd>
    </dl>
    <dl>
      <dt><span><img src="<?php echo get_template_directory_uri(); ?>/img/common/person_icon.png"></span>雇用形態</dt>
      <dd><?php the_field('requirements_required8'); ?></dd>
    </dl>
    </div>
    </div>
    <?php $count = 2 ?>
  <?php endwhile; ?>
  <?php else: ?>
      <div class="no-article">
        <p>まだお気に入り記事が選択されていません。</p>
      </div>
  <?php endif; ?>
