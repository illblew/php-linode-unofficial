<?php

namespace Linode\Account;

use Linode\Common\Curl;
use Linode\Auth\Core;

class Profile extends Core
{
	//Get a user profile

	function getProfile($id = null) {
        $curl = new Curl();
        $header = $this->getHeader(True);
        $fullUrl = $this->getApiUrl . '/account//profile';
        $profile = $curl->curlGet($fullUrl,$header);
        return $profile;
	}
}



?>
