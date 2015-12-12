<?php
/**
 * Created by PhpStorm.
 * User: lute
 * Date: 12/12/15
 * Time: 2:06
 */

namespace Mo\AdmBundle\Event;


use Mo\DataBundle\Entity\Product;
use Symfony\Component\EventDispatcher\Event;

class NewProductEvent extends Event
{

    private $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function getProduct(){

        return $this->product;
    }

}