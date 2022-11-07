<?php

namespace Omnipay\YooMoney\Tests\Responses;

use Omnipay\Tests\TestCase;
use Omnipay\YooMoney\Response\PayoutResponse;

/**
 * YooMoney Response
 */
class PayoutResponseTest extends TestCase
{
    public function testSuccessResponse()
    {
        $httpResponse = $this->getMockHttpResponse('PayoutSuccess.txt');
        $data = json_decode($httpResponse->getBody()->getContents(), true);

        $response = new PayoutResponse($this->getMockRequest(), $data, $httpResponse->getStatusCode());

        $this->assertTrue($response->isSuccessful());
        $this->assertSame($response->getCode(), '');
    }
}
