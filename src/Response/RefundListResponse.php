<?php

namespace Omnipay\YooMoney\Response;

use Omnipay\Common\Message\RequestInterface;

/**
 * YooMoney Response
 */
class RefundListResponse extends AbstractResponse
{
    public function __construct(RequestInterface $request, $data, $status)
    {
        $this->request = $request;
        $this->data = $data;
        $this->status = $status;
    }
}
