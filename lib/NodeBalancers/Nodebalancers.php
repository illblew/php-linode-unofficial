<?php

namespace Linode\NodeBalancers;

use Linode\Common\Curl;
use Linode\Auth\Core;

class NodeBalancers extends Core
{
    public function getNodeBalancers($nb_id) {
        $curl = new Curl();
        $apiUrl = $this->getApiUrl();
        $header = $this->getHeader(True);
        $fullUrl = $apiUrl . 'nodebalancers/' . $nb_id;
        $nodebalancers = $curl->curlGet($fullUrl,$header);
        return $nodebalancers;
    }

    public function postNodeBalancers($region = null,$label = null,$client_conn_throttle = 0) {
        $curl = new Curl();
        $apiUrl = $this->getApiUrl();
        $header = $this->getHeader(True);
        $fullUrl = $apiUrl . 'nodebalancers/';
        $arr = array('region' => $region, 'label' => $label, 'client_conn_throttle' => $client_conn_throttle);
        $post = json_encode($arr);
        $nodebalancer = $curl->curlPost($fullUrl,$header,$post);
    }

    public function deleteNodeBalancer($nb_id) {
        $curl = new Curl();
        $apiUrl =  $this->getApiUrl();
        $header = $this->getHeader(True);
        $fullUrl = $apiUrl . 'nodebalancers/' . $nb_id;
        $nodebalancer = $curl->curlDelete($fullUrl,$header);
        return $nodebalancer;
    }

    // Configs
    
    public function getNodeConfig($nb_id, $config_id = null) {
        $curl = new Curl();
        $apiUrl = $this->getApiUrl();
        $header = $this->getHeader(True);
        $fullUrl = $apiUrl . 'nodebalancers/' . $nb_id . '/configs/' . $config_id;
        $nodeConfig = $curl->curlGet($fullUrl,$header);
        return $nodeConfig;
    }

    public function deleteNodeConfig($nb_id,$config_id) {
        $curl = new Curl();
        $apiUrl = $this->getApiUrl();
        $header = $this->getHeader(True);
        $fullUrl = $apiUrl . 'nodebalancers/' . $nb_id . '/configs/' . $config_id;
        $nodeConfig = $curl->curlDelete($fullUrl,$header);
        return $nodeConfig;
    }

    public function postNodeConfig($nb_id,$port = null, $protocol = null, $algorithm = null, $stickiness = null, $check = null, $check_interval = null, $check_timeout = null, $check_attempts = null, $check_path = null, $check_body = null, $check_passive = null, $ssl_cert = null, $ssl_key = null, $cipher_suite = null) {
        $curl = new Curl();
        $apiUrl = $this->getApiUrl();
        $header = $this->getHeader(True);
        $fullUrl = $apiUrl . 'nodebalacer/' . $nb_id . '/configs';
        $arr = array('port' => $port, 'protocol' => $protocol, 'algorithm' => $algorithm, 'stickiness' => $stickiness, 'check' => $check, 'check_interval' => $check_interval, 'check_timeout' => $check_interval, 'check_attempts' => $check_interval, 'check_path' => $check_path, 'check_body' => $check_body, 'check_passive' => $check_passive, 'ssl_cert' => $ssl_cert, 'ssl_key' => $ssl_key, 'cipher_suite' => $cipher_suite);
        $post = json_encode($arr);
        $config = $curl->curlPost($fullUrl,$header,$post);
        return $config;
    }


}

?>
