<?php
  $args = array(
    'post_type' => 'post',
    'posts_per_page' => 10,
  );
  $q = new WP_Query( $args );
?>
<?php if($q->have_posts()): while($q->have_posts()): $q->the_post(); ?>
<div class="article-wrap"><a href="<?php the_permalink(); ?>">
<div class="trim">
<?php the_post_thumbnail('small'); ?>
</div>
</a>
<div class="right-box">
<h3><?php the_title(); ?></a></h3>
<dl>
<dt><span><img src="<?php echo get_template_directory_uri(); ?>/img/common/job_icon.png"></span>職種</dt>
<dd><?php the_field('requirements_required1'); ?></dd>
</dl>
<dl>
<dt><span><img src="<?php echo get_template_directory_uri(); ?>/img/common/map_icon.png"></span>勤務地</dt>
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
<dt><span><img src="<?php echo get_template_directory_uri(); ?>/img/common/person_icon.png"></span>雇用形態</dt>
<dd><?php the_field('requirements_required8'); ?></dd>
</dl>
</div>
</div>
<?php endwhile; ?>
<?php else: ?>
  <p><?php echo '記事はありません。'; ?></p>
<?php endif; ?>
