	<head>
	  <title><?php echo TITLE; ?></title>
	  <!-- meta -->
	  <meta charset="UTF-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
	  <meta name="keywords" content="<?php echo META_KEYWORDS; ?>" />
	  <meta name="description" content="<?php echo META_DESCRIPTION; ?>" />
	  <!-- icon -->
	  <link rel="shortcut icon" href="<?php echo HTTP;?>assets/img/icon/favicon_1.ico" type="image/vnd.microsoft.icon">
	  <link rel="apple-touch-icon" href="<?php echo HTTP;?>assets/img/icon/apple_touch_icon_1.png" />
	  <link rel="apple-touch-icon-precomposed" href="<?php echo HTTP;?>assets/img/icon/apple_touch_icon_1.png" />
	  <!-- css -->
	<?php
	if($_SERVER["HTTP_HOST"] == "localhost") {
		echo '
			  <link rel="stylesheet" href="'.HTTP.'assets/css/core.css" type="text/css">
			  <link rel="stylesheet" href="'.HTTP.'assets/css/common/common.css" type="text/css">
			  <link rel="stylesheet" href="'.HTTP.'assets/css/matome/common.css" type="text/css">';
	}
		else {
			echo '<style>'; require_once(PATH.'assets/css/compression/core.css'); /* header読み込み*/ echo '</style>';
			echo '<style>'; require_once(PATH.'assets/css/compression/common/common.css'); /* header読み込み*/ echo '</style>';
			echo '<style>'; require_once(PATH.'assets/css/compression/matome/common.css'); /* header読み込み*/ echo '</style>';
		}?>
	</head>
