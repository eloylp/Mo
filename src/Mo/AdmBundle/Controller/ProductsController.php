<?php
/**
 * Created by PhpStorm.
 * User: lute
 * Date: 8/12/15
 * Time: 23:12
 */

namespace Mo\BackPanelBundle\Controller;

use Mo\DataBundle\Entity\Product;
use Mo\AdmBundle\Event\LoggerEvents;
use Mo\AdmBundle\Event\NewProductEvent;
use Mo\DataBundle\Form\Type\ProductType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ProductsController extends Controller
{

    public function listAction()
    {

        $manager = $this->getDoctrine()->getRepository('MoDataBundle:Product');
        $products = $manager->findAll();

        return $this->render('MoMainWebsiteBundle::products.html.twig', array('products' => $products));
    }

    public function createAction(Request $request)
    {
        $product = new Product();
        $form = $this->createForm(new ProductType(), $product);

        $form->handleRequest($request);

        if($form->isValid()){

            $em = $this->getDoctrine()->getManager();

            $em->persist($product);

            $em->flush();

            $this->get('event_dispatcher')->dispatch(LoggerEvents::MO_WEBSITE_PRODUCT_NEW, new NewProductEvent($product));

            return $this->redirect($this->generateUrl('mo_main_website_products'));
        }

        return $this->render('product_new.html.twig', array('form' => $form->createView()));
    }

}