<?php

namespace Linode\Images;

use Linode\Common\Curl;
use Linode\Auth\Core;

class Images extends Core 
{

    public function getImages() {
        $curl = new Curl();
        $fullUrl = $this->getApiUrl() . 'images/';
        $images = $curl->curlGet($fullUrl,$this->getHeader(True));
        return $images;
    }

    public function createImage($disk_id = null, $label = null, $description = null) {
        $curl = new Curl();
        $fullUrl = $this->getApiUrl() . 'images/';
        $post = json_encode(array('disk_id' => $disk_id, 'label' => $label, 'description' => $description));
        $image = $curl->curlPost($fullUrl,$this->getHeader(True),$post);
        return $image;
    }

    public function viewImage($image_id) {
        $curl = new Curl();
        $fullUrl = $this->getApiUrl() . 'images/' . $image_id;
        $image = $curl->curlGet($fullUrl,$this->getHeader(True));
        return $image;
    } 

    public function updateImage($image_id, $label = null, $description = null) {
        $curl = new Curl();
        $fullUrl = $this->getApiUrl(). 'images/' . $image_id;
        $put = json_encode(array('imageId' => $image_id, 'label' => $label, 'description' => $description));
        $image = $curl->curlPut($fullUrl,$this->getHeader(True),$put);
        return $image;
    }

    public function deleteImage($image_id) {
        $curl = new Curl();
        $fullUrl = $this->getApiUrl() . 'images/' . $image_id;
        $image = $curl->curlDelete($fullUrl,$this->getHeaders(True));
        return $image;
    }
}

?>
