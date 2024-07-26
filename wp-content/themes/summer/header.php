<?php /*$home_id = get_option('page_on_front');*/ ?>

<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title(); ?></title>
	<!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.4.0/dist/css/bootstrap.min.css" rel="stylesheet">-->
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/js/functions.js"></script>
    <link rel="icon" type="image/x-icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.png">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css?v=<?php echo time()?>">
    <?php wp_head(); ?>
	
	<!-- Yandex.Metrika counter -->
	<script type="text/javascript" >
	   (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
	   m[i].l=1*new Date();
	   for (var j = 0; j < document.scripts.length; j++) {if (document.scripts[j].src === r) { return; }}
	   k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
	   (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

	   ym(97265303, "init", {
			clickmap:true,
			trackLinks:true,
			accurateTrackBounce:true
	   });
	</script>
	<noscript><div><img src="https://mc.yandex.ru/watch/97265303" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
	<!-- /Yandex.Metrika counter -->
</head>
<body <?php body_class(); ?>>
	<div id="page" class="site">
    <header class="top-header">
        <div class="">
			
			<a href="https://школьныйтехнопарк.рф">
				<img src="http://лето.школьныйтехнопарк.рф/wp-content/uploads/Лого-РШТ.png" alt="РШТ">
				<div>
					РЕГИОНАЛЬНЫЙ<br>
					ШКОЛЬНЫЙ<br>
					ТЕХНОПАРК
				</div>
			</a>
			
        </div>
	</header>
	
	<div id="content" class="site-content" style="background-image: url(<?php echo get_template_directory_uri() . '/imgs/footer-round.png'?>);">