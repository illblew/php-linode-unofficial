<?php

namespace Linode\Common;

use Linode\Auth\Core;

class Datacenters extends Core
{

    //Get a list of all Linode datacenters.
    public function getDatacenters() {
        $curl = new Curl();
        $apiUrl = $this->getApiUrl();
        $token = $this->getTokenAuth();
        $fullUrl = $apiUrl . 'regions';
        $datacenters = $curl->curlGet($fullUrl,$token);
        return $datacenters;
    }

}
?>
