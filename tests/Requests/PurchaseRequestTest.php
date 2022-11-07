<?php

namespace Omnipay\YooMoney\Tests\Requests;

use Omnipay\Tests\TestCase;
use Omnipay\YooMoney\Request\PurchaseRequest;

/**
 * YooMoney
 */
class PurchaseRequestTest extends TestCase
{
    /**
     * @var PurchaseFetchRequest
     */
    private $request;

    private $testData = [
        'amount' => [
            'value' => '2.00',
            'currency' => 'RUB',
        ],
        'description' => 'Payment for order No. 72 for user@yoomoney.ru',
        'confirmation' => [
            'type' => 'redirect',
            'locale' => 'ru_RU',
            'return_url' => 'http://localhost'
        ],
        'client_ip' => '127.0.0.1',
        'merchant_customer_id' => 'user@test.merchant',
        'receipt' => [
            'customer' => [
                'full_name' => 'Ivanov Ivan Ivanovich',
                'inn' => '1234567891',
                'email' => 'random@example.com',
                'phone' => '79000000000',
            ],
            'items' => [
                [
                    'description' => 'testing',
                    'amount' => [
                        'value' => '10.00',
                        'currency' => 'RUB',
                    ],
                    'vat_code' => 1,
                    'quantity' => 1,
                    'measure' => 'piece',
                    'mark_quantity' => [
                        'numerator' => 1,
                        'denominator' => 100,
                    ],
                    'payment_subject' => 'commodity',
                    'payment_mode' => 'full_payment',
                    'country_of_origin_code' => 'RU',
                    'customs_declaration_number' => '10714040/140917/0090376',
                    'excise' => '20.00',
                    'product_code' => '00 00 00 01 00 21 FA 41 00 23 05 41 00 00 00 00 00 00 00 00 00 00 00 00 00 00 00 00 12 00 AB 00',
                    'mark_code_info' => [
                        'mark_code_raw' => '010460406000590021N4N57RTCBUZTQ\u001d2403054002410161218\u001d1424010191ffd0\u001g92tIAF/YVpU4roQS3M/m4z78yFq0nc/WsSmLeX6QkF/YVWwy5IMYAeiQ91Xa2m/fFSJcOkb2N+uUUtfr4n0mOX0Q==',
                        'unknown' => '1',
                        'ean_8' => '',
                        'ean_13' => '',
                        'itf_14' => '',
                        'gs_10' => '',
                        'gs_1m' => '',
                        'short' => '',
                        'fur' => '',
                        'egais_20' => '',
                        'egais_30' => '',
                    ],
                    'mark_mode' => '0',
                    'payment_subject_industry_details' => [
                        'federal_id' => '001',
                        'document_date' => '2020-11-18',
                        'document_number' => '1264',
                        'value' => '123/43',
                    ],
                ],
            ],
            'tax_system_code' => 1,
            'receipt_industry_details' => [
                [
                    'federal_id' => '001',
                    'document_date' => '2020-11-18',
                    'document_number' => '1264',
                    'value' => '123/43',
                ],
            ],
            'receipt_operational_details' => [
                'operation_id' => '0',
                'value' => '1272',
                'created_at' => '2020-07-03T11:52:31.827Z',
            ],
        ],
        'recipient' => [
            'dateway_id' => 456,
        ],
        'payment_token' => '+u7PDjMTkf08NtD66P6+eYWa2yjU3gsSIhOOO+OWsOg=',
        'payment_method_id' => '1da5c87d-0984-50e8-a7f3-8de646dd9ec9',
        'payment_method_data' => [
            'type' => 'alfabank',
            'login' => 'example',
        ],
        'save_payment_method' => false,
        'capture' => false,
        'metadata' => [
            'customer_id' => 15,
        ],
        'airline' => [
            'ticket_number' => '5554916004417',
            'booking_reference' => 'IIIKRV',
            'passengers' => [
                [
                    'first_name' => 'SERGEI',
                    'last_name' => 'IVANOV',
                ],
            ],
            'legs' => [
                [
                    'departure_airport' => 'LED',
                    'destination_airport' => 'AMS',
                    'departure_date' => '2018-06-20',
                    'carrier_code' => 'SU',
                ],
            ],
        ],
        'deal' => [
            'settlements' => [
                'value' => '10.00',
                'currency' => 'RUB',
            ],
        ],
    ];

    public function setUp(): void
    {
        $this->request = new PurchaseRequest($this->getHttpClient(), $this->getHttpRequest());
    }

    public function testGettersAndSetters(): void
    {
        $this->request->setAmount($this->testData['amount']['value']);
        $this->assertSame($this->testData['amount']['value'], $this->request->getAmount());
        $this->request->setCurrency($this->testData['amount']['currency']);
        $this->assertSame($this->testData['amount']['currency'], $this->request->getCurrency());
        $this->request->setDescription($this->testData['description']);
        $this->assertSame($this->testData['description'], $this->request->getDescription());
        $this->request->setReceipt($this->testData['receipt']);
        $this->assertSame($this->testData['receipt'], $this->request->getReceipt());
        $this->request->setRecipient($this->testData['recipient']);
        $this->assertSame($this->testData['recipient'], $this->request->getRecipient());
        $this->request->setPaymentToken($this->testData['payment_token']);
        $this->assertSame($this->testData['payment_token'], $this->request->getPaymentToken());
        $this->request->setPaymentMethodId($this->testData['payment_method_id']);
        $this->assertSame($this->testData['payment_method_id'], $this->request->getPaymentMethodId());
        $this->request->setPaymentMethodData($this->testData['payment_method_data']);
        $this->assertSame($this->testData['payment_method_data'], $this->request->getPaymentMethodData());
        $this->request->setSavePaymentMethod($this->testData['save_payment_method']);
        $this->assertSame($this->testData['save_payment_method'], $this->request->getSavePaymentMethod());
        $this->request->setCapture($this->testData['capture']);
        $this->assertSame($this->testData['capture'], $this->request->getCapture());
        $this->request->setClientIp($this->testData['client_ip']);
        $this->assertSame($this->testData['client_ip'], $this->request->getClientIp());
        $this->request->setMetadata($this->testData['metadata']);
        $this->assertSame($this->testData['metadata'], $this->request->getMetadata());
        $this->request->setAirline($this->testData['airline']);
        $this->assertSame($this->testData['airline'], $this->request->getAirline());
        $this->request->setDeal($this->testData['deal']);
        $this->assertSame($this->testData['deal'], $this->request->getDeal());
        $this->request->setCustomerId($this->testData['merchant_customer_id']);
        $this->assertSame($this->testData['merchant_customer_id'], $this->request->getCustomerId());
    }

    public function testGetData(): void
    {
        $this->request->setAmount($this->testData['amount']['value']);
        $this->request->setCurrency($this->testData['amount']['currency']);
        $this->request->setDescription($this->testData['description']);
        $this->request->setReceipt($this->testData['receipt']);
        $this->request->setRecipient($this->testData['recipient']);
        $this->request->setPaymentToken($this->testData['payment_token']);
        $this->request->setPaymentMethodId($this->testData['payment_method_id']);
        $this->request->setPaymentMethodData($this->testData['payment_method_data']);
        $this->request->setSavePaymentMethod($this->testData['save_payment_method']);
        $this->request->setCapture($this->testData['capture']);
        $this->request->setClientIp($this->testData['client_ip']);
        $this->request->setMetadata($this->testData['metadata']);
        $this->request->setAirline($this->testData['airline']);
        $this->request->setDeal($this->testData['deal']);
        $this->request->setCustomerId($this->testData['merchant_customer_id']);

        // Set Return url
        $this->request->setReturnUrl('http://localhost');
        $this->request->setLocale('ru_RU');

        $this->assertSame($this->request->getData(), $this->testData);
    }

    public function testGetEndPoint(): void
    {
        $this->assertSame($this->request->getEndPoint(), 'https://api.yookassa.ru/v3/payments');
    }
}
