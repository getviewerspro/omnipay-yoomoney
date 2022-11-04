<?php

namespace Omnipay\YooMoney\Tests\Requests;

use Omnipay\Tests\TestCase;
use Omnipay\YooMoney\Response\DealListResponse;

class DealListResponseTest extends TestCase
{
    public function testSuccessResponse()
    {
        $httpResponse = $this->getMockHttpResponse('DealFetchSuccess.txt');
        $data = json_decode($httpResponse->getBody()->getContents(), true);

        $response = new DealListResponse($this->getMockRequest(), $data, $httpResponse->getStatusCode());

        $this->assertTrue($response->isSuccessful());
        $this->assertSame($response->getCode(), '');
    }
}