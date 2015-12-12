<?php
/**
 * Created by PhpStorm.
 * User; lute
 * Date; 7/12/15
 * Time; 11;48
 */

namespace Mo\DataBundle\Entity;


class Bill
{
    public function __construct()
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
     * @var string
     */
    private $company_data;

    /**
     * @var string
     */
    private $client_data;

    /**
     * @var \Mo\DataBundle\Entity\Order
     */
    private $order;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $billItem;


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
     * Set companyData
     *
     * @param string $companyData
     *
     * @return Bill
     */
    public function setCompanyData($companyData)
    {
        $this->company_data = $companyData;

        return $this;
    }

    /**
     * Get companyData
     *
     * @return string
     */
    public function getCompanyData()
    {
        return $this->company_data;
    }

    /**
     * Set clientData
     *
     * @param string $clientData
     *
     * @return Bill
     */
    public function setClientData($clientData)
    {
        $this->client_data = $clientData;

        return $this;
    }

    /**
     * Get clientData
     *
     * @return string
     */
    public function getClientData()
    {
        return $this->client_data;
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
     * @param \Mo\DataBundle\Entity\Order $order
     *
     * @return Bill
     */
    public function setOrder(\Mo\DataBundle\Entity\Order $order = null)
    {
        $this->order = $order;

        return $this;
    }

    /**
     * Get order
     *
     * @return \Mo\DataBundle\Entity\Order
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * Add billItem
     *
     * @param \Mo\DataBundle\Entity\BillItem $billItem
     *
     * @return Bill
     */
    public function addBillItem(\Mo\DataBundle\Entity\BillItem $billItem)
    {
        $this->billItem[] = $billItem;

        return $this;
    }

    /**
     * Remove billItem
     *
     * @param \Mo\DataBundle\Entity\BillItem $billItem
     */
    public function removeBillItem(\Mo\DataBundle\Entity\BillItem $billItem)
    {
        $this->billItem->removeElement($billItem);
    }

    /**
     * Get billItem
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBillItem()
    {
        return $this->billItem;
    }
}
