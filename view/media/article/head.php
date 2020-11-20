
<head>
	<title><?php echo $article_data_array['article_title']; ?></title>
	<!-- meta -->
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
	<meta name="twitter:card" content="summary_large_image" />
	<meta property="og:url" content="<?php echo HTTP; ?>media/article/<?php echo $method; ?>/" />
	<meta property="og:title" content="<?php echo $article_data_array['article_title']; ?>" />
	<meta property="og:image" content="<?php echo HTTP;?>assets/img/media/ogp/<?php echo $method; ?>.png" />
	<!-- icon -->
	<link rel="shortcut icon" href="<?php echo HTTP;?>assets/img/icon/favicon_1.ico" type="image/vnd.microsoft.icon">
	<link rel="apple-touch-icon" href="<?php echo HTTP;?>assets/img/icon/apple_touch_icon_1.png" />
	<link rel="apple-touch-icon-precomposed" href="<?php echo HTTP;?>assets/img/icon/apple_touch_icon_1.png" />
	<!-- css -->
	<link rel="stylesheet" href="<?php echo HTTP;?>assets/css/core.css" type="text/css">
	<link rel="stylesheet" href="<?php echo HTTP;?>assets/css/common/common.css" type="text/css">
	<link rel="stylesheet" href="<?php echo HTTP;?>assets/css/media/article/common.css" type="text/css">
	<?php require_once(PATH.'view/basic/google_analytics.php'); /* google_analytics読み込み*/ ?>
</head>
