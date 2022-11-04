<?php

namespace Omnipay\YooMoney\Request;

use Omnipay\YooMoney\Response\ReceiptFetchResponse;

/**
 * YooMoney
 */
class ReceiptFetchRequest extends AbstractRequest
{
    /**
     * @inheritDoc
     */
    protected $httpMethod = 'GET';

    public function getReceiptId()
    {
        return $this->getParameter('receipt_id');
    }

    public function setReceiptId(string $value)
    {
        return $this->setParameter('receipt_id', $value);
    }

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
        return new ReceiptFetchResponse($this, $data, $status);
    }

    /**
     * @inheritDoc
     */
    public function getEndPoint()
    {
        return parent::getEndpoint() . '/receipts/' . $this->getReceiptId();
    }
}
