<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use OutlineApiClient\OutlineApiClient;
use OutlineApiClient\OutlineKey;

class VPNca extends Controller
{

    public static $apiUrl = 'https://168.138.70.14:11493/AfHcGvKFa8PY1RduJ1by4Q';

    static public function createKey()
    {
        try {

            $api = new OutlineApiClient(self::$apiUrl);

            return $api->create();

        } catch (\Exception $e){

        }
    }
}
