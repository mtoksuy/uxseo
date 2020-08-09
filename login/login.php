		<!--  -->
		<div class="login">
			<h1 class="text_center"><a href="<?php echo HTTP; ?>" title="Powered by Programmerbox"><img width="85" height="32" alt="ジャッジ" src="<?php echo HTTP; ?>assets/img/logo/logo_3.png"></a></h1>
			<!-- login_form -->
			<form class="login_form" name="login_form" action="" method="post">
				<!-- block -->
				<div class="block">
					<p class="m_0">
						<label for="user_login">ユーザー名 or メールアドレス
					</p>
							<input type="text" class="input" id="user_login" name="login_user" value="" size="20">
						</label>
				</div>
				<!-- block -->
				<div class="block">
					<p class="m_0">
						<label for="user_pass">パスワード
					</p>
							<input type="password" class="input" id="user_pass" name="login_pass" value="" size="20">
						</label>
				</div>
				<!-- submit -->
				<p class="submit clearfix">

					<a class="reissue_link" href="<?php echo HTTP; ?>reissue/">パスワードを忘れた方</a>

					<input type="submit" class="login_button" name="login_submit" value="ログイン">
				</p>
			</form>
			<?php echo $login_message; ?>