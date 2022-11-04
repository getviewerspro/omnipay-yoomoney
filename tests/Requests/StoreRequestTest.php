<?php

namespace Omnipay\YooMoney\Tests\Requests;

use Omnipay\Tests\TestCase;
use Omnipay\YooMoney\Request\StoreRequest;

/**
 * YooMoney
 */
class StoreRequestTest extends TestCase
{
    /**
     * @var StoreRequest
     */
    private $request;

    public function setUp(): void
    {
        $this->request = new StoreRequest($this->getHttpClient(), $this->getHttpRequest());
    }

    public function testGetData(): void
    {
        $this->assertEquals([], $this->request->getData());
    }

    public function testGetEndPoint(): void
    {
        $this->assertSame($this->request->getEndPoint(), 'https://api.yookassa.ru/v3/me');
    }
}
