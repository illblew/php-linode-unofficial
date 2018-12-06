<?php

namespace Linode\Longview;

use Linode\Common\Curl;
use Linode\Auth\Core;

class Longview extends Core
{
    public function getLongviewClients() {
        $curl = new Curl();
        $fullUrl = $this->getApiUrl() . '/longview/clients';
        $clients = $curl->curlGet($fullUrl, $this->getHeader(True));
        return $clients;
    }

    public function createLongviewClient($label = null) {
        $curl = new Curl();
        $fullUrl = $this->getApiUrl() . '/longview/clients';
        $post = json_encode(array('label' => $label));
        $client = $curl->curlPost($fillUrl, $this->getHeader(True),$post);
    }
}
