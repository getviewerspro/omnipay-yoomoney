<?php

namespace Omnipay\YooMoney\Request;

use Omnipay\YooMoney\Response\StoreResponse;

/**
 * YooMoney
 */
class StoreRequest extends AbstractRequest
{
    /**
     * @inheritDoc
     */
    protected $requireToken = true;

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
        return new StoreResponse($this, $data, $status);
    }

    /**
     * @inheritDoc
     */
    public function getEndPoint()
    {
        return parent::getEndpoint() . '/me';
    }
}
