<?php

namespace Linode\Volumes;

use Linode\Common\Curl;
use Linode\Auth\Core;

class Volumes extends Core
{

    public function getVolumes($id = null) {
        $curl = new Curl();
        $apiUrl = $this->getApiUrl();
        $header = $this->getHeader(True);
        $fullUrl = $apiUrl . '/volumes/' . $id;
        $volumes = $curl->curlGet($fullUrl, $header);
        return $volumes;
    }

    public function postVolume($label,$region,$size,$linode_id = null,$config_id = null) {
        $curl = new Curl();
        $apiUrl = $this->getApiUrl();
        $header = $this->getHeader(True);
        $fullUrl = $apiUrl . 'volumes';
        $arr = array ('label' => $label, 'region' => $region, 'size' => $size, 'linode_id' => $linode_id, 'config_id' => $config_id);
        $post = json_encode($arr);
        $volume = $curl->curlPost($fullUrl,$header,$post);
        return $volume;
    }

    public function attachVolume($linode_id, $config_id) {

        $curl = new Curl();
        $apiUrl = $this->getApiUrl();
        $header = $this->getHeader(True);
        $fullUrl = $apiUrl . '/volumes/' . $volume_id . '/attach';
        $arr = array ('linode_id' => $linode_id);
        $post = json_encode($arr);
        $attach = $curl->curlPost($fullUrl,$header,$post);
        return $attach; 
    }

    public function detachVolume($volume_id) {
        $curl = new Curl();
        $apiUrl = $this->getApiUrl();
        $header = $this->getHeader(True);
        $fullUrl = $apiUrl . '/volumes/' . $volume_id . '/detach';
        $post = json_encode('');
        $detach = $curl->curlPost($fullUrl,$header,$post);
        return $detach;
    }

    public function cloneVolume ($volume_id) {
        $curl = new Curl();
        $apiUrl = $this->getApiUrl();
        $header = $this->getHeader(True);
        $fullUrl = $apiUrl . '/volumes/' . $volume_id . '/clone';
        $post = json_encode('');
        $clone = $curl->curlPost($fullUrl,$header,$post);
        return $clone;
    }

    public function resizeVolume($volume_id, $size) {
        $curl = new Curl();
        $apiUrl = $this->getApiUrl();
        $header = $this->getHeader(True);
        $fullUrl = $apiUrl . '/volumes/' . $volume_id . '/resize';
        $arr = array('size' => $size);
        $post = json_encode($arr);
        $resize = $curl->curlPost($fullUrl,$header,$post);
        return $resize;
    }

}
