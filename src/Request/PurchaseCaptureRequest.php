<?php

namespace Omnipay\YooMoney\Request;

use Omnipay\YooMoney\Response\PurchaseCaptureResponse;

/**
 * YooMoney
 */
class PurchaseCaptureRequest extends AbstractRequest
{
    public function getReceipt()
    {
        return $this->getParameter('receipt');
    }

    public function setReceipt(array $value)
    {
        return $this->setParameter('receipt', $value);
    }

    public function getAirline()
    {
        return $this->getParameter('airline');
    }

    public function setAirline(array $value)
    {
        return $this->setParameter('receipt', $value);
    }

    public function getTransfers()
    {
        return $this->getParameter('transfers');
    }

    public function setTransfers($value)
    {
        return $this->setParameter('receipt', $value);
    }

    public function getDeal()
    {
        return $this->getParameter('deal');
    }

    public function setDeal(array $value)
    {
        return $this->setParameter('receipt', $value);
    }

    /**
     * @inheritDoc
     */
    public function getData()
    {
        return [
            'amount' => [
                'value' => $this->getAmount(),
                'currency' => $this->getCurrency(),
            ],
            ...$this->getParametersIf('receipt'),
            ...$this->getParametersIf('airline'),
            ...$this->getParametersIf('transfers'),
            ...$this->getParametersIf('deal'),
        ];
    }

    /**
     * @inheritDoc
     */
    protected function createResponse($data, $status)
    {
        return new PurchaseCaptureResponse($this, $data, $status);
    }

    /**
     * @inheritDoc
     */
    public function getEndPoint()
    {
        return parent::getEndpoint() . '/payments/' . $this->getTransactionId() . '/capture';
    }
}
