<?php

namespace Omnipay\YooMoney\Tests\Responses;

use Omnipay\Tests\TestCase;
use Omnipay\YooMoney\Response\WebhookDeleteResponse;

/**
 * YooMoney Response
 */
class WebhookDeleteResponseTest extends TestCase
{
    public function testSuccessResponse()
    {
        $httpResponse = $this->getMockHttpResponse('WebhookDeleteSuccess.txt');
        $data = json_decode($httpResponse->getBody()->getContents(), true);

        $response = new WebhookDeleteResponse($this->getMockRequest(), $data, $httpResponse->getStatusCode());

        $this->assertTrue($response->isSuccessful());
        $this->assertSame($response->getCode(), '');
    }
}
