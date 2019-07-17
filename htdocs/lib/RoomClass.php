<?php
namespace hawaii_room;

use \SplFileObject;

class Room
{
    // 部屋管理Code
    public $key = "";
    // ホテルタイプ（1：コンドミニアム、2：邸宅／高級貸別荘）
    public $hotelType = 1;
    // ホテルタイプ名（コンドミニアム、邸宅／高級貸別荘）
    public $hotelTypeName = "";
    // 島（oaf：オアフ、maui：マウイ島、hawaii：ハワイ島、kauai：カウアイ島）
    public $islandCode = "";
    public $islandName = "";
    // オアフ地区（ranikai：ラニカイ地区、kairua：カイルア地区、kahara：カハラ地区、hawaiikai：ハワイカイ地区、noth：ノースショア地区）
    public $areaCode = "";
    public $areaName = "";
    // ホテルタイプ・島・地区ごとのインデックス
    public $roomIndex = "";
    // 部屋名
    public $roomNameCode = "";
    public $roomName = "";
    // 部屋タイプ
    public $roomType = "";
    // 宿泊人数
    public $guestsNum = "";
    // 最低宿泊数
    public $nightsNumMinimum = "";
    // １泊料金
    public $oneNightCharge = "";
    // 紹介文
    public $text = "";
    // 料金について
    public $about_fee_text = "";
    // ディスクリプション
    public $description = "";
    // キーワード
    public $keywords = "";

    // 写真９枚
    public $img_src = array();

    // パンくずリスト用
    public $hotelType_href = "";
    public $island_or_Area_href = "";
    public $island_or_Area_Name = "";

    // 部屋ページ
    public $room_href = "";

    public function __construct($key, $islandCode, $islandName, $areaCode, $areaName, $roomIndex, $roomNameCode, $roomName, $roomType, $guestsNum, $nightsNumMinimum, $oneNightCharge, $text, $about_fee_text, $description, $keywords)
    {
        $this->key = $key;
        $this->islandCode = $islandCode;
        $this->islandName = $islandName;
        $this->areaCode = $areaCode;
        $this->areaName = $areaName;
        $this->roomIndex = $roomIndex;
        $this->roomNameCode = $roomNameCode;
        $this->roomName = $roomName;
        $this->roomType = $roomType;
        $this->guestsNum = $guestsNum;
        $this->nightsNumMinimum = $nightsNumMinimum;
        $this->oneNightCharge = $oneNightCharge;
        $this->text = $text;
        $this->about_fee_text = $about_fee_text;
        $this->description = $description;
        $this->keywords = $keywords;
    }

    /**
     * 指定なしのファイル読込み
     * $hotelType : 1：コンドミニアム、2：邸宅
     */
    public static function getArry($filepath, $hotelType, $debug)
    {
        $roomArry = array();
    
        if (!file_exists($filepath))
        {
            return $roomArry;
        }
    
        // ファイルが存在している場合に読み込む
        setlocale(LC_ALL, 'ja_JP.UTF-8');
        $rows = Room::read($filepath);
        if ($debug !== "") {
            echo "<br><br><br><br>";
            \var_dump($rows);
        }

        for ($i = 0; $i < count($rows); $i++) {
            $column = array();
            $column = $rows[$i];

            if (count($column) < 14) {

                if ($debug !== "") {
                    echo "<br>--------------------------------<br>";
                }
                continue;
            }
            $room = new Room(
                $column[0],
                $column[1],
                $column[2],
                $column[3],
                $column[4],
                $column[5],
                $column[6],
                $column[7],
                $column[8],
                $column[9],
                $column[10],
                $column[11],
                $column[12],
                $column[13],
                $column[14],
                $column[15]
            );

            if (1 === $hotelType) {
                $room->initCondominium();
            }
            else {
                $room->initTeitaku();
            }

            $roomArry[] = $room;
        }
        return $roomArry;
    }


    public function initCondominium() {
        $this->hotelType = 1;
        $this->hotelTypeName = "コンドミニアム";
        $this->island_or_Area_Name = $this->islandName;
        $this->hotelType_href = "/rest/condominium/";
        $this->island_or_Area_href = $this->hotelType_href . $this->islandCode . "/";
        $this->room_href = $this->hotelType_href . "room.php?type=" . $this->key;

        for ($i = 0; $i < 9; $i++) {
            $this->img_src[] = $this->island_or_Area_href . "images/" . $this->roomNameCode . "/" . $this->roomNameCode . "_" . sprintf('%02d', $i + 1) . ".jpg";
        }
    }

    public function initTeitaku() {
        $this->hotelType = 2;
        $this->hotelTypeName = "邸宅／高級貸別荘";
        $this->hotelType_href = "/rest/teitaku/";
        if ($this->areaCode === "") {
            $this->island_or_Area_Name = $this->islandName;
            $this->island_or_Area_href = $this->hotelType_href . $this->islandCode . "/";
        }
        else {
            $this->island_or_Area_Name = $this->areaName;
            $this->island_or_Area_href = $this->hotelType_href . $this->areaCode . "/";
        }
        $this->room_href = $this->hotelType_href . "room.php?type=" . $this->key;

        for ($i = 0; $i < 9; $i++) {
            $this->img_src[] = $this->island_or_Area_href . "images/" . $this->roomNameCode . "/" . $this->roomNameCode . "_" . sprintf('%02d', $i + 1) . ".jpg";
        }
    }

    public static function read($filepath) {

        $file = new \SplFileObject($filepath);
        $file->setFlags(\SplFileObject::READ_CSV);

        $rows = array();
        foreach ($file as $line) {
            if (!empty($line)) {
                $rows[] = $line;
            }
        }

        return $rows;
    }
    
    function printRoom($debug) {
        include_once('../roomBase_.php');
    }
}
