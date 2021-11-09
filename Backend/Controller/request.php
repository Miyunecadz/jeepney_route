<?php

include_once "../Classes/Jeepney.php";
include_once "../Classes/Helpers.php";
include_once "../Classes/Response.php";

use Classes\Helpers;
use Classes\Response;

// decode incoming data
$datas = json_decode(file_get_contents('php://input'), true);

$acceptable = Helpers::getAcceptableJeepneys($datas);
$invalids = Helpers::getInvalidJeepneys($datas);
$merge_data = Helpers::mergeValues($acceptable);
$duplicates = Helpers::getDuplicates($merge_data);
$jeepneys = Helpers::getJeepneyWithRoute($acceptable);

$response = new Response();
$response->datas = $jeepneys;
$response->invalids = $invalids;
$response->duplicates = $duplicates;

echo json_encode($response);

