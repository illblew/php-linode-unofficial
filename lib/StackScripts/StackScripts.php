<?php

namespace Linode\StackScripts;

use Linode\Common\Curl;
use Linode\Auth\Core;

class StackScripts extends Core
{
    public function listStackScripts(auth = False) {
        $curl new Curl();
        $fullUrl = $this->getApiUrl() . 'linode/stackscripts';
        $stackScripts = $curl->curlGet($fulUrl,$this->getHeader(auth));
        return $stackScripts;
    }

    public function createStackScript($script,$label,$images,$description = null, $is_public = null, $rev_note = null) {
        $curl = new Curl();
        $fullUrl = $this->getApiUrl() . 'linode/stackscripts';
        $post = json_encode(array('script' => $script,'label' => $label, 'images' => $images, 'description' => $description, 'is_public' => $is_public, 'rev_note' => $rev_note)); 
        $StackScript = $curl->curlPost($fullUrl,$this->getHeader(True), $post)
        return $StackScript;
    }
    
    public function viewStackScript($id) {
        $curl = new Curl();
        $fullUrl = $this->getApiUrl() . 'linode/stackscripts/' . $id;
        $StackScript = $curl->curlGet($fullUrl,$this->getHeader(True));
        return $StackScript;
    }

    public function updateStackScript($id,$label,$description,$images,$is_public,$rev_note,$script) {
        $curl = new Curl();
        if(is_empty($id)) {
            return "You need to provide a StackScript id.";
        }
        $fullurl = $this->getApiUrl() . 'linode/stackscripts/' . $id;
        $put = json_encode(array('label' => $label, 'description' => $description, 'images' => $images, 'is_public' => $is_public, 'rev_note' => $rev_note, 'script' => $script));
        $updatedScript = $curl->curlPut($fullUrl,$this->getHeader(True),$put);
        return $updatedScript;
    }

    public function deleteStackScript($id) {
        $curl = new Curl();
        $fullUrl = $this->getApiUrl() . 'linode/stackscripts/' . $id;
        $deletedScript = $curl->curlDelete($fullUrl,$this->getHeader(True));
        return $deletedScript;
    }

}

?>
