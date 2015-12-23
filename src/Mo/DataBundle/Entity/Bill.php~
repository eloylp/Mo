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


    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $billNum;

    /**
     * @var string
     */
    private $companyData;

    /**
     * @var string
     */
    private $userData;

    /**
     * @var \DateTime
     */
    private $createdTime;

    /**
     * @var string
     */
    private $billType;

    /**
     * @var string
     */
    private $observations;

    /**
     * @var \Mo\DataBundle\Entity\Order
     */
    private $order;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $billItem;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->billItem = new \Doctrine\Common\Collections\ArrayCollection();
        $this->createdTime = new \DateTime();

    }

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
        $this->billNum = $billNum;

        return $this;
    }

    /**
     * Get billNum
     *
     * @return integer
     */
    public function getBillNum()
    {
        return $this->billNum;
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
        $this->companyData = $companyData;

        return $this;
    }

    /**
     * Get companyData
     *
     * @return string
     */
    public function getCompanyData()
    {
        return $this->companyData;
    }

    /**
     * Set userData
     *
     * @param string $userData
     *
     * @return Bill
     */
    public function setUserData($userData)
    {
        $this->userData = $userData;

        return $this;
    }

    /**
     * Get userData
     *
     * @return string
     */
    public function getUserData()
    {
        return $this->userData;
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
        $this->createdTime = $createdTime;

        return $this;
    }

    /**
     * Get createdTime
     *
     * @return \DateTime
     */
    public function getCreatedTime()
    {
        return $this->createdTime;
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
        $this->billType = $billType;

        return $this;
    }

    /**
     * Get billType
     *
     * @return string
     */
    public function getBillType()
    {
        return $this->billType;
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
    /**
     * @var \Mo\DataBundle\Entity\User
     */
    private $user;


    /**
     * Set user
     *
     * @param \Mo\DataBundle\Entity\User $user
     *
     * @return Bill
     */
    public function setUser(\Mo\DataBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Mo\DataBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }
}
