<?php

namespace Omnipay\YooMoney\Tests\Requests;

use Omnipay\Tests\TestCase;
use Omnipay\YooMoney\Request\ReceiptFetchRequest;

/**
 * YooMoney
 */
class ReceiptFetchRequestTest extends TestCase
{
    /**
     * @var ReceiptFetchRequest
     */
    private $request;

    public function setUp(): void
    {
        $this->request = new ReceiptFetchRequest($this->getHttpClient(), $this->getHttpRequest());
    }

    public function testGetData(): void
    {
        $this->assertEquals([], $this->request->getData());
    }

    public function testGetEndPoint(): void
    {
        $this->request->setReceiptId('testing');

        $this->assertSame($this->request->getEndPoint(), 'https://api.yookassa.ru/v3/receipts/testing');
    }
}
