<?php


namespace NPCore\Http;


class Response
{
    /**
     * @var mixed
     */
    private $body;
    /**
     * @var int
     */
    private $statusCode;
    /**
     * @var array
     */
    private $headers;

    /**
     * Response constructor.
     * @param $body
     * @param int $statusCode
     * @param array $headers
     */
    public function __construct($body, $statusCode = 200, $headers = [])
    {
        $this->body = $body;
        $this->statusCode = $statusCode;
        $this->headers = $headers;
    }

    /**
     * @param $code
     * @return $this
     */
    public function withStatusCode($code)
    {
        $this->statusCode = $code;
        return $this;
    }

    /**
     * @param $header
     * @param $value
     * @return $this
     */
    public function withHeader($header, $value)
    {
        $this->headers[$header] = $value;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @return int
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * @return array
     */
    public function getHeaders()
    {
        return $this->headers;
    }
}