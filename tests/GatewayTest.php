<?php

namespace Omnipay\YooMoney\Tests;

use Omnipay\YooMoney\Gateway;
use Omnipay\Tests\GatewayTestCase;

class GatewayTest extends GatewayTestCase
{
    /**
     * @var Gateway
     */
    protected $gateway;

    public function setUp(): void
    {
        parent::setUp();

        $this->gateway = new Gateway($this->getHttpClient(), $this->getHttpRequest());
    }

    public function testDealFetchRequest()
    {
        $this->setMockHttpResponse('DealFetchSuccess.txt');

        $response = $this->gateway->fetchDeal([
    
        ])->send();

        $this->assertTrue($response->isSuccessful());
    }

    public function testDealListRequest()
    {
        $this->setMockHttpResponse('DealListSuccess.txt');

        $response = $this->gateway->listDeals([

        ])->send();

        $this->assertTrue($response->isSuccessful());
    }

    public function testDealRequest()
    {
        $this->setMockHttpResponse('DealSuccess.txt');

        $response = $this->gateway->deal([
            'type' => '',
            'fee_moment' => '',
        ])->send();

        $this->assertTrue($response->isSuccessful());
    }

    public function testPayoutFetchRequest()
    {
        $this->setMockHttpResponse('PayoutFetchSuccess.txt');

        $response = $this->gateway->fetchPayout([

        ])->send();

        $this->assertTrue($response->isSuccessful());
    }

    public function testPayoutRequest()
    {
        $this->setMockHttpResponse('PayoutSuccess.txt');

        $response = $this->gateway->payout([
            'amount' => 0,
        ])->send();

        $this->assertTrue($response->isSuccessful());
    }

    public function testPurchaseCancelRequest()
    {
        $this->setMockHttpResponse('PurchaseCancelSuccess.txt');

        $response = $this->gateway->cancelPurchase([

        ])->send();

        $this->assertTrue($response->isSuccessful());
    }

    public function testPurchaseCaptureRequest()
    {
        $this->setMockHttpResponse('PurchaseCaptureSuccess.txt');

        $response = $this->gateway->capturePurchase([

        ])->send();

        $this->assertTrue($response->isSuccessful());
    }

    public function testPurchaseFetchRequest()
    {
        $this->setMockHttpResponse('PurchaseFetchSuccess.txt');

        $response = $this->gateway->fetchPurchase([

        ])->send();

        $this->assertTrue($response->isSuccessful());
    }

    public function testPurchaseListRequest()
    {
        $this->setMockHttpResponse('PurchaseListSuccess.txt');

        $response = $this->gateway->listPurchases([

        ])->send();

        $this->assertTrue($response->isSuccessful());
    }

    public function testPurchaseRequest()
    {
        $this->setMockHttpResponse('PurchaseSuccess.txt');

        $response = $this->gateway->purchase([
            'currency' => 'USD',
            'amount' => 0,
            'returnUrl' => 'http://localhost',
            'description' => '',
        ])->send();

        $this->assertTrue($response->isSuccessful());
    }

    public function testReceiptFetchRequest()
    {
        $this->setMockHttpResponse('ReceiptFetchSuccess.txt');

        $response = $this->gateway->fetchReceipt([

        ])->send();

        $this->assertTrue($response->isSuccessful());
    }

    public function testReceiptListRequest()
    {
        $this->setMockHttpResponse('ReceiptListSuccess.txt');

        $response = $this->gateway->listReceipts([

        ])->send();

        $this->assertTrue($response->isSuccessful());
    }

    public function testReceiptRequest()
    {
        $this->setMockHttpResponse('ReceiptSuccess.txt');

        $response = $this->gateway->listReceipts([

        ])->send();

        $this->assertTrue($response->isSuccessful());
    }

    public function testStoreRequest()
    {
        $this->setMockHttpResponse('StoreSuccess.txt');

        $response = $this->gateway->store([
            'token' => 'random',
        ])->send();

        $this->assertTrue($response->isSuccessful());
    }

    public function testWebhookDeleteRequest()
    {
        $this->setMockHttpResponse('WebhookDeleteSuccess.txt');

        $response = $this->gateway->deleteWebhook([
            'token' => 'random',
        ])->send();

        $this->assertTrue($response->isSuccessful());
    }

    public function testWebhookListRequest()
    {
        $this->setMockHttpResponse('WebhookListSuccess.txt');

        $response = $this->gateway->listWebhooks([
            'token' => 'random',
        ])->send();

        $this->assertTrue($response->isSuccessful());
    }

    public function testWebhookRequest()
    {
        $this->setMockHttpResponse('WebhookSuccess.txt');

        $response = $this->gateway->webhook([
            'token' => 'random',
            'event' => '',
            'url' => '',
        ])->send();

        $this->assertTrue($response->isSuccessful());
    }

    public function testAcceptNotification()
    {
        $_SERVER['REMOTE_ADDR'] = '185.71.76.0';

        $response = $this->gateway->acceptNotification([])->send();

        $this->assertTrue($response->isSuccessful());
    }

    public function testAcceptNotificationFail()
    {
        $_SERVER['REMOTE_ADDR'] = '77.75.156.12';

        $response = $this->gateway->acceptNotification([])->send();

        $this->assertFalse($response->isSuccessful());
    }
}
