<?php

namespace Linode\Account;

use Linode\Common\Curl;
use Linode\Auth\Core;

class Profile extends Core
{
	//Get a user profile

	function getProfile($id = null) {
        $curl = new Curl();
        $fullUrl = $this->getApiUrl . '/account/profile';
        $profile = $curl->curlGet($fullUrl,$this->getHeader(True));
        return $profile;
    }

    function updateProfile($email,$timezone,$email_notifications,$lish_auth_method,$authorized_keys,$two_factor_auth,$restricted) {
        $curl = new Curl();
        $fullUrl = $this->getApiUrl . '/account/profile';
        $put = json_encode('email' = $email, 'timezone' => $timezone, 'email_notifications' => $email_notifications, 'lish_auth_method' => $lish_auth_method, 'authorized_keys' =? $authorized_keys, 'two_factor_aith' => $two_factor_auth, 'restricted' => $restricted)
        $update_profile = $curl->curlPut($fullUrl,$this->getHeader(True),$put);    
    }
}



?>
