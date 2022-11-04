<?php

namespace Omnipay\YooMoney\Tests\Requests;

use Omnipay\Tests\TestCase;
use Omnipay\YooMoney\Response\DealFetchResponse;

class DealFetchResponseTest extends TestCase
{
    public function testSuccessResponse()
    {
        $httpResponse = $this->getMockHttpResponse('DealFetchSuccess.txt');
        $data = json_decode($httpResponse->getBody()->getContents(), true);

        $response = new DealFetchResponse($this->getMockRequest(), $data, $httpResponse->getStatusCode());

        $this->assertTrue($response->isSuccessful());
        $this->assertSame($response->getCode(), '');
    }
}