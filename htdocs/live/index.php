<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="format-detection" content="telephone=no">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
	<meta name="description" content="">
	<meta name="keywords" content="邸宅,コンドミニアム,オアフ島,マウイ島,ハワイ島,ハワイ,プライベートジェット,ビジネスジェット,ウェディング,ゴルフ,ディスカバリー,シゲルポレポレツアー,挙式,パーティー,高級,ダイヤモンドヘッド">

    <!-- ::: 以下、検索エンジン避け ::: -->
    <META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
	<META NAME="ROBOTS" CONTENT="NOARCHIVE">
	<META name="robots" content="noindex,nofollow">

	<title>Hawaiian Sky | ハワイアンスカイ -リアルタイム情報</title>

	<!-- ::: CSS / JS ::: -->
	<link rel="stylesheet" href="/common/css/minireset.css">
	<link rel="stylesheet" href="/common/css/layout.css">
	<link rel="stylesheet" href="/common/css/style.css">
	<link rel="stylesheet" href="/live/css/live.css">
	<script src="/common/js/jquery-1.7.2.min.js"></script>
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-126023437-1"></script>
	<script src="/common/js/common.js"></script>
	<script src="/common/js/linkdata.js"></script>

</head>
<body id="pagetop">
<div class="ly_wrap">

<?php include("../common/inc/header.html"); ?>

<!-- ::: Top Visual ::: -->
	<div class="ly_topVisual">
		<div class="bl_topImg">
			<img src="./images/top_live.jpg" alt="Live">
		</div><!-- /.bl_topImg -->
		<p class="siteTree"><a href="/" class="it_navLink0">ホーム</a> ≫ リアルタム情報</p>
	</div><!-- /.ly_topVisual -->
	<!-- ::: Top Visual ::: -->

	<!-- ::: Main ::: -->
	<div class="ly_main">
		<!-- ::: ▼ Contents Edit Area ▼ ::: -->

		<section class="mainContent">
			<h1 class="underLine2">リアルタイム情報</h1>

<?php
	require('../dbconnect.php'); //データベース読み込み

	$cmd = 'SELECT * FROM live WHERE live_value != -1 AND live_open < now() AND now() < live_close ORDER BY live_value DESC , live_day DESC LIMIT 6 ';
	$result = mysqli_query($db, $cmd);

while ($row = mysqli_fetch_assoc($result)) {
	$liveID = htmlspecialchars($row['live_id'], ENT_QUOTES, 'UTF-8');
	$liveDay = htmlspecialchars($row['live_day'], ENT_QUOTES, 'UTF-8');
	$liveOpen = htmlspecialchars($row['live_open'], ENT_QUOTES, 'UTF-8');
	$liveClose = htmlspecialchars($row['live_close'], ENT_QUOTES, 'UTF-8');
	$liveValue = htmlspecialchars($row['live_value'], ENT_QUOTES, 'UTF-8');
	$liveTitle = htmlspecialchars($row['live_title'], ENT_QUOTES, 'UTF-8');
	$liveCatch = htmlspecialchars($row['live_catch'], ENT_QUOTES, 'UTF-8');
	$liveText = nl2br( htmlspecialchars($row['live_text'], ENT_QUOTES, 'UTF-8') );
	$liveText2 = htmlspecialchars($row['live_text2'], ENT_QUOTES, 'UTF-8');
	$liveAddress = htmlspecialchars($row['live_address'], ENT_QUOTES, 'UTF-8');
	$liveTel = htmlspecialchars($row['live_tel'], ENT_QUOTES, 'UTF-8');
	$liveMail = htmlspecialchars($row['live_mail'], ENT_QUOTES, 'UTF-8');
	$liveGoogle = htmlspecialchars($row['live_google'], ENT_QUOTES, 'UTF-8');
	$liveUrl = htmlspecialchars($row['live_url'], ENT_QUOTES, 'UTF-8');
	$liveImg = htmlspecialchars($row['live_image1'], ENT_QUOTES, 'UTF-8');
?>

			<article class="un_postLive cFix">
				<div class="un_postBlock_img">
					<img src="./files/<?php echo $liveImg; ?>" alt="">
				</div><!-- /.un_postBlock_img -->
				<div class="un_postBlock_head">
					<h2 class="barLine"><?php echo $liveTitle; ?></h2>
					<p class="textRight"><?php echo date( "Y.m.d H:i" , strtotime($liveDay) ); ?></p>
				</div><!-- /.un_postBlock_head -->
				<div class="un_postBlock_txt">
					<p><?php echo $liveText; ?></p>
                    <!-- <p class="textRight"><button onClick="location.href='liveEdit.php?ID=<?php echo $liveID; ?>'">編集</button></p> -->
				</div><!-- /.un_postBlock_txt -->
			</article>

<?php
}
?>

		<ul class="bl_postPager">
			<li><a href="#">1</a></li>
			<li><a href="#">2</a></li>
			<li><a href="#">3</a></li>
			<li><a href="#">次のページ ≫</a></li>
		</ul><!-- /.bl_postPager -->
		</section>


		<!-- ::: ▲ Contents Edit Area ▲ ::: -->
	</div><!-- /.ly_main -->
	<!-- ::: /Main ::: -->

<?php include("../common/inc/footer.html"); ?>
</div><!-- /.ly_wrap -->
</body>
</html>
