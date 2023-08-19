<?php
function moveMarchDate($date)
{
    $time = strtotime($date);
    $month = date("F", $time);
    $hour = date("Y", $time);

    if ($month == 'March' && $hour == 2) {
    }
}
