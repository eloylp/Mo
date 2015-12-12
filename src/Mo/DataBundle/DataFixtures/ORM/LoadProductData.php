<?php
/**
 * Created by PhpStorm.
 * User: lute
 * Date: 7/12/15
 * Time: 19:04
 */

namespace Mo\DataBundle\DataFixtures\ORM;


use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Mo\DataBundle\Entity\Product;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class LoadProductData extends AbstractFixture implements FixtureInterface, OrderedFixtureInterface, ContainerAwareInterface
{
    private $container;

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    public function load(ObjectManager $manager)
    {


        $product = new Product();
        $product->setName('product name');
        $product->setPrice(12.34);
        $product->setTax(21);
        $product->setBudget(23.23);
        $product->setDescription('product description');

        $manager->persist($product);

        $manager->flush();

        $this->setReference('product', $product);

    }

    public function getOrder()
    {
        return 1;
    }

}