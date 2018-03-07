<?php
namespace OddsClick\Core;


class Request
{
    const GET = 'GET';
    const POST = 'POST';

    private $domain;
    private $path;
    private $method;
    private $params;
    private $cookies;

    public function __construct()
    {
        $this->domain = $_SERVER['HTTP_HOST'];
        $this->path = $_SERVER['REQUEST_URI'];
        $this->method = $_SERVER['REQUEST_METHOD'];
        $this->params = new FilteredMap(array_merge($_POST, $_GET)
        );
        $this->cookies = new FilteredMap($_COOKIE);
    }

    /**
     * Gettting  url
     * @return string
     */
    public function getUrl(): string {
        return $this->domain . $this->path;
    }

    /**
     * Gettting domain
     * @return string
     */
    public function getDomain(): string {
        return $this->domain;
    }

    /**
     * Getting method
     * @return string
     */
    public function getMethod(): string {
        return $this->method;
    }

    /**
     * Check if request is post
     * @return bool
     */
    public function isPost(): bool {
        return $this->method === self::POST;
    }

    /**
     * Check if request is get
     * @return bool
     */
    public function isGet(): bool
    {
        return $this->method === self::GET;
    }

    /**
     * @return FilteredMap
     */
    public function getParams(): FilteredMap
    {

        return $this->params;
    }

    /**
     * @return FilteredMap
     */
    public function getCookies(): FilteredMap
    {
        return $this->cookies;
    }
}