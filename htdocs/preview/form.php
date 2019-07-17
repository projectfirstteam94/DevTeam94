<?php
session_start();

//データベース読み込み
require('dbconnect.php');


//エラーチェック
ini_set("display_errors", 1);
error_reporting(E_ALL);

//ゲットチェック
if (isset($_GET['ID'])){
	$newsID = $_GET['ID'];
}else{$newsID = 3;}

//ポストチェック
if (!empty($_POST)){
	
	$fileName = $_FILES['upfile']['name'];
	if(!empty($fileName)){
		$ext = substr($fileName, -3);
		if ($ext == 'jpg' || $ext == 'gif' || $ext == 'png'){ //拡張子が jpg, gif, pngであれば
			
		$image = date('Ymd-His') . $_FILES['upfile']['name'];
		move_uploaded_file ($_FILES["upfile"]["tmp_name"], "files/" .$image);
		chmod("files/" . $image, 0644);	 	
		} 
	}	
		
	$_SESSION['news'] = $_POST;
	$_SESSION['news']['upfile'] = $image;
	
		if (isset($_SESSION['news'])) {			
		header('Location: check.php');
		}
	
}
?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
<META NAME="ROBOTS" CONTENT="NOARCHIVE">
<META name="robots" content="noindex,nofollow">
<title>Hawaiian Sky | データ送信フォーム</title>

<link href="css/hs.css" rel="stylesheet" type="text/css">


<!-- ▼closed▼ 
<link href="css/closed.css" rel="stylesheet" type="text/css">
-->

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

 
// 入力内容チェックのための関数
    function input_check(){
    var result = true;
 
// エラー用装飾のためのクラスリセット
    $('#news_title').removeClass("inp_error");
	$('#news_text').removeClass("inp_error");
    $('#news_mail').removeClass("inp_error");
    $('#news_tel').removeClass("inp_error");
    $('#news_image1').removeClass("inp_error");
 
// 入力エラー文をリセット
    $("#title_error").empty();
    $("#text_error").empty();
	$("#mail_error").empty();
    $("#tel_error").empty();
	$("#image1_error").empty();

 
// 入力内容セット
    var title   = $("#news_title").val();
    var text  = $("#news_text").val();
    var mail  = $("#news_mail").val();
    var tel  = $("#news_tel").val().replace(/[━.*‐.*―.*－.*\–.*ー.*\-]/gi,'');
	var image1   = $("#news_image1").val();

// 入力内容チェック
 
// タイトル
    if(title == ""){
        $("#title_error").html("<i class='fa fa-exclamation-circle'></i> タイトルは必須です。");
        $("#news_title").addClass("inp_error");
        result = false;
    }else if(name.length > 20){
        $("#title_error").html("<i class='fa fa-exclamation-circle'></i> タイトルは20文字以内で入力してください。");
        $("#news_title").addClass("inp_error");
        result = false;
    }
	
	// 内容テキスト
    if(text == ""){
        $("#text_error").html("<i class='fa fa-exclamation-circle'></i> 内容は必須です。");
        $("#news_text").addClass("inp_error");
        result = false;
    }

// メールアドレス
    if(mail&&!mail.match(/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/)){
        $('#mail_error').html("<i class='fa fa-exclamation-circle'></i> 正しいメールアドレスを入力してください。");
        $("#news_mail").addClass("inp_error");
        result = false;
    }else if(mail&&mail.length > 255){
        $('#mail_error').html("<i class='fa fa-exclamation-circle'></i> 正しいメールアドレスを入力してください。");
        $("#news_mail").addClass("inp_error");
        result = false;
    }

// 電話番号
	if(tel != ""){
    if((!tel.match(/^[0-9]+$/)) || (tel.length < 10)){
        $('#tel_error').html("<i class='fa fa-exclamation-circle'></i> 正しい電話番号を入力してください。");
        $("#news_tel").addClass("inp_error");
        result = false;
   		}
	}
	
// 画像拡張子
    if(image1 != ""){
		if(!document.getElementById('news_image1').value.toLowerCase().match(/\.(jpg|gif|png)$/i)) {
        $("#image1_error").html("<i class='fa fa-exclamation-circle'></i> 画像の拡張子は jpg gif png のいずれかにしてください。");
        $("#news_image1").addClass("inp_error");
        result = false;
		}
    }


    return result;
}


</script>


</head>
<body>

<!-- ▼コンテンツ▼ -->
<section class="mainContent"> 


<h1 class="underLine2">最新情報 追加・編集フォーム</h1>
<br>
<?php
//データベースから引用
$cmd = 'SELECT * FROM news WHERE news_id='.$newsID.' ';
$result = mysqli_query($db, $cmd);
if (!$result) {
    $errorMes = "データ取得失敗";
}else  $errorMes = "データ取得成功";

while ($row = mysqli_fetch_assoc($result) ) { ;
	$newsDay =($row['news_day']);
	$newsOpen =($row['news_open']);
	$newsClose =($row['news_close']);
	$newsValue =($row['news_value']);
	$newsTitle =($row['news_title']);
	$newsCatch =($row['news_catch']);
	$newsText =($row['news_text']);
	$newsText2 =($row['news_text2']);
	$newsAddress =($row['news_address']);
	$newsGoogle =($row['news_google']);
	$newsUrl =($row['news_url']);
	$newsImg =($row['news_image1']);	
}
?>

<table ID="dataList" class=" wordBreak">
	<tr><td class="dataList_text">【 現在選択中 】　<?php echo date( "Y/m/d H:i" , strtotime($newsDay) ); ?>　（<?php echo date( "Y/m/d H:i" , strtotime($newsOpen) ); ?>〜）　重要度：<?php echo $newsValue; ?></td>
    <td rowspan="2" class="dataList_image borderBottom"><?php if($newsImg) { echo ('<img src="files/'.$newsImg.'" alt="'.$newsImg.'" class="image30_1">'); }?></td></tr>
    <tr class="borderBottom"><td class="dataList_text"><?php echo $newsTitle; ?></td></tr>


</table>
    

<p class="wrap_pre">以下の必須事項をご入力の上、確認ボタンをクリックしてください。</p>
<p class="orange">（※）は必須事項です</p>


<form method="post" action="" enctype="multipart/form-data" onsubmit="return input_check()">
<table ID="contactForm">
<?php
$dt = new DateTime();
?>
<tr>
	<td class="formHead">情報日時</td><td><input type="datetime-local" ID="news_day" name="日付" class="formInput" value="<?php echo $dt->format('Y-m-d\TH:i') ?>"><span id="day_error" class="error_m"></span></td>
    </tr><tr></tr><tr>
    	<td class="formHead">公開開始</td><td><input type="datetime-local" ID="news_open" name="公開開始" class="formInput" value="<?php echo $dt->format('Y-m-d\TH:i') ?>"><span id="open_error" class="error_m"></span></td>
        </tr><tr></tr><tr>
    <td class="formHead">公開終了（未記入でもOK）</td><td><input type="datetime-local" ID="news_close" name="公開終了" class="formInput"><span id="close_error" class="error_m"></span></td>
    </tr><tr></tr><tr>
    <td class="formHead">重要度</td><td><input type="number" ID="news_value" name="重要度" class="formInput" value=0><span id="value_error" class="error_m"></span></td>
    </tr><tr></tr><tr>
    <td class="formHead">タイトル（必須）</td><td><input type="text" ID="news_title" name="タイトル" class="formInput"><span id="title_error" class="error_m"></span></td>
    </tr><tr></tr><tr>
	<td class="formHead">キャッチ</td><td><input type="text" ID="news_catch" name="キャッチ" class="formInput"><span id="catch_error" class="error_m"></span></td>
	</tr><tr></tr><tr>
	<td class="formHead">内容（必須）</td><td><textarea ID="news_text" name="内容テキスト" class="formInput"></textarea><span id="text_error" class="error_m"></span></td>
	</tr><tr></tr><tr>
    <td class="formHead">備考</td><td><input type="text" ID="news_text2" name="備考テキスト" class="formInput"><span id="text2_error" class="error_m"></span></td>
	</tr><tr></tr><tr>
    <td class="formHead">住所</td><td><input type="text" ID="news_address" name="住所" class="formInput"><span id="address_error" class="error_m"></span></td>
	</tr><tr></tr><tr>
	<td class="formHead">電話番号（半角）</td><td><input type="tel" ID="news_tel" name="電話番号" class="formInput"><span id="tel_error" class="error_m"></span></td>
	</tr><tr></tr><tr>
    	<td class="formHead">メールアドレス</td><td><input type="mail" ID="news_mail" name="メールアドレス" class="formInput"><span id="mail_error" class="error_m"></span></td>
	</tr><tr></tr><tr>
	<td class="formHead">GoogleMap座標</td><td><input type="text" ID="news_google" name="GoogleMap位置情報" class="formInput"><span id="google_error" class="error_m"></span></td>
	</tr><tr></tr><tr>
    	<td class="formHead">外部リンクURL</td><td><input type="text" ID="news_url" name="外部リンクURL" class="formInput"><span id="url_error" class="error_m"></span></td>
	</tr><tr></tr><tr>
    	<td class="formHead">画像</td><td><input type="file" ID="news_image1" name="upfile" class="formInput"><span id="image1_error" class="error_m"></span></td>
</tr>

</table>
<br class="split">
<div class="content30 textCenter"><input class="linkButton5" type="button" value="削　除"></div>
<div class="content30 textCenter"><input class="linkButton5" type="button" value="上 書 き"></div>
<div class="content30 textCenter"><input class="linkButton5" type="submit" value="追　加"></div>
</form>
<br>


<a href="#"><input class="linkButton" type="button" value="リアルタイム情報の追加・編集はコチラ"></a>

</section>
<!-- ▲コンテンツ▲ -->

<!-- ▼フッター▼ -->
<footer>





</footer>
</body>
</html>
