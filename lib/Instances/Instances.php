<?php

namespace Linode\Instances;

use Linode\Common\Curl;

class Instances
{

    public function getLinodes($token,$apiUrl) {
        $curl = new Curl();
        $fullUrl = $apiUrl . 'linode/instances';
        $instances = $curl->curlGet($fullUrl,$token);
        return $instances;
    }

}
?>