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
use Mo\DataBundle\Entity\BillItem;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class LoadBillItemData extends AbstractFixture implements FixtureInterface, OrderedFixtureInterface, ContainerAwareInterface
{
    private $container;

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    public function load(ObjectManager $manager)
    {

        $bill = $this->getReference('bill');
        $product = $this->getReference('product');

        $billItem = new BillItem();
        $billItem->setBill($bill);
        $billItem->setName('product name');
        $billItem->setPrice('12.23');
        $billItem->setQuantity(23);
        $billItem->setDescription('descccc');
        $billItem->setProduct($product);

        $manager->persist($billItem);

        $manager->flush();

        $this->setReference('billItem', $billItem);

    }

    public function getOrder()
    {
        return 4;
    }

}