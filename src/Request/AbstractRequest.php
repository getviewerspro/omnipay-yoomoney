<?php

namespace Omnipay\YooMoney\Request;

use Exception;
use Omnipay\Common\Exception\InvalidResponseException;

/**
 * YooMoney Abstract Request
 */
abstract class AbstractRequest extends \Omnipay\Common\Message\AbstractRequest
{
    /**
     * YooMoney API Version
     */
    const API_VERSION = '3';

    /**
     * Check whether token is required
     *
     * @var boolean
     */
    protected $requireToken = false;

    /**
     * Method required to make the client request
     *
     * @var string
     */
    protected $httpMethod = 'POST';

    /**
     * Endpoint Url to YooMoney
     *
     * @var string
     */
    protected $endpoint = 'https://api.yookassa.ru';

    public function getShopId()
    {
        return $this->getParameter('shopId');
    }

    public function setShopId($value)
    {
        return $this->setParameter('shopId', $value);
    }

    public function getSecret()
    {
        return $this->getParameter('secret');
    }

    public function setSecret($value)
    {
        return $this->setParameter('secret', $value);
    }

    public function getToken()
    {
        return $this->getParameter('token');
    }

    public function setToken($value)
    {
        return $this->setParameter('token', $value);
    }

    public function getLocale()
    {
        return $this->getParameter('locale');
    }

    public function setLocale($value)
    {
        return $this->setParameter('locale', $value);
    }

    protected function getEndpoint()
    {
        return $this->endpoint . '/v' . self::API_VERSION;
    }

    protected function idempotenceKey()
    {
        // Default key is uuidv4

        $data = openssl_random_pseudo_bytes(16);
        return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
    }

    public function sendData($data)
    {
        if ($this->httpMethod == 'GET') {
            $requestUrl = $this->getEndpoint() . '?' . http_build_query($data);
            $body = null;
        } else {
            $body = json_encode($data, 0 | 64);
            $requestUrl = $this->getEndpoint();
        }
    
        $headers = [
            'Accept' => 'application/json',
            'Content-type' => 'application/json',
            'Idempotence-Key' => $this->idempotenceKey(),
        ];

        if ($this->getToken() !== null) {
            $headers['Authorization'] = 'Bearer ' . base64_encode($this->getToken());
        } else {
            if ($this->requireToken) {
                throw new InvalidResponseException('Bearer Token Required');
            }
            $headers['Authorization'] = 'Basic ' . base64_encode($this->getShopId() . ':' . $this->getSecret());
        }

        try {
            $httpResponse = $this->httpClient->request(
                $this->httpMethod, $requestUrl, $headers, $body
            );

            // Empty response body should be parsed also as and empty array
            $body = (string) $httpResponse->getBody()->getContents();
            $jsonToArrayResponse = !empty($body) ? json_decode($body, true) : [];
            return $this->response = $this->createResponse($jsonToArrayResponse, $httpResponse->getStatusCode());
        } catch (Exception $e) {
            throw new InvalidResponseException(
                'Error communicating with payment gateway: ' . $e->getMessage(),
                $e->getCode()
            );
        }
    }

    protected function createResponse($data, $status)
    {
        throw new InvalidResponseException('No Response handler found');
    }

    public function getParametersIf($key)
    {
        return $this->parameters->has($key) ? [$key => $this->parameters->get($key)] : [];
    }

    public function getParametersIfAlternative($key, $nameAlt)
    {
        return $this->parameters->has($key) ? [$nameAlt => $this->parameters->get($key)] : [];
    }
}
