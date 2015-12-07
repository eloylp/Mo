<?php
/**
 * Created by PhpStorm.
 * User; lute
 * Date; 7/12/15
 * Time; 11;48
 */

namespace Mo\MainWebsiteBundle\Entity;


class Bill
{
    private function __construct()
    {
        $this->created_time = new \DateTime();
    }

    private $id;

    protected $bill_num;

    protected $delivery_address;

    protected $billing_address;

    protected $created_time;

    protected $bill_type;

    protected $observations;

    /**
     * @var \Mo\MainWebsiteBundle\Entity\Order
     */
    private $order;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set billNum
     *
     * @param integer $billNum
     *
     * @return Bill
     */
    public function setBillNum($billNum)
    {
        $this->bill_num = $billNum;

        return $this;
    }

    /**
     * Get billNum
     *
     * @return integer
     */
    public function getBillNum()
    {
        return $this->bill_num;
    }

    /**
     * Set deliveryAddress
     *
     * @param string $deliveryAddress
     *
     * @return Bill
     */
    public function setDeliveryAddress($deliveryAddress)
    {
        $this->delivery_address = $deliveryAddress;

        return $this;
    }

    /**
     * Get deliveryAddress
     *
     * @return string
     */
    public function getDeliveryAddress()
    {
        return $this->delivery_address;
    }

    /**
     * Set billingAddress
     *
     * @param string $billingAddress
     *
     * @return Bill
     */
    public function setBillingAddress($billingAddress)
    {
        $this->billing_address = $billingAddress;

        return $this;
    }

    /**
     * Get billingAddress
     *
     * @return string
     */
    public function getBillingAddress()
    {
        return $this->billing_address;
    }

    /**
     * Set createdTime
     *
     * @param \DateTime $createdTime
     *
     * @return Bill
     */
    public function setCreatedTime($createdTime)
    {
        $this->created_time = $createdTime;

        return $this;
    }

    /**
     * Get createdTime
     *
     * @return \DateTime
     */
    public function getCreatedTime()
    {
        return $this->created_time;
    }

    /**
     * Set billType
     *
     * @param string $billType
     *
     * @return Bill
     */
    public function setBillType($billType)
    {
        $this->bill_type = $billType;

        return $this;
    }

    /**
     * Get billType
     *
     * @return string
     */
    public function getBillType()
    {
        return $this->bill_type;
    }

    /**
     * Set observations
     *
     * @param string $observations
     *
     * @return Bill
     */
    public function setObservations($observations)
    {
        $this->observations = $observations;

        return $this;
    }

    /**
     * Get observations
     *
     * @return string
     */
    public function getObservations()
    {
        return $this->observations;
    }

    /**
     * Set order
     *
     * @param \Mo\MainWebsiteBundle\Entity\Order $order
     *
     * @return Bill
     */
    public function setOrder(\Mo\MainWebsiteBundle\Entity\Order $order = null)
    {
        $this->order = $order;

        return $this;
    }

    /**
     * Get order
     *
     * @return \Mo\MainWebsiteBundle\Entity\Order
     */
    public function getOrder()
    {
        return $this->order;
    }
}
