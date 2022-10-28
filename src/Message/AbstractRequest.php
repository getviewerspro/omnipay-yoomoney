<?php
/**
 * YooMoney Abstract Request
 */

namespace Omnipay\YooMoney\Message;

abstract class AbstractRequest extends \Omnipay\Common\Message\AbstractRequest
{
    const API_VERSION = '3';

    protected $endpoint = 'https://api.yookassa.ru';

    protected function getEndpoint()
    {
        return $this->endpoint . '/v' . self::API_VERSION;
    }

    protected function getHttpMethod()
    {
        return 'POST';
    }

    public function sendData($data)
    {
        if ($this->getHttpMethod() == 'GET') {
            $requestUrl = $this->getEndpoint() . '?' . http_build_query($data);
            $body = null;
        } else {
            $body = json_encode($data, 0 | 64);
            $requestUrl = $this->getEndpoint();
        }
    
        $headers = [
            'Accept' => 'application/json',
            'Content-type' => 'application/json',
        ];

        if (true) {
            $headers['Authorization'] = 'Basic ' . base64_encode($this->shopId . ':' . $this->shopPassword);
        } else {
            $headers['Authorization'] = 'Bearer ' . base64_encode($this->token);
        }

        try {
            $httpResponse = $this->httpClient->request(
                $this->getHttpMethod(),
                $this->getEndpoint(),
                $headers,
                $body
            );

            // Empty response body should be parsed also as and empty array
            $body = (string) $httpResponse->getBody()->getContents();
            $jsonToArrayResponse = !empty($body) ? json_decode($body, true) : [];
            return $this->response = $this->createResponse($jsonToArrayResponse, $httpResponse->getStatusCode());
        } catch (\Exception $e) {
            throw new InvalidResponseException(
                'Error communicating with payment gateway: ' . $e->getMessage(),
                $e->getCode()
            );
        }
    }
}
