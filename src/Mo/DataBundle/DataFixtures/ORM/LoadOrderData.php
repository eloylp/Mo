<?php
/**
 * Created by PhpStorm.
 * User: lute
 * Date: 7/12/15
 * Time: 17:23
 */

namespace Mo\DataBundle\DataFixtures\ORM;


use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Mo\DataBundle\Entity\Order;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class LoadOrderData extends AbstractFixture implements FixtureInterface, OrderedFixtureInterface, ContainerAwareInterface
{
    private $container;

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    public function load(ObjectManager $manager)
    {
        $address = $this->getReference('address');
        $bill = $this->getReference('bill');
        $user = $this->getReference('user');

        $order = new Order();
        $order->setUser($user);
        $order->setBill($bill);
        $order->setAddressDeliver($address);
        $order->setAddressBilling($address);
        $order->setStatus('pending');
        $order->setObservations('observations');


        $manager->persist($order);
        $manager->flush();

        $this->setReference('order', $order);

    }

    public function getOrder()
    {
        return 6;
    }

}