<?php

namespace Omnipay\YooMoney\Response;

use Symfony\Component\HttpFoundation\IpUtils;
use Symfony\Component\HttpFoundation\Request;
use Omnipay\YooMoney\Request\NotificationRequest;

/**
 * YooMoney Response
 */
class NotificationResponse extends AbstractResponse
{
    /**
     * @var CompletePurchaseRequest|RequestInterface
     */

    public function __construct(NotificationRequest $request, $data)
    {
        $this->data = request()->all();
    }

    public function isSuccessful()
    {
        $ipAddress = Request::createFromGlobals()->getClientIp() ?? '';
        return IpUtils::checkIp($ipAddress, [
            '185.71.76.0/27',
            '185.71.77.0/27',
            '77.75.153.0/25',
            '77.75.154.128/25',
            '77.75.156.11',
            '77.75.156.35',

            '2a02:5180:0:1509::/64',
            '2a02:5180:0:2655::/64',
            '2a02:5180:0:1533::/64',
            '2a02:5180:0:2669::/64',
        ]);
    }

    public function getMessage()
    {
        return $this->data;
    }

    public function getTransactionId()
    {
        return $this->data['object']['metadata']['transactionId'];
    }

    public function getAmount()
    {
        return (string)$this->data['object']['amount']['value'];
    }

    public function getCurrency()
    {
        return (string)$this->data['object']['amount']['currency'];
    }

    public function getMoney()
    {
        return (string)$this->data['object']['amount']['value'] . ' ' . (string)$this->data['object']['amount']['currency'];
    }

    public function getTransactionReference()
    {
        return $this->data['object']['id'];
    }
}
