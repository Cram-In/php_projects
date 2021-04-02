<?php

// -------- PHP STORE HOURS ---------
// ---------- Version 1.3 -----------
// -------- BY CORY ETZKORN ---------
// -------- coryetzkorn.com ---------


// -------- EDIT FOLLOWING SECTION ONLY ---------

// Set your timezone (codes listed at http://php.net/manual/en/timezones.php)
// Delete the following line if you've already defined a timezone elsewhere.
date_default_timezone_set('Europe/Warsaw');

// Define daily open hours
// Must be in 24-hour format, separated by dash 
// If closed for the day, set to 00:00-00:00
// Midnight is represented by 00:00
// If open multiple times in one day, enter time ranges separated by a comma
// If open late (ie. 6pm - 1am), add hours after midnight to the next day (ie. 00:00-1:00)

$time_range = array(
    'mon' => array('00:00-00:00'),
    'tue' => array('13:00-21:00'),
    'wed' => array('13:00-21:00'),
    'thu' => array('13:00-21:00'),
    'fri' => array('16:00-23:00'),
    'sat' => array('16:00-23:00'),
    'sun' => array('00:00-00:00')
);

// Place HTML for output here. Image paths or plain text (H1, H2, p) are all acceptable.
$open_output = '<img src="static/img/open.png" alt="Come in, we\'re open!" / width="150" height="100">';
$closed_output = '<img src="static/img/closed.png" alt="Sorry, we\'re closed!" / width="150" height="100">';

// OPTIONAL: Output current day's open hours 
$echo_daily_hours = true; // Switch to FALSE to hide numerical display of current hours
$time_output = 'H:i:s'; // Enter custom time output format (options listed here: http://php.net/manual/en/function.date.php)
$time_separator = ' to '; // Choose how to indicate range (i.e XX - XX, XX to XX, XX until XX)
$closed_text_output = "<strong class='closed'>Closed</strong>"; // This will show if $echo_daily_hours is set to true and the current day's time range is set to 00:00-00:00

// -------- END EDITING -------- 

// Gets current day of week
$status_today = strtolower(date("D"));
// Gets current time of day in 00:00 format
$current_time = date("G:i");
// Makes current time of day computer-readable
$current_time_x = strtotime($current_time);

// Builds an array, assigning user-defined time ranges to each day of week
$all_days = array("mon" => $time_range['mon'], "tue" => $time_range['tue'], "wed" => $time_range['wed'], "thu" => $time_range['thu'], "fri" => $time_range['fri'], "sat" => $time_range['sat'], "sun" => $time_range['sun']);
foreach ($all_days as &$each_day) {
    foreach ($each_day as &$each_interval) {
        // count($each_day)
        $each_interval = explode("-", $each_interval);
        $each_interval[0] = strtotime($each_interval[0]);
        $each_interval[1] = strtotime($each_interval[1]);
    }
}

// Defines array of possible days of week
$week_days = array("mon", "tue", "wed", "thu", "fri", "sat", "sun");

// Compares current day of week to possible days of week and determines open vs closed output based on current day and time.
foreach ($week_days as &$each_week_day) {
    if ($status_today == $each_week_day) {
        echo '<div class="open-closed-sign">';
        $output_status = false;
        foreach ($all_days[$each_week_day] as $each_interval) {
            if (($each_interval[0] <= $current_time_x) && ($each_interval[1] >= $current_time_x) && !$output_status) {
                echo $open_output;
                $output_status = true;
            }
        }
        if (!$output_status) {
            echo $closed_output;
        }
        if ($echo_daily_hours) {
            echo '<br /><span class="time_output">';
            if ((date("g", $all_days[$each_week_day][0][0]) == "12") && (date("g", $all_days[$each_week_day][0][1]) == "12")) {
                echo $closed_text_output;
            } else {
                $interval_count = 0;
                foreach ($all_days[$each_week_day] as $each_interval) {
                    echo date($time_output, $each_interval[0]) . $time_separator . date($time_output, $each_interval[1]);
                    echo '<br />';
                }
            }
            echo '</span>';
        }
        echo '</div>';
    }
}
