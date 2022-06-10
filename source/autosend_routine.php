<?php
include_once('./automail.php');

date_default_timezone_set('Asia/Seoul');

$o_c = ['08', '23'];
$time_set = ['10', '11', '14', '17', '20'];

echo "test start!\n";

$timestamp = strtotime("Now");
$current_hour = date("H", $timestamp);
automaticMailer("your@email", "your_password", "your_name");

echo "Program start time: ".date("Y-m-d H:i:s", $timestamp)."<br/>";
echo "current hour: ".date("H", $timestamp)."<br/>";

while(true) 
{
    $timestamp = strtotime("Now");
    $target_hour = date("H", $timestamp);

    if($current_hour != $target_hour) 
    {
        if($target_hour === $o_c[0]) 
        {
            automaticMailer("your@email", "your_password", "your_name", 1);
            $current_hour = date("H", $timestamp);

            echo "Send time: ".date("Y-m-d H:i:s", $timestamp)."<br/>";
            echo "Send morning mail\n";
        } 
        else if ($target_hour === $o_c[1]) 
        {
            automaticMailer("your@email", "your_password", "your_name", 3);
            $current_hour = date("H", $timestamp);

            echo "Send time: ".date("Y-m-d H:i:s", $timestamp)."<br/>";
            echo "Send remainder mail\n";
        } 
        else 
        {
            for($i = 0; $i < count($time_set); $i++) 
            {
                if($current_hour === $time_set[$i]) 
                {
                    automaticMailer("your@email", "your_password", "your_name", 2);
                    $current_hour = date("H", $timestamp);

                    echo "Send time: ".date("Y-m-d H:i:s", $timestamp)."<br/>";
                    echo "Send night mail\n";
                    break;
                }
            }
        }
    }

    sleep(600);
}

?>