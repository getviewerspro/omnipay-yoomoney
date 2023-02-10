<?php
/**
 * YooMoney
 */

namespace Omnipay\YooMoney\Request;

use Omnipay\YooMoney\Response\DealResponse;

class DealRequest extends AbstractRequest
{
    public function getType()
    {
        return $this->getParameter('type');
    }

    public function setType(string $value)
    {
        return $this->setParameter('type', $value);
    }

    public function getFeeMoment()
    {
        return $this->getParameter('fee_moment');
    }

    public function setFeeMoment(string $value)
    {
        return $this->setParameter('fee_moment', $value);
    }

    public function getMetadata()
    {
        return $this->getParameter('metadata');
    }

    public function setMetadata(array $value)
    {
        return $this->setParameter('metadata', $value);
    }

    /**
     * @inheritDoc
     */
    public function getData()
    {
        $this->validate('type', 'fee_moment');

        return array_merge(
            [
                'type' => $this->getType(),
                'fee_moment' => $this->getFeeMoment(),
            ],
            $this->getParametersIf('metadata'),
            $this->getParametersIf('description'),
        );
    }

    /**
     * @inheritDoc
     */
    protected function createResponse($data, $status)
    {
        return new DealResponse($this, $data, $status);
    }

    /**
     * @inheritDoc
     */
    public function getEndPoint()
    {
        return parent::getEndpoint() . '/deals';
    }
}
