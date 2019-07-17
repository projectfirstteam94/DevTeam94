<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name=”description” content=”邸宅,ワイキキ,ハワイ,プライベートジェット,ラニカイ,カイルア,ウェディング,ゴルフ,ディスカバリー,シゲルポレポレツアー,挙式パーティー,高級コンドミニアム,ハワイ島,トランプ,亀,ダイヤモンドヘッド,イリカイホテル,ディズニー,ヴィラタイプ,挙式”/>
<title>Hawaiian Sky | ハワイアンスカイ -TOP</title>

<link rel="stylesheet" href="flexslider.css" type="text/css">
<link href="css/hs.css" rel="stylesheet" type="text/css">
<link href="css/hssp.css" rel="stylesheet" type="text/css">
<link href="css/ddmenu.css" rel="stylesheet" type="text/css">

<!-- ▼closed▼ 
<link href="css/closed.css" rel="stylesheet" type="text/css">
-->
<?php //データベース読み込み
require('dbconnect.php');
$cmd = 'SELECT * FROM news';
$result = mysqli_query($db, $cmd);
if (!$result) {
    $errorMes = "データ取得失敗";
}else  $errorMes = "データ取得成功";


?>
<script>
//alert ("<?php echo $errorMes; ?>");
</script>

<script src="js/jquery-1.7.2.min.js"></script>
<script src="js/jquery.flexslider-min.js"></script>
<script src="js/smart-crossfade.js" type="text/javascript"></script>
<script type="text/javascript" src="js/data.js"></script>

<script type="text/javascript" charset="utf-8">	
  $(window).load(function() {
    $('.flexslider').flexslider({
		animation: "slide",
		controlNav: "false"
	});
	
	for (i = 0; i < 22; i++) {
　　	$(".page"+i).text($page[i][0]);
		$(".page"+i).attr("href", $page[i][1])
	}
	
	for (i = 0; i < 22; i++) {
		$(".link"+i).attr("href", $page[i][1])
	}
  });


</script>



</head>

<body>
<h1 class="clearText">ハワイ邸宅・高級コンドミニアムの専門旅行会社 ハワイアンスカイ</h1>
<!-- Header content -->
<!-- ▼固定される▼ -->
<header ID="head_contents">

<div ID="head_logo">
 		<a href="index.html"><img src="img/logo.png"></a>
</div>

<div ID="head_telpc">
		<img src="img/tel_pc.png">
</div>

<div ID="head_telsp">
		<a hred="#"><img src="img/tel_sp.png"></a>
</div>

<div ID="head_pcmenu">
    <ul class="ddmenu pcmenu">
	<li><a href="#" class="page0"></a></li>
    <li><a href="#" class="page1"></a></li>
    <li><a href="#" class="page2"></a>
    	 <ul>
        	<li><a href="#" class="page3"></a></li>
         <li><a href="#" class="page4"></a></li>
         <li><a href="#" class="page5"></a></li>
         <li><a href="#" class="page6"></a></li>
        </ul>
    </li>
    <li><a href="#" class="page7"></a></li>
    <li><a href="#" class="page8"></a></li>
    <li><a href="#" class="page9"></a></li>
    <li><a href="#" class="page10"></a></li>
     <li><a href="#" class="page17"></a></li>
</ul>
</div>


</header>
<!-- ▲固定される▲ -->

<!-- ▼スライダー▼ -->
<div ID="top" class="flexslider">
<ul class="slides">
<li><img src="img/TOP.jpg" alt="top"/></li>
<li><img src="img/TOP_2.jpg" alt="top"/></li>
</ul>
</div>

<!-- ▲スライダー▲ -->

<div ID="closed">
<h3>ただいま製作中です</h3>
</div>

<!-- ▼コンテンツ▼ -->
<section class="mainContent"> 
<div class="content40">
<h3>飛び切り贅沢な時間を<br>貴方に　in Hawaii</h3>
<p>特別な空間で過ごす、特別な時間。<br>心も体も安らぐ、穏やかなひと時を</p>
</div>
<div class="content60 image60_3">
<img src="img/sample01.jpg" class="3images">
<img src="img/sample02.jpg" class="3images">
<img src="img/sample03.jpg" class="3images">
</div>

<br class="split">

	<div class="content50 newinfo">
	<h4 class="underLine2">新着情報</h4>

<?php
// 取得した値を表示 
while ($row = mysqli_fetch_assoc($result)) {
    $newsID =($row['news_id']);
	$newsDay =($row['news_day']);
	$newsTitle =($row['news_title']);
	
	echo ('<p><a href="#" class="link1">'.$newsDay.'　'.$newsTitle.'</a></p>');
}
?>
    

	<p><a href="#" class="link1">2018.00.00　お知らせお知らせお知らせお知らせ</a></p>
	<p><a href="#" class="link1">2018.00.00　お知らせお知らせお知らせお知らせ</a></p>
	<p><a href="#" class="link1">2018.00.00　お知らせお知らせお知らせお知らせ</a></p>
	<p><a href="#" class="link1">2018.00.00　お知らせお知らせお知らせお知らせ</a></p>

	</div>

<div class="contentSplit"></div>

	<div class="content50 recommend">
	<h4 class="underLine2">注目のお勧め宿泊施設！</h4>

		<div class="recommendL">
		<a href="#" class="link2"><img src="img/photo.png"></a>
		</div>
		<div class="recommendR">
		<h5>見出し見出し見出し見出し見出し</h5>
		<p>文章文章文章文章文章文章文章文章文章文章文章文章文章文章文章文章文章文章文章文章文章文章文章文章文章文章文章文章文章</p><p class="more"><a href="#" class="link20">もっと見る</a></p>
		</div>
		<hr>
		<div class="recommendL">
		<a href="#" class="link2"><img src="img/photo.png"></a>
		</div>
		<div class="recommendR">
		<h5>見出し見出し見出し見出し見出し</h5>
		<p>文章文章文章文章文章文章文章文章文章文章文章文章文章文章文章文章文章文章文章文章文章文章文章文章文章文章文章文章文章</p><p class="more"><a href="#" class="link21">もっと見る</a></p>
		</div>
	</div>

</section>

<section class="mainContent2" ID="rest"> 
<div class="content40">
<h3 class="textRight gold"><br>宿泊先を探す。</h3>
</div>

<div class="content60 restSearch">
<p class="paddingLeft">ハワイ邸宅、高級コンドミニアム…。<br>お客様がゆったり過ごせる宿泊先をご提案します。</p>
</div>
<br class="split">

<div class="restSearch">
<div class="content50">
	<a href="#" class="link3"><img src="img/syukuhaku_con_off.jpg"></a>
</div>
<div class="content50">
	<a href="#" class="link4"><img src="img/syukuhaku_aur_off.jpg"></a>
</div>
<div class="content50">
	<a href="#" class="link5"><img src="img/syukuhaku_man_off.jpg"></a>
</div>
<div class="content50">
	<a href="#" class="link6"><img src="img/syukuhaku_lux_off.jpg"></a>
</div>
</div>

</section>
<br class="split">
<section class="mainContent">

<div class="photoList">
	<h3>シゲルと行くポレポレツアー</h3>
    <p><span class="text_line">ハワイがもっと楽しくなる、</span><span class="text_line">シゲルさんの大人気オプショナルツアー。</span></p>
    
<div class="photoBlock">    
<a href="#" class="link10">
<img src="img/photo.png">
<h4>オプショナル①</h4>
<p>テキスト、テキスト、テキスト、テキスト、テキスト、テキスト、テキスト、テキスト、テキスト。</p>
</a>
</div>

<div class="photoBlock">    
<a href="#" class="link10">
<img src="img/photo.png">
<h4>オプショナル②</h4>
<p>テキスト、テキスト、テキスト、テキスト、テキスト、テキスト、テキスト、テキスト、テキスト。</p>
</a>
</div>
<div class="photoBlock">    
<a href="#" class="link10">
<img src="img/photo.png">
<h4>オプショナル③</h4>
<p>テキスト、テキスト、テキスト、テキスト、テキスト、テキスト、テキスト、テキスト、テキスト。</p>
</a>
</div>

<div class="photoBlock">    
<a href="#" class="link10">
<img src="img/photo.png">
<h4>オプショナル④</h4>
<p>テキスト、テキスト、テキスト、テキスト、テキスト、テキスト、テキスト、テキスト、テキスト。</p>
</a>
</div>

<div><p class="more"><a href="#" class="link10">詳しく見る</a></p></div>

	<h3>ハワイの景色</h3>
	<div class="photoBlock">    
	<a href="#" class="link11"><img src="img/photo.png"></a>
	</div>

	<div class="photoBlock">    
	<a href="#" class="link11"><img src="img/photo.png"></a>
	</div>

	<div class="photoBlock">    
	<a href="#" class="link11"><img src="img/photo.png"></a>
	</div>

	<div class="photoBlock">    
	<a href="#" class="link11"><img src="img/photo.png"></a>
	</div>

	<div class="photoBlock">    
	<a href="#" class="link11"><img src="img/photo.png"></a>
	</div>

	<div class="photoBlock">    
	<a href="#" class="link11"><img src="img/photo.png"></a>
	</div>

	<div class="photoBlock">    
	<a href="#" class="link11"><img src="img/photo.png"></a>
	</div>

	<div class="photoBlock">    
	<a href="#" class="link11"><img src="img/photo.png"></a>
	</div>

<div><p class="more"><a href="#" class="link11">もっと見る</a></p></div>

</div>

 
</section>
<!-- ▲コンテンツ▲ -->

<!-- ▼フッター▼ -->
<footer>
<div ID="foot_pcmenu">
<table>
	<tr>
    <td class="tdLeft"><a href="#" class="page0"></td>
    <td><a href="#" class="page7"></a></td>
    <td><a href="#" class="page11"></a></td>
    <td><a href="#" class="page17"></a></td>
    </tr><tr>
    <td class="tdLeft"><a href="#" class="page1"></a></td>
    <td><a href="#" class="page8"></a></td>
    <td><a href="#" class="page12"></a></td>
    <td><a href="#" class="page18"></a></td>
    </tr><tr>
    <td><a href="#" class="page2"></a></td>
    <td><a href="#" class="page9"></a></td>
    <td><a href="#" class="page19"></a></td>
    <td></td>
    </tr><tr>
    <td class="tdLeft table_small">▶<a href="#" class="page3"></a><br>▶<a href="#" class="page4"></a><br>▶<a href="#" class="page5"></a><br>▶<a href="#" class="page6"></a></td>
	<td><a href="#" class="page10"></a></td>
    <td colspan="2" class="table_small">▶<a href="#" class="page13"></a><br>▶<a href="#" class="page14"></a><br>▶<a href="#" class="page15"></a><br>▶<a href="#" class="page16"></a></td>
    </tr>
</table>
</div>

<div ID="foot_tel">
	<div class="footer_img">
		<img src="img/logo_w.png">
    </div>
    <div class="footer_text">
    	<h1>Hawaiian Sky</h1>
    	<p>住所：〒101-0051　東京都千代田区神田神保町3-23-3 8階<br>
		営業時間：月～金／9：30～18：00　土曜、日曜祝祭日／お休み</p>    <h2>TEL.03-5226-5331</h2>
    </h3>
    </div>
</div>


</footer>
</body>
</html>

<?php
// データベース接続解除
$mysqli->close();
?>