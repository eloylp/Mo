<?php
/**
 * Created by PhpStorm.
 * User; lute
 * Date; 7/12/15
 * Time; 20;28
 */

namespace Mo\MainWebsiteBundle\Entity;


class BillItem
{
    private $id;

    protected $name;

    protected $description;

    protected $quantity;

    protected $price;

    /**
     * @var \Mo\MainWebsiteBundle\Entity\Bill
     */
    private $bill;


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
     * Set name
     *
     * @param string $name
     *
     * @return BillItem
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return BillItem
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set quantity
     *
     * @param integer $quantity
     *
     * @return BillItem
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Get quantity
     *
     * @return integer
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set price
     *
     * @param string $price
     *
     * @return BillItem
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return string
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set bill
     *
     * @param \Mo\MainWebsiteBundle\Entity\Bill $bill
     *
     * @return BillItem
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
     * @var \Mo\MainWebsiteBundle\Entity\Product
     */
    private $product;


    /**
     * Set product
     *
     * @param \Mo\MainWebsiteBundle\Entity\Product $product
     *
     * @return BillItem
     */
    public function setProduct(\Mo\MainWebsiteBundle\Entity\Product $product = null)
    {
        $this->product = $product;

        return $this;
    }

    /**
     * Get product
     *
     * @return \Mo\MainWebsiteBundle\Entity\Product
     */
    public function getProduct()
    {
        return $this->product;
    }
}
