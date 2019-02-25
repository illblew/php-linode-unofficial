<?php

namespace Linode\Account;

use Linode\Common\Curl;
use Linode\Auth\Core;

class Invoices extends Core 
{

    //Pass an invoiceid to get one
    function viewInvoices($invoice = null) {
        
        $curl = new Curl();
        $header = $this->getHeader(True);

        if(!is_null($invoice)) {
            $fullUrl = $this->getApiUrl() . '/account/invoices/' . $invoice;
        } else {
            $fullUrl = $this->getApiUrl() . '/account/invoices';
        }
        
        $invoice = $curl->curlGet($fullUrl, $header);
        return $invoice;
    }

    function listInvoiceItems($invoice) {
        $curl = new Curl();
        $header = $this->getHeader(True);
        $fullUrl = $this->getApiUrl() . '/account/invoices/' . $invoice . '/items';
        $invoiceItems = $curl->curlGet($furllUrl,$header);
        return $invoiceItems;
    }

}

?>
