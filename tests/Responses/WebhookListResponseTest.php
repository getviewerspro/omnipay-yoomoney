<?php

namespace Omnipay\YooMoney\Tests\Responses;

use Omnipay\Tests\TestCase;
use Omnipay\YooMoney\Response\WebhookListResponse;

/**
 * YooMoney Response
 */
class WebhookListResponseTest extends TestCase
{
    public function testSuccessResponse()
    {
        $httpResponse = $this->getMockHttpResponse('WebhookListSuccess.txt');
        $data = json_decode($httpResponse->getBody()->getContents(), true);

        $response = new WebhookListResponse($this->getMockRequest(), $data, $httpResponse->getStatusCode());

        $this->assertTrue($response->isSuccessful());
        $this->assertSame($response->getCode(), '');
    }
}
