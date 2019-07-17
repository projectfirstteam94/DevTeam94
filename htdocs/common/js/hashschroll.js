// ページ内リンク（別ページ）

window.addEventListener('load', function() {
    id    = location.hash;

    // 速度を直接指定するとEdgeとIEで動作しなかった（リロードすると動作する）
    // 移動距離による負荷を算出して速度を設定する
    // speed = 0;       // 速度は直接指定しない
    var rate = 15;      //倍率
    var minspeed = 0;   //最低速度
    
    headerHight = jQuery( '#head' ).height(); // 固定ヘッダーの高さ
    space = 8; // 余白
    if ( '' != id ) {

        pos = jQuery( id ).offset().top - headerHight - space;
        
        // 速度を算出して設定する
        // jQuery( 'html,body' ).animate({ scrollTop: pos }, speed, 'swing' );
        var speed2 = Math.abs($(window).scrollTop() - $(id).offset().top) / rate + minspeed;
        jQuery( 'html,body' ).animate({ scrollTop: pos }, speed2, 'swing' );
    }
 });
