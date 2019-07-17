<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="format-detection" content="telephone=no">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
	<meta name="description" content="<?php echo $this->description ?>">
	<meta name="keywords" content="<?php echo $this->keywords ?>">
	<title>Hawaiian Sky | ハワイアンスカイ -<?php echo $this->hotelTypeName ?> -<?php echo $this->island_or_Area_Name; ?> -<?php echo $this->roomName; ?></title>

	<!-- ::: CSS / JS ::: -->
	<link rel="stylesheet" href="/common/css/minireset.css">
	<link rel="stylesheet" href="/common/css/colorbox.css">
	<link rel="stylesheet" href="/common/css/layout.css">
	<link rel="stylesheet" href="/common/css/style.css">
	<link rel="stylesheet" href="/rest/css/rest.css">
	<script src="/common/js/jquery-1.7.2.min.js"></script>
	<script src="/common/js/jquery.colorbox-min.js"></script>
	<script src="/common/js/set.colorbox.js"></script>
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-126023437-1"></script>
	<script src="/common/js/common.js"></script>
	<script src="/common/js/linkdata.js"></script>
	<script src="/common/js/photogallery.js"></script>

</head>
<body id="pagetop">
<div class="ly_wrap">

<?php
    include($_SERVER['DOCUMENT_ROOT'] . "/common/inc/header.html");
?>

<!-- ::: Top Visual ::: -->
	<div class="ly_topVisual">
		<!--<div class="bl_topImg">
			<img src="./images/detail01/top_detail01.jpg" alt="Condominium">
        </div>--><!-- /.bl_topImg -->
        <p class="siteTree2">
            <a href="/" class="it_navLink0">ホーム</a>
             ≫ <a href="<?php echo $this->hotelType_href ?>" class="it_navLink3"><?php echo $this->hotelTypeName ?></a>
             ≫ <a href="<?php echo $this->island_or_Area_href; ?>"><?php echo $this->island_or_Area_Name; ?></a>
             ≫ <?php echo $this->roomName; ?>
             
        </p>
	</div><!-- /.ly_topVisual -->
	<!-- ::: Top Visual ::: -->

	<!-- ::: Main ::: -->
	<div class="ly_main">
		<!-- ::: ▼ Contents Edit Area ▼ ::: -->
        <div class="detailtitle_bg">
            <h1 class="detailtitle"><?php echo $this->roomName ?></h1>
        </div>
        <section class="un_hotelInfoArea mainContent">
            <div class="bl_photoGallery">
                <div class="bl_photoCurrent_two">
                    <a href="<?php echo $this->img_src[0]; ?>" class="js_modalImg"><img src="<?php echo $this->img_src[0]; ?>" alt=""></a>
                </div>
                <div class="bl_photoThumb_two">
					<ul>
                        <li><a href="<?php echo $this->img_src[0]; ?>" class="js_modalImg"><img src="<?php echo $this->img_src[0]; ?>" alt=""></a></li>
                        <li><a href="<?php echo $this->img_src[1]; ?>" class="js_modalImg"><img src="<?php echo $this->img_src[1]; ?>" alt=""></a></li>
                        <li><a href="<?php echo $this->img_src[2]; ?>" class="js_modalImg"><img src="<?php echo $this->img_src[2]; ?>" alt=""></a></li>
                        <li><a href="<?php echo $this->img_src[3]; ?>" class="js_modalImg"><img src="<?php echo $this->img_src[3]; ?>" alt=""></a></li>
                        <li><a href="<?php echo $this->img_src[4]; ?>" class="js_modalImg"><img src="<?php echo $this->img_src[4]; ?>" alt=""></a></li>
                        <li><a href="<?php echo $this->img_src[5]; ?>" class="js_modalImg"><img src="<?php echo $this->img_src[5]; ?>" alt=""></a></li>
                        <li><a href="<?php echo $this->img_src[6]; ?>" class="js_modalImg"><img src="<?php echo $this->img_src[6]; ?>" alt=""></a></li>
                        <li><a href="<?php echo $this->img_src[7]; ?>" class="js_modalImg"><img src="<?php echo $this->img_src[7]; ?>" alt=""></a></li>
                        <li><a href="<?php echo $this->img_src[8]; ?>" class="js_modalImg"><img src="<?php echo $this->img_src[8]; ?>" alt=""></a></li>
                    </ul>
				</div><!-- /.bl_photoThumb -->
            </div><!-- /.bl_photoGallery -->
            <div class="bl_columnThird_two">
					<p><?php echo nl2br($this->text); ?></p>
            </div><!-- /.bl_columnThird_two -->
            <div class="bl_columnUnitArea relative">
                <div class="bl_columnHalf">
                    <dl class="roomspec">
                        <dt>部屋</dt>
                        <dd><?php echo $this->roomType; ?></dd>
                        <dt style="margin-top: 2vw;">宿泊人数</dt>
                        <dd><?php echo $this->guestsNum; ?></dd>
                    </dl>
                </div>
                <div class="bl_columnHalf">
                    <p class="roomprice"><?php echo $this->nightsNumMinimum; ?>／1泊<span> <?php echo $this->oneNightCharge; ?></span></p>
                </div>
            </div>
            <div class="un_hotelPrice">
				<dl>
                    <dt>★料金について</dt>
                    <dd>
<?php
if ("" !== $this->about_fee_text) {
    echo nl2br($this->about_fee_text);
}
else {
?>
                        人数に関わらず1室あたりの料金です。<br>
                        別途14.962％（州税4.712%＋宿泊税10.25%）の税金とクリーニング費用を頂戴いたします。<br>
                        税金が改定される場合もございますので、予めご了承ください。<br>
                        お問い合わせの際に、空室状況、宿泊料金、取消料等の条件をご案内させて頂きます。
<?php
}
?>
                    </dd>
				</dl>
                <div class="bl_linkBtn_brown">
					<a href="/contact/" class="it_navPath17">お問い合わせはコチラ</a>
				</div><!-- /.bl_linkBtn_brown -->
			</div>
        </section>

		<!-- ::: ▲ Contents Edit Area ▲ ::: -->
	</div><!-- /.ly_main -->
	<!-- ::: /Main ::: -->

<?php
    include($_SERVER['DOCUMENT_ROOT'] . "/common/inc/footer.html");
?>

</div><!-- /.ly_wrap -->
</body>
</html>
