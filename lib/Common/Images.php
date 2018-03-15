<?php

namespace Linode\Common;

use Linode\Common\Curl;
use Linode\Auth\Core;

class Images extends Core
{
	//Get a list of al available distributions

	function getImages($id = null) {
        $curl = new Curl();
        $apiUrl = $this->getApiUrl();
        $header = $this->getHeader();
        if ($id != null) {
        	$path = 'images/' . $id;
        } else {
        	$path = 'images';
        }
        $fullUrl = $apiUrl . $path;
        $images = $curl->curlGet($fullUrl,$header);
        return $images;
	}
}



?>
