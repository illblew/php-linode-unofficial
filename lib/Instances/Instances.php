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
        $fullUrl = $apiUrl . 'linode/instances';
        $instances = $curl->curlGet($fullUrl,$this->getHeader(True));
        return $instances;
    }

    //Create a Linode Instance.
    public function createLinode($datacenter,$type,$label = null ,$group = null,$distro = null,$root_pass = null,$root_ssh_key = null,$stackscript = null,$stackscript_udf_responses = null,$backup = null,$with_backup = null) {
        $curl = new Curl();
        $apiUrl = $this->getApiUrl();
        $fullUrl = $apiUrl . 'linode/instances';
        $post = json_encode(array("region" => $datacenter, "type" => $type, "label" => $label, "group" => $group, "distro" => $distro, "root_pass" => $root_pass, "root_ssh_key" => $root_ssh_key, "stackscript" => $stackscript, "stackscript_udf_responses" => $stackscript_udf_responses, "backup" => $backup, "with_backups" => $with_backup));
        $instance = $curl->curlPost($fullUrl,$this->getHeader(True),$post);
        return $instance;

    }

    //Delete a Linode Instance.
    public function deleteLinode($id) {
        $curl = new Curl();
        $apiUrl = $this->getApiUrl();
        $fullUrl = $apiUrl . "linode/instances/".((int)$id);
        $instance = $curl->curlDelete($fullUrl,$this->getHeader(True));
        return $instance;
    }

    //Boot a Linode
    
    public function bootLinode($id,$config_id=null) {
        $curl = new Curl();
        $apiUrl = $this->getApiUrl();
        $arr = array("config_id" => $config_id);
        $fullUrl = $apiUrl . "linode/instance/" . $id . "/boot";
        $boot = $curl->curlPost($fullUrl,$arr,$this->getHeader(True));
        return $boot;
    }

}
?>
