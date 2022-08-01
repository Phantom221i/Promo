<?php

require_once dirname(__FILE__) . '/OmniApiEntity.php';

class OmniApiOrderList extends OmniApiEntity
{
    private $order_id;
    private $date_from;
    private $date_to;

    /**
     * @param mixed $order_id
     */
    public function setOrderId($orderId)
    {
        $this->order_id = $orderId;
        return $this;
    }

    /**
     * @param mixed $order_id
     */
    public function getOrderId()
    {
        return $this->order_id;
    }

    /**
     * @return mixed
     */
    public function getDateFrom()
    {
        return $this->date_from;
    }

    /**
     * @param mixed $dateFrom
     */
    public function setDateFrom($dateFrom)
    {
        $this->date_from = $dateFrom;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDateTo()
    {
        return $this->date_to;
    }

    /**
     * @param mixed $dateTo
     */
    public function setDateTo($dateTo)
    {
        $this->date_to = $dateTo;
        return $this;
    }

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
        return 'getOrderList';
    }
}