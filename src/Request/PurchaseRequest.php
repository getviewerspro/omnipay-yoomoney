<?php

namespace Omnipay\YooMoney\Request;

use Omnipay\YooMoney\Response\PurchaseResponse;

/**
 * YooMoney
 */
class PurchaseRequest extends AbstractRequest
{
    public function getCustomerId()
    {
        return $this->getParameter('customer_id');
    }

    public function setCustomerId(string $value)
    {
        return $this->setParameter('customer_id', $value);
    }

    public function getReceipt()
    {
        return $this->getParameter('receipt');
    }

    public function setReceipt(array $value)
    {
        return $this->setParameter('receipt', $value);
    }

    public function getRecipient()
    {
        return $this->getParameter('recipient');
    }

    public function setRecipient(array $value)
    {
        return $this->setParameter('recipient', $value);
    }

    public function getPaymentToken()
    {
        return $this->getParameter('payment_token');
    }

    public function setPaymentToken(string $value)
    {
        return $this->setParameter('payment_token', $value);
    }

    public function getPaymentMethodId()
    {
        return $this->getParameter('payment_method_id');
    }

    public function setPaymentMethodId(string $value)
    {
        return $this->setParameter('payment_method_id', $value);
    }

    public function getPaymentMethodData()
    {
        return $this->getParameter('payment_method_data');
    }

    public function setPaymentMethodData(array $value)
    {
        return $this->setParameter('payment_method_data', $value);
    }

    public function getSavePaymentMethod()
    {
        return $this->getParameter('save_payment_method');
    }

    public function setSavePaymentMethod(bool $value)
    {
        return $this->setParameter('save_payment_method', $value);
    }

    public function getCapture()
    {
        return $this->getParameter('capture');
    }

    public function setCapture(bool $value)
    {
        return $this->setParameter('capture', $value);
    }

    public function getMetadata()
    {
        return $this->getParameter('metadata');
    }

    public function setMetadata(array $value)
    {
        return $this->setParameter('metadata', $value);
    }

    public function getAirline()
    {
        return $this->getParameter('airline');
    }

    public function setAirline(array $value)
    {
        return $this->setParameter('airline', $value);
    }

    public function getTransfers()
    {
        return $this->getParameter('transfers');
    }

    public function setTransfers(array $value)
    {
        return $this->setParameter('transfers', $value);
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
        $this->validate(
            'currency',
            'amount',
            'returnUrl',
            'description',
        );

        return array_merge(
            // Using default omnipay parameters
            [
                'amount' => [
                    'value' => $this->getAmount(),
                    'currency' => $this->getCurrency(),
                ],
                'description' => $this->getDescription(),
                'confirmation' => array_merge(
                    ['type' => 'redirect'],
                    $this->getParametersIf('locale'),
                    ['return_url' => $this->getReturnUrl()],
                ),
            ],
            $this->getParametersIfAlternative('clientIp', 'client_ip'),
            $this->getParametersIfAlternative('customer_id', 'merchant_customer_id'),

            // Optional non omnipay parameters
            $this->getParametersIf('receipt'),
            $this->getParametersIf('recipient'),
            $this->getParametersIf('payment_token'),
            $this->getParametersIf('payment_method_id'),
            $this->getParametersIf('payment_method_data'),
            $this->getParametersIf('save_payment_method'),
            $this->getParametersIf('capture'),
            [
                'metadata' => array_merge(
                    ['transactionId' => $this->getTransactionId()],
                    ($this->parameters->has('metadata') ? $this->parameters->get('metadata') : [])
                ),
            ],
            $this->getParametersIf('metadata'),
            $this->getParametersIf('airline'),
            $this->getParametersIf('transfers'),
            $this->getParametersIf('deal'),
        );
    }

    /**
     * @inheritDoc
     */
    protected function createResponse($data, $status)
    {
        return new PurchaseResponse($this, $data, $status);
    }

    /**
     * @inheritDoc
     */
    public function getEndPoint()
    {
        return parent::getEndpoint() . '/payments';
    }
}
