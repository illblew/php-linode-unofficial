<?php

namespace Linode\Common;

use Linode\Common\Curl;

class Datacenters
{

    public function getDatacenters($token,$apiUrl) {
        $curl = new Curl();
        $fullUrl = $apiUrl . 'datacenters';
        $kernels = $curl->curlGet($fullUrl,$token);
        return $datacenters;
    }

}
?>