<?php

namespace Classes;

class Response
{
    public $datas;
    public $invalids;
    public $duplicates;

    function __constructor($datas = '', $invalids = '', $duplicates = '')
    {
        self::$datas = $datas;
        self::$invalids = $invalids;
        self::$duplicates = $duplicates;
    }

    public static function create(array $values)
    {
        self::$datas = $values['datas'];
        self::$invalids = $values['invalids'];
        self::$duplicates = $values['duplicates'];
    }
}