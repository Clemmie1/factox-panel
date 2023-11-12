<?php

namespace App\Http\Controllers\VPN;

use App\Http\Controllers\Controller;
use App\Models\Vpn;
use Illuminate\Http\Request;
use OutlineApiClient\OutlineKey;

class DeleteVpn extends Controller
{
    static public function delete(string $vpnID)
    {

        $getVPN = Vpn::query()->where(['vpn_id' => $vpnID])->first();
        if ($getVPN['vpn_location'] == 'ca-toronto'){
            try {
                $serverUrl = 'https://168.138.70.14:11493/AfHcGvKFa8PY1RduJ1by4Q';
                $key = (new OutlineKey($serverUrl))->load($getVPN['vpn_access_id']);
                $key->delete();
                Vpn::query()->where(['vpn_id' => $vpnID])->delete();
                return true;
            } catch (\Exception $e) {
                return false;
            }
        }
    }
}
