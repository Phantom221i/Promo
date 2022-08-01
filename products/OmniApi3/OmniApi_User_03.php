<?php

/**
 * Версия: 3.34
 */

require_once dirname(__FILE__) . '/lib/OmniApiCore.php';
require_once dirname(__FILE__) . '/lib/OmniApiVisualizer.php';

class OmniApi_User_03 extends OmniApiCore
{
    private $clickIdName = 'pbid';
    private $debugMode = false;

    private function __construct($debugMode)
    {
        if($debugMode)
        {
            $this->debugMode = $debugMode;
        }
        return $this;
    }

    /**
     * @return string
     */
    protected function getModuleName()
    {
        return 'User';
    }

    /**
     * Версия модуля может отличаться от версии библиотеки.
     * Изменения библиотеки не всегда затрагивают модуль сервера.
     * @return string
     */
    protected function getModuleVersion()
    {
        return '3.0';
    }

    /**
     * @return OmniApi_User_03
     */
    public static function init($debugMode = false)
    {
        return new self($debugMode);
    }

    public function setClickIdName($clickIdName)
    {
        $this->clickIdName = $clickIdName;
        return $this;
    }

    /**
     * @return OmniApiCategoryList
     */
    public function initGetCategoryList()
    {
        require_once dirname(__FILE__) . '/entity/OmniApiCategoryList.php';
        return new OmniApiCategoryList();
    }

    /**
     * @return OmniApiOfferList
     */
    public function initGetOfferList()
    {
        require_once dirname(__FILE__) . '/entity/OmniApiOfferList.php';
        return new OmniApiOfferList();
    }

    /**
     * @return OmniApiOrderList
     */
    public function initGetOrderList()
    {
        require_once dirname(__FILE__) . '/entity/OmniApiOrderList.php';
        return new OmniApiOrderList();
    }

    /**
     * @return OmniApiBalance
     */
    public function initGetBalance()
    {
        require_once dirname(__FILE__) . '/entity/OmniApiBalance.php';
        return new OmniApiBalance();
    }

    /**
     * @return OmniApiCreateOrder
     */
    public function initCreateOrder()
    {
        require_once dirname(__FILE__) . '/entity/OmniApiCreateOrder.php';
        return new OmniApiCreateOrder($this->clickIdName);
    }

    /**
     * @param OmniApiEntity $entity
     * @return array
     */
    public function request(OmniApiEntity $entity)
    {
        if($entity instanceof OmniApiCreateOrder)
        {
            if(!$this->debugMode)
            {
                $this->debugMode = ($entity->getFio() == 'debug');
            }
        }

        $action = $entity->getAction();
        $data = $entity->getData();

        try
        {
            $result = $this->makeRequest($action, $data, $this->debugMode);
            return $result;
        }
        catch (OmniApiException $e)
        {
            if(
                !empty($e->getRequestErrorCode()) ||
                !empty($e->getRequestError())
            ){
                return $this->makeErrorResponse(array(
                    901 => 'cURL error: ' . $e->getRequestError() . ', code: ' . $e->getRequestErrorCode()
                ));
            }

            $info = $e->getRequestInfo();

            switch($info['http_code'])
            {
                case '401':
                    return $this->makeErrorResponse(array(902 => 'Invalid API token'));
                    break;
                case '403':
                    return $this->makeErrorResponse(array(903 => 'API request sign mismatch.'));
                    break;
            }

            return $this->makeErrorResponse(array(904 => $e->getMessage()));
        }
        catch (Exception $e)
        {
            return $this->makeErrorResponse(array(905 => $e->getMessage()));
        }
    }

    /**
     * @param $response
     */
    public function visualize($response)
    {
        $debugMode = !empty($this->debugMode);

        if($debugMode)
        {
            OmniApiVisualizer::debug('Тело ответа: ' . json_encode($response));
        }

        if($response['success'])
        {
            if(!empty($response['result']['id']))
            {
                OmniApiVisualizer::success(
                    OmniApiVisualizer::$orderSuccessMessage
                );
            }
            else
            {
                OmniApiVisualizer::success(
                    OmniApiVisualizer::$defaultSuccessMessage
                );
            }
        }
        else
        {
            foreach ($response['error'] as $code => $message)
            {
                if(!empty(OmniApiVisualizer::$errorMessages[$code]))
                {
                    OmniApiVisualizer::error(
                        OmniApiVisualizer::$errorMessages[$code]
                    );
                }
                else
                {
                    OmniApiVisualizer::error(
                        OmniApiVisualizer::$defaultErrorMessage . $code
                    );
                }
            }
        }
    }

    /**
     * @param $error
     * @return array
     */
    private function makeErrorResponse($error)
    {
        if(!is_array($error))
        {
            $error = [$error];
        }

        return array(
            'success' => false,
            'error' => $error
        );
    }


}
