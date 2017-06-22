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
        $arr = array("region" => $datacenter, "type" => $type, "label" => $label, "group" => $group, "distro" => $distro, "root_pass" => $root_pass, "root_ssh_key" => $root_ssh_key, "stackscript" => $stackscript, "stackscript_udf_responses" => $stackscript_udf_responses, "backup" => $backup, "with_backups" => $with_backup);
        $post = json_encode($arr);
        $header = array ('Content-Type: application/json', 'Authorization: token ' . $token);
        $instance = $curl->curlPost($fullUrl,$header,$post);
        return $instance;

    }

    //Delete a Linode Instance.
    public function deleteLinode($id) {
        $curl = new Curl();
        $apiUrl = $this->getApiUrl();
        $token = $this->getTokenAuth();
        $fullUrl = $apiUrl . "linode/instances/".((int)$id);
        $header = array ('Content-Type: application/json', 'Authorization: token ' . $token);
        $instance = $curl->curlDelete($fullUrl,$header);
        return $instance;
    }

}
?>
