


<style>
#nav-drawer {
  display:none;
  position: relative;
	float: right;
	z-index: 10;
}
/*チェックボックス等は非表示に*/
.nav-unshown {
  display:none;
}

/*アイコンのスペース*/
#nav-open {
    display: inline-block;
    width: 25px;
    height: 19px;
	padding: 22px 15px 17px 15px;
    vertical-align: middle;
}

/*ハンバーガーアイコンをCSSだけで表現*/
#nav-open span, #nav-open span:before, #nav-open span:after {
    position: absolute;
    height: 3px;/*線の太さ*/
    width: 25px;/*長さ*/
    border-radius: 3px;
    background: #555;
    display: block;
    content: '';
    cursor: pointer;
}
#nav-open span:before {
    bottom: -8px;
}
#nav-open span:after {
    bottom: -16px;
}

/*閉じる用の薄黒カバー*/
#nav-close {
    display: none;/*はじめは隠しておく*/
    position: fixed;
    z-index: 99;
    top: 0;/*全体に広がるように*/
    left: 0;
    width: 100%;
    height: 100%;
    background: black;
    opacity: 0;
    transition: 0.1s ease-in-out;
}

/*中身*/
#nav-content {
    overflow: auto;
    position: fixed;
    top: 0;
    right: 0;
    z-index: 9999;/*最前面に*/
    width: 70%;/*右側に隙間を作る*/
    max-width: 320px;/*最大幅*/
    height: 100%;
    background: #fff;/*背景色*/
    transition: 0.2s ease-in-out;/*滑らかに表示*/
    -webkit-transform: translateX(105%);
    transform: translateX(105%);/*右に隠しておく*/
}

/*チェックが入ったらもろもろ表示*/
#nav-input:checked ~ #nav-close {
    display: block;/*カバーを表示*/
    opacity: .5;
}

#nav-input:checked ~ #nav-content {
    -webkit-transform: translateX(0%);
    transform: translateX(0%);/*中身を表示*/
    box-shadow: 6px 0 25px rgba(0,0,0,.15);
}

#nav-content ul {
	list-style: none;
}
#nav-content ul li {

}
#nav-content ul li a {
	color: #292f33;
	display: block;
	padding: 15px;
}
#nav-content ul li a::link {
	color: #292f33;
}
#nav-content ul li a::visited {
	color: #292f33;
}






/*******************
1024px以下の設定
*******************/
@media screen and (min-width: 0px) and (max-width: 1024px) {
	#nav-drawer {
	  display:block;
	}
}
</style>







		<!-- ハンバーガーメニュー -->
		<div id="nav-drawer">
			<input id="nav-input" type="checkbox" class="nav-unshown">
			<label id="nav-open" for="nav-input"><span></span></label>
			<label class="nav-unshown" id="nav-close" for="nav-input"></label>
			<div id="nav-content">
				<ul>
					<li>
						<a class="o_8" href="<?php echo HTTP;?>#service">機能</a>
					</li>
					<li>
						<a class="o_8" href="<?php echo HTTP;?>#case">事例</a>
					</li>
					<li>
						<a class="o_8" href="<?php echo HTTP;?>#plan">プラン一覧</a>
					</li>
					<li>
						<a class="o_8" href="<?php echo HTTP;?>seo-tool/">SEOツール</a>
					</li>
					<!--
					<li>
						<a class="o_8" href="<?php echo HTTP;?>article/">メディア</a>
					</li>
					-->
					<li>
						<a class="o_8" href="<?php echo HTTP;?>contact/">お問い合わせ</a>
					</li>
				</ul>
			</div>
		</div>

		<!--  -->
		<nav class="drawer">
			<div class="drawer_inner">
				<ul>
					<li>
						<a class="o_8" href="<?php echo HTTP;?>#service">機能</a>
					</li>
					<li>
						<a class="o_8" href="<?php echo HTTP;?>#case">事例</a>
					</li>
					<li>
						<a class="o_8" href="<?php echo HTTP;?>#plan">プラン一覧</a>
					</li>
					<li>
						<a class="o_8" href="<?php echo HTTP;?>seo-tool/">SEOツール</a>
					</li>
<!--
					<li>
						<a class="o_8" href="<?php echo HTTP;?>article/">メディア</a>
					</li>
-->
					<li>
						<a class="o_8" href="<?php echo HTTP;?>contact/">お問い合わせ</a>
					</li>
				</ul>
			</div>
		</nav>



