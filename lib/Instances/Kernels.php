<?php

namespace Linode\Instances;

use Linode\Common\Curl;

class Kernels
{

    public function getKernels($token,$apiUrl) {
        $curl = new Curl();
        $fullUrl = $apiUrl . 'linode/kernels';
        $kernels = $curl->curlGet($fullUrl,$token);
        return $kernels;
    }

}
?>