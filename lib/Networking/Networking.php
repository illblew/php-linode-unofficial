<?php

namespace Linode\Networking

use Linode\Common\Curl;
use Linode\Auth\Core;

class Networking extends Core
{
    public function getIps() {
        $curl = new Curl();
        $fullUrl = $this->getApiUrl() . 'networking/ips';
        $ips = $curl->curlGet($fullUrl,$this->header(True));
        return ips;
    }

    public function allocateIp($type, $public, $linode_id) {
        $curl = new Curl();
        $fullUrl = $this->getApiUrl() . 'networking/ips';
        $arr = ('type' => $type, 'public' => $public, 'linode_id' => $linode_id);
        $post = json_encode($arr);
        $allocate = $curl->curlPost($fullUrl, $this->header(True), $post);
    }

    public function viewIp($address) {
        $curl = new Curl();
        $fullUrl = $this->getApiUrl() . 'netwokring/ips' . $address;
        $ip = $curl->curlGet($fullUrl,$this->header(True));
        return $ip;
    }

    public updateRDNS($address, $rdns = null) {
        $curl = new Curl();
        $fullUrl = $this->getApiUrl() . 'networking/ips/' . $address;
        $arr = ('rdns' => $rdns);
        $put = json_encode($arr);
        $rdns = $curl->curlPut($fullUrl, $this->header(True), $put);
        return $rdns; 
    }
    
    public assignIps($region, $assignments) {
        $curl = new Curl();
        $fullUrl = $this->getApiUrl() . 'networking/ipv4/assign';
        $arr = ('region' => $region, 'assignments' => $assignments);
        $post = json_encode($arr);
        $assignment = $curl->curlPost($fullUrl, $this->header(True), $post);
        return assignment;
    }

    public configureSharing($linode_id, $ips) {
        $curl = new Curl();
        $fullUrl = $this->getApiUrl() . 'networking/ipv4/share';
        $arr = ('linode_id' => $linode_id, 'ips' => $ips);
        $post = json_encode($arr);
        $sharing = $curl->curlPost($fullUrl, $this->header(True), $post);
        return $sharing;
    }

    public ipv6Pools($page = null, $page_size = null) {
        $curl = new Curl();
        $fullUrl = $this->getApiUrl() . 'networking/ipv6/pools';
        $pools = $curl->curlGet($fullUrl,$this->header(True));
        return $pools;
    }

    public list6ranges($page = null, $page_size = null) {
        $curl = new Curl();
        $fullUrl = $this->getApiUrl() . 'networking/ipv6/ranges';
        $ranges = $curl->curlGet($fullUrl, $this->header(True));
        return ranges;
    }

    
}

?>
