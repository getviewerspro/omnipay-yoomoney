<?php

namespace Omnipay\YooMoney\Tests\Responses;

use Omnipay\Tests\TestCase;
use Omnipay\YooMoney\Response\PurchaseResponse;

/**
 * YooMoney Response
 */
class PurchaseResponseTest extends TestCase
{
    public function testSuccessResponse()
    {
        $httpResponse = $this->getMockHttpResponse('PurchaseSuccess.txt');
        $data = json_decode($httpResponse->getBody()->getContents(), true);

        $response = new PurchaseResponse($this->getMockRequest(), $data, $httpResponse->getStatusCode());

        $this->assertTrue($response->isSuccessful());
        $this->assertSame($response->getCode(), '');
    }
}
