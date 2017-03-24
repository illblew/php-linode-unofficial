<?php

namespace Linode\Account;

use Linode\Common\Curl;

class Profile extends Core
{
	//Get a list of al available distributions

	function getProfile($id = null) {
        $curl = new Curl();
        $apiUrl = $this->getApiUrl();
        $token = $this->getTokenAuth();
        $path = 'account/profile'
        $fullUrl = $apiUrl . $path;
        $profile = $curl->curlGet($fullUrl,$token);
        return $profile;
	}
}



?>