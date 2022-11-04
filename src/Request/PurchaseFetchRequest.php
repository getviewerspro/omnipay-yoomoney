<?php

namespace Omnipay\YooMoney\Request;

use Omnipay\YooMoney\Response\PurchaseFetchResponse;

/**
 * YooMoney
 */
class PurchaseFetchRequest extends AbstractRequest
{
    /**
     * @inheritDoc
     */
    protected $httpMethod = 'GET';

    /**
     * @inheritDoc
     */
    public function getData()
    {
        return [];
    }

    /**
     * @inheritDoc
     */
    protected function createResponse($data, $status)
    {
        return new PurchaseFetchResponse($this, $data, $status);
    }

    /**
     * @inheritDoc
     */
    public function getEndPoint()
    {
        return parent::getEndpoint() . '/payments/' . $this->getTransactionId();
    }
}
