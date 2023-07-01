<?php
declare(strict_types=1);
require_once "connection.php";

function photo_renamer(array $file, string $operation, string $name_prefix="img") : array {

    if (!$file) return [];
    
    $filename = trim($file['name']);
    $tmp_name = $file['tmp_name'];

    switch (strtoupper($operation)) {
        case "PROFILE_PHOTO" :
            $new_filename = $filename ? $name_prefix . time() . "." .
            pathinfo($filename, PATHINFO_EXTENSION)  : 'user.jpg';
            break;
        case "PHOTO_UPLOAD":
            $new_filename = $filename ? $name_prefix . time() . "." .
            pathinfo($filename, PATHINFO_EXTENSION)  : '';
            break;

    }

    return [$new_filename, $tmp_name];
}


date_default_timezone_set('Asia/Calcutta');
function time_ago(string $time) : ?string {
    $tense ='ago';
    static $periods = array('year', 'month', 'day', 'hour', 'minute', 'second');
    if(!(strtotime($time)>0)){
        return null;
    }
    $now = new DateTime('now');
    $time = new DateTime($time);
    $diff = $now->diff($time)->format('%y %m %d %h %i %s');
    $diff = explode(' ', $diff);
    $diff = array_combine($periods, $diff);
    $diff = array_filter($diff);

    $period = key($diff);
    
    $value = current($diff);
    if(!$value){
        $period = '';
        $tense = '';
        $value = 'just now';
    }
    else{
        if($period == 'day' and $value >= 7){
            $period = 'week';
            $value = floor($value/7);
        }
        if ($value > 1){
            $period .= 's';
        }
    }
    
    return "$value $period $tense";
}
