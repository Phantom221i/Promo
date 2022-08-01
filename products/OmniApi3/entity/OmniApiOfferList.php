<?php

require_once dirname(__FILE__) . '/OmniApiEntity.php';

class OmniApiOfferList extends OmniApiEntity
{
    private $product_id;
    private $category_id;
    private $pay_action;
    private $price;
    private $reward;
    private $country;

    /**
     * @return mixed
     */
    public function getProductId()
    {
        return $this->product_id;
    }

    /**
     * @param mixed $productId
     */
    public function setProductId($productId)
    {
        $this->product_id = $productId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCategoryId()
    {
        return $this->category_id;
    }

    /**
     * @param mixed $category
     */
    public function setCategoryId($categoryId)
    {
        $this->category_id = $categoryId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPayAction()
    {
        return $this->pay_action;
    }

    /**
     * @param mixed $payAction
     */
    public function setPayAction($payAction)
    {
        $this->pay_action = $payAction;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getReward()
    {
        return $this->reward;
    }

    /**
     * @param mixed $reward
     */
    public function setReward($reward)
    {
        $this->reward = $reward;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param mixed $country
     */
    public function setCountry($country)
    {
        $this->country = $country;
        return $this;
    }

    public function getData()
    {
        return get_object_vars($this);
    }

    /**
     * @return string
     */
    public function getAction()
    {
        return 'getOfferList';
    }
}