<?php

namespace Omnipay\YooMoney\Request;

use Omnipay\YooMoney\Response\RefundFetchResponse;

/**
 * YooMoney
 */
class RefundFetchRequest extends AbstractRequest
{
    /**
     * @inheritDoc
     */
    protected $httpMethod = 'GET';

    public function getRefundId()
    {
        $this->getParameter('refund_id');
    }

    public function setRefundId(string $value)
    {
        $this->setParameter('refund_id', $value);
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
        return new RefundFetchResponse($this, $data, $status);
    }

    /**
     * @inheritDoc
     */
    public function getEndPoint()
    {
        return parent::getEndpoint() . '/refunds/' . $this->getRefundId();
    }
}
