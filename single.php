<?php
$this_ID = get_the_ID();
get_header();
?>

<?php while ( have_posts() ) : the_post();  ?>

<div id="recruit_title"><div class="inner">
<div id="recruit_title_content">
<h2><?php the_title(); ?></h2>
<p>
<?php the_field('top_lead'); ?>
</p>
</div>
</div></div>



<?php if (has_post_thumbnail()): ?>
<?php
$image_id = get_post_thumbnail_id();
$image_url = wp_get_attachment_image_src($image_id, true);
?>
<div id="main_catch" style="background-image: url(<?php echo $image_url[0]; ?>)">
<?php else: ?>
<div id="main_catch">
<?php endif; ?>
<p>
<img src="<?php echo get_template_directory_uri(); ?>/img/main_catch.png" width="552" height="130" alt="女性がイキイキ&キラキラと働ける職場ですよ">
</p>
</div>



<article id="recruit_page">

<a href="#form" class="btn_form_anchor">ご応募はこちらから</a>


<h3 class="common_title"><span><?php the_field('title_first'); ?></span></h3>
<div class="recruit_intro">
<?php the_field('body_first'); ?>
</div>


<?php if( get_field('body_second') ) { ?>
<h3 class="common_title"><span><?php the_field('title_second'); ?></span></h3>
<div class="recruit_intro">
<?php the_field('body_second'); ?>

<?php
$photo_second1 = wp_get_attachment_image_src(get_field('photo_second1'), 'medium');
$photo_second2 = wp_get_attachment_image_src(get_field('photo_second2'), 'medium');
if ($photo_second1 && $photo_second2):
?>
<ul class="photo_list column2">
<li><img src="<?php echo $photo_second1[0]; ?>" width="<?php echo $photo_second1[1]; ?>" height="<?php echo $photo_second1[2]; ?>" alt="photo"></li>
<li><img src="<?php echo $photo_second2[0]; ?>" width="<?php echo $photo_second2[1]; ?>" height="<?php echo $photo_second2[2]; ?>" alt="photo"></li>
</ul>
<?php endif; ?>
</div>
<?php } ?>


<?php if( get_field('body_third') ) { ?>
<h3 class="common_title"><span><?php the_field('title_third'); ?></span></h3>
<div class="recruit_intro">
<?php the_field('body_third'); ?>

<?php
$photo_third1 = wp_get_attachment_image_src(get_field('photo_third1'), 'medium');
$photo_third2 = wp_get_attachment_image_src(get_field('photo_third2'), 'medium');
if ($photo_third1 && $photo_third2):
?>
<ul class="photo_list column2">
<li><img src="<?php echo $photo_third1[0]; ?>" width="<?php echo $photo_third1[1]; ?>" height="<?php echo $photo_third1[2]; ?>" alt="photo"></li>
<li><img src="<?php echo $photo_third2[0]; ?>" width="<?php echo $photo_third2[1]; ?>" height="<?php echo $photo_third2[2]; ?>" alt="photo"></li>
</ul>
<?php endif; ?>
</div>
<?php } ?>


<a href="#form" class="btn_form_anchor">ご応募はこちらから</a>


<div class="recruit_data">
<h3><?php the_title(); ?>の仕事</h3>
<h4><?php the_field('job_name'); ?></h4>
<?php the_field('work_description'); ?>
</div>


<a href="#form" class="btn_form_anchor">ご応募はこちらから</a>


<div class="recruit_data">
<h3><?php the_title(); ?>の募集要項</h3>
<table class="requirements_data">
<tbody>
<?php
for ($i=1; $i<9; $i++) {
	$fieldobject = get_field_object('requirements_required'.$i);
	echo '<tr><th>' . $fieldobject['label'] . '</th><td>' . get_field('requirements_required'.$i) . '</td></tr>' . "\n";
}
for ($i=1; $i<16; $i++) {
   	$title = get_field('requirements_title'.$i);
	if($title) {
		echo '<tr><th>' . $title . '</th><td>' . get_field('requirements_body'.$i) . '</td></tr>' . "\n";
	}
}
?>
</tbody>
</table>
</div>


<div class="recruit_data">
<h3>会社概要</h3>
<table class="company_data">
<tbody>
<?php
$common_post_id = get_page_by_path('recruit_common', 'OBJECT', 'recruit_common_post');
$common_post_id = $common_post_id->ID;
$args = array('posts_per_page' => 1, 'include' => $common_post_id, 'post_type' => 'recruit_common_post');
$postslist = get_posts( $args );
foreach ( $postslist as $post ): setup_postdata( $post );
	for ($i=1; $i<5; $i++) {
		$fieldobject = get_field_object('common_required'.$i);
		echo '<tr><th>' . $fieldobject['label'] . '</th><td>' . get_field('common_required'.$i) . '</td></tr>' . "\n";
	}

	for ($i=1; $i<16; $i++) {
    	$title = get_field('common_title'.$i);
		if($title) {
			echo '<tr><th>' . $title . '</th><td>' . get_field('common_body'.$i) . '</td></tr>' . "\n";
		}
	}
endforeach;
wp_reset_postdata();
?>
</tbody>
</table>
</div>




<h3 id="form" class="common_title"><span><?php the_title(); ?>の応募フォーム</span></h3>
<div id="form_block">
<a href="tel:03-3254-8611" class="tel_link">tel.048-977-3401（平日 9:00～17:00）</a>
<p>
必要事項を入力の上、ご応募ください。（<span class="required">＊</span>は必須入力）
</p>

<?php
remove_filter ('the_content', 'wpautop');
the_content();
?>
</div>


<div class="recruit_data">
<h3>他の職種</h3>
<ul class="other_links">
<?php
$args = array('posts_per_page' => -1 );
$postslist = get_posts( $args );
foreach ( $postslist as $post ): setup_postdata( $post );
if ($post->ID == $this_ID): ?>
<li><span><?php the_title(); ?></span ></li>
<?php else: ?>
<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
<?php
endif;
endforeach;
wp_reset_postdata();
?>
</ul>
</div>

</article>

<script>
if ($('select[name="応募職種"]')[0]) {
	$('select[name="応募職種"] option[value="<?php the_title(); ?>"]').prop('selected',true);
}
</script>
<?php endwhile; ?>

<?php get_footer();
