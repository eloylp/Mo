<?php
/**
 * Created by PhpStorm.
 * User; lute
 * Date; 7/12/15
 * Time; 11;38
 */

namespace Mo\DataBundle\Entity;


class Order
{

    /**
     * @var integer
     */
    private $id;


    /**
     * @var string
     */
    private $status;


    /**
     * @var string
     */
    private $observations;

    /**
     * @var \Mo\DataBundle\Entity\Bill
     */
    private $bill;

    /**
     * @var \Mo\DataBundle\Entity\Address
     */
    private $addressDeliver;

    /**
     * @var \Mo\DataBundle\Entity\Address
     */
    private $addressBilling;

    /**
     * @var \Mo\DataBundle\Entity\User
     */
    private $user;

    /**
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @var \DateTime
     */
    private $updatedAt;


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
     * @param \Mo\DataBundle\Entity\Bill $bill
     *
     * @return Order
     */
    public function setBill(\Mo\DataBundle\Entity\Bill $bill = null)
    {
        $this->bill = $bill;

        return $this;
    }

    /**
     * Get bill
     *
     * @return \Mo\DataBundle\Entity\Bill
     */
    public function getBill()
    {
        return $this->bill;
    }

    /**
     * Set addressDeliver
     *
     * @param \Mo\DataBundle\Entity\Address $addressDeliver
     *
     * @return Order
     */
    public function setAddressDeliver(\Mo\DataBundle\Entity\Address $addressDeliver = null)
    {
        $this->addressDeliver = $addressDeliver;

        return $this;
    }

    /**
     * Get addressDeliver
     *
     * @return \Mo\DataBundle\Entity\Address
     */
    public function getAddressDeliver()
    {
        return $this->addressDeliver;
    }

    /**
     * Set addressBilling
     *
     * @param \Mo\DataBundle\Entity\Address $addressBilling
     *
     * @return Order
     */
    public function setAddressBilling(\Mo\DataBundle\Entity\Address $addressBilling = null)
    {
        $this->addressBilling = $addressBilling;

        return $this;
    }

    /**
     * Get addressBilling
     *
     * @return \Mo\DataBundle\Entity\Address
     */
    public function getAddressBilling()
    {
        return $this->addressBilling;
    }


    /**
     * Set user
     *
     * @param \Mo\DataBundle\Entity\User $user
     *
     * @return Order
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


    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Order
     */
    public function setCreatedAt()
    {
        $this->createdAt = new \DateTime("now");

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return Order
     */
    public function setUpdatedAt()
    {
        $this->updatedAt = new \DateTime("now");

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $attachment;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->attachment = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add attachment
     *
     * @param \Mo\DataBundle\Entity\Attachment $attachment
     *
     * @return Order
     */
    public function addAttachment(\Mo\DataBundle\Entity\Attachment $attachment)
    {
        $this->attachment[] = $attachment;

        return $this;
    }

    /**
     * Remove attachment
     *
     * @param \Mo\DataBundle\Entity\Attachment $attachment
     */
    public function removeAttachment(\Mo\DataBundle\Entity\Attachment $attachment)
    {
        $this->attachment->removeElement($attachment);
    }

    /**
     * Get attachment
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAttachment()
    {
        return $this->attachment;
    }
}
