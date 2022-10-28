<?php

namespace OmniPay\YooMoney\Message;

class PurchaseRequest extends AbstractRequest
{
    public function getData()
    {
        $this->validate('', '');

        return [];
    }

    public function getEndPoint()
    {
        return parent::getEndpoint() . '/payments';
    }
}