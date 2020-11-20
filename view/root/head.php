
	<head>
		<title><?php echo TITLE; ?></title>
		<!-- meta -->
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
		<meta name="keywords" content="<?php echo META_KEYWORDS; ?>" />
		<meta name="description" content="<?php echo META_DESCRIPTION; ?>" />
		
		<meta name="twitter:card" content="summary_large_image" />
		<meta property="og:url" content="<?php echo HTTP;?>" />
		<meta property="og:title" content="<?php echo TITLE; ?>" />
		<meta property="og:description" content="<?php echo META_DESCRIPTION; ?>" />
		<meta property="og:image" content="<?php echo HTTP;?>assets/img/ogp/ogp_2.png" /> 
		
		<!-- icon -->
		<link rel="shortcut icon" href="<?php echo HTTP;?>assets/img/icon/favicon_1.ico" type="image/vnd.microsoft.icon">
		<link rel="apple-touch-icon" href="<?php echo HTTP;?>assets/img/icon/apple_touch_icon_1.png" />
		<link rel="apple-touch-icon-precomposed" href="<?php echo HTTP;?>assets/img/icon/apple_touch_icon_1.png" />
		<!-- css -->
		<link rel="stylesheet" href="<?php echo HTTP;?>assets/css/core.css" type="text/css">
		<link rel="stylesheet" href="<?php echo HTTP;?>assets/css/common/common.css" type="text/css">
		<link rel="stylesheet" href="<?php echo HTTP;?>assets/css/root/common.css" type="text/css">
		<link rel="stylesheet" href="<?php echo HTTP;?>assets/css/plugin/antigravity.css" type="text/css">
		<link rel="stylesheet" href="<?php echo HTTP;?>assets/css/plugin/simple_css_waves.css" type="text/css">
		<link rel="stylesheet" href="<?php echo HTTP;?>assets/css/plugin/bongo_cat_codes.css" type="text/css">
		<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
		
		<?php require_once(PATH.'view/basic/google_analytics.php'); /* google_analytics読み込み*/ ?>
	</head>
