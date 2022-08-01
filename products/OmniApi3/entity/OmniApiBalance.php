<?php

require_once dirname(__FILE__) . '/OmniApiEntity.php';

class OmniApiBalance extends OmniApiEntity
{
    /**
     * @return array
     */
    public function getData()
    {
        return get_object_vars($this);
    }

    /**
     * @return string
     */
    public function getAction()
    {
        return 'getBalance';
    }
}