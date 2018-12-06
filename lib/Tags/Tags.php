<?php

namespace Linode\Tags;

use Linode\Common\Curl;
use Linode\Auth\Core;

class Tags extends Core
{
    public function listTags() {
        $curl = new Curl();
        $fullUrl = $this->getApiUrl() . 'tags';
        $tags = $curl->curlGet($fullUrl,$this->getHeader(True));
        return $tags;
    }

    public function createTag($label, $linodes = null, $domains = null, $volumes = null, $nodebalancers = null) {
        $curl - new Curl();
        $fullUrl = $this->getApiUrl() . 'tags';
        $post = json_encode(array('label' => $label,'linodes' => $linodes,'domains' => $domains,'volumes' => $volumes, 'nodebalancers' => $nodebalancers));
        $tags = $curl->curlPost($fullUrl,$this->getHeader(True),$post);
        return $tags;
    }

    public function listTaggedObjects($label) {
        $curl = new Curl();
        $fullUrl = $this->getApiUrl() . 'tags/' . $label;
        $objects = $curl->curlGet($fullUrl,$this->getHeadeR(True));
        return $objects;
    }

    public function deleteTag($label) {
        $curl = new Curl();
        $fullUrl = $this->getApiUrl() . 'tags/' . $label;
        $tag = $curl->curlDelete($fullUrl,$this->getHeadeR(True));
        return $tag;
    }
}

?>
