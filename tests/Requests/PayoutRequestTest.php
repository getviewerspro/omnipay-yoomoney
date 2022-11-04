<?php

namespace Omnipay\Test\YooMoney\Request;

use Omnipay\Tests\TestCase;
use Omnipay\YooMoney\Request\PayoutRequest;

/**
 * YooMoney
 */
class PayoutRequestTest extends TestCase
{
    /**
     * @var PayoutRequest
     */
    private $request;

    public function setUp(): void
    {
        $this->request = new PayoutRequest($this->getHttpClient(), $this->getHttpRequest());
    }

    public function testGettersAndSetters(): void
    {
        $this->request->setPayoutDestinationData([
            'type' => 'yoo_money',
            'account_number' => '41001614575714',
        ]);
        $this->assertSame($this->request->getPayoutDestinationData(), [
            'type' => 'yoo_money',
            'account_number' => '41001614575714',
        ]);
    
        $this->request->setPayoutDestinationData([
            'type' => 'bank_card',
            'card' => ['number' => '41001614575714'],
        ]);
        $this->assertSame($this->request->getPayoutDestinationData(), [
            'type' => 'bank_card',
            'card' => ['number' => '41001614575714'],
        ]);

        $this->request->setPayoutToken('hoiCz_UVAdi_eKEthqhjRIJp.SC.001.202101');
        $this->assertSame($this->request->getPayoutToken(), 'hoiCz_UVAdi_eKEthqhjRIJp.SC.001.202101');

        $this->request->setDeal([
            'id' => 'dl-d68d2fe4-2abb-47e5-8112-32e28f87fb52',
        ]);
        $this->assertSame($this->request->getDeal(), [
            'id' => 'dl-d68d2fe4-2abb-47e5-8112-32e28f87fb52',
        ]);

        $this->request->setMetadata([
            'order_id' => '37',
        ]);
        $this->assertSame($this->request->getMetadata(), [
            'order_id' => '37',
        ]);
    }

    public function testGetData(): void
    {
        $this->request->setAmount('320.00');
        $this->request->setCurrency('RUB');
        $this->request->setPayoutToken('hoiCz_UVAdi_eKEthqhjRIJp.SC.001.202101');
        $this->request->setDescription('Payout under contract No. 37');

        $this->request->setPayoutDestinationData([
            'type' => 'yoo_money',
            'account_number' => '41001614575714',
        ]);

        $this->request->setDeal([
            'id' => 'dl-d68d2fe4-2abb-47e5-8112-32e28f87fb52',
        ]);

        $this->request->setMetadata([
            'order_id' => '37',
        ]);

        $this->assertSame($this->request->getData(), [
            'amount' => [
                'value' => '320.00',
                'currency' => 'RUB',
            ],
            'payout_destination_data' => [
                'type' => 'yoo_money',
                'account_number' => '41001614575714',
            ],
            'payout_token' => 'hoiCz_UVAdi_eKEthqhjRIJp.SC.001.202101',
            'description' => 'Payout under contract No. 37',
            'deal' => [
                'id' => 'dl-d68d2fe4-2abb-47e5-8112-32e28f87fb52',
            ],
            'metadata' => [
                'order_id' => '37',
            ],
        ]);

        $this->request->setPayoutDestinationData([
            'type' => 'bank_card',
            'card' => ['number' => '41001614575714'],
        ]);

        $this->assertSame($this->request->getData(), [
            'amount' => [
                'value' => '320.00',
                'currency' => 'RUB',
            ],
            'payout_destination_data' => [
                'type' => 'bank_card',
                'card' => ['number' => '41001614575714'],
            ],
            'payout_token' => 'hoiCz_UVAdi_eKEthqhjRIJp.SC.001.202101',
            'description' => 'Payout under contract No. 37',
            'deal' => [
                'id' => 'dl-d68d2fe4-2abb-47e5-8112-32e28f87fb52',
            ],
            'metadata' => [
                'order_id' => '37',
            ],
        ]);
    }

    public function testGetEndPoint(): void
    {
        $this->assertSame($this->request->getEndPoint(), 'https://api.yookassa.ru/v3/payouts');
    }
}
