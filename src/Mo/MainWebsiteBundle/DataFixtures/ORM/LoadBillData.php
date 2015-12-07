<?php
/**
 * Created by PhpStorm.
 * User: lute
 * Date: 7/12/15
 * Time: 19:04
 */

namespace Mo\MainWebsiteBundle\DataFixtures\ORM;


use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Mo\MainWebsiteBundle\Entity\Bill;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class LoadBillData extends AbstractFixture implements FixtureInterface, OrderedFixtureInterface, ContainerAwareInterface
{
    private $container;

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    public function load(ObjectManager $manager)
    {

        $bill = new Bill();

        $bill->setBillNum(1);
        $bill->setBillType('pending');
        $bill->setClientData('client data');
        $bill->setCompanyData('company data');
        $bill->setObservations('obsss');

        $manager->persist($bill);

        $manager->flush();

        $this->setReference('bill', $bill);

    }

    public function getOrder()
    {
        return 3;
    }

}