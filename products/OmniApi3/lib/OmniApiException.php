<?php

class OmniApiException extends Exception {

	/**
	 *
	 * @var array
	 */
	protected $requestInfo;

	/**
	 *
	 * @var string 
	 */
	protected $request;
	
	/**
	 *
	 * @var string 
	 */
	protected $requestError;
	
	/**
	 *
	 * @var integer 
	 */
	protected $requestErrorCode;

	/**
	 *
	 * @var string 
	 */
	protected $response;

	public function __construct(
			$message, 
			$requestError = null,
			$requestErrorCode = null,
			$requestInfo = null,
			$request = null, 
			$response = null
	){
		if ($requestInfo) 
		{
			$this->requestInfo = $requestInfo;
			$this->requestError = $requestError;
			$this->requestErrorCode = $requestErrorCode;
			$this->request = $request;
			$this->response = $response;
		}
		parent::__construct($message);
	}

	public function getRequestInfo() {
		return $this->requestInfo;
	}

	public function getRequestError() {
		return $this->requestError;
	}

	public function getRequestErrorCode() {
		return $this->requestErrorCode;
	}

	public function getRequest() {
		return $this->request;
	}

	public function getResponse() {
		return $this->response;
	}

}