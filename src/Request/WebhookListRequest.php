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

    public function getWebhookId()
    {
        return $this->getParameter('webhook_id');
    }

    public function setWebhookId($value)
    {
        return $this->setParameter('webhook_id', $value);
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
