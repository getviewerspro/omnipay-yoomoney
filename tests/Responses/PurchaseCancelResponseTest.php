<?php

namespace Omnipay\YooMoney\Tests\Responses;

use Omnipay\Tests\TestCase;
use Omnipay\YooMoney\Response\PurchaseCancelResponse;

/**
 * YooMoney Response
 */
class PurchaseCancelResponseTest extends TestCase
{
    public function testSuccessResponse()
    {
        $httpResponse = $this->getMockHttpResponse('PurchaseCancelSuccess.txt');
        $data = json_decode($httpResponse->getBody()->getContents(), true);

        $response = new PurchaseCancelResponse($this->getMockRequest(), $data, $httpResponse->getStatusCode());

        $this->assertTrue($response->isSuccessful());
        $this->assertSame($response->getCode(), '');
    }
}
