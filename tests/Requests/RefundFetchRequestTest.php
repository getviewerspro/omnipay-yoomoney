<?php

namespace Omnipay\YooMoney\Tests\Requests;

use Omnipay\Tests\TestCase;
use Omnipay\YooMoney\Request\RefundFetchRequest;

/**
 * YooMoney
 */
class RefundFetchRequestTest extends TestCase
{
    /**
     * @var RefundFetchRequest
     */
    private $request;

    public function setUp(): void
    {
        $this->request = new RefundFetchRequest($this->getHttpClient(), $this->getHttpRequest());
    }

    public function testGettersAndSetters(): void
    {
        $this->request->setRefundId('testing');
        $this->assertSame($this->request->getRefundId(), 'testing');
    }

    public function testGetData(): void
    {
        $this->assertEquals([], $this->request->getData());
    }

    public function testGetEndPoint(): void
    {
        $this->request->setRefundId('testing');

        $this->assertSame($this->request->getEndPoint(), 'https://api.yookassa.ru/v3/refunds/testing');
    }
}
