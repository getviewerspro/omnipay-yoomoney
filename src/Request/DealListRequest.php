<?php

namespace Omnipay\YooMoney\Request;

use Omnipay\YooMoney\Response\DealListResponse;

/**
 * YooMoney
 */
class DealListRequest extends AbstractRequest
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
    
    public function getExpiresAt()
    {
        return $this->getParameter('expires_at');
    }

    public function setExpiresAt(string $value)
    {
        return $this->setParameter('expires_at', $value);
    }
    
    public function getStatus()
    {
        return $this->getParameter('status');
    }

    public function setStatus(string $value)
    {
        return $this->setParameter('status', $value);
    }
    
    public function getFullTextSearch()
    {
        return $this->getParameter('full_text_search');
    }

    public function setFullTextSearch(string $value)
    {
        return $this->setParameter('full_text_search', $value);
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
            ...$this->getParametersIf('expires_at'),
            ...$this->getParametersIf('status'),
            ...$this->getParametersIf('full_text_search'),
            ...$this->getParametersIf('limit'),
            ...$this->getParametersIf('cursor'),
        ];
    }

    /**
     * @inheritDoc
     */
    protected function createResponse($data, $status)
    {
        return new DealListResponse($this, $data, $status);
    }

    /**
     * @inheritDoc
     */
    public function getEndPoint()
    {
        return parent::getEndpoint() . '/deals';
    }
}
