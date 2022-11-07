<?php

namespace Omnipay\YooMoney\Tests\Requests;

use Omnipay\Tests\TestCase;
use Omnipay\YooMoney\Request\ReceiptRequest;

/**
 * YooMoney
 */
class ReceiptRequestTest extends TestCase
{
    /**
     * @var ReceiptRequest
     */
    private $request;

    private $testData = [
        'type' => 'payment',
        'payment_id' => '24b94598-000f-5000-9000-1b68e7b15f3f',
        'refund_id' => '24b94598-000f-5000-9000-1b68e7b15f3f',
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
        'send' => false,
        'tax_system_code' => 1,
        'additional_user_props' => [
            'name' => 'mdlp3108805',
            'value' => 'ps45102&dnAБV492&&781&dd181110&sid71752852194630&',
        ],
        'receipt_industry_details' => [
            [
                'federal_id' => '001',
                'document_date' => '2020-11-18',
                'document_number' => '1264',
                'value' => '123/43',
            ],
        ],
        'settlements' => [
            [
                'type' => 'cashless',
                'amount' => [
                    'value' => '2.00',
                    'currency' => 'RUB',
                ],
            ],
        ],
        'on_behalf_of' => 'testing',
    ];

    public function setUp(): void
    {
        $this->request = new ReceiptRequest($this->getHttpClient(), $this->getHttpRequest());
    }

    public function testGettersAndSetters(): void
    {
        $this->request->setType($this->testData['type']);
        $this->assertSame($this->request->getType(), $this->testData['type']);
        $this->request->setPaymentId($this->testData['payment_id']);
        $this->assertSame($this->request->getPaymentId(), $this->testData['payment_id']);
        $this->request->setRefundId($this->testData['refund_id']);
        $this->assertSame($this->request->getRefundId(), $this->testData['refund_id']);
        $this->request->setCustomer($this->testData['customer']);
        $this->assertSame($this->request->getCustomer(), $this->testData['customer']);
        $this->request->setItems($this->testData['items']);
        $this->assertSame($this->request->getItems(), $this->testData['items']);
        $this->request->setSend($this->testData['send']);
        $this->assertSame($this->request->getSend(), $this->testData['send']);
        $this->request->setTaxSystemCode($this->testData['tax_system_code']);
        $this->assertSame($this->request->getTaxSystemCode(), $this->testData['tax_system_code']);
        $this->request->setAdditionalUserProps($this->testData['additional_user_props']);
        $this->assertSame($this->request->getAdditionalUserProps(), $this->testData['additional_user_props']);
        $this->request->setReceiptIndustryDetails($this->testData['receipt_industry_details']);
        $this->assertSame($this->request->getReceiptIndustryDetails(), $this->testData['receipt_industry_details']);
        $this->request->setSettlements($this->testData['settlements']);
        $this->assertSame($this->request->getSettlements(), $this->testData['settlements']);
        $this->request->setOnBehalfOf($this->testData['on_behalf_of']);
        $this->assertSame($this->request->getOnBehalfOf(), $this->testData['on_behalf_of']);
    }

    public function testGetData(): void
    {
        $this->request->setType($this->testData['type']);
        $this->request->setPaymentId($this->testData['payment_id']);
        $this->request->setRefundId($this->testData['refund_id']);
        $this->request->setCustomer($this->testData['customer']);
        $this->request->setItems($this->testData['items']);
        $this->request->setSend($this->testData['send']);
        $this->request->setTaxSystemCode($this->testData['tax_system_code']);
        $this->request->setAdditionalUserProps($this->testData['additional_user_props']);
        $this->request->setReceiptIndustryDetails($this->testData['receipt_industry_details']);
        $this->request->setSettlements($this->testData['settlements']);
        $this->request->setOnBehalfOf($this->testData['on_behalf_of']);

        $this->assertEquals($this->testData, $this->request->getData());
    }

    public function testGetEndPoint(): void
    {
        $this->assertSame($this->request->getEndPoint(), 'https://api.yookassa.ru/v3/receipts');
    }
}
