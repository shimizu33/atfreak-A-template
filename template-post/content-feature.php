<?php
  $args = array(
    'post_type' => 'post',
    'posts_per_page' => 3,
    'order'=>'DESC',
    'orderby'=>'post_date',
  );
  $f_post = new WP_Query( $args );
  $count = 1;
?>
<?php if($f_post->have_posts()): while($f_post->have_posts()): $f_post->the_post(); ?>  <?php if ( in_category( 'favorite' ) ): ?>
    <div class="article-wrap">
    <a href="<?php the_permalink(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/test.jpg"></a>    <dl>
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
    <?php $count = 2 ?>
  <?php else: ?>
    <?php if ($count === 1) : ?>
      <div class="no-article">
        <p>まだお気に入り記事が選択されていません。</p>
      </div>
      <?php $count = 2 ?>
    <?php endif; ?>
  <?php endif; ?>
<?php endwhile; ?>
<?php endif; ?>
