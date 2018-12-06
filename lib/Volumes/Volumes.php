<?php

namespace Linode\Volumes;

use Linode\Common\Curl;
use Linode\Auth\Core;

class Volumes extends Core
{

    public function getVolumes($id = null) {
        $curl = new Curl();
        $fullUrl = $this->getApiUrl(True) . '/volumes/' . $id;
        $volumes = $curl->curlGet($fullUrl, $this->getHeader(True));
        return $volumes;
    }

    public function postVolume($label,$region,$size,$linode_id = null,$config_id = null) {
        $curl = new Curl();
        $fullUrl = $this->getApiUrl() . 'volumes';
        $post = json_encode(array ('label' => $label, 'region' => $region, 'size' => $size, 'linode_id' => $linode_id, 'config_id' => $config_id));
        $volume = $curl->curlPost($fullUrl,$this->getHeader(True),$post);
        return $volume;
    }

    public function attachVolume($linode_id, $config_id) {
        $curl = new Curl();
        $fullUrl = $this->getApiUrl() . '/volumes/' . $volume_id . '/attach';
        $post = json_encode(array ('linode_id' => $linode_id));
        $attach = $curl->curlPost($fullUrl,$this->getHeader(True),$post);
        return $attach; 
    }

    public function detachVolume($volume_id) {
        $curl = new Curl();
        $fullUrl = $this->getApiUrl() . '/volumes/' . $volume_id . '/detach';
        $post = json_encode('');
        $detach = $curl->curlPost($fullUrl,$this->getHeader(True),$post);
        return $detach;
    }

    public function cloneVolume ($volume_id) {
        $curl = new Curl();
        $fullUrl = $this->getApiUrl() . '/volumes/' . $volume_id . '/clone';
        $post = json_encode('');
        $clone = $curl->curlPost($fullUrl,$this->getHeader(True),$post);
        return $clone;
    }

    public function resizeVolume($volume_id, $size) {
        $curl = new Curl();
        $fullUrl = $this->getApiUrl() . '/volumes/' . $volume_id . '/resize';
        $post = json_encode(array('size' => $size));
        $resize = $curl->curlPost($fullUrl,$this->getHeader(True),$post);
        return $resize;
    }

}
