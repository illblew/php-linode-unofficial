<?php

namespace Linode\Instances;

use Linode\Common\Curl;
use Linode\Auth\Core;

class Instances extends Core
{

    //Get a list of your Linode Instances.
    public function getLinodes() {
        $curl = new Curl();
        $apiUrl = $this->getApiUrl();
        $token = $this->getTokenAuth();
        $fullUrl = $apiUrl . 'linode/instances';
        $instances = $curl->curlGet($fullUrl,$token);

        return $instances;
    }

    //Create a Linode Instance.
    public function createLinode($datacenter,$type,$label,$group,$distro,$root_pass,$root_ssh_key,$stackscript,$stackscript_udf_responses,$backup,$with_backup) {
        $apiUrl = $this->getApiUrl();
        $token = $this->getTokenAuth();
        $header = array ();

    }

}
?>