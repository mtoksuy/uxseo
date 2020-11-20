<!DOCTYPE html>
<html>
	<?php require_once(PATH.'view/media/article/head.php'); /* head読み込み*/ ?>
	<body>
		<!-- wrapper -->
		<div class="wrapper">
			<?php require_once(PATH.'view/media/header.php'); /* header読み込み*/ ?>
			<!-- main -->
			<div class="main clearfix">
				<!-- main_inner -->
				<div class="main_inner clearfix">
					<?php require_once(PATH.'view/media/article/content.php'); /* content読み込み*/ ?>
				</div>
			</div> <!-- main -->
			<?php require_once(PATH.'view/media/footer.php'); /* footer読み込み*/ ?>
		</div> <!-- wrapper -->
		<?php require_once(PATH.'view/media/head_footer.php'); /* head_footer読み込み*/ ?>
	</body>
</html>