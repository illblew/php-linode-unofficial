<?php

namespace Linode\Instances;

use Linode\Common\Curl;

class Instances
{

    function getLinodes($token) {
        $curl = new Curl();
        $endpoint = 'https://api.alpha.linode.com/v4/linode/instances';
        $instances = $curl->curlGet($endpoint,$token);
        return $instances;
    }

}
?>