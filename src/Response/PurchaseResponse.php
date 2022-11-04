<?php

namespace Omnipay\YooMoney\Response;

use Omnipay\Common\Message\RequestInterface;

/**
 * YooMoney Response
 */
class PurchaseResponse extends AbstractResponse
{
    public function __construct(RequestInterface $request, $data, $status)
    {
        $this->request = $request;
        $this->data = $data;
        $this->status = $status;
    }

    public function getTransactionReference()
    {
        return $this->data['id'] ?? null;
    }

    public function getRedirectUrl()
    {
        return $this->data['confirmation']['confirmation_url'] ?? '';
    }

    public function isTest()
    {
        return $this->data['test'] ?? false;
    }
}
