<!DOCTYPE HTML>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="format-detection" content="telephone=no">
<meta name="viewport" content="initial-scale=1.0">
<script>
if ((window.matchMedia('(max-width: 640px)').matches || window.matchMedia('(max-height: 640px)').matches) === false) {
	var metaobj = document.getElementsByTagName('meta');
	for(var i = 0; i < metaobj.length; i++) {
		var nameattr = metaobj[i].getAttribute('name');
		if(nameattr === 'viewport') {
			metaobj[i].setAttribute('content', 'width=1020');
			break;
		}
	}
}
</script>
<?php wp_head(); ?>
<script src="<?php echo get_template_directory_uri(); ?>/js/site_common.js"></script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-110587917-2"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-110587917-2');
</script>
</head>

<body>

<header id="site_header">
<h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" width="257" height="57" alt="東冠"></a></h1>

<nav>
<ul>
<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">採用トップ</a></li>
<li><a href="http://www.tokangroup.co.jp/" target="_blank">HOME</a></li>
</nav>
</header>



<main>