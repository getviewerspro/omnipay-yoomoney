<?php

namespace Omnipay\YooMoney\Tests\Requests;

use Omnipay\Tests\TestCase;
use Omnipay\YooMoney\Request\PayoutFetchRequest;

class PayoutFetchRequestTest extends TestCase
{
    /**
     * @var PayoutFetchRequest
     */
    private $request;

    public function setUp(): void
    {
        $this->request = new PayoutFetchRequest($this->getHttpClient(), $this->getHttpRequest());
    }

    public function testGettersAndSetters(): void
    {
        $this->request->setPayoutId('po-285c0ab7-0003-5000-9000-0e1166498fda');
        $this->assertSame($this->request->getPayoutId(), 'po-285c0ab7-0003-5000-9000-0e1166498fda');
    }

    public function testGetData(): void
    {
        $this->assertEquals([], $this->request->getData());
    }

    public function testGetEndPoint(): void
    {
        $this->request->setPayoutId('po-285c0ab7-0003-5000-9000-0e1166498fda');
        $this->assertSame($this->request->getEndPoint(), 'https://api.yookassa.ru/v3/payouts/po-285c0ab7-0003-5000-9000-0e1166498fda');
    }
}
