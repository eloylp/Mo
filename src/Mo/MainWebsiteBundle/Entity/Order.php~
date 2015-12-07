<?php
/**
 * Created by PhpStorm.
 * User; lute
 * Date; 7/12/15
 * Time; 11;38
 */

namespace Mo\MainWebsiteBundle\Entity;



class Order
{

    public function __construct()
    {
        $this->created_time = new \DateTime();
        $this->last_update = new \DateTime();
    }

    private $id;

    protected $delivery_address;

    protected $billing_address;

    protected $delivery_postal_code;

    protected $billing_postal_code;

    protected $created_time;

    protected $status;

    protected $last_update;

    protected $observations;



    /**
     * @var \Mo\MainWebsiteBundle\Entity\Bill
     */
    private $bill;

    /**
     * @var \Mo\MainWebsiteBundle\Entity\Client
     */
    private $client;


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
     * Set deliveryAddress
     *
     * @param string $deliveryAddress
     *
     * @return Order
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
     * @return Order
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
     * Set deliveryPostalCode
     *
     * @param string $deliveryPostalCode
     *
     * @return Order
     */
    public function setDeliveryPostalCode($deliveryPostalCode)
    {
        $this->delivery_postal_code = $deliveryPostalCode;

        return $this;
    }

    /**
     * Get deliveryPostalCode
     *
     * @return string
     */
    public function getDeliveryPostalCode()
    {
        return $this->delivery_postal_code;
    }

    /**
     * Set billingPostalCode
     *
     * @param string $billingPostalCode
     *
     * @return Order
     */
    public function setBillingPostalCode($billingPostalCode)
    {
        $this->billing_postal_code = $billingPostalCode;

        return $this;
    }

    /**
     * Get billingPostalCode
     *
     * @return string
     */
    public function getBillingPostalCode()
    {
        return $this->billing_postal_code;
    }

    /**
     * Set createdTime
     *
     * @param \DateTime $createdTime
     *
     * @return Order
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
     * Set status
     *
     * @param string $status
     *
     * @return Order
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set lastUpdate
     *
     * @param \DateTime $lastUpdate
     *
     * @return Order
     */
    public function setLastUpdate($lastUpdate)
    {
        $this->last_update = $lastUpdate;

        return $this;
    }

    /**
     * Get lastUpdate
     *
     * @return \DateTime
     */
    public function getLastUpdate()
    {
        return $this->last_update;
    }

    /**
     * Set observations
     *
     * @param string $observations
     *
     * @return Order
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
     * Set bill
     *
     * @param \Mo\MainWebsiteBundle\Entity\Bill $bill
     *
     * @return Order
     */
    public function setBill(\Mo\MainWebsiteBundle\Entity\Bill $bill = null)
    {
        $this->bill = $bill;

        return $this;
    }

    /**
     * Get bill
     *
     * @return \Mo\MainWebsiteBundle\Entity\Bill
     */
    public function getBill()
    {
        return $this->bill;
    }

    /**
     * Set client
     *
     * @param \Mo\MainWebsiteBundle\Entity\Client $client
     *
     * @return Order
     */
    public function setClient(\Mo\MainWebsiteBundle\Entity\Client $client = null)
    {
        $this->client = $client;

        return $this;
    }

    /**
     * Get client
     *
     * @return \Mo\MainWebsiteBundle\Entity\Client
     */
    public function getClient()
    {
        return $this->client;
    }
}
