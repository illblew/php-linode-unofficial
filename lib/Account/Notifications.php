<?php

namespace Linode\Account;

use Linode\Common\Curl;
use Linode\Auth\Core;

class Notifcations extends Core
{
    //Get notifications
    
    function getNotifications() {
        $curl = new Curl();
        $fullUrl = $this->getApiUrl() . '/account/notifications';
        $header = $this->getHeader(True);
        $notifications = $curl->curlGet($fullUrl,$header);
        return $notifications;
    }
}

?>
