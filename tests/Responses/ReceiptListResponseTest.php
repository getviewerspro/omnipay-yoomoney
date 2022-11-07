<?php

namespace Omnipay\YooMoney\Tests\Responses;

use Omnipay\Tests\TestCase;
use Omnipay\YooMoney\Response\ReceiptListResponse;

/**
 * YooMoney Response
 */
class ReceiptListResponseTest extends TestCase
{
    public function testSuccessResponse()
    {
        $httpResponse = $this->getMockHttpResponse('ReceiptFetchSuccess.txt');
        $data = json_decode($httpResponse->getBody()->getContents(), true);

        $response = new ReceiptListResponse($this->getMockRequest(), $data, $httpResponse->getStatusCode());

        $this->assertTrue($response->isSuccessful());
        $this->assertSame($response->getCode(), '');
    }
}
