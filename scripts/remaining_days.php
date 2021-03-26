<?php
function remaining_days ($event_timestamp){

    $timestamp = time();

    $remaining_days = floor(($event_timestamp - $timestamp) / (24*60*60));

    return ($remaining_days);
}
?>