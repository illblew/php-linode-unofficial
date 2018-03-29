<?php

namespace Linode\Volumes;

use Linode\Common\Curl;
use Linode\Auth\Core;

class Volumes extends Core
{

    public function getVolumes($id = null) {
        $curl = new Curl();
        $apUrl = $this->getApiUrl();
        $header = $this->getHeader(True);
        $fullUrl = $apiUrl . '/volumes/' . $id;
        $volumes = $curl->curlGet($fullUrl, $header);
    }

    public function postVolume($label,$region,$size,$linode_id = null,$config_id = null) {
        $curl = new Curl();
        $apiUrl = $this->getApiUrl();
        $header = $this->getHeader(True);
        $fullUrl = $apiUrl . 'volumes';
        $arr = array ('label' => $label, 'region' => $region, 'size' => $size, 'linode_id' => $linode_id, 'config_id' => $config_id);
        $post = json_encode($arr);
        $volume = $curl->curlPost($fullUrl,$header,$post);
    }
}
