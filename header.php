<!DOCTYPE HTML>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="format-detection" content="telephone=no">
<meta name="viewport" content="initial-scale=1.0">
<?php wp_head(); ?>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/reset.css">

<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/common.css">
<?php if (is_home() || is_front_page()) : ?>
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css">
<?php endif; ?>
<?php if(is_single()): ?>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/article.css">
<?php endif; ?>
<script src="<?php echo get_template_directory_uri(); ?>/js/site_common.js"></script>
</head>

<body>

<?php if (is_home() || is_front_page()) : ?>
<header id="site_header">
<h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" width="257" height="57" alt="テンプレート"></a></h1>
<nav>
<ul>
<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">採用TOP</a></li>
<li><a href="http://www.tokangroup.co.jp/" target="_blank">CORPORATE</a></li>
<li><a href="<?php echo get_category  ?>" target="_blank">募集職種一覧</a></li>
</ul>
</nav>
</header>
<?php else: ?>
<header id="site_header">
<h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" width="257" height="57" alt="テンプレート"></a></h1>
<nav class="contact-form">
  <p>お問い合わせ</p>
</nav>
</header>
<?php endif; ?>
<main>
