<?php

namespace Linode\Instances;

use Linode\Common\Curl;

class Kernels extends Core
{

    //Get a list of all kernels offered by Linode.
    public function getKernels() {
        $curl = new Curl();
        $apiUrl = $this->getApiUrl();
        $token = $this->getTokenAuth();
        $fullUrl = $apiUrl . 'linode/kernels';
        $kernels = $curl->curlGet($fullUrl,$token);
        return $kernels;
    }

}
?>