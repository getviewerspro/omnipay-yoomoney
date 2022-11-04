<?php

namespace Omnipay\YooMoney\Request;

use Omnipay\YooMoney\Response\PayoutFetchResponse;

/**
 * YooMoney
 */
class PayoutFetchRequest extends AbstractRequest
{
    /**
     * @inheritDoc
     */
    protected $httpMethod = 'GET';

    public function getPayoutId()
    {
        return $this->getParameter('payout_id');
    }

    public function setPayoutId($value)
    {
        return $this->setParameter('payout_id', $value);
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
        return new PayoutFetchResponse($this, $data, $status);
    }

    /**
     * @inheritDoc
     */
    public function getEndPoint()
    {
        return parent::getEndpoint() . '/payouts/' . $this->getPayoutId();
    }
}
