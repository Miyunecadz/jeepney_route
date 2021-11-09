<?php

namespace Classes;

class Jeepney
{
    private static $jeepneys = [
        '01A' => ['Alpha','Bravo','Charlie','Echo','Golf'],
        '02B' => ['Bravo', 'Charlie','Delta','Foxtrot','Golf',],
        '03C' => ['Charlie','Delta','Foxtrot','Hotel','India',],
        '04A' => ['Charlie','Delta','Echo','Foxtrot','Golf',],
        '04D' => ['Charlie','Echo','Foxtrot','Golf','India'],
        '06B' => ['Delta', 'Hotel', 'Juliet', 'Kilo', 'Lima'],
        '06D' => ['Delta', 'Foxtrot', 'Golf', 'India', 'Kilo'],
        '10C' => ['Foxtrot', 'Golf', 'Hotel','India','Juliet'],
        '10H' => ['Foxtrot', 'Hotel', 'Juliet', 'Lima', 'November'],
        '11A' => ['Foxtrot', 'Golf', 'Kilo', 'Mike', 'November'],
        '11B' => ['Foxtrot', 'Golf', 'Lima', 'Oscar', 'Papa'],
        '20A' => ['India', 'Juliet', 'November', 'Oscar', 'Romeo'],
        '20C' => ['India', 'Kilo', 'Lima', 'Mike', 'Romeo'],
        '42C' => ['Juliet', 'Kilo', 'Lima', 'Mike', 'Oscar'],
        '42D' => ['Juliet', 'November', 'Oscar', 'Quebec', 'Romeo']
    ];

    public static function key_in_jeepneys($value)
    {
        return array_key_exists($value, self::$jeepneys);
    }

    public static function get_jeepney_value($value)
    {
        return self::$jeepneys[$value];
    }

}
