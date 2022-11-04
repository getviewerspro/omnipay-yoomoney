<?php

namespace Omnipay\YooMoney\Response;

use Omnipay\Common\Message\RequestInterface;

/**
 * YooMoney Response
 */
class DealListResponse extends AbstractResponse
{
    public function __construct(RequestInterface $request, $data, $status)
    {
        $this->request = $request;
        $this->data = $data;
        $this->status = $status;
    }

    public function getNextCursor()
    {
        return $this->data['next_cursor'] ?? '';
    }
}
