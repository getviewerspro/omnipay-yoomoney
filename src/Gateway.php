<?php

namespace Omnipay\YooMoney;

use Omnipay\Common\AbstractGateway;
use Omnipay\YooMoney\Message;

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
            'token' => '',
        ];
    }

    public function getShopId()
    {
        return $this->getParameter('shopId');
    }

    public function setShopId($value)
    {
        return $this->setParameter('shopId', $value);
    }

    public function getSecret()
    {
        return $this->getParameter('secret');
    }

    public function setSecret($value)
    {
        return $this->setParameter('secret', $value);
    }

    public function getToken()
    {
        return $this->getParameter('token');
    }

    public function setToken($value)
    {
        return $this->setParameter('token', $value);
    }

    /**
     * @link https://yookassa.ru/developers/api?lang=en#create_payment
     */
    public function purchase(array $parameters = [])
    {
        return $this->createRequest(Message\PurchaseRequest::class, $parameters);
    }

    /**
     * @link https://yookassa.ru/developers/api?lang=en#get_payment
     */
    public function fetchPurchase(array $parameters = [])
    {
        return $this->createRequest(Message\PurchaseFetchRequest::class, $parameters);
    }

    /**
     * @link https://yookassa.ru/developers/api?lang=en#get_payments_list
     */
    public function listPurchases(array $parameters = array())
    {
        return $this->createRequest(Message\PurchaseListRequest::class, $parameters);
    }

    /**
     * @link https://yookassa.ru/developers/api?lang=en#capture_payment
     */
    public function capturePurchase(array $parameters = [])
    {
        return $this->createRequest(Message\PurchaseCaptureRequest::class, $parameters);
    }

    /**
     * @link https://yookassa.ru/developers/api?lang=en#cancel_payment
     */
    public function cancelPurchase(array $parameters = [])
    {
        return $this->createRequest(Message\PurchaseCancelRequest::class, $parameters);
    }

    /**
     * @link https://yookassa.ru/developers/api?lang=en#create_refund
     */
    public function refund(array $parameters = [])
    {
        return $this->createRequest(Message\RefundRequest::class, $parameters);
    }

    /**
     * @link https://yookassa.ru/developers/api?lang=en#get_refund
     */
    public function fetchRefund(array $parameters = [])
    {
        return $this->createRequest(Message\RefundFetchRequest::class, $parameters);
    }

    /**
     * @link https://yookassa.ru/developers/api?lang=en#get_refunds_list
     */
    public function listRefunds(array $parameters = [])
    {
        return $this->createRequest(Message\RefundListRequest::class, $parameters);
    }

    /**
     * @link https://yookassa.ru/developers/api?lang=en#create_receipt
     */
    public function receipt(array $parameters = [])
    {
        return $this->createRequest(Message\ReceiptRequest::class, $parameters);
    }

    /**
     * @link https://yookassa.ru/developers/api?lang=en#get_receipt
     */
    public function fetchReceipt(array $parameters = [])
    {
        return $this->createRequest(Message\ReceiptFetchRequest::class, $parameters);
    }

    /**
     * @link https://yookassa.ru/developers/api?lang=en#get_receipts_list
     */
    public function listReceipts(array $parameters = [])
    {
        return $this->createRequest(Message\ReceiptListRequest::class, $parameters);
    }

    /**
     * @link https://yookassa.ru/developers/api?lang=en#create_deal
     */
    public function deal(array $parameters = [])
    {
        return $this->createRequest(Message\DealRequest::class, $parameters);
    }

    /**
     * @link https://yookassa.ru/developers/api?lang=en#get_deal
     */
    public function fetchDeal(array $parameters = [])
    {
        return $this->createRequest(Message\DealFetchRequest::class, $parameters);
    }

    /**
     * @link https://yookassa.ru/developers/api?lang=en#get_deals_list
     */
    public function listDeals(array $parameters = [])
    {
        return $this->createRequest(Message\DealListRequest::class, $parameters);
    }

    /**
     * @link https://yookassa.ru/developers/api?lang=en#create_payout
     */
    public function payout(array $parameters = [])
    {
        return $this->createRequest(Message\PayoutRequest::class, $parameters);
    }

    /**
     * @link https://yookassa.ru/developers/api?lang=en#get_payout
     */
    public function fetchPayout(array $parameters = [])
    {
        return $this->createRequest(Message\PayoutFetchRequest::class, $parameters);
    }

    /**
     * @link https://yookassa.ru/developers/api?lang=en#create_webhook
     */
    public function webhook(array $parameters = [])
    {
        return $this->createRequest(Message\WebhookRequest::class, $parameters);
    }

    /**
     * @link https://yookassa.ru/developers/api?lang=en#get_webhook_list
     */
    public function Listwebhooks(array $parameters = [])
    {
        return $this->createRequest(Message\WebhookListRequest::class, $parameters);
    }

    /**
     * @link https://yookassa.ru/developers/api?lang=en#delete_webhook
     */
    public function deleteWebhook(array $parameters = [])
    {
        return $this->createRequest(Message\WebhookDeleteRequest::class, $parameters);
    }

    /**
     * @link https://yookassa.ru/developers/api?lang=en#get_me
     */
    public function store(array $parameters = [])
    {
        return $this->createRequest(Message\StoreRequest::class, $parameters);
    }


    public function notification(array $parameters = [])
    {
        return $this->createRequest(Message\NotificationRequest::class, $parameters);
    }
}