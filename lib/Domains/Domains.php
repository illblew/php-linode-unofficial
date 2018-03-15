<?php

namespace Linode\Domains;

use Linode\Common\Curl;
use Linode\Auth\Core;

class Domains extends Core
{
    //Get a list of your domains.
    public function getDomains($domain_id = null) {
        $curl = new Curl();
        $apiUrl = $this->getApiUrl();
        $header = $this->getHeader(True);
        $fullUrl = $apiUrl . 'domains' . $domain_id;
        $domains = $curl->curlGet($fullUrl,$header);
        return $domains;
    }


}

?>
