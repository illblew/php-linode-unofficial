<?php

namespace Linode\Common;

use Linode\Common\Curl;

class Distributions extends Core
{
	//Get a list of al available distributions

	function getDistros($id = null) {
        $curl = new Curl();
        $apiUrl = $this->getApiUrl();
        $token = $this->getTokenAuth();
        if ($id != null) {
        	$path = 'distributions/' . $id;
        } else {
        	$path = 'distributions';
        }
        $fullUrl = $apiUrl . $path;
        $kernels = $curl->curlGet($fullUrl,$token);
        return $distributions;
	}
}



?>