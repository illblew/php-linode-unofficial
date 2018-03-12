<?php

namespace Linode\Common;

use Linode\Auth\Core;

class Regionss extends Core
{

    //Get a list of all Linode datacenters.
    public function getRegions() {
        $curl = new Curl();
        $apiUrl = $this->getApiUrl();
        $token = $this->getTokenAuth();
        $fullUrl = $apiUrl . 'regions';
        $datacenters = $curl->curlGet($fullUrl,$token);
        return $datacenters;
    }

}
?>
