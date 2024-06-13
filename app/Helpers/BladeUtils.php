<?php

class BladeUtils {

    static array $dates= [
        1 =>"janvāris",
        2=>"februāris",
        3=>"marts",
        4=>"aprīlis",
        5=>"maijs",
        6=>"jūnijs",
        7=>"jūlijs",
        8=>"augusts",
        9=>"septembris",
        10=>"oktobris",
        11=>"novembris",
        12=>"decembris"
    ];

    public static function formatDate($date, $short = false): string
    {
        $date = new DateTime($date);
        $month = $date->format('n');
        $day = $date->format('j');
        $year = $date->format('Y');

        $formattedMonth = self::$dates[$month];
        if ($short) {
            if ($formattedMonth == 'jūnijs' || $formattedMonth == 'jūlijs') {
                //cut off at 4 char
                $formattedMonth=substr($formattedMonth, 0, 4);
            }else{
                //cut off at 3 char
                $formattedMonth=substr($formattedMonth, 0, 3);
            }
            
        }
        // 2024. g. 19. maijs
        return "$year. g. $day. $formattedMonth";
    }
}
