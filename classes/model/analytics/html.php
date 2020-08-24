<?php
class model_analytics_html {
	//---------------------------------------------
	//アナリティクスプロパディリストHTML生成
	//----------------------------------------------
	public static function analytics_propaddy_html_list_get($analytics_ticket_res) {
		foreach($analytics_ticket_res as $key => $value) {
			$analytics_propaddy_list_html .= '<li>
	<a href="'.HTTP.'seo-tool/analytics/login/admin/?turn_id='.$value['turn_id'].'">'.$value['url'].'</a>
</li>';
		}
		return $analytics_propaddy_list_html;
	}
	//-------------------------------------------------
	//アナリティクス設定プロパディリストHTML生成
	//-------------------------------------------------
	public static function analytics_settings_propaddy_html_list_get($analytics_ticket_res) {
		foreach($analytics_ticket_res as $key => $value) {
			$value['keyword_json'] = preg_replace('/"/', "'", $value['keyword_json']);

			$analytics_propaddy_list_html .= '<li>
	<a href="'.HTTP.'seo-tool/analytics/login/admin/?turn_id='.$value['turn_id'].'">'.$value['url'].'</a>
<span class="delete" url-data="'.$value['url'].'" keyword-data="'.$value['keyword_json'].'" turn-data="'.$value['turn_id'].'">
	<a href="'.HTTP.'seo-tool/analytics/login/admin/?turn_id='.$value['turn_id'].'&delete=1">プロパディ削除</a>
</span>
	</li>';
		}
		return $analytics_propaddy_list_html;
	}







}