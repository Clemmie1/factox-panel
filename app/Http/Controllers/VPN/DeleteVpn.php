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

        if ($getVPN['vpn_location'] == 'us-phoenix'){
            try {
                $serverUrl = 'https://129.146.187.221:6108/yitYlSo7lK4o_uU1fI_EuQ';
                $key = (new OutlineKey($serverUrl))->load($getVPN['vpn_access_id']);
                $key->delete();
                Vpn::query()->where(['vpn_id' => $vpnID])->delete();
                return true;
            } catch (\Exception $e) {
                return false;
            }
        }

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

        if ($getVPN['vpn_location'] == 'eu-marseille'){
            try {
                $serverUrl = 'https://129.151.247.148:47910/hN__E_jgelPGieBaTmcXdA';
                $key = (new OutlineKey($serverUrl))->load($getVPN['vpn_access_id']);
                $key->delete();
                Vpn::query()->where(['vpn_id' => $vpnID])->delete();
                return true;
            } catch (\Exception $e) {
                return false;
            }
        }

        if ($getVPN['vpn_location'] == 'ap-tokyo'){
            try {
                $serverUrl = 'https://138.2.13.51:12409/XsuK0eE6t_xLBoYSam5r3A';
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
