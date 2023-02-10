<?php

namespace Omnipay\YooMoney\Request;

use Omnipay\YooMoney\Response\ReceiptListResponse;

/**
 * YooMoney
 */
class ReceiptListRequest extends AbstractRequest
{
    /**
     * @inheritDoc
     */
    protected $httpMethod = 'GET';

    public function getCreatedAt()
    {
        return $this->getParameter('created_at');
    }

    public function setCreatedAt(string $value)
    {
        return $this->setParameter('created_at', $value);
    }

    public function getStatus()
    {
        return $this->getParameter('status');
    }

    public function setStatus(string $value)
    {
        return $this->setParameter('status', $value);
    }

    public function getPaymentId()
    {
        return $this->getParameter('payment_id');
    }

    public function setPaymentId(string $value)
    {
        return $this->setParameter('payment_id', $value);
    }

    public function getRefundId()
    {
        return $this->getParameter('refund_id');
    }

    public function setRefundId(string $value)
    {
        return $this->setParameter('refund_id', $value);
    }

    public function getLimit()
    {
        return $this->getParameter('limit');
    }

    public function setLimit(int $value)
    {
        return $this->setParameter('limit', $value);
    }

    public function getCursor()
    {
        return $this->getParameter('cursor');
    }

    public function setCursor(string $value)
    {
        return $this->setParameter('cursor', $value);
    }

    /**
     * @inheritDoc
     */
    public function getData()
    {
        return array_merge(
            $this->getParametersIf('created_at'),
            $this->getParametersIf('status'),
            $this->getParametersIf('payment_id'),
            $this->getParametersIf('refund_id'),
            $this->getParametersIf('limit'),
            $this->getParametersIf('cursor'),
        );
    }

    /**
     * @inheritDoc
     */
    protected function createResponse($data, $status)
    {
        return new ReceiptListResponse($this, $data, $status);
    }

    /**
     * @inheritDoc
     */
    public function getEndPoint()
    {
        return parent::getEndpoint() . '/receipts';
    }
}
