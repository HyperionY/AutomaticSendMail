<?php
// refer to automail.php for send mail function.
include_once('./automail.php');

// set the timezone
// if you want to use other timezone, change 'Asia/Seoul'.
date_default_timezone_set('Asia/Seoul');

$o_c = ['08', '23'];    // get up time and go to sleep time
//time to send mail for remainder.
// if you want to change send mail time, edit time_set array.
$time_set = ['10', '11', '14', '17', '20'];

echo "test start!\n";

// get program start time
$timestamp = strtotime("Now");
$current_hour = date("H", $timestamp);

// send mail when start program
automaticMailer("yourAddress@email.com", "your_password", "your_username"); 

echo "Program start time: ".date("Y-m-d H:i:s", $timestamp)."<br/>";
echo "current hour: ".date("H", $timestamp)."<br/>";

while(true) 
{
    $timestamp = strtotime("Now");     // get time for compare time
    $target_hour = date("H", $timestamp);

    if($current_hour != $target_hour) 
    {
        if($target_hour === $o_c[0]) 
        {
            automaticMailer("yourAddress@email.com", "your_password", "your_username", 1);   // send mail when get up
            $current_hour = date("H", $timestamp);  //reset the current time

            echo "Send time: ".date("Y-m-d H:i:s", $timestamp)."<br/>";
            echo "Send morning mail\n";
        } 
        else if ($target_hour === $o_c[1]) 
        {
            automaticMailer("yourAddress@email.com", "your_password", "your_username", 3);   // send mail when get to sleep
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
                    automaticMailer("yourAddress@email.com", "your_password", "your_username", 2);   // send mail during work for reminder
                    $current_hour = date("H", $timestamp);

                    echo "Send time: ".date("Y-m-d H:i:s", $timestamp)."<br/>";
                    echo "Send night mail\n";
                    break;
                }
            }
        }
    }

    sleep(600); //delay 10min
}

?>