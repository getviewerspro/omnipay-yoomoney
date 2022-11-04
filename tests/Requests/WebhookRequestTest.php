<?php

namespace Omnipay\YooMoney\Tests\Requests;

use Omnipay\Tests\TestCase;
use Omnipay\YooMoney\Request\WebhookRequest;

/**
 * YooMoney
 */
class WebhookRequestTest extends TestCase
{
    /**
     * @var WebhookRequest
     */
    private $request;

    public function setUp(): void
    {
        $this->request = new WebhookRequest($this->getHttpClient(), $this->getHttpRequest());
    }

    public function testGettersAndSetters(): void
    {
        $this->request->setEvent('payment.waiting_for_capture');
        $this->assertSame($this->request->getEvent(), 'payment.waiting_for_capture');
        $this->request->setUrl('https://www.example.com/notification_url');
        $this->assertSame($this->request->getUrl(), 'https://www.example.com/notification_url');
    }

    public function testGetData(): void
    {
        $this->request->setEvent('payment.waiting_for_capture');
        $this->request->setUrl('https://www.example.com/notification_url');

        $this->assertSame($this->request->getData(), [
            'event' => 'payment.waiting_for_capture',
            'url' => 'https://www.example.com/notification_url',
        ]);
    }

    public function testGetEndPoint(): void
    {
        $this->assertSame($this->request->getEndPoint(), 'https://api.yookassa.ru/v3/webhooks');
    }
}
