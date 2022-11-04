<?php

namespace Omnipay\YooMoney\Request;

use Omnipay\YooMoney\Response\WebhookResponse;

/**
 * YooMoney
 */
class WebhookRequest extends AbstractRequest
{
    /**
     * @inheritDoc
     */
    protected $requireToken = true;

    public function getEvent()
    {
        $this->getParameter('event');
    }

    public function setEvent(string $value)
    {
        $this->setParameter('event', $value);
    }

    public function getUrl()
    {
        $this->getParameter('url');
    }

    public function setUrl(string $value)
    {
        $this->setParameter('url', $value);
    }

    /**
     * @inheritDoc
     */
    public function getData()
    {
        $this->validate('event', 'url');

        return [
            ...$this->getParametersIf('event'),
            ...$this->getParametersIf('url'),
        ];
    }

    /**
     * @inheritDoc
     */
    protected function createResponse($data, $status)
    {
        return new WebhookResponse($this, $data, $status);
    }
    
    /**
     * @inheritDoc
     */
    public function getEndPoint()
    {
        return parent::getEndpoint() . '/webhooks';
    }
}
