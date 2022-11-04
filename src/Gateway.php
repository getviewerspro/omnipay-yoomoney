<?php

namespace Omnipay\YooMoney;

use Omnipay\Common\AbstractGateway;
use Omnipay\YooMoney\Request;

class Gateway extends AbstractGateway
{
    public function getName()
    {
        return 'YooMoney';
    }

    /**
     * @return array
     */
    public function getDefaultParameters()
    {
        return [
            'shopId' => '',
            'secret' => '',
            'token' => null,
        ];
    }

    public function getShopId()
    {
        return $this->getParameter('shopId');
    }

    public function setShopId(string $value)
    {
        return $this->setParameter('shopId', $value);
    }

    public function getSecret()
    {
        return $this->getParameter('secret');
    }

    public function setSecret(string $value)
    {
        return $this->setParameter('secret', $value);
    }

    public function getToken()
    {
        return $this->getParameter('token');
    }

    public function setToken(?string $value)
    {
        return $this->setParameter('token', $value);
    }

    public function getLocale()
    {
        return $this->getParameter('locale');
    }

    public function setLocale(?string $value)
    {
        return $this->setParameter('locale', $value);
    }

    /**
     * @link https://yookassa.ru/developers/api?lang=en#create_payment
     */
    public function purchase(array $parameters = [])
    {
        return $this->createRequest(Request\PurchaseRequest::class, $parameters);
    }

    /**
     * @link https://yookassa.ru/developers/api?lang=en#get_payment
     */
    public function fetchPurchase(array $parameters = [])
    {
        return $this->createRequest(Request\PurchaseFetchRequest::class, $parameters);
    }

    /**
     * @link https://yookassa.ru/developers/api?lang=en#get_payments_list
     */
    public function listPurchases(array $parameters = array())
    {
        return $this->createRequest(Request\PurchaseListRequest::class, $parameters);
    }

    /**
     * @link https://yookassa.ru/developers/api?lang=en#capture_payment
     */
    public function capturePurchase(array $parameters = [])
    {
        return $this->createRequest(Request\PurchaseCaptureRequest::class, $parameters);
    }

    /**
     * @link https://yookassa.ru/developers/api?lang=en#cancel_payment
     */
    public function cancelPurchase(array $parameters = [])
    {
        return $this->createRequest(Request\PurchaseCancelRequest::class, $parameters);
    }

    /**
     * @link https://yookassa.ru/developers/api?lang=en#create_refund
     */
    public function refund(array $parameters = [])
    {
        return $this->createRequest(Request\RefundRequest::class, $parameters);
    }

    /**
     * @link https://yookassa.ru/developers/api?lang=en#get_refund
     */
    public function fetchRefund(array $parameters = [])
    {
        return $this->createRequest(Request\RefundFetchRequest::class, $parameters);
    }

    /**
     * @link https://yookassa.ru/developers/api?lang=en#get_refunds_list
     */
    public function listRefunds(array $parameters = [])
    {
        return $this->createRequest(Request\RefundListRequest::class, $parameters);
    }

    /**
     * @link https://yookassa.ru/developers/api?lang=en#create_receipt
     */
    public function receipt(array $parameters = [])
    {
        return $this->createRequest(Request\ReceiptRequest::class, $parameters);
    }

    /**
     * @link https://yookassa.ru/developers/api?lang=en#get_receipt
     */
    public function fetchReceipt(array $parameters = [])
    {
        return $this->createRequest(Request\ReceiptFetchRequest::class, $parameters);
    }

    /**
     * @link https://yookassa.ru/developers/api?lang=en#get_receipts_list
     */
    public function listReceipts(array $parameters = [])
    {
        return $this->createRequest(Request\ReceiptListRequest::class, $parameters);
    }

    /**
     * @link https://yookassa.ru/developers/api?lang=en#create_deal
     */
    public function deal(array $parameters = [])
    {
        return $this->createRequest(Request\DealRequest::class, $parameters);
    }

    /**
     * @link https://yookassa.ru/developers/api?lang=en#get_deal
     */
    public function fetchDeal(array $parameters = [])
    {
        return $this->createRequest(Request\DealFetchRequest::class, $parameters);
    }

    /**
     * @link https://yookassa.ru/developers/api?lang=en#get_deals_list
     */
    public function listDeals(array $parameters = [])
    {
        return $this->createRequest(Request\DealListRequest::class, $parameters);
    }

    /**
     * @link https://yookassa.ru/developers/api?lang=en#create_payout
     */
    public function payout(array $parameters = [])
    {
        return $this->createRequest(Request\PayoutRequest::class, $parameters);
    }

    /**
     * @link https://yookassa.ru/developers/api?lang=en#get_payout
     */
    public function fetchPayout(array $parameters = [])
    {
        return $this->createRequest(Request\PayoutFetchRequest::class, $parameters);
    }

    /**
     * @link https://yookassa.ru/developers/api?lang=en#create_webhook
     */
    public function webhook(array $parameters = [])
    {
        return $this->createRequest(Request\WebhookRequest::class, $parameters);
    }

    /**
     * @link https://yookassa.ru/developers/api?lang=en#get_webhook_list
     */
    public function listWebhooks(array $parameters = [])
    {
        return $this->createRequest(Request\WebhookListRequest::class, $parameters);
    }

    /**
     * @link https://yookassa.ru/developers/api?lang=en#delete_webhook
     */
    public function deleteWebhook(array $parameters = [])
    {
        return $this->createRequest(Request\WebhookDeleteRequest::class, $parameters);
    }

    /**
     * @link https://yookassa.ru/developers/api?lang=en#get_me
     */
    public function store(array $parameters = [])
    {
        return $this->createRequest(Request\StoreRequest::class, $parameters);
    }
}