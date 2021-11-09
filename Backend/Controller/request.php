<?php

include_once "../Classes/Jeepney.php";

use Classes\Jeepney;

$datas = json_decode(file_get_contents('php://input'), true);

$invalids = [];
$acceptable = [];

foreach ($datas as $data){
    if(!Jeepney::key_in_jeepneys($data)){
        array_push($invalids, $data);
    }else{
        array_push($acceptable, $data);
    }
}

$valuedData = [];
foreach($acceptable as $data){
    array_push($valuedData, [$data => Jeepney::get_jeepney_value($data)]);
}

echo json_encode(['data'=>$valuedData, 'invalids' => $invalids]);
