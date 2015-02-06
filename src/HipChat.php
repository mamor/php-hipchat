<?php namespace Mamor;

use Curl\Curl;

class HipChat
{
    /**
     * @var string
     */
    protected $authToken;

    /**
     * @var Curl
     */
    protected $curl;

    /**
     * @var string
     */
    protected $endPoint = 'https://api.hipchat.com/';

    /**
     * @param string $authToken
     * @param Curl $curl
     */
    public function __construct($authToken, $curl = null)
    {
        $this->authToken = $authToken;
        $this->curl = $curl ?: new Curl();
    }

    /**
     * @param string $uri
     * @param array $data
     * @return mixed
     */
    public function get($uri, $data = [])
    {
        return $this->request('get', $uri, $data);
    }

    /**
     * @param string $uri
     * @param array $data
     * @return mixed
     */
    public function post($uri, $data = [])
    {
        return $this->request('post', $uri, $data);
    }

    /**
     * @param string $uri
     * @param array $data
     * @return mixed
     */
    public function put($uri, $data = [])
    {
        return $this->request('put', $uri, $data);
    }

    /**
     * @param string $uri
     * @param array $data
     * @return mixed
     */
    public function patch($uri, $data = [])
    {
        return $this->request('patch', $uri, $data);
    }

    /**
     * @param string $uri
     * @param array $data
     * @return mixed
     */
    public function delete($uri, $data = [])
    {
        return $this->request('delete', $uri, $data);
    }

    /**
     * @param string $uri
     * @param array $data
     * @return mixed
     */
    public function head($uri, $data = [])
    {
        return $this->request('head', $uri, $data);
    }

    /**
     * @param string $uri
     * @param array $data
     * @return mixed
     */
    public function options($uri, $data = [])
    {
        return $this->request('options', $uri, $data);
    }

    /**
     * @return Curl
     */
    public function curl()
    {
        return $this->curl;
    }

    /**
     * @param string $method
     * @param string $uri
     * @param array $data
     * @return mixed
     */
    protected function request($method, $uri, $data)
    {
        $url = $this->endPoint.ltrim($uri, '/');
        $data = array_merge(['auth_token' => $this->authToken], $data);

        return $this->curl->$method($url, $data);
    }
}
