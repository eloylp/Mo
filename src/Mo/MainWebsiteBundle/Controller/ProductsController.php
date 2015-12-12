<?php
/**
 * Created by PhpStorm.
 * User: lute
 * Date: 8/12/15
 * Time: 23:12
 */

namespace Mo\DataBundle\Controller;

use Mo\DataBundle\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ProductsController extends Controller
{

    public function listAction()
    {

        $manager = $this->getDoctrine()->getRepository('MoDataBundle:Product');
        $products = $manager->findAll();

        return $this->render('MoMainWebsiteBundle::products.html.twig', array('products' => $products));
    }


}