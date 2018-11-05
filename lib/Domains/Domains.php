<?php

namespace Linode\Domains;

use Linode\Common\Curl;
use Linode\Auth\Core;

class Domains extends Core
{
    //Get a list of your domains.
    public function getDomains($domain_id = null) {
        $curl = new Curl();
        $fullUrl = $this->getApiURL() . 'domains/' . $domain_id;
        $domains = $curl->curlGet($fullUrl,$this->getHeader(True));
        return $domains;
    }
    
    public function getDomainRecords($domain_id = null, $record_id = null) { 
        $curl = new Curl();
        $fullUrl = $this->getApiURL . 'domains/' . $domain_id . 'records/' . $record_id ;
        $records = $curl-curlGet($fullUrl, $this->getHeader(True));
        return $records; 
    }


    public function createDomain($domain, $type, $status = null, $description = null, $soa_email = null, $retry_sec = null, $master_ips = null, $axfr_ips = null, $expire_sec = null, $refresh_sec = null, $ttl_sec = null) {

        $curl = new Curl();
        $fullUrl = $this->getApiURL . 'domains/';
        $arr = array ('domain' => $domain, 'type' => $type, 'status' => $status, 'description' => $description, 'soa_email' => $soa_email, 'retry_sec' => $retry_sec, 'master_ips', $master_ips, 'afxr_ips' => $afxr_ips, 'expire_sec' => $expire_sec, 'refresh_sec' => $refresh_sec, 'ttl_sec' => $ttl_sec);
        $post = json_encode($arr);
        $domain = $curl->curlPost($fullUrl,$this->header(True),$post);
        return $domain;
    }

    public function updateDomain($domain, $type, $status = null, $description = null, $soa_email = null, $retry_sec = null, $master_ips = null, $axfr_ips = null, $expire_sec = null, $refresh_sec = null, $ttl_sec = null) {

        $curl = new Curl();
        $fillUrl = $this->getApiURL . 'domains/';
        $arr = array ('domain' => $domain, 'type' => $type, 'status' => $status, 'description' => $description, 'soa_email' =>          $soa_email, 'retry_sec' => $retry_sec, 'master_ips', $master_ips, 'afxr_ips' => $afxr_ips, 'expire_sec' => $expire_sec, 'refresh_sec'   => $refresh_sec, 'ttl_sec' => $ttl_sec);

        $put = json_encode($arr);
        $domain = $curl->curlPut($fullUrl,$this->header(True), $put);
        return $domain;
    }

    public function deleteDomain($domain_id) {
        $curl = new Curl();
        $fullUrl = $this->getApiURL . 'domains/';
        $arr = array ('domainId' => $domain_id);
        $delete = json_encode($arr);
        $domain = $curl->curlDelete($fullUrl,$this->header(True), $delete);
        return $domain;
    }

}

?>
