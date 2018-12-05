<?php

namespace Linode\Support;

use Linode\Common\Curl;
use Linode\Auth\Core;

class Support extends Core
{
    public function listTickets() {
        $curl = new Curl();
        $fullUrl = $this->getApiUrl() . 'support/tickets';
        $tickets = $curl->curlGet($fullUrl,$this->getHeader(True));
        return $tickets;
    }

    public function openTicket($summary,$description,$domain_id = null, $linode_id = null, $longviewclient_id = null,$nodebalancer_id = null, $volume_id = null) {
        $curl = new Curl();
        $fullUrl = $this->getApiUrl . 'support/tickets';
        $arr = array('summary' => $summary, 'description' => $description, 'domain_id' => $domain_id, 'linode_id' => $linode_id, 'longviewclient_id' => $longviewclient_id, 'nodebalancer_id' => $nodebalancer_id, 'volume_id' => $volume_id);
        $post = json_encode($arr);
        $ticket = $curl->curlPost($fullUrl,$this->getHeader(True),$post);
        return $ticket;
    }

    public function viewTicket($ticket_id) {
        $curl = new Curl();
        $fullUrl = $this->getApiUrl . 'support/tickets/' . $ticket_id;
        $ticket = $curl->curlGet($fullUrl,$this->getHeader(True));
        return $ticket;
    }

    public function closeTicket($ticket_id) {
        $curl = new Curl();
        $fullUrl = $this->getApiUrl() . 'support/tickets/' . $ticket_id . '/close';
        $arr = array('ticketId' => $tickt_id);
        $post = json_encode($arr);
        $ticket = $curl->curlPost($fullUrl,$this->getHeader(True),$post);
        return $ticket;
    }

    public function listReplies($ticket_id) {
        $curl = new Curl();
        $fullUrl = $this->getApiUrl() . 'support/tickets/' . $ticket_id . '/replies';
        $reply = $curl->curlGet($fullUrl,$this->getHeader(True));
        return $reply;
    }

    public function createReply($ticket_id, $description) {
        $curl = new Curl();
        $fullUrl = $this->getApiUrl() . 'support/tickets' . $ticket_id . 'replies';
        $arr = array('ticketId' => $ticket_id, 'description' => $description);
        $post = json_encode($arr);
        $reply = $curl->curlPost($fullUrl,$this->getHeader(True), $post);
        return $reply;
    }

    public function createAttachment($ticket_id, $file) {
        //do this
    }

}

?>
