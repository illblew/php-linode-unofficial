<?php

namespace Linode\Common;

use Linode\Auth\Core;

class Regions extends Core
{

    //Get a list of all Linode datacenters.
    public function getRegions() {
        $curl = new Curl();
        $apiUrl = $this->getApiUrl();
        $fullUrl = $apiUrl . 'regions';
        $header = $this->getHeader();
        $regions = $curl->curlGet($fullUrl,$header);
        return $regions;
    }

}
?>
