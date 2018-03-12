<?php

namespace Linode\Account;

use Linode\Common\Curl;
use Linode\Auth\Core;

class Profile extends Core
{
	//Get a user profile

	function getProfile($id = null) {
        $curl = new Curl();
        $apiUrl = $this->getApiUrl();
        $token = $this->getTokenAuth();
        $path = '/profile';
        $fullUrl = $apiUrl . $path;
        $profile = $curl->curlGet($fullUrl,$token);
        return $profile;
	}
}



?>
