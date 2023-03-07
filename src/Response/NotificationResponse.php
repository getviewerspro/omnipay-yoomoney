<?php

namespace Omnipay\YooMoney\Response;

use Symfony\Component\HttpFoundation\IpUtils;
use Symfony\Component\HttpFoundation\Request;

/**
 * YooMoney Response
 */
class NotificationResponse extends AbstractResponse
{
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
}
