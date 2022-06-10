<?php
include_once('./test.php');
//date_default_timezone_set('Asia/Seoul');

echo "test start!";



while(false) {
    $timestamp = strtotime("Now");
    echo "시각: ".date("Y-m-d H:i:s", $timestamp)."<br/>";

    echo "시각: ".date("H:i:s", $timestamp)."<br/>";
    echo "시각: ".date("H", $timestamp)."<br/>";
}
?>