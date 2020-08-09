<!DOCTYPE html>
<html>
	<?php require_once(PATH.'view/root/head.php'); /* head読み込み*/ ?>
	<body>
		<!-- wrapper -->
		<div class="wrapper">
			<?php require_once(PATH.'view/basic/header.php'); /* header読み込み*/ ?>
			<!-- top_gallery -->
			<?php require_once(PATH.'view/root/top_gallery.php'); /* top_gallery読み込み*/ ?>
			<!-- main -->
			<div class="main clearfix">
				<!-- main_inner -->
				<div class="main_inner clearfix">
					<?php require_once(PATH.'view/root/content.php'); /* content読み込み*/ ?>
				</div>
			</div> <!-- main -->
			<?php require_once(PATH.'view/root/footer.php'); /* footer読み込み*/ ?>
		</div> <!-- wrapper -->
		<?php require_once(PATH.'view/root/head_footer.php'); /* head_footer読み込み*/ ?>
	</body>
</html>