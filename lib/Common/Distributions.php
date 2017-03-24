<?php

namespace Linode\Common;

use Linode\Common\Curl;

class Distributions extends Core
{
	//Get a list of al available distributions

	function getDistros() {
        $curl = new Curl();
        $apiUrl = $this->getApiUrl();
        $token = $this->getTokenAuth();
        $fullUrl = $apiUrl . 'distributions';
        $kernels = $curl->curlGet($fullUrl,$token);
        return $distributions;
	}
}



?>