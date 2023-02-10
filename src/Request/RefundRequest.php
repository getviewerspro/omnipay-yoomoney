<?php

namespace Omnipay\YooMoney\Request;

use YooKassa\Request\Refunds\RefundResponse;

/**
 * YooMoney
 */
class RefundRequest extends AbstractRequest
{
    public function getPaymentId()
    {
        return $this->getParameter('payment_id');
    }

    public function setPaymentId(string $value)
    {
        return $this->setParameter('payment_id', $value);
    }

    public function getReceipt()
    {
        return $this->getParameter('receipt');
    }

    public function setReceipt(array $value)
    {
        return $this->setParameter('receipt', $value);
    }

    public function getSources()
    {
        return $this->getParameter('sources');
    }

    public function setSources(array $value)
    {
        return $this->setParameter('sources', $value);
    }

    public function getDeal()
    {
        return $this->getParameter('deal');
    }

    public function setDeal(array $value)
    {
        return $this->setParameter('deal', $value);
    }

    /**
     * @inheritDoc
     */
    public function getData()
    {
        $this->validate('payment_id', 'amount', 'currency');

        return array_merge(
            $this->getParametersIf('payment_id'),
            [
                'amount' => [
                    'value' => $this->getAmount(),
                    'currency' => $this->getCurrency(),
                ],
            ],
            $this->getParametersIf('description'),
            $this->getParametersIf('receipt'),
            $this->getParametersIf('sources'),
            $this->getParametersIf('deal'),
        );
    }

    /**
     * @inheritDoc
     */
    protected function createResponse($data, $status)
    {
        return new RefundResponse($this, $data, $status);
    }
    
    /**
     * @inheritDoc
     */
    public function getEndPoint()
    {
        return parent::getEndpoint() . '/refunds';
    }
}
