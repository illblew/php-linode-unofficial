<?php

namespace Linode\NodeBalancers;

use Linode\Common\Curl;
use Linode\Auth\Core;

class NodeBalancers extends Core
{
    public function getNodeBalancers($nb_id) {
        $curl = new Curl();
        $apiUrl = $this->getApiUrl();
        $header = $this->getHeader(True);
        $fullUrl = $apiUrl . 'nodebalancers/' . $nb_id;
        $nodebalancers = $curl->curlGet($fullUrl,$header);
        return $nodebalancers;
    }
}

?>
