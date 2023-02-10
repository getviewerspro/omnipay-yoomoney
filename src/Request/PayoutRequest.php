<?php

namespace Omnipay\YooMoney\Request;

use Omnipay\YooMoney\Response\PayoutResponse;

/**
 * YooMoney
 */
class PayoutRequest extends AbstractRequest
{
    public function getPayoutDestinationData()
    {
        return $this->getParameter('payout_destination_data');
    }

    public function setPayoutDestinationData(array $value)
    {
        return $this->setParameter('payout_destination_data', $value);
    }

    public function getPayoutToken()
    {
        return $this->getParameter('payout_token');
    }

    public function setPayoutToken(string $value)
    {
        return $this->setParameter('payout_token', $value);
    }

    public function getDeal()
    {
        return $this->getParameter('deal');
    }

    public function setDeal(array $value)
    {
        return $this->setParameter('deal', $value);
    }

    public function getMetadata()
    {
        return $this->getParameter('metadata');
    }

    public function setMetadata(array $value)
    {
        return $this->setParameter('metadata', $value);
    }

    /**
     * @inheritDoc
     */
    public function getData()
    {
        $this->validate('amount');

        return array_merge(
            [
                'amount' => [
                    'value' => $this->getAmount(),
                    'currency' => $this->getCurrency(),
                ],
                'payout_destination_data' => $this->getPayoutDestinationData(),
            ],
            $this->getParametersIf('payout_token'),
            $this->getParametersIf('description'),
            $this->getParametersIf('deal'),
            $this->getParametersIf('metadata'),
        );
    }

    /**
     * @inheritDoc
     */
    protected function createResponse($data, $status)
    {
        return new PayoutResponse($this, $data, $status);
    }

    /**
     * @inheritDoc
     */
    public function getEndPoint()
    {
        return parent::getEndpoint() . '/payouts';
    }
}
