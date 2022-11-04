<?php

namespace Omnipay\YooMoney\Request;

use Omnipay\YooMoney\Response\PurchaseCancelResponse;

class PurchaseCancelRequest extends AbstractRequest
{
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
        return new PurchaseCancelResponse($this, $data, $status);
    }

    /**
     * @inheritDoc
     */
    public function getEndPoint()
    {
        return parent::getEndpoint() . '/payments/' . $this->getTransactionId() . '/cancel';
    }
}
