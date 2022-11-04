<?php

namespace Omnipay\YooMoney\Request;

use Omnipay\YooMoney\Response\WebhookListResponse;

/**
 * YooMoney
 */
class WebhookListRequest extends AbstractRequest
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
        return new WebhookListResponse($this, $data, $status);
    }
    
    /**
     * @inheritDoc
     */
    public function getEndPoint()
    {
        return parent::getEndpoint() . '/webhooks';
    }
}
