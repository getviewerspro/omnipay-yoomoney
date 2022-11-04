<?php

namespace Omnipay\YooMoney\Request;

use Omnipay\YooMoney\Response\DealFetchResponse;

/**
 * YooMoney
 */
class DealFetchRequest extends AbstractRequest
{
    /**
     * @inheritDoc
     */
    protected $httpMethod = 'GET';

    public function getDealId()
    {
        return $this->getParameter('deal_id');
    }

    public function setDealId($value)
    {
        return $this->setParameter('deal_id', $value);
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
        return new DealFetchResponse($this, $data, $status);
    }

    /**
     * @inheritDoc
     */
    public function getEndPoint()
    {
        return parent::getEndpoint() . '/deals/' . $this->getDealId();
    }
}
