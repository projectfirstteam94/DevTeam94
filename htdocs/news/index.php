<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="format-detection" content="telephone=no">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
	<meta name="description" content="">
	<meta name="keywords" content="邸宅,ワイキキ,ハワイ,プライベートジェット,カイルア,ウェディング,ゴルフ,ディスカバリー,シゲルポレポレツアー,挙式,パーティー,高級,コンドミニアム,ダイヤモンドヘッド">
	<title>Hawaiian Sky | ハワイアンスカイ -お知らせ</title>

	<!-- ::: CSS / JS ::: -->
	<link rel="stylesheet" href="/common/css/minireset.css">
	<link rel="stylesheet" href="/common/css/layout.css">
	<link rel="stylesheet" href="/common/css/style.css">
	<link rel="stylesheet" href="/news/css/news.css">
	<script src="/common/js/jquery-1.7.2.min.js"></script>
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-126023437-1"></script>
	<script src="/common/js/common.js"></script>
	<script src="/common/js/linkdata.js"></script>
	<script src="/common/js/hashschroll.js"></script>

</head>
<body id="pagetop">
<div class="ly_wrap">

	<?php include("../common/inc/header.html"); ?>

<!-- ::: Top Visual ::: -->
	<div class="ly_topVisual">
		<div class="bl_topImg">
			<img src="./images/top_news.jpg" alt="News">
		</div><!-- /.bl_topImg -->
		<p class="siteTree"><a href="/" class="it_navLink0">ホーム</a> ≫ お知らせ</p>
	</div><!-- /.ly_topVisual -->
	<!-- ::: Top Visual ::: -->

	<!-- ::: Main ::: -->
	<div class="ly_main">
		<!-- ::: ▼ Contents Edit Area ▼ ::: -->

		<section class="mainContent">
			<h1 class="underLine2">お知らせ</h1>

<?php
	require('../dbconnect.php'); //データベース読み込み

	$cmd = 'SELECT * FROM news WHERE news_value != -1 AND news_open < now() AND now() < news_close ORDER BY news_value DESC , news_day DESC LIMIT 6 ';
	$result = mysqli_query($db, $cmd);

while ($row = mysqli_fetch_assoc($result)) {
	$newsID = htmlspecialchars($row['news_id'], ENT_QUOTES, 'UTF-8');
	$newsDay = htmlspecialchars($row['news_day'], ENT_QUOTES, 'UTF-8');
	$newsOpen = htmlspecialchars($row['news_open'], ENT_QUOTES, 'UTF-8');
	$newsClose = htmlspecialchars($row['news_close'], ENT_QUOTES, 'UTF-8');
	$newsValue = htmlspecialchars($row['news_value'], ENT_QUOTES, 'UTF-8');
	$newsTitle = htmlspecialchars($row['news_title'], ENT_QUOTES, 'UTF-8');
	$newsCatch = htmlspecialchars($row['news_catch'], ENT_QUOTES, 'UTF-8');
	$newsText = nl2br( htmlspecialchars($row['news_text'], ENT_QUOTES, 'UTF-8') );
	$newsText2 = htmlspecialchars($row['news_text2'], ENT_QUOTES, 'UTF-8');
	$newsAddress = htmlspecialchars($row['news_address'], ENT_QUOTES, 'UTF-8');
	$newsTel = htmlspecialchars($row['news_tel'], ENT_QUOTES, 'UTF-8');
	$newsMail = htmlspecialchars($row['news_mail'], ENT_QUOTES, 'UTF-8');
	$newsGoogle = htmlspecialchars($row['news_google'], ENT_QUOTES, 'UTF-8');
	$newsUrl = htmlspecialchars($row['news_url'], ENT_QUOTES, 'UTF-8');
	$newsImg = htmlspecialchars($row['news_image1'], ENT_QUOTES, 'UTF-8');

	$hasImgClass = "";
	if ($newsImg != "") {
		$hasImgClass = "hasImg";
	}
?>

            <article class="un_postNews cFix" id="no<?php echo $newsID; ?>">
				<div class="un_postBlock_img">
<?php
if ($newsImg != "") {
?>
					<img src="./files/<?php echo $newsImg; ?>" alt="">
<?php
}
?>
				</div><!-- /.un_postBlock_img -->
				<div class="un_postBlock_head">
					<h2 class="barLine <?php echo $hasImgClass; ?>"><?php echo $newsTitle; ?></h2>
					<p class="textRight <?php echo $hasImgClass; ?>"><?php echo date( "Y.m.d" , strtotime($newsDay) ); ?> 更新</p>
				</div><!-- /.un_postBlock_head -->
				<div class="un_postBlock_txt">
					<p class="<?php echo $hasImgClass; ?>"><?php echo $newsText; ?></p>
				<!-- <p class="textRight"><a href="#">詳細を見る</a></p> -->
				<!-- <p class="textRight"><button onClick="location.href='newsEdit.php?ID=<?php echo $newsID; ?>'">編集</button></p> -->
				</div><!-- /.un_postBlock_txt -->
			</article>

<?php
}
?>

		</section>


		<!-- ::: ▲ Contents Edit Area ▲ ::: -->
	</div><!-- /.ly_main -->
	<!-- ::: /Main ::: -->

	<?php include("../common/inc/footer.html"); ?>
</div><!-- /.ly_wrap -->
</body>
</html>
