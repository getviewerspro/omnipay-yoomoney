<?php

namespace Omnipay\YooMoney\Response;

use Omnipay\Common\Message\AbstractResponse as OmnipayAbstractResponse;

/**
 * YooMoney Abstract Response
 */
class AbstractResponse extends OmnipayAbstractResponse
{
    public $status = 200;

    public function isSuccessful()
    {
        return $this->status == 200;
    }
    
    public function isRedirect()
    {
        return !empty($this->getRedirectUrl());
    }

    public function getCode()
    {
        return $this->data['code'] ?? '';
    }

    public function getMessage()
    {
        return $this->data['description'] ?? '';
    }
}
