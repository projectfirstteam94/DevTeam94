<?php
session_start();

//エラーチェック
ini_set("display_errors", 1);
error_reporting(E_ALL);

//データベース読み込み
require('../dbconnect.php');

//セッションの受け取り確認からの代入
if (!isset($_SESSION['live'])) {	header('Location: liveAdd.php'); }
$id = htmlspecialchars($_SESSION['live']['liveID'], ENT_QUOTES, 'UTF-8'); 
$day = htmlspecialchars($_SESSION['live']['日付'], ENT_QUOTES, 'UTF-8'); 
$open = htmlspecialchars($_SESSION['live']['公開開始'], ENT_QUOTES, 'UTF-8'); 
$close = htmlspecialchars($_SESSION['live']['公開終了'], ENT_QUOTES, 'UTF-8'); 
$value = htmlspecialchars($_SESSION['live']['重要度'], ENT_QUOTES, 'UTF-8');
$title = htmlspecialchars($_SESSION['live']['タイトル'], ENT_QUOTES, 'UTF-8');
$catch = htmlspecialchars($_SESSION['live']['キャッチ'], ENT_QUOTES, 'UTF-8');
$text = nl2br( htmlspecialchars($_SESSION['live']['内容テキスト'], ENT_QUOTES, 'UTF-8') );
$text2 = htmlspecialchars($_SESSION['live']['備考テキスト'], ENT_QUOTES, 'UTF-8');
$address = htmlspecialchars($_SESSION['live']['住所'], ENT_QUOTES, 'UTF-8');
$tel = htmlspecialchars($_SESSION['live']['電話番号'], ENT_QUOTES, 'UTF-8');
$mail = htmlspecialchars($_SESSION['live']['メールアドレス'], ENT_QUOTES, 'UTF-8');
$google = htmlspecialchars($_SESSION['live']['GoogleMap位置情報'], ENT_QUOTES, 'UTF-8');
$url = htmlspecialchars($_SESSION['live']['外部リンクURL'], ENT_QUOTES, 'UTF-8');
$image = htmlspecialchars($_SESSION['live']['upfile'], ENT_QUOTES, 'UTF-8');
$image2 = htmlspecialchars($_SESSION['live']['liveImg'], ENT_QUOTES, 'UTF-8');
$action = htmlspecialchars($_SESSION['live']['action'], ENT_QUOTES, 'UTF-8');

if (empty($image)) { 
	$_SESSION['live']['upfile'] = $image2; 
	$image = $_SESSION['live']['upfile'];
	}

if( !empty($id) && $action == 'delete' ){
    $sql = sprintf('DELETE FROM live WHERE live_id=%d', 
	mysqli_real_escape_string( $db, $id )
	);
	mysqli_query($db, $sql) or die (mysqli_error($db) );
	
	unset($_SESSION['live']);
	header('Location: complete.html');
}

// 書き込み処理：お知らせ編集
if(!empty($_POST["update"])){
	echo ('<script>alert (" 編集開始 ")</script>');
	$sql = sprintf('UPDATE live SET live_day="%s", live_open="%s", live_close="%s", live_value=%d, live_title="%s", live_catch="%s", live_text="%s", live_text2="%s", live_address="%s", live_tel="%s", live_mail="%s", live_google="%s", live_url="%s", live_image1="%s" WHERE live.live_id=%d' ,
	mysqli_real_escape_string($db, $_SESSION['live']['日付']),
	mysqli_real_escape_string($db, $_SESSION['live']['公開開始']),
	mysqli_real_escape_string($db, $_SESSION['live']['公開終了']),
	mysqli_real_escape_string($db, $_SESSION['live']['重要度']),
	mysqli_real_escape_string($db, $_SESSION['live']['タイトル']),
	mysqli_real_escape_string($db, $_SESSION['live']['キャッチ']),
	mysqli_real_escape_string($db, $_SESSION['live']['内容テキスト']),
	mysqli_real_escape_string($db, $_SESSION['live']['備考テキスト']),
	mysqli_real_escape_string($db, $_SESSION['live']['住所']),
	mysqli_real_escape_string($db, $_SESSION['live']['電話番号']),
	mysqli_real_escape_string($db, $_SESSION['live']['メールアドレス']),
	mysqli_real_escape_string($db, $_SESSION['live']['GoogleMap位置情報']),
	mysqli_real_escape_string($db, $_SESSION['live']['外部リンクURL']),
	mysqli_real_escape_string($db, $_SESSION['live']['upfile']),
	mysqli_real_escape_string($db, $_SESSION['live']['liveID'])
	);
	mysqli_query($db, $sql) or die (mysqli_error($db) );
	
	unset($_SESSION['live']);
	header('Location: complete.html');
}

?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>リアルタイム情報 編集確認</title>
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
	<p class="underConstruction">公開期間：<?php echo date( "Y/m/d H:i" , strtotime($open) ) ; ?> 〜 <?php if($close) {echo date( "Y/m/d H:i" , strtotime($close) ); } ?></p>    
	<p>重要度：<?php echo $value; ?>　画像ファイル名：<?php echo $image; ?></p>
	<div class="content70 wordBreak">

		    <h2 class="barLine"><?php echo $title; ?></h2>
            <p class="textRight"><?php echo date( "Y/m/d H:i" , strtotime($day) ); ?> 公開</p
            ><h5 class="wrap_normal"><?php if ($catch) { echo $catch; }?></h5>
		    <p class="wrap_normal"><?php echo $text; ?></p>
            <p class="wrap_normal fontSizeS fontWeightL"><?php if ($text2) { echo $text2; }?></p>
                
         <?php
		 	if ($address && $google) { 
				echo ( '<a href="https://www.google.com/maps/place/'.$google.'" target="_blank">住所：'.$address.'</a><br>' );
			}else if ($address) { echo ( '住所：'.$address .'<br>' ); }
			if ($tel) { echo ( '電話：'.$tel .'<br>' ); }
			if ($mail) { echo ( 'Email：'.$mail .'<br>' ); }
			if ($url) { echo ( 'URL：<a href="'.$url.'">'.$url.'</a>' ); }
		?>
            
		    </div>

			<div class="content30  image30_1">
		<?php if ($image) {
			echo ( '<img src="./files/'.$image.'" alt="'.$image.'">' );
		} ?>
			</div>
		<hr>
		<br class="split">

	<div class="content50 textCenter"><button class="linkButton5" type="button" name="back" onClick="history.back();">戻って修正</button></div>
	<div class="content50 textCenter"><button class="linkButton5" type="submit" name="update" value="update">決 定 す る</button></div>
    </div>
</form>

</div>

</section>

</body>
</html>
