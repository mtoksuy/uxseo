
					<!-- contact -->
					<div class="contact">
						<div class="contact_inner">
							<p class="contact_title_top">Contact</p>
							<h2 class="contact_title">お気軽にお問い合わせください</h2>
							<p class="contact_title_bottom">SEOのご相談・UXSEOの詳細質問・打ち合わせ相談etc.お気軽にご相談を</p>
							<p class="contact_title_bottom">最大限のサポートをいたします</p>
							<form method="post" action="" class="contact_form">
								<label for="language">お問い合わせ内容</label>
								<div class="select">
										<select id="language" name="contact_content">
											<?php 
												switch($_POST['contact_content']) {
													case 'SEOのご相談';
														$selected_1 = 'selected';
													break;
													case 'UXSEOについて';
														$selected_2 = 'selected';
													break;
													case 'その他のお問い合わせ';
														$selected_3 = 'selected';
													break;
													default:
														$selected_1 = 'selected';
												}
											?>
											<option value="SEOのご相談" <?php echo $selected_1; ?>>SEOのご相談</option>
											<option value="UXSEOについて" <?php echo $selected_2; ?>>UXSEOについて</option>
											<option value="その他のお問い合わせ" <?php echo $selected_3; ?>>その他のお問い合わせ</option>
										</select>
								</div>
								<label for="name">貴社名</label>
								<input type="text" placeholder="e.g.) スペースナビ株式会社" value="<?php echo $_POST['company_name']; ?>" required="required" name="company_name" id="company_name">

								<label for="name">お名前</label>
								<input type="text" placeholder="e.g.) 山田太郎" value="<?php echo $_POST['name']; ?>" required="required" name="name" id="name">

								<label for="email">メールアドレス</label>
								<input type="email" placeholder="e.g.) xxx@xxx.com" value="<?php echo $_POST['email']; ?>" name="email" id="email">
							
								<label for="text_area">お問い合わせ詳細・概要</label>
								<textarea placeholder="お問い合わせ詳細・概要を記入" name="summary" id="summary"><?php echo $_POST['summary']; ?></textarea>
								<input type="submit" value="確認" name="submit">
							</form>
						</div> <!-- contact_inner -->
					</div> <!-- contact -->

