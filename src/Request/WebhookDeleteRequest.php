<?php

namespace Omnipay\YooMoney\Request;

use Omnipay\YooMoney\Response\WebhookDeleteResponse;

/**
 * YooMoney
 */
class WebhookDeleteRequest extends AbstractRequest
{
    /**
     * @inheritDoc
     */
    protected $requireToken = true;

    /**
     * @inheritDoc
     */
    protected $httpMethod = 'DELETE';

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
        return new WebhookDeleteResponse($this, $data, $status);
    }
    
    /**
     * @inheritDoc
     */
    public function getEndPoint()
    {
        return parent::getEndpoint() . '/webhooks/' . $this->getWebhookId();
    }
}
