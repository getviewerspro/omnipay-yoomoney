<?php

namespace Omnipay\YooMoney\Tests\Requests;

use Omnipay\Tests\TestCase;
use Omnipay\YooMoney\Request\DealListRequest;

class DealListRequestTest extends TestCase
{
    /**
     * @var DealListRequest
     */
    private $request;

    public function setUp(): void
    {
        $this->request = new DealListRequest($this->getHttpClient(), $this->getHttpRequest());
    }

    public function testGettersAndSetters(): void
    {
        $this->request->setCreatedAt('2018-07-18T10:51:18.139Z');
        $this->assertSame($this->request->getCreatedAt(), '2018-07-18T10:51:18.139Z');
    
        $this->request->setExpiresAt('2018-07-18T10:51:18.139Z');
        $this->assertSame($this->request->getExpiresAt(), '2018-07-18T10:51:18.139Z');

        $this->request->setStatus('closed');
        $this->assertSame($this->request->getStatus(), 'closed');

        $this->request->setFullTextSearch('123554642-2432FF344R');
        $this->assertSame($this->request->getFullTextSearch(), '123554642-2432FF344R');

        $this->request->setLimit(10);
        $this->assertSame($this->request->getLimit(), 10);

        $this->request->setCursor('37a5c87d-3984-51e8-a7f3-8de646d39ec15');
        $this->assertSame($this->request->getCursor(), '37a5c87d-3984-51e8-a7f3-8de646d39ec15');
    }

    public function testGetData(): void
    {
        $this->request->setCreatedAt('2018-07-18T10:51:18.139Z');
        $this->request->setExpiresAt('2018-07-18T10:51:18.139Z');
        $this->request->setStatus('closed');
        $this->request->setFullTextSearch('123554642-2432FF344R');
        $this->request->setLimit(10);
        $this->request->setCursor('37a5c87d-3984-51e8-a7f3-8de646d39ec15');

        $this->assertEquals([
            'created_at' => '2018-07-18T10:51:18.139Z',
            'expires_at' => '2018-07-18T10:51:18.139Z',
            'status' => 'closed',
            'full_text_search' => '123554642-2432FF344R',
            'limit' => 10,
            'cursor' => '37a5c87d-3984-51e8-a7f3-8de646d39ec15',
        ], $this->request->getData());
    }

    public function testGetEndPoint(): void
    {
        $this->assertSame($this->request->getEndPoint(), 'https://api.yookassa.ru/v3/deals');
    }
}
