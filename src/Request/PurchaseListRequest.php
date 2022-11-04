<?php

namespace Omnipay\YooMoney\Request;

use Omnipay\YooMoney\Response\PurchaseListResponse;

/**
 * YooMoney
 */
class PurchaseListRequest extends AbstractRequest
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

    public function getCaptureAt()
    {
        return $this->getParameter('captured_at');
    }

    public function setCaptureAt(string $value)
    {
        return $this->setParameter('captured_at', $value);
    }

    public function getStatus()
    {
        return $this->getParameter('status');
    }

    public function setStatus(string $value)
    {
        return $this->setParameter('status', $value);
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
        return [
            ...$this->getParametersIf('created_at'),
            ...$this->getParametersIf('captured_at'),
            ...$this->getParametersIf('payment_method'),
            ...$this->getParametersIf('status'),
            ...$this->getParametersIf('limit'),
            ...$this->getParametersIf('cursor'),
        ];
    }

    /**
     * @inheritDoc
     */
    protected function createResponse($data, $status)
    {
        return new PurchaseListResponse($this, $data, $status);
    }

    /**
     * @inheritDoc
     */
    public function getEndPoint()
    {
        return parent::getEndpoint() . '/payments';
    }
}
