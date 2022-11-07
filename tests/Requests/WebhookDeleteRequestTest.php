<?php

namespace Omnipay\YooMoney\Tests\Requests;

use Omnipay\Tests\TestCase;
use Omnipay\YooMoney\Request\WebhookDeleteRequest;

/**
 * YooMoney
 */
class WebhookDeleteRequestTest extends TestCase
{
    /**
     * @var WebhookDeleteRequest
     */
    private $request;

    public function setUp(): void
    {
        $this->request = new WebhookDeleteRequest($this->getHttpClient(), $this->getHttpRequest());
    }

    public function testGettersAndSetters(): void
    {
        $this->request->setWebhookId('testing');
        $this->assertSame($this->request->getWebhookId(), 'testing');
    }

    public function testGetData(): void
    {
        $this->assertEquals([], $this->request->getData());
    }

    public function testGetEndPoint(): void
    {
        $this->request->setWebhookId('testing');

        $this->assertSame($this->request->getEndPoint(), 'https://api.yookassa.ru/v3/webhooks/testing');
    }
}
