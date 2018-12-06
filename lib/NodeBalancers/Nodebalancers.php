<?php

namespace Linode\NodeBalancers;

use Linode\Common\Curl;
use Linode\Auth\Core;

class NodeBalancers extends Core
{
    public function getNodeBalancers($nb_id) {
        $curl = new Curl();
        $fullUrl = $this->getApiUrl() . 'nodebalancers/' . $nb_id;
        $nodebalancers = $curl->curlGet($fullUrl,$this->getHeader(True));
        return $nodebalancers;
    }

    public function postNodeBalancers($region = null,$label = null,$client_conn_throttle = 0) {
        $curl = new Curl();
        $fullUrl = $this->getApiUrl() . 'nodebalancers/';
        $post = json_encode(array('region' => $region, 'label' => $label, 'client_conn_throttle' => $client_conn_throttle));
        $nodebalancer = $curl->curlPost($fullUrl,$this->getHeader(True),$post);
    }

    public function deleteNodeBalancer($nb_id) {
        $curl = new Curl();
        $fullUrl = $this->getApiUrl() . 'nodebalancers/' . $nb_id;
        $nodebalancer = $curl->curlDelete($fullUrl,$this->getHeader(True));
        return $nodebalancer;
    }

    // Configs
    
    public function getNodeConfig($nb_id, $config_id = null) {
        $curl = new Curl();
        $fullUrl = $this->getApiUrl() . 'nodebalancers/' . $nb_id . '/configs/' . $config_id;
        $nodeConfig = $curl->curlGet($fullUrl,$this->getHeader(True));
        return $nodeConfig;
    }

    public function deleteNodeConfig($nb_id,$config_id) {
        $curl = new Curl();
        $fullUrl = $this->getApiUrl() . 'nodebalancers/' . $nb_id . '/configs/' . $config_id;
        $nodeConfig = $curl->curlDelete($fullUrl,$this->getHeader(True));
        return $nodeConfig;
    }

    public function postNodeConfig($nb_id,$port = null, $protocol = null, $algorithm = null, $stickiness = null, $check = null, $check_interval = null, $check_timeout = null, $check_attempts = null, $check_path = null, $check_body = null, $check_passive = null, $ssl_cert = null, $ssl_key = null, $cipher_suite = null) {
        $curl = new Curl();
        $apiUrl = $this->getApiUrl();
        $header = $this->getHeader(True);
        $fullUrl = $apiUrl . 'nodebalacer/' . $nb_id . '/configs';
        $post = json_encode(array('port' => $port, 'protocol' => $protocol, 'algorithm' => $algorithm, 'stickiness' => $stickiness, 'check' => $check, 'check_interval' => $check_interval, 'check_timeout' => $check_interval, 'check_attempts' => $check_interval, 'check_path' => $check_path, 'check_body' => $check_body, 'check_passive' => $check_passive, 'ssl_cert' => $ssl_cert, 'ssl_key' => $ssl_key, 'cipher_suite' => $cipher_suite));
        $config = $curl->curlPost($fullUrl,$this->getHeader(True),$post);
        return $config;
    }


}

?>
