
<h1>UXSEO経営シミュレーション[社員マイルストーン]</h1>

<form method="post" action="" class="contact_form">
	<label for="name">契約数：</label>
	<input type="text" placeholder="e.g.) 30" value="" required="required" name="company_name" id="company_name">
	<input type="submit" value="確認" name="submit">
</form>
<?php
/*
[必要人材]
・SEOマーケター
・SEOマーケターマネージャー
・営業
・デザイナー
・エンジニア
・プロダクト
・スペシャル人材

SEOマーケターは8案件に1人
SEOマーケターマネージャーはSEOマーケター10人対し1人
営業は100案件に1人
デザイナーは50案件に1人
エンジニアは50案件に1人
プロダクトは100案件に1人
スペシャル人材は100案件に1人

*/

// 案件単価
$anken_tanka = 120000;
if($_POST) {
	$anken_num = $_POST['company_name'];
}
		else {
			// 案件数
			$anken_num = 20;
}

// 売上
$uriage = $anken_num*$anken_tanka;
// SEOマーケター人件費
$SEO_markater_jinkenhi = ($anken_tanka*6)*0.4;
// SEOマーケター正社員数
$SEO_markater_seishain_num = floor($anken_num/6);
if($SEO_markater_seishain_num == 0){$SEO_markater_seishain_num = 1;}
// SEOマーケター人件費
$SEO_markater_all_jinkenhi = $SEO_markater_seishain_num*$SEO_markater_jinkenhi;

// SEOマーケターマネージャー人件費
$SEO_markater_maneyja_jinkenhi = $SEO_markater_jinkenhi*1.3;
// SEOマーケターマネージャー正社員数
$SEO_markater_maneyja_seishain_num = floor($SEO_markater_seishain_num/10);
// SEOマーケターマネージャー人件費
$SEO_markater_maneyja_all_jinkenhi = $SEO_markater_maneyja_seishain_num*$SEO_markater_maneyja_jinkenhi;

// 営業人件費
$eigyou_jinkenhi = $SEO_markater_jinkenhi;
// 営業正社員数
$eigyou_seishain_num = floor($anken_num/100);
// 営業人件費
$eigyou_all_jinkenhi = $eigyou_seishain_num*$eigyou_jinkenhi;

// 事務人件費
$jimu_jinkenhi = $SEO_markater_jinkenhi;
// 事務正社員数
$jimu_seishain_num = floor($anken_num/100);
// 事務人件費
$jimu_all_jinkenhi = $jimu_seishain_num*$jimu_jinkenhi;

// 人事人件費
$jinji_jinkenhi = $SEO_markater_jinkenhi;
// 人事正社員数
$jinji_seishain_num = floor($anken_num/100);
// 人事人件費
$jinji_all_jinkenhi = $jinji_seishain_num*$jinji_jinkenhi;

// デザイナー人件費
$desiner_jinkenhi = $SEO_markater_jinkenhi*1.2;
// デザイナー正社員数
$desiner_seishain_num = floor($anken_num/50);
// デザイナー人件費
$desiner_all_jinkenhi = $desiner_seishain_num*$desiner_jinkenhi;

// エンジニア人件費
$enjinia_jinkenhi = $SEO_markater_jinkenhi*1.2;
// エンジニア正社員数
$enjinia_seishain_num = floor($anken_num/50);
// エンジニア人件費
$enjinia_all_jinkenhi = $enjinia_seishain_num*$enjinia_jinkenhi;

// プロダクト人件費
$prodct_jinkenhi = $SEO_markater_jinkenhi*1.5;
// プロダクト正社員数
$prodct_seishain_num = floor($anken_num/100);
// プロダクト人件費
$prodct_all_jinkenhi = $prodct_seishain_num*$prodct_jinkenhi;

// スペシャル人材人件費
$speshal_jinkenhi = $SEO_markater_jinkenhi*2;
// スペシャル人材正社員数
$speshal_seishain_num = floor($anken_num/100);
// スペシャル人材人件費
$speshal_all_jinkenhi = $speshal_seishain_num*$speshal_jinkenhi;

// ALL人件費
$all_jinkenhi = $SEO_markater_all_jinkenhi+$SEO_markater_maneyja_all_jinkenhi+$eigyou_all_jinkenhi+$jimu_all_jinkenhi+$jinji_all_jinkenhi+$desiner_all_jinkenhi+$enjinia_all_jinkenhi+$prodct_all_jinkenhi+$speshal_all_jinkenhi;

// 社員数
$shain_num = $SEO_markater_seishain_num+$SEO_markater_maneyja_seishain_num+$eigyou_seishain_num+$jimu_seishain_num+$jinji_seishain_num+$desiner_seishain_num+$enjinia_seishain_num+$prodct_seishain_num+$speshal_seishain_num;

// 事務所坪単価
$tubo_tanak = 18000;
// 必要坪数
$hituyou_tubo_num = $shain_num*3;

// 事務所費
$jimusyohi = $hituyou_tubo_num*$tubo_tanak;

// 利益
$rieki = $uriage-$all_jinkenhi-$jimusyohi;



echo '契約単価：'.number_format($anken_tanka).'円';
echo '<br>';
echo '契約数：'.number_format($anken_num).'契約';
echo '<br>';
echo '売上：'.number_format($uriage).'円';
echo '<br>';
echo '-------------------------------------------------';
echo '<br>';
echo 'SEOマーケター正社員数：'.number_format($SEO_markater_seishain_num).'人';
echo '<br>';
echo 'SEOマーケター給料：'.number_format($SEO_markater_jinkenhi).'円';
echo '<br>';

echo 'SEOマーケター全給料：'.number_format($SEO_markater_all_jinkenhi).'円';
echo '<br>';
echo '-------------------------------------------------';
echo '<br>';
echo 'SEOマーケターマネージャー正社員数：'.number_format($SEO_markater_maneyja_seishain_num).'人';
echo '<br>';
echo 'SEOマーケターマネージャー全給料：'.number_format($SEO_markater_maneyja_all_jinkenhi).'円';
echo '<br>';
echo '-------------------------------------------------';
echo '<br>';
echo '営業正社員数：'.number_format($eigyou_seishain_num).'人';
echo '<br>';
echo '営業全給料：'.number_format($eigyou_all_jinkenhi).'円';
echo '<br>';
echo '-------------------------------------------------';
echo '<br>';
echo '事務正社員数：'.number_format($jimu_seishain_num).'人';
echo '<br>';
echo '事務全給料：'.number_format($jimu_all_jinkenhi).'円';
echo '<br>';
echo '-------------------------------------------------';
echo '<br>';
echo '人事正社員数：'.number_format($jinji_seishain_num).'人';
echo '<br>';
echo '人事全給料：'.number_format($jinji_all_jinkenhi).'円';
echo '<br>';
echo '-------------------------------------------------';
echo '<br>';
echo 'デザイナー正社員数：'.number_format($desiner_seishain_num).'人';
echo '<br>';
echo 'デザイナー全給料：'.number_format($desiner_all_jinkenhi).'円';
echo '<br>';
echo '-------------------------------------------------';
echo '<br>';
echo 'エンジニア正社員数：'.number_format($enjinia_seishain_num).'人';
echo '<br>';
echo 'エンジニア全給料：'.number_format($enjinia_all_jinkenhi).'円';
echo '<br>';
echo '-------------------------------------------------';
echo '<br>';
echo 'プロダクト正社員数：'.number_format($prodct_seishain_num).'人';
echo '<br>';
echo 'プロダクト全給料：'.number_format($prodct_all_jinkenhi).'円';
echo '<br>';
echo '-------------------------------------------------';
echo '<br>';
echo 'スペシャル人材正社員数：'.number_format($speshal_seishain_num).'人';
echo '<br>';
echo 'スペシャル人材全給料：'.number_format($speshal_all_jinkenhi).'円';
echo '<br>';
echo '-------------------------------------------------';
echo '<br>';
echo '社員数：'.number_format($shain_num).'人';
echo '<br>';
echo '全人件費：'.number_format($all_jinkenhi).'円';
echo '<br>';
echo '人件費割合：'.round(($all_jinkenhi/$uriage)*100,2).'%';
echo '<br>';
echo '-------------------------------------------------';
echo '<br>';
echo '事務所費：'.number_format($jimusyohi).'円';
echo '<br>';
echo '事務所費割合：'.round(($jimusyohi/$uriage)*100,2).'%';
echo '<br>';
echo '-------------------------------------------------';
echo '<br>';
echo '利益率割合：'.round(($rieki/$uriage)*100,2).'%';
echo '<br>';
echo '月利益：'.number_format($rieki).'円';
echo '<br>';
echo '-------------------------------------------------';
echo '<br>';
echo '月税金：'.number_format($rieki*0.3).'円';
echo '<br>';
echo '-------------------------------------------------';
echo '<br>';
echo '月純利益：'.number_format($rieki-($rieki*0.3)).'円';

