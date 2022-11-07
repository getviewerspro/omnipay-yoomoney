<?php

namespace Omnipay\YooMoney\Request;

/**
 * YooMoney
 */
class ReceiptRequest extends AbstractRequest
{
    public function getType()
    {
        return $this->getParameter('type');
    }

    public function setType(string $value)
    {
        return $this->setParameter('type', $value);
    }

    public function getItems()
    {
        return $this->getParameter('items');
    }

    public function setItems($value)
    {
        return $this->setParameter('items', $value);
    }
    
    public function getPaymentId()
    {
        return $this->getParameter('payment_id');
    }

    public function setPaymentId(string $value)
    {
        return $this->setParameter('payment_id', $value);
    }

    public function getRefundId()
    {
        return $this->getParameter('refund_id');
    }

    public function setRefundId(string $value)
    {
        return $this->setParameter('refund_id', $value);
    }

    public function getCustomer()
    {
        return $this->getParameter('customer');
    }

    public function setCustomer(array $value)
    {
        return $this->setParameter('customer', $value);
    }

    public function getSend()
    {
        return $this->getParameter('send');
    }

    public function setSend(bool $value)
    {
        return $this->setParameter('send', $value);
    }

    public function getTaxSystemCode()
    {
        return $this->getParameter('tax_system_code');
    }

    public function setTaxSystemCode(int $value)
    {
        return $this->setParameter('tax_system_code', $value);
    }

    public function getAdditionalUserProps()
    {
        return $this->getParameter('additional_user_props');
    }

    public function setAdditionalUserProps(array $value)
    {
        return $this->setParameter('additional_user_props', $value);
    }

    public function getReceiptIndustryDetails()
    {
        return $this->getParameter('receipt_industry_details');
    }

    public function setReceiptIndustryDetails(array $value)
    {
        return $this->setParameter('receipt_industry_details', $value);
    }

    public function getReceiptOperationalDetails()
    {
        return $this->getParameter('receipt_operational_details');
    }

    public function setReceiptOperationalDetails(array $value)
    {
        return $this->setParameter('receipt_operational_details', $value);
    }

    public function getSettlements()
    {
        return $this->getParameter('settlements');
    }

    public function setSettlements(array $value)
    {
        return $this->setParameter('settlements', $value);
    }

    public function getOnBehalfOf()
    {
        return $this->getParameter('on_behalf_of');
    }

    public function setOnBehalfOf(string $value)
    {
        return $this->setParameter('on_behalf_of', $value);
    }

    /**
     * @inheritDoc
     */
    public function getData()
    {
        $this->validate('type', 'customer', 'items', 'settlements');

        return [
            ...$this->getParametersIf('type'),
            ...$this->getParametersIf('payment_id'),
            ...$this->getParametersIf('refund_id'),
            ...$this->getParametersIf('customer'),
            ...$this->getParametersIf('items'),
            ...$this->getParametersIf('send'),
            ...$this->getParametersIf('tax_system_code'),
            ...$this->getParametersIf('additional_user_props'),
            ...$this->getParametersIf('receipt_industry_details'),
            ...$this->getParametersIf('receipt_operational_details'),
            ...$this->getParametersIf('settlements'),
            ...$this->getParametersIf('on_behalf_of'),
        ];
    }

    /**
     * @inheritDoc
     */
    public function getEndPoint()
    {
        return parent::getEndpoint() . '/receipts';
    }
}
