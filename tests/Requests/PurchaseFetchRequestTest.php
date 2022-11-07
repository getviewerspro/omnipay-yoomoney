<?php

namespace Omnipay\YooMoney\Tests\Requests;

use Omnipay\Tests\TestCase;
use Omnipay\YooMoney\Request\PurchaseFetchRequest;

/**
 * YooMoney
 */
class PurchaseFetchRequestTest extends TestCase
{
    /**
     * @var PurchaseFetchRequest
     */
    private $request;

    public function setUp(): void
    {
        $this->request = new PurchaseFetchRequest($this->getHttpClient(), $this->getHttpRequest());
    }

    public function testGetData(): void
    {
        $this->assertEquals([], $this->request->getData());
    }

    public function testGetEndPoint(): void
    {
        $this->request->setTransactionId('testing');

        $this->assertSame($this->request->getEndPoint(), 'https://api.yookassa.ru/v3/payments/testing');
    }
}
