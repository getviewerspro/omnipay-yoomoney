<?php

namespace Omnipay\YooMoney\Tests\Requests;

use Omnipay\Tests\TestCase;
use Omnipay\YooMoney\Request\DealFetchRequest;

class DealFetchRequestTest extends TestCase
{
    /**
     * @var DealFetchRequest
     */
    private $request;

    public function setUp(): void
    {
        $this->request = new DealFetchRequest($this->getHttpClient(), $this->getHttpRequest());
    }

    public function testGetData()
    {
        $this->request->setDealId('dl-285e5ee7-0022-5000-8000-01516a44b147');
        $this->assertSame($this->request->getDealId(), 'dl-285e5ee7-0022-5000-8000-01516a44b147');

        $this->assertEquals([], $this->request->getData());
    }
}