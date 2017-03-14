<?php

namespace Linode\Common;

use Linode\Common\Curl;

class Datacenters extends Core
{

    //Get a list of all Linode datacenters.
    public function getDatacenters() {
        $curl = new Curl();
        $apiUrl = $this->getApiUrl();
        $token = $this->getTokenAuth();
        $fullUrl = $apiUrl . 'datacenters';
        $kernels = $curl->curlGet($fullUrl,$token);
        return $datacenters;
    }

}
?>