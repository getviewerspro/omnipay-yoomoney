<?php

namespace Omnipay\YooMoney\Tests\Responses;

use Omnipay\Tests\TestCase;
use Omnipay\YooMoney\Response\PurchaseResponse;

/**
 * YooMoney Response
 */
class PurchaseCaptureResponseTest extends TestCase
{
    public function testSuccessResponse()
    {
        $httpResponse = $this->getMockHttpResponse('PurchaseCaptureSuccess.txt');
        $data = json_decode($httpResponse->getBody()->getContents(), true);

        $response = new PurchaseResponse($this->getMockRequest(), $data, $httpResponse->getStatusCode());

        $this->assertTrue($response->isSuccessful());
        $this->assertSame($response->getCode(), '');
    }
}
