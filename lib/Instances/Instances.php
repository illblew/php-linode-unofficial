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
    public function createLinode($datacenter,$type,$label = null ,$group = null,$distro = null,$root_pass = null,$root_ssh_key = null,$stackscript = null,$stackscript_udf_responses = null,$backup = null,$with_backup = null) {
        $curl = new Curl();
        $apiUrl = $this->getApiUrl();
        $token = $this->getTokenAuth();
        $fullUrl = $apiUrl . 'linode/instances';
        $arr = array("datacenter" => $datacenter, "type" => $type);
        $post = json_encode($arr);
        $header = array ('Content-Type: application/json', 'Authorization: token ' . $token);
        $instance = $curl->curlPost($fullUrl,$header,$post);
        return $instance;

    }

}
?>