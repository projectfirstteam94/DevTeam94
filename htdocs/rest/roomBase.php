<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/lib/RoomClass.php";
use hawaii_room\Room;

$debug = "";
if (isset($_GET["debug"])) {
    $debug = $_GET["debug"];
}

$key = "";
if (isset($_GET["type"])) {
    $key = $_GET["type"];
}

// $hotelType は上位のroop.phpで設定済
if ($roomBase_hotelType === 1) {
    $roomArry = Room::getArry($_SERVER['DOCUMENT_ROOT'] . "/room_csv/roomList_C.csv", $roomBase_hotelType, $debug);
}
else {
    $roomArry = Room::getArry($_SERVER['DOCUMENT_ROOT'] . "/room_csv/roomList_T.csv", $roomBase_hotelType, $debug);
}

$room = null;
foreach ($roomArry as $value) {
    if ($key === $value->key) {
        $room = $value;
        $room->printRoom($debug);
        break;
    }
}
?>