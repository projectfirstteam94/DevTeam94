<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/lib/RoomClass.php";
use hawaii_room\Room;

$debug = "";
if (isset($_GET["debug"])) {
    $debug = $_GET["debug"];
}

$cArray = Room::getArry($_SERVER['DOCUMENT_ROOT'] . "/room_csv/roomList_C.csv", 1, $debug);
$tArray = Room::getArry($_SERVER['DOCUMENT_ROOT'] . "/room_csv/roomList_T.csv", 2, $debug);

$roomArray = array();
foreach ($cArray as $value) {
	$roomArray["c"][$value->key] = $value;
}
foreach ($tArray as $value) {
	$roomArray["t"][$value->key] = $value;
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="format-detection" content="telephone=no">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
	<meta name="description" content="飛び切り贅沢な時間を特別な空間で。ホテル内のレストランはサンセット時間には素晴らしいハワイの夕日を見ながらのひと時にぴったりです。コンドミニアム、邸宅、ホテルなどの宿泊を伴なわない場合の航空券もお問い合わせください。プライベートジェットのご予約も取り扱っております。">
	<meta name="keywords" content="邸宅,ワイキキ,ハワイ,プライベートジェット,ラニカイ,カイルア,ウェディング,ゴルフ,ディスカバリー,シゲルポレポレツアー,挙式,パーティー,高級,コンドミニアム,ハワイ島,トランプ,亀,ダイヤモンドヘッド,イリカイホテル,ディズニー,ヴィラタイプ">
	<title>Hawaiian Sky | ハワイアンスカイ -TOP</title>

	<!-- ::: CSS / JS ::: -->
	<link rel="stylesheet" href="../common/css/minireset.css">
	<link rel="stylesheet" href="../common/css/layout.css?v=1.0.12">
	<link rel="stylesheet" href="../common/css/flexslider.css">
	<link rel="stylesheet" href="../common/css/style.css">
	<link rel="stylesheet" href="../common/css/top.css?v=1.0.12">
    <link href="https://fonts.googleapis.com/css?family=Old+Standard+TT" rel="stylesheet">
	<script src="../common/js/jquery-1.7.2.min.js"></script>
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-126023437-1"></script>
	<script src="../common/js/common.js"></script>
	<script src="../common/js/jquery.flexslider-min.js"></script>
	<script src="../common/js/top.js"></script>
	<script src="../common/js/linkdata.js"></script>
	<script type="text/javascript">
		// スライダーをフェードイン表示
		window.addEventListener('load', function() {
			$('#slidershow').fadeIn(1000);
		});
	</script>
</head>
<body id="pagetop">
<div class="ly_wrap">

<?php include("common/inc/header.html"); ?>

<!-- ::: Top Visual ::: -->
    <!-- slider_pc -->
	<div class="ly_topVisual pcBlock">
		<ul id="slidershow" class="slides">
			<li><img src="/common/images/top/top_eyecatch01.jpg" alt="砂浜"></li>
			<li><img src="/common/images/top/top_eyecatch02.jpg" alt="夕日"></li>
			<li><img src="/common/images/top/top_eyecatch03.jpg" alt="海辺"></li>
			<li><img src="/common/images/top/top_eyecatch04.jpg" alt="山"></li>
		</ul>
	</div>
    <!-- slider_sp -->
    <div class="ly_topVisual spBlock">
		<ul id="slidershow" class="slides">
			<li><img src="/common/images/top/top_eyecatch_sp01.jpg" alt="砂浜"></li>
			<li><img src="/common/images/top/top_eyecatch_sp02.jpg" alt="夕日"></li>
			<li><img src="/common/images/top/top_eyecatch_sp03.jpg" alt="海辺"></li>
			<li><img src="/common/images/top/top_eyecatch_sp04.jpg" alt="山"></li>
		</ul>
	</div><!-- /.ly_topVisual -->
	<div class="un_topVisualText">
		<div>
			<p>ハワイアンスカイでは、ゆっくりくつろげる<br>コンドミニアム、ヴィラ、邸宅/高級貸別荘をメインに、<br>今までにはないハワイの旅を提供いたします。</p>
		</div>
	</div>
	<!-- ::: Top Visual ::: -->

	<!-- ::: Main ::: -->
	<div class="ly_main ly_main2">
		<!-- ::: ▼ Contents Edit Area ▼ ::: -->

		<section class="un_nwesArea">
			<div class="bl_columnUnitArea un_sectionLine2">
				<div class="bl_columnThird_one">
					<h2>新着情報</h2>
				</div>
				<div class="bl_columnThird_two">
					<ul class="un_newsList">
					<?php
					require('./dbconnect.php'); //データベース読み込み
					$cmd = 'SELECT * FROM news WHERE news_value!= -1 AND news_open < now() AND now() < news_close ORDER BY news_value DESC , news_day DESC LIMIT 3 ';
					$result = mysqli_query($db, $cmd);

					while ($row = mysqli_fetch_assoc($result)) {
					$newsID = htmlspecialchars($row['news_id'], ENT_QUOTES, 'UTF-8');
					$newsDay = htmlspecialchars($row['news_day'], ENT_QUOTES, 'UTF-8');
					$newsOpen = htmlspecialchars($row['news_open'], ENT_QUOTES, 'UTF-8');
					$newsClose = htmlspecialchars($row['news_close'], ENT_QUOTES, 'UTF-8');
					$newsValue = htmlspecialchars($row['news_value'], ENT_QUOTES, 'UTF-8');
					$newsTitle = htmlspecialchars($row['news_title'], ENT_QUOTES, 'UTF-8');
					$newsCatch = htmlspecialchars($row['news_catch'], ENT_QUOTES, 'UTF-8');
					echo ('<li><a href="/news/index.php#no'.$newsID.'"><span>'.date( "Y.m.d" , strtotime($newsDay) ).'</span>'.$newsTitle.'</a></li>');
					}
					?>
					</ul><!-- /.un_newsList -->
				</div>
			</div>
		</section>

		<section class="un_bestRestArea">
			<div class="un_columns">
				<div class="un_column">
					<h2 class="un_barLine">泊まってみたい<br class="spBlock">ハワイのコンドミニアム</h2>
					<!-- オアフ島 -->
					<h3 class="un_leftRightLine"><div>Oahu<br class="spBlock"> - オアフ島 - </div></h3>
					<div class="bl_columnUnitArea">
						<div class="bl_columnHalf">
                            <article class="un_bestRest">
								<?php $type = "c"; $key = "oahu_01"; ?>
								<a href="<?php echo $roomArray[$type][$key]->room_href; ?>">
									<div class="un_roomName">
										<p>ディスカバリーベイ<br>4104</p>
									</div>
									<img src="<?php echo $roomArray[$type][$key]->img_src[0]; ?>" alt="室内">
									<div class="un_roomType">
										<p>
											<?php echo $roomArray[$type][$key]->roomType; ?><br>
											最大6名/<?php echo $roomArray[$type][$key]->nightsNumMinimum; ?><br>
											１泊<?php echo $roomArray[$type][$key]->oneNightCharge; ?>
										</p>
									</div>
								</a>
							</article>
                        </div>
						<div class="bl_columnHalf">
							<article class="un_bestRest">
								<?php $type = "c"; $key = "oahu_02"; ?>
								<a href="<?php echo $roomArray[$type][$key]->room_href; ?>">
									<div class="un_roomName">
										<p>ワイキキ グランドビュー ペントハウス</p>
									</div>
									<img src="<?php echo $roomArray[$type][$key]->img_src[0]; ?>" alt="室内">
									<div class="un_roomType">
										<p>
											<?php echo $roomArray[$type][$key]->roomType; ?><br>
											最大6名/<?php echo $roomArray[$type][$key]->nightsNumMinimum; ?><br>
											１泊<?php echo $roomArray[$type][$key]->oneNightCharge; ?>
										</p>
									</div>
								</a>
							</article>
						</div>
					</div>
					<div class="bl_columnUnitArea">
						<div class="bl_columnHalf">
							<article class="un_bestRest">
								<?php $type = "c"; $key = "oahu_03"; ?>
								<a href="<?php echo $roomArray[$type][$key]->room_href; ?>">
									<div class="un_roomName">
										<p>トランプ インターナショナル ホテル ワイキキビーチウオーク</p>
									</div>
									<img src="<?php echo $roomArray[$type][$key]->img_src[0]; ?>" alt="室内">
									<div class="un_roomType">
										<p>
											<?php echo $roomArray[$type][$key]->roomType; ?><br>
											最大6名/<?php echo $roomArray[$type][$key]->nightsNumMinimum; ?><br>
											１泊<?php echo $roomArray[$type][$key]->oneNightCharge; ?>
										</p>
									</div>
								</a>
							</article>
						</div>
						<div class="bl_columnHalf">
							<article class="un_bestRest">
								<?php $type = "c"; $key = "oahu_04"; ?>
								<a href="<?php echo $roomArray[$type][$key]->room_href; ?>">
									<div class="un_roomName">
										<p>パークレーン サンセットリゾート</p>
									</div>
									<img src="<?php echo $roomArray[$type][$key]->img_src[0]; ?>" alt="室内">
									<div class="un_roomType">
										<p>
											<?php echo $roomArray[$type][$key]->roomType; ?><br>
											最大6名/<?php echo $roomArray[$type][$key]->nightsNumMinimum; ?><br>
											１泊<?php echo $roomArray[$type][$key]->oneNightCharge; ?>
										</p>
									</div>
								</a>
							</article>
						</div>
					</div>
					<div class="bl_columnUnitArea">
						<div class="bl_columnHalf">
							<article class="un_bestRest">
								<?php $type = "c"; $key = "oahu_05"; ?>
								<a href="<?php echo $roomArray[$type][$key]->room_href; ?>">
									<div class="un_roomName">
										<p>ハレコオリナ ビーチヴィラ</p>
									</div>
									<img src="<?php echo $roomArray[$type][$key]->img_src[0]; ?>" alt="プール">
									<div class="un_roomType">
										<p>
											<?php echo $roomArray[$type][$key]->roomType; ?><br>
											最大6名/<?php echo $roomArray[$type][$key]->nightsNumMinimum; ?><br>
											１泊<?php echo $roomArray[$type][$key]->oneNightCharge; ?>
										</p>
									</div>
								</a>
							</article>
						</div>
						<div class="bl_columnHalf">
							<article class="un_bestRest">
								<?php $type = "c"; $key = "oahu_06"; ?>
								<a href="<?php echo $roomArray[$type][$key]->room_href; ?>">
									<div class="un_roomName">
										<p>ハレ パパケア コオリナビーチ</p>
									</div>
									<img src="<?php echo $roomArray[$type][$key]->img_src[0]; ?>" alt="中庭">
									<div class="un_roomType">
										<p>
											<?php echo $roomArray[$type][$key]->roomType; ?><br>
											最大6名/<?php echo $roomArray[$type][$key]->nightsNumMinimum; ?><br>
											１泊<?php echo $roomArray[$type][$key]->oneNightCharge; ?>
										</p>
									</div>
								</a>
							</article>
						</div>
					</div>

					<!-- マウイ島 -->
					<h3 class="un_leftRightLine"><div>Maui<br class="spBlock"> - マウイ島 - </div></h3>
					<div class="bl_columnUnitArea">
						<div class="bl_columnHalf">
							<article class="un_bestRest">
								<?php $type = "c"; $key = "maui_01"; ?>
								<a href="<?php echo $roomArray[$type][$key]->room_href; ?>">
									<div class="un_roomName">
										<p>シーミスト ヴィラ<br>2403</p>
									</div>
									<img src="<?php echo $roomArray[$type][$key]->img_src[0]; ?>" alt="プール">
									<div class="un_roomType">
										<p>
											<?php echo $roomArray[$type][$key]->roomType; ?><br>
											最大6名/<?php echo $roomArray[$type][$key]->nightsNumMinimum; ?><br>
											１泊<?php echo $roomArray[$type][$key]->oneNightCharge; ?>
										</p>
									</div>
								</a>
							</article>
						</div>
						<div class="bl_columnHalf">
							<article class="un_bestRest">
								<?php $type = "c"; $key = "maui_02"; ?>
								<a href="<?php echo $roomArray[$type][$key]->room_href; ?>">
									<div class="un_roomName">
										<p>カアナパリ ロイアル<br>A201</p>
									</div>
									<img src="<?php echo $roomArray[$type][$key]->img_src[0]; ?>" alt="建物">
									<div class="un_roomType">
										<p>
											<?php echo $roomArray[$type][$key]->roomType; ?><br>
											最大6名/<?php echo $roomArray[$type][$key]->nightsNumMinimum; ?><br>
											１泊<?php echo $roomArray[$type][$key]->oneNightCharge; ?>
										</p>
									</div>
								</a>
							</article>
						</div>
					</div>
					<div class="bl_columnUnitArea">
						<div class="bl_columnHalf">
							<article class="un_bestRest">
								<?php $type = "c"; $key = "maui_03"; ?>
								<a href="<?php echo $roomArray[$type][$key]->room_href; ?>">
									<div class="un_roomName">
										<p>サンドキャスル スイート<br>L509</p>
									</div>
									<img src="<?php echo $roomArray[$type][$key]->img_src[0]; ?>" alt="プール">
									<div class="un_roomType">
										<p>
											<?php echo $roomArray[$type][$key]->roomType; ?><br>
											最大6名/<?php echo $roomArray[$type][$key]->nightsNumMinimum; ?><br>
											１泊<?php echo $roomArray[$type][$key]->oneNightCharge; ?>
										</p>
									</div>
								</a>
							</article>
						</div>
						<div class="bl_columnHalf">
						</div>
					</div>

					<!-- ハワイ島 -->
					<h3 class="un_leftRightLine"><div>Maui<br class="spBlock"> - ハワイ島 - </div></h3>
					<div class="bl_columnUnitArea">
						<div class="bl_columnHalf">
							<article class="un_bestRest">
								<?php $type = "c"; $key = "hawaii_01"; ?>
								<a href="<?php echo $roomArray[$type][$key]->room_href; ?>">
									<div class="un_roomName">
										<p>ヒルサイドヴィラ<br>7101</p>
									</div>
									<img src="<?php echo $roomArray[$type][$key]->img_src[0]; ?>" alt="室内">
									<div class="un_roomType">
										<p>
											<?php echo $roomArray[$type][$key]->roomType; ?><br>
											最大6名/<?php echo $roomArray[$type][$key]->nightsNumMinimum; ?><br>
											１泊<?php echo $roomArray[$type][$key]->oneNightCharge; ?>
										</p>
									</div>
								</a>
							</article>
						</div>
						<div class="bl_columnHalf">
							<article class="un_bestRest">
								<?php $type = "c"; $key = "hawaii_02"; ?>
								<a href="<?php echo $roomArray[$type][$key]->room_href; ?>">
									<div class="un_roomName">
										<p>ワイコロアコロニーヴィラ<br>403</p>
									</div>
									<img src="<?php echo $roomArray[$type][$key]->img_src[0]; ?>" alt="プール">
									<div class="un_roomType">
										<p>
											<?php echo $roomArray[$type][$key]->roomType; ?><br>
											最大6名/<?php echo $roomArray[$type][$key]->nightsNumMinimum; ?><br>
											１泊<?php echo $roomArray[$type][$key]->oneNightCharge; ?>
										</p>
									</div>
								</a>
							</article>
						</div>
					</div>
				</div>

				<div class="un_column">
					<h2 class="un_barLine">泊まってみたい<br class="spBlock">ハワイの邸宅/高級貸別荘</h2>

					<!-- オアフ島 -->
					<h3 class="un_leftRightLine"><div>Oahu - オアフ島 - <br class="spBlock"><span class="pcInline">／ </span>ラニカイ地区</div></h3>
					<div class="bl_columnUnitArea">
						<div class="bl_columnHalf">
							<article class="un_bestRest">
								<?php $type = "t"; $key = "oahu_lanikai_01"; ?>
								<a href="<?php echo $roomArray[$type][$key]->room_href; ?>">
									<div class="un_roomName">
										<p>ラニカイオーシャンサイド</p>
									</div>
									<img src="<?php echo $roomArray[$type][$key]->img_src[0]; ?>" alt="中庭">
									<div class="un_roomType">
										<p>
											<?php echo $roomArray[$type][$key]->roomType; ?><br>
											最大6名/<?php echo $roomArray[$type][$key]->nightsNumMinimum; ?><br>
											１泊<?php echo $roomArray[$type][$key]->oneNightCharge; ?>
										</p>
									</div>
								</a>
							</article>
						</div>
						<div class="bl_columnHalf">
							<article class="un_bestRest">
								<?php $type = "t"; $key = "oahu_lanikai_02"; ?>
								<a href="<?php echo $roomArray[$type][$key]->room_href; ?>">
									<div class="un_roomName">
										<p>ラニカイオーシャンビューヴィラ</p>
									</div>
									<img src="<?php echo $roomArray[$type][$key]->img_src[0]; ?>" alt="ウッドデッキ">
									<div class="un_roomType">
										<p>
											<?php echo $roomArray[$type][$key]->roomType; ?><br>
											最大6名/<?php echo $roomArray[$type][$key]->nightsNumMinimum; ?><br>
											１泊<?php echo $roomArray[$type][$key]->oneNightCharge; ?>
										</p>
									</div>
								</a>
							</article>
						</div>
					</div>

					<h3 class="un_leftRightLine"><div>Oahu - オアフ島 - <br class="spBlock"><span class="pcInline">／ </span>カイルア地区</div></h3>
					<div class="bl_columnUnitArea">
						<div class="bl_columnHalf">
							<article class="un_bestRest">
								<?php $type = "t"; $key = "oahu_kailua_01"; ?>
								<a href="<?php echo $roomArray[$type][$key]->room_href; ?>">
									<div class="un_roomName">
										<p>ハレキモ</p>
									</div>
									<img src="<?php echo $roomArray[$type][$key]->img_src[0]; ?>" alt="プール">
									<div class="un_roomType">
										<p>
											<?php echo $roomArray[$type][$key]->roomType; ?><br>
											最大6名/<?php echo $roomArray[$type][$key]->nightsNumMinimum; ?><br>
											１泊<?php echo $roomArray[$type][$key]->oneNightCharge; ?>
										</p>
									</div>
								</a>
							</article>
						</div>
						<div class="bl_columnHalf">
						</div>
					</div>

					<h3 class="un_leftRightLine"><div>Oahu - オアフ島 - <br class="spBlock"><span class="pcInline">／ </span>カハラ地区</div></h3>
					<div class="bl_columnUnitArea">
						<div class="bl_columnHalf">
							<article class="un_bestRest">
								<?php $type = "t"; $key = "oahu_kahala_01"; ?>
								<a href="<?php echo $roomArray[$type][$key]->room_href; ?>">
									<div class="un_roomName">
										<p>カハラミニリゾート</p>
									</div>
									<img src="<?php echo $roomArray[$type][$key]->img_src[0]; ?>" alt="プール">
									<div class="un_roomType">
										<p>
											<?php echo $roomArray[$type][$key]->roomType; ?><br>
											最大6名/<?php echo $roomArray[$type][$key]->nightsNumMinimum; ?><br>
											１泊<?php echo $roomArray[$type][$key]->oneNightCharge; ?>
										</p>
									</div>
								</a>
							</article>
						</div>
						<div class="bl_columnHalf">
							<article class="un_bestRest">
								<?php $type = "t"; $key = "oahu_kahala_02"; ?>
								<a href="<?php echo $roomArray[$type][$key]->room_href; ?>">
									<div class="un_roomName">
										<p>カハラハイダウエイ</p>
									</div>
									<img src="<?php echo $roomArray[$type][$key]->img_src[0]; ?>" alt="プール">
									<div class="un_roomType">
										<p>
											<?php echo $roomArray[$type][$key]->roomType; ?><br>
											最大6名/<?php echo $roomArray[$type][$key]->nightsNumMinimum; ?><br>
											１泊<?php echo $roomArray[$type][$key]->oneNightCharge; ?>
										</p>
									</div>
								</a>
							</article>
						</div>
					</div>
					<div class="bl_columnUnitArea">
						<div class="bl_columnHalf">
							<article class="un_bestRest">
								<?php $type = "t"; $key = "oahu_kahala_03"; ?>
								<a href="<?php echo $roomArray[$type][$key]->room_href; ?>">
									<div class="un_roomName">
										<p>パームツリーエステート</p>
									</div>
									<img src="<?php echo $roomArray[$type][$key]->img_src[0]; ?>" alt="ウッドデッキ">
									<div class="un_roomType">
										<p>
											<?php echo $roomArray[$type][$key]->roomType; ?><br>
											最大6名/<?php echo $roomArray[$type][$key]->nightsNumMinimum; ?><br>
											１泊<?php echo $roomArray[$type][$key]->oneNightCharge; ?>
										</p>
									</div>
								</a>
							</article>
						</div>
						<div class="bl_columnHalf">
						</div>
					</div>

					<h3 class="un_leftRightLine"><div>Oahu - オアフ島 - <br class="spBlock"><span class="pcInline">／ </span>ハワイカイ地区</div></h3>
					<div class="bl_columnUnitArea">
						<div class="bl_columnHalf">
							<article class="un_bestRest">
								<?php $type = "t"; $key = "oahu_hawaii_kai_01"; ?>
								<a href="<?php echo $roomArray[$type][$key]->room_href; ?>">
									<div class="un_roomName">
										<p>パイコラグーンリトリート</p>
									</div>
									<img src="<?php echo $roomArray[$type][$key]->img_src[0]; ?>" alt="プール">
									<div class="un_roomType">
										<p>
											<?php echo $roomArray[$type][$key]->roomType; ?><br>
											最大6名/<?php echo $roomArray[$type][$key]->nightsNumMinimum; ?><br>
											１泊<?php echo $roomArray[$type][$key]->oneNightCharge; ?>
										</p>
									</div>
								</a>
							</article>
						</div>
						<div class="bl_columnHalf">
							<article class="un_bestRest">
								<?php $type = "t"; $key = "oahu_hawaii_kai_02"; ?>
								<a href="<?php echo $roomArray[$type][$key]->room_href; ?>">
									<div class="un_roomName">
										<p>マカニ ラニ</p>
									</div>
									<img src="<?php echo $roomArray[$type][$key]->img_src[0]; ?>" alt="プール">
									<div class="un_roomType">
										<p>
											<?php echo $roomArray[$type][$key]->roomType; ?><br>
											最大6名/<?php echo $roomArray[$type][$key]->nightsNumMinimum; ?><br>
											１泊<?php echo $roomArray[$type][$key]->oneNightCharge; ?>
										</p>
									</div>
								</a>
							</article>
						</div>
					</div>

					<h3 class="un_leftRightLine"><div>Oahu - オアフ島 - <br class="spBlock"><span class="pcInline">／ </span>ノースショア地区</div></h3>
					<div class="bl_columnUnitArea">
						<div class="bl_columnHalf">
							<article class="un_bestRest">
								<?php $type = "t"; $key = "oahu_north_shore_01"; ?>
								<a href="<?php echo $roomArray[$type][$key]->room_href; ?>">
									<div class="un_roomName">
										<p>パイプラインハウス</p>
									</div>
									<img src="<?php echo $roomArray[$type][$key]->img_src[0]; ?>" alt="ウッドデッキ">
									<div class="un_roomType">
										<p>
											<?php echo $roomArray[$type][$key]->roomType; ?><br>
											最大6名/<?php echo $roomArray[$type][$key]->nightsNumMinimum; ?><br>
											１泊<?php echo $roomArray[$type][$key]->oneNightCharge; ?>
										</p>
									</div>
								</a>
							</article>
						</div>
						<div class="bl_columnHalf">
						</div>
					</div>

					<!-- ハワイ島 -->
					<h3 class="un_leftRightLine"><div>Hawaii - ハワイ島 - <br class="spBlock"><span class="pcInline"></span></div></h3>
					<div class="bl_columnUnitArea">
						<div class="bl_columnHalf">
							<article class="un_bestRest">
								<?php $type = "t"; $key = "hawaii_01"; ?>
								<a href="<?php echo $roomArray[$type][$key]->room_href; ?>">
									<div class="un_roomName">
										<p>3ベッドゴルフヴイラ アット フォーシーズンズ リゾート フアラライ</p>
									</div>
									<img src="<?php echo $roomArray[$type][$key]->img_src[0]; ?>" alt="室内">
									<div class="un_roomType">
										<p>
											<?php echo $roomArray[$type][$key]->roomType; ?><br>
											最大6名/<?php echo $roomArray[$type][$key]->nightsNumMinimum; ?><br>
											１泊<?php echo $roomArray[$type][$key]->oneNightCharge; ?>
										</p>
									</div>
								</a>
							</article>
						</div>
						<div class="bl_columnHalf">
							<article class="un_bestRest">
								<?php $type = "t"; $key = "hawaii_02"; ?>
								<a href="<?php echo $roomArray[$type][$key]->room_href; ?>">
									<div class="un_roomName">
										<p>コナ ベイ ブリス</p>
									</div>
									<img src="<?php echo $roomArray[$type][$key]->img_src[0]; ?>" alt="室内">
									<div class="un_roomType">
										<p>
											<?php echo $roomArray[$type][$key]->roomType; ?><br>
											最大6名/<?php echo $roomArray[$type][$key]->nightsNumMinimum; ?><br>
											１泊<?php echo $roomArray[$type][$key]->oneNightCharge; ?>
										</p>
									</div>
								</a>
							</article>
						</div>
					</div>

					<div class="bl_columnUnitArea">
						<div class="bl_columnHalf">
							<article class="un_bestRest">
								<?php $type = "t"; $key = "hawaii_03"; ?>
								<a href="<?php echo $roomArray[$type][$key]->room_href; ?>">
									<div class="un_roomName">
										<p>オーマ プランテーション</p>
									</div>
									<img src="<?php echo $roomArray[$type][$key]->img_src[0]; ?>" alt="室内">
									<div class="un_roomType">
										<p>
											<?php echo $roomArray[$type][$key]->roomType; ?><br>
											最大6名/<?php echo $roomArray[$type][$key]->nightsNumMinimum; ?><br>
											１泊<?php echo $roomArray[$type][$key]->oneNightCharge; ?>
										</p>
									</div>
								</a>
							</article>
						</div>
						<div class="bl_columnHalf">
							<article class="un_bestRest">
								<?php $type = "t"; $key = "hawaii_04"; ?>
								<a href="<?php echo $roomArray[$type][$key]->room_href; ?>">
									<div class="un_roomName">
										<p>ハレ グレイス アロハ</p>
									</div>
									<img src="<?php echo $roomArray[$type][$key]->img_src[0]; ?>" alt="室内">
									<div class="un_roomType">
										<p>
											<?php echo $roomArray[$type][$key]->roomType; ?><br>
											最大6名/<?php echo $roomArray[$type][$key]->nightsNumMinimum; ?><br>
											１泊<?php echo $roomArray[$type][$key]->oneNightCharge; ?>
										</p>
									</div>
								</a>
							</article>
						</div>
					</div>

					<!-- マウイ島 -->
					<h3 class="un_leftRightLine"><div>Maui - マウイ島 - <br class="spBlock"><span class="pcInline"></span></div></h3>
					<div class="bl_columnUnitArea">
						<div class="bl_columnHalf">
							<article class="un_bestRest">
								<?php $type = "t"; $key = "maui_01"; ?>
								<a href="<?php echo $roomArray[$type][$key]->room_href; ?>">
									<div class="un_roomName">
										<p>シーシェルズ ビーチハウス</p>
									</div>
									<img src="<?php echo $roomArray[$type][$key]->img_src[0]; ?>" alt="プール">
									<div class="un_roomType">
										<p>
											<?php echo $roomArray[$type][$key]->roomType; ?><br>
											最大6名/<?php echo $roomArray[$type][$key]->nightsNumMinimum; ?><br>
											１泊<?php echo $roomArray[$type][$key]->oneNightCharge; ?>
										</p>
									</div>
								</a>
							</article>
						</div>
						<div class="bl_columnHalf">
							<article class="un_bestRest">
								<?php $type = "t"; $key = "maui_02"; ?>
								<a href="<?php echo $roomArray[$type][$key]->room_href; ?>">
									<div class="un_roomName">
										<p>マンゴサーフビーチ フロントヴィラ</p>
									</div>
									<img src="<?php echo $roomArray[$type][$key]->img_src[0]; ?>" alt="中庭">
									<div class="un_roomType">
										<p>
											<?php echo $roomArray[$type][$key]->roomType; ?><br>
											最大6名/<?php echo $roomArray[$type][$key]->nightsNumMinimum; ?><br>
											１泊<?php echo $roomArray[$type][$key]->oneNightCharge; ?>
										</p>
									</div>
								</a>
							</article>
						</div>
					</div>

					<div class="bl_columnUnitArea">
						<div class="bl_columnHalf">
							<article class="un_bestRest">
								<?php $type = "t"; $key = "maui_03"; ?>
								<a href="<?php echo $roomArray[$type][$key]->room_href; ?>">
									<div class="un_roomName">
										<p>ハワイアナ ハレ</p>
									</div>
									<img src="<?php echo $roomArray[$type][$key]->img_src[0]; ?>" alt="建物">
									<div class="un_roomType">
										<p>
											<?php echo $roomArray[$type][$key]->roomType; ?><br>
											最大6名/<?php echo $roomArray[$type][$key]->nightsNumMinimum; ?><br>
											１泊<?php echo $roomArray[$type][$key]->oneNightCharge; ?>
										</p>
									</div>
								</a>
							</article>
						</div>
						<div class="bl_columnHalf">
							<article class="un_bestRest">
								<?php $type = "t"; $key = "maui_04"; ?>
								<a href="<?php echo $roomArray[$type][$key]->room_href; ?>">
									<div class="un_roomName">
										<p>サファイアシーズビーチエステート</p>
									</div>
									<img src="<?php echo $roomArray[$type][$key]->img_src[0]; ?>" alt="建物">
									<div class="un_roomType">
										<p>
											<?php echo $roomArray[$type][$key]->roomType; ?><br>
											最大6名/<?php echo $roomArray[$type][$key]->nightsNumMinimum; ?><br>
											１泊<?php echo $roomArray[$type][$key]->oneNightCharge; ?>
										</p>
									</div>
								</a>
							</article>
						</div>
					</div>


					<!-- カウアイ島 -->
					<h3 class="un_leftRightLine"><div>Kauai - カウアイ島 - <br class="spBlock"><span class="pcInline"></span></div></h3>
					<div class="bl_columnUnitArea">
						<div class="bl_columnHalf">
							<article class="un_bestRest">
								<?php $type = "t"; $key = "kauai_01"; ?>
								<a href="<?php echo $roomArray[$type][$key]->room_href; ?>">
									<div class="un_roomName">
										<p>ポイプ クレーター</p>
									</div>
									<img src="<?php echo $roomArray[$type][$key]->img_src[0]; ?>" alt="室内">
									<div class="un_roomType">
										<p>
											<?php echo $roomArray[$type][$key]->roomType; ?><br>
											最大6名/<?php echo $roomArray[$type][$key]->nightsNumMinimum; ?><br>
											１泊<?php echo $roomArray[$type][$key]->oneNightCharge; ?>
										</p>
									</div>
								</a>
							</article>
						</div>
						<div class="bl_columnHalf">
							<article class="un_bestRest">
								<?php $type = "t"; $key = "kauai_02"; ?>
								<a href="<?php echo $roomArray[$type][$key]->room_href; ?>">
									<div class="un_roomName">
										<p>キアフナ プランテーションハレ</p>
									</div>
									<img src="<?php echo $roomArray[$type][$key]->img_src[0]; ?>" alt="室内">
									<div class="un_roomType">
										<p>
											<?php echo $roomArray[$type][$key]->roomType; ?><br>
											最大6名/<?php echo $roomArray[$type][$key]->nightsNumMinimum; ?><br>
											１泊<?php echo $roomArray[$type][$key]->oneNightCharge; ?>
										</p>
									</div>
								</a>
							</article>
						</div>
					</div>
					<div class="bl_columnUnitArea">
						<div class="bl_columnHalf">
							<article class="un_bestRest">
								<?php $type = "t"; $key = "kauai_03"; ?>
								<a href="<?php echo $roomArray[$type][$key]->room_href; ?>">
									<div class="un_roomName">
										<p>アロハ カイ ユニット<br>307</p>
									</div>
									<img src="<?php echo $roomArray[$type][$key]->img_src[0]; ?>" alt="室内">
									<div class="un_roomType">
										<p>
											<?php echo $roomArray[$type][$key]->roomType; ?><br>
											最大6名/<?php echo $roomArray[$type][$key]->nightsNumMinimum; ?><br>
											１泊<?php echo $roomArray[$type][$key]->oneNightCharge; ?>
										</p>
									</div>
								</a>
							</article>
						</div>
						<div class="bl_columnHalf">
						</div>
					</div>
				</div>
			</div>
		</section><!-- /.un_bestRestArea -->

		<section class="bl_columnUnitArea un_introArea">
			<div class="bl_columnThird_one">
				<h1 class="un_introLead">飛び切り贅沢な時間を<br>貴方に　in Hawaii</h1>
				<p>特別な空間で過ごす、特別な時間。<br>心も体も安らぐ、穏やかなひと時を</p>
			</div><!-- /.bl_columnThird_one -->
			<div class="bl_columnThird_two un_introImg">
				<img src="./common/images/top/intro_img01.jpg" alt="海">
				<img src="./common/images/top/intro_img02.jpg" alt="夕日">
				<img src="./common/images/top/intro_img03.jpg" alt="空">
			</div><!-- /.bl_columnThird_two -->
		</section><!-- /.un_introArea -->

		<section class="un_restArea">
		<h2 class="underLine2">注目のおすすめコンドミニアム・邸宅／高級貸別荘</h2>
			<div class="bl_columnUnitArea">
				<div class="bl_columnHalf">
				<div class="un_restList">
						<div class="un_restBox">
							<div class="un_restImg">
								<img src="./rest/condominium/oahu/images/detail01/detail_img01.jpg" alt="室内">
							</div><!-- /.un_restImg -->
							<div class="un_restTxt">
								<h3 class="un_restTtl">ディスカバリー・ベイ／スィート4104（ハワイアンスカイ所有コンドミニアム）</h3>
								<p>スイート4104は、アラモアナ大通り沿いに建つ高級コンドミニアム「ディスカバリー・ベイ」の41階の窓から臨むパノラマの景観が楽しめる部屋です。<br>
									41階の大きなガラス窓一面から見える素晴らしい眺めはスイート4104の自慢。アラモアナセンター、ビーチに近く便利でありながら静かなステイをしたい人にお勧めです。<br>
									長期滞在者の方にもお勧めです。</p>
								<div class="un_moreLink">
									<?php $type = "c"; $key = "oahu_01"; ?>
									<a href="<?php echo $roomArray[$type][$key]->room_href; ?>">もっと見る</a>
								</div>
							</div><!-- /.un_restTxt -->
						</div><!-- /.un_restBox -->
					</div><!-- /.un_restList -->
				</div><!-- /.bl_columnHalf -->
				<div class="bl_columnHalf">
					<div class="un_restList">
						<div class="un_restBox">
							<div class="un_restImg">
								<img src="./rest/condominium/oahu/images/detail05/detail_img01.jpg" alt="室内">
							</div><!-- /.un_restImg -->
							<div class="un_restTxt">
								<h3 class="un_restTtl">パークレーン サンセットリゾート</h3>
								<p>アラモアナショッピングセンターに隣接している高級コンドミニアムです。<br>24時間のセキュリティースタッフ常駐し、コンシェルジュサービスも充実しており、高級ホテルと同等以上のサービスが提供されると評判です。フィットネスルーム、パーティールームでのパーティーの手配も承ります。<br>日本のセレブに人気のコンドミニアムですので、ピークシーズンの予約はお早目に。</p>
								<div class="un_moreLink">
									<?php $type = "c"; $key = "oahu_04"; ?>
									<a href="<?php echo $roomArray[$type][$key]->room_href; ?>">もっと見る</a>
								</div>
							</div><!-- /.un_restTxt -->
						</div><!-- /.un_restBox -->
					</div><!-- /.un_restList -->
				</div><!-- /.bl_columnHalf -->
			</div>
		</section><!-- /.un_restArea -->

		<section class="un_contactInfo">
			<h2 class="un_secTtl">ハワイアン スカイでは航空券の手配も承っております。</h2>
			<p>コンドミニアム、邸宅、ホテルなどの宿泊を伴なわない場合の航空券もお問い合わせください。<br>
				ハワイ、アジア、米国、カナダ、ヨーロッパの航空券、ホテル、鉄道パス、レンタカーもお気軽にご相談ください。</p>
			<p>★ドイツ鉄道の旅／ミュンヘン▶ハイデルベルグ▶ケルン鉄道の旅。<br>
				★南イタリア／ローマ▶ナポリ▶アマルフィの旅<br>
				など、ヨーロッパ旅行に詳しいスタッフがご案内いたします。気軽にご相談ください。</p>
			<div class="bl_linkBtn_brown">
				<a href="/contact/" class="it_navPath17">お問い合わせはコチラ</a>
			</div><!-- /.bl_linkBtn_brown -->
		</section>

		<section class="un_restInfo">
			<div class="un_infoHead">
				<h2 class="un_secTtl">宿泊先を探す。</h2>
				<p>ハワイ邸宅、高級コンドミニアム…。<br>
					お客様がゆったり過ごせる宿泊先を<br class="spInline">ご提案します。</p>
			</div><!-- /.un_infoHead -->
			<div class="un_restList">
				<div class="un_restItem">
					<a href="/rest/condominium/" class="it_navPath3">
						<img src="./common/images/top/cond_img.jpg" alt="室内">
						<dl class="un_restOverlay">
							<dt><img src="./common/images/top/cond_name.png" alt="コンドミニアム"></dt>
							<dd>ホテルと違いリビングやキッチンが備えつけられ自炊ができる“暮らす”気分を味わえます。</dd>
						</dl><!-- /.un_restOverlay -->
					</a>
				</div><!-- /.un_restItem -->
				<div class="un_restItem">
					<a href="/rest/teitaku/" class="it_navPath6">
						<img src="./common/images/top/man.jpg" alt="室内">
						<dl class="un_restOverlay">
							<dt><img src="./common/images/top/man_tx.png" alt="邸宅/高級貸別荘"></dt>
							<dd>オアフ島の高級住宅街カハラや他の隠れ家など贅沢なインテリアの豪華高級邸宅を貸し切りで。</dd>
						</dl><!-- /.un_restOverlay -->
					</a>
				</div><!-- /.un_restItem -->
			</div><!-- /.un_restList -->
		</section>

		<section class="un_photoArea">
			<h2 class="un_secTtl">ハワイの景色</h2>
			<div class="un_photoList">
				<figure><img src="./common/images/top/photo_img01.jpg" alt="ハワイ島"></figure>
				<figure><img src="./common/images/top/photo_img02.jpg" alt="食べ物"></figure>
				<figure><img src="./common/images/top/photo_img03.jpg" alt="夜景"></figure>
				<figure><img src="./common/images/top/photo_img04.jpg" alt="サボテン"></figure>
				<figure><img src="./common/images/top/photo_img05.jpg" alt="砂浜"></figure>
				<figure><img src="./common/images/top/photo_img06.jpg" alt="お菓子"></figure>
				<figure><img src="./common/images/top/photo_img07.jpg" alt="池"></figure>
				<figure><img src="./common/images/top/photo_img08.jpg" alt="海岸"></figure>
			</div><!-- /.un_photoList -->
			<div class="un_moreLink"><a href="/photo/" class="it_navPath11">もっと見る</a></div>
		</section><!-- /.un_photoArea -->

		<!-- ::: ▲ Contents Edit Area ▲ ::: -->
	</div><!-- /.ly_main -->
	<!-- ::: /Main ::: -->

<?php include("./common/inc/footer.html"); ?>
</div><!-- /.ly_wrap -->
</body>
</html>
