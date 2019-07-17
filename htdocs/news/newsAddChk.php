<?php
session_start();

//エラーチェック
ini_set("display_errors", 1);
error_reporting(E_ALL);

//データベース読み込み
require('../dbconnect.php');

//セッションの受け取り確認からの代入
if (!isset($_SESSION['news'])) {	header('Location: newsAdd.php'); }
$day = htmlspecialchars($_SESSION['news']['日付'], ENT_QUOTES, 'UTF-8'); 
$open = htmlspecialchars($_SESSION['news']['公開開始'], ENT_QUOTES, 'UTF-8'); 
$close = htmlspecialchars($_SESSION['news']['公開終了'], ENT_QUOTES, 'UTF-8'); 
$value = htmlspecialchars($_SESSION['news']['重要度'], ENT_QUOTES, 'UTF-8');
$title = htmlspecialchars($_SESSION['news']['タイトル'], ENT_QUOTES, 'UTF-8');
$catch = htmlspecialchars($_SESSION['news']['キャッチ'], ENT_QUOTES, 'UTF-8');
$text = nl2br( htmlspecialchars($_SESSION['news']['内容テキスト'], ENT_QUOTES, 'UTF-8') );
$text2 = htmlspecialchars($_SESSION['news']['備考テキスト'], ENT_QUOTES, 'UTF-8');
$address = htmlspecialchars($_SESSION['news']['住所'], ENT_QUOTES, 'UTF-8');
$tel = htmlspecialchars($_SESSION['news']['電話番号'], ENT_QUOTES, 'UTF-8');
$mail = htmlspecialchars($_SESSION['news']['メールアドレス'], ENT_QUOTES, 'UTF-8');
$google = htmlspecialchars($_SESSION['news']['GoogleMap位置情報'], ENT_QUOTES, 'UTF-8');
$url = htmlspecialchars($_SESSION['news']['外部リンクURL'], ENT_QUOTES, 'UTF-8');
$image = htmlspecialchars($_SESSION['news']['upfile'], ENT_QUOTES, 'UTF-8');


// 書き込み処理：お知らせ新規追加
if(!empty($_POST)){
	$sql = sprintf('INSERT INTO news SET news_day="%s", news_open="%s", news_close="%s", news_value="%d", news_title="%s", news_catch="%s", news_text="%s", news_text2="%s", news_address="%s", news_tel="%s", news_mail="%s", news_google="%s", news_url="%s", news_image1="%s"' ,
	mysqli_real_escape_string($db, $_SESSION['news']['日付']),
	mysqli_real_escape_string($db, $_SESSION['news']['公開開始']),
	mysqli_real_escape_string($db, $_SESSION['news']['公開終了']),
	mysqli_real_escape_string($db, $_SESSION['news']['重要度']),
	mysqli_real_escape_string($db, $_SESSION['news']['タイトル']),
	mysqli_real_escape_string($db, $_SESSION['news']['キャッチ']),
	mysqli_real_escape_string($db, $_SESSION['news']['内容テキスト']),
	mysqli_real_escape_string($db, $_SESSION['news']['備考テキスト']),
	mysqli_real_escape_string($db, $_SESSION['news']['住所']),
	mysqli_real_escape_string($db, $_SESSION['news']['電話番号']),
	mysqli_real_escape_string($db, $_SESSION['news']['メールアドレス']),
	mysqli_real_escape_string($db, $_SESSION['news']['GoogleMap位置情報']),
	mysqli_real_escape_string($db, $_SESSION['news']['外部リンクURL']),
	mysqli_real_escape_string($db, $_SESSION['news']['upfile'])
	);
	mysqli_query($db, $sql) or die(mysqli_error($db));
	
	unset($_SESSION['news']);
	header('Location: complete.html');
}


?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>お知らせ 追加確認</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
<META NAME="ROBOTS" CONTENT="NOARCHIVE">
<META name="robots" content="noindex,nofollow">
<link href="css/hs.css" rel="stylesheet" type="text/css">

</head>

<body>
<section class="mainContent">

<h1 class="underLine2">これでよろしいですか？</h1>
<br class="split">

<form action="" method="post">
	<input type="hidden" name="action" value="submit" />
	<p>公開期間　<?php echo date( "Y/m/d H:i" , strtotime($open) ) ; ?> 〜 <?php if($close) {echo date( "Y/m/d H:i" , strtotime($close) ); } ?></p>    
	<p>重要度：<?php echo $value; ?>　画像ファイル名：<?php echo $image; ?></p>
	<div class="content70 wordBreak">

		    <h5 class="barLine wrap_normal"><?php echo $title; ?></h5>
			<p class="textRight"><?php echo date( "Y/m/d H:i" , strtotime($day) ); ?> 公開</p>
		    <p class="wrap_normal"><?php echo $text; ?></p>
            
		    </div>

			<div class="content30  image30_1">
		<?php if ($image) {
			echo ( '<img src="./files/'.$image.'" alt="'.$image.'">' );
		} ?>
			</div>
		<hr>
		<br class="split">

	<div class="content50 textCenter"><button class="linkButton5" type="button" name="back" onClick="history.back();">戻って修正</button></div>
	<div class="content50 textCenter"><button class="linkButton5" type="submit" name="insert" value="insert">決 定 す る</button></div>
</form>

</div>

</section>

</body>
</html>
