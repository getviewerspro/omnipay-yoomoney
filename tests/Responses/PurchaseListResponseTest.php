<?php

namespace Omnipay\YooMoney\Tests\Responses;

use Omnipay\Tests\TestCase;
use Omnipay\YooMoney\Response\PurchaseListResponse;

/**
 * YooMoney Response
 */
class PurchaseListResponseTest extends TestCase
{
    public function testSuccessResponse()
    {
        $httpResponse = $this->getMockHttpResponse('PurchaseListSuccess.txt');
        $data = json_decode($httpResponse->getBody()->getContents(), true);

        $response = new PurchaseListResponse($this->getMockRequest(), $data, $httpResponse->getStatusCode());

        $this->assertTrue($response->isSuccessful());
        $this->assertSame($response->getCode(), '');
    }
}
