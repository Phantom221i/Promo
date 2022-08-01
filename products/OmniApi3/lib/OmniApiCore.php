<?php

require_once dirname(__FILE__) . '/OmniApiCurl.php';

require_once dirname(__FILE__) . '/OmniApiException.php';

abstract class OmniApiCore
{

    /**
     *
     * @var OmniApiCurl
     */
    protected $curl;

    /**
     *
     * @var string
     */
    protected $token;

    /**
     *
     * @var string
     */
    protected $secret;

    /**
     *
     * @var string
     */
    protected $url = array();

    /**
     *
     * @var string
     */
    protected $baseUrl = 'http://api.omnicpa.com/';

    /**
     *
     * @var string
     */
    abstract protected function getModuleName();

    /**
     *
     * @var string
     */
    abstract protected function getModuleVersion();

    /**
     *
     * @param string $token
     * @return \OmniApi
     */
    public function setToken($token)
    {
        $this->token = $token;
        return $this;
    }

    /**
     *
     * @param string $secret
     * @return \OmniApi
     */
    public function setSecret($secret)
    {
        $this->secret = $secret;
        return $this;
    }

    public function setBaseUrl($baseUrl)
    {
        $this->baseUrl = $baseUrl;
        return $this;
    }

    /**
     *
     * @return string
     * @throws OmniApiException
     */
    protected function getToken()
    {
        if (!$this->token) {
            throw new OmniApiException("API token isn`t set.");
        }
        return $this->token;
    }

    /**
     *
     * @return string
     * @throws OmniApiException
     */
    protected function getSecret()
    {
        if (!$this->secret) {
            throw new OmniApiException("API secret isn`t set.");
        }
        return $this->secret;
    }

    /**
     *
     * @return OmniApiCurl
     */
    protected function getCurl()
    {
        if (!$this->curl) {
            $this->curl = new OmniApiCurl();
            $this->curl
                ->setOption(CURLOPT_POST, true)
                ->setOption(CURLOPT_RETURNTRANSFER, true);
        }
        return $this->curl;
    }

    /**
     *
     * @param array $data
     * @return string
     * @throws OmniApiException
     */
    protected function makeSign($data)
    {
        return sha1(json_encode(array($this->getSecret(), $data)));
    }

    /**
     *
     * @return array
     * @throws OmniApiException
     */
    public function receiveRequest()
    {
        if (empty($_POST['request'])) {
            throw new OmniApiException("Empty request.");
        }
        $request = json_decode($_POST['request'], true);
        if (!$request) {
            throw new OmniApiException("Request decoding fail.");
        }
        if ($request['token'] != $this->getToken()) {
            throw new OmniApiException("Request token mismatch.");
        }
        if ($request['dataSign'] != $this->makeSign($request['data'])) {
            throw new OmniApiException("Request sign mismatch.");
        }
        return $request['data'];
    }

    /**
     *
     * @param string $action
     * @param array $data
     * @return array
     * @throws OmniApiException
     */
    protected function makeRequest($action, $data, $debug = false)
    {
        $request = json_encode(array(
            'token' => $this->getToken(),
            'data' => $data,
            'dataSign' => $this->makeSign($data),
        ));

        if($debug) print('Request JSON: ' . $request . '<br/>');

        $url = $this->baseUrl . 'api/' . $this->getModuleName() . '/' . $this->getModuleVersion() . '/' . $action;
        $curl = $this->getCurl()
            ->setOption(CURLOPT_URL, $url)
            ->setOption(CURLOPT_POSTFIELDS, array(
                'request' => $request,
            ));

        $responseBody = $curl->execute();
        $requestInfo = $curl->getInfo();
        $requestError = $curl->getError();
        $requestErrorCode = $curl->getErrorCode();

        if ($requestInfo['http_code'] != 200)
        {
            throw new OmniApiException(
                "API request HTTP error, code {$requestInfo['http_code']}",
                $requestError,
                $requestErrorCode,
                $requestInfo,
                $request,
                $responseBody
            );
        }

        if($debug) print('Response JSON: ' . $responseBody . '<br/>');

        $response = json_decode($responseBody, true);

        if ($response['dataSign'] != $this->makeSign($response['data']))
        {
            throw new OmniApiException(
                "API response sign mismatch.",
                $requestError,
                $requestErrorCode,
                $requestInfo,
                $request,
                $responseBody
            );
        }
        return $response['data'];
    }

    public function responseSuccess($data, $notices = array()) {
        $data['success'] = true;
        $data['notice'] = $notices;
        $this->response($data);
    }

    public function responseError($errors, $httpCode = 200, $errorCode = false) {
        $data = array(
            'success' => false,
            'error' => $errors,
            'errorCode' => $errorCode
        );
        $this->response($data, $httpCode);
    }

    public function response($data, $httpCode = 200) {
        $response = json_encode(array(
            'data' => $data,
            'dataSign' => sha1(json_encode(array(
                $this->getSecret(),
                $data
            ))),
        ));

        http_response_code($httpCode);
        header('Content-type: application/json');
        echo $response;

        exit();
    }

}
