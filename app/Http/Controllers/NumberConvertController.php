<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NumberConvertController extends Controller
{
    static function bd_nice_number($n) {
        // first strip any formatting;
        $n = (0+str_replace(",","",$n));

        // is this a number?
        if(!is_numeric($n)) return false;

        // now filter it;
        if($n>1000000000000) return round(($n/1000000000000),1).' ТРЛ';
        else if($n>1000000000) return round(($n/1000000000),1).' МИЛ';
        else if($n>1000000) return round(($n/1000000),1).' М';
        else if($n>1000) return round(($n/1000),1).' К';

        return number_format($n);
    }
}
