<?php

namespace Omnipay\YooMoney\Tests\Requests;

use Omnipay\Tests\TestCase;
use Omnipay\YooMoney\Request\DealRequest;

class DealRequestTest extends TestCase
{
    /**
     * @var DealRequest
     */
    private $request;

    public function setUp(): void
    {
        $this->request = new DealRequest($this->getHttpClient(), $this->getHttpRequest());
    }

    public function testGetData()
    {
        $this->request->setType('safe_deal');
        $this->assertSame($this->request->getType(), 'safe_deal');

        $this->request->setFeeMoment('payment_succeeded');
        $this->assertSame($this->request->getFeeMoment(), 'payment_succeeded');

        $this->request->setMetadata(['order_id' => 37]);
        $this->assertSame($this->request->getMetadata(), ['order_id' => 37]);

        $this->request->setDescription('description');
        $this->assertSame($this->request->getDescription(), 'description');

        $this->assertEquals([
            'type' => 'safe_deal',
            'fee_moment' => 'payment_succeeded',
            'metadata' => [
                'order_id' => 37,
            ],
            'description' => 'description',
        ], $this->request->getData());
    }
}