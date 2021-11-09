<?php

namespace Classes;

include_once '../Classes/jeepney.php';

use Classes\Jeepney;

class Helpers
{
    public static function getAcceptableJeepneys($datas)
    {
        $acceptable = [];
        foreach ($datas as $data){
            if(Jeepney::key_in_jeepneys($data)){
                array_push($acceptable, $data);
            }
        }
        return $acceptable;
    }

    public static function getInvalidJeepneys($datas)
    {
        $invalid = [];
        foreach ($datas as $data){
            if(!Jeepney::key_in_jeepneys($data)){
                array_push($invalid, $data);
            }
        }
        return $invalid;
    }

    public static function getJeepneyWithRoute($datas)
    {
        $jeepneys = [];
        foreach($datas as $data){
            if(Jeepney::key_in_jeepneys($data)){
                array_push($jeepneys, ['jeepney' => $data, 'routes' =>  Jeepney::get_jeepney_value($data)]);
            }
        }
        return $jeepneys;
    }

    public static function mergeValues($values)
    {
        $newValue = [];
        for($x = 0; $x < count($values); $x++)
        {
            $newValue = array_merge($newValue, Jeepney::get_jeepney_value($values[$x]));
        }
        return $newValue;
    }

    public static function getDuplicates($values)
    {
        $duplicates = [];
        foreach(Jeepney::getDestinations() as $destination){
            $countD = 0;
            for($x = 0 ; $x < count($values); $x++){
                if($destination == $values[$x]){
                    $countD++;
                }
            }
            if($countD > 0){
                array_push($duplicates, ['destination' => $destination, 'count' => $countD]);
            }
        }
        return $duplicates;
    }
}