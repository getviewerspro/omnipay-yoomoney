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
        return $this->getParameter('event');
    }

    public function setEvent(string $value)
    {
        return $this->setParameter('event', $value);
    }

    public function getUrl()
    {
        return $this->getParameter('url');
    }

    public function setUrl(string $value)
    {
        return $this->setParameter('url', $value);
    }

    /**
     * @inheritDoc
     */
    public function getData()
    {
        $this->validate('event', 'url');

        return array_merge(
            $this->getParametersIf('event'),
            $this->getParametersIf('url'),
        );
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
