<?php

namespace Omnipay\YooMoney\Request;

use Omnipay\YooMoney\Response\NotificationResponse;

/**
 * YooMoney
 */
class NotificationRequest extends AbstractRequest
{
    public function sendData($data)
    {
        return new NotificationResponse($this, $data);
    }

    public function getData()
    {
        $data = $this->httpRequest->request->all();

        return $data;
    }
}
