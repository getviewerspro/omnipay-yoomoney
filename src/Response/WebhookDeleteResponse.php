<?php

namespace Omnipay\YooMoney\Response;

use Omnipay\Common\Message\RequestInterface;

/**
 * YooMoney Response
 */
class WebhookDeleteResponse extends AbstractResponse
{
    public function __construct(RequestInterface $request, $data, $status)
    {
        $this->request = $request;
        $this->data = $data;
        $this->status = $status;
    }
}
