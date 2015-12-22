<?php
/**
 * Created by PhpStorm.
 * User: lute
 * Date: 7/12/15
 * Time: 17:12
 */

namespace Mo\DataBundle\DataFixtures\ORM;


use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Mo\DataBundle\Entity\Address;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class LoadAddressData extends AbstractFixture implements FixtureInterface, OrderedFixtureInterface, ContainerAwareInterface
{

    private $container;

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    public function load(ObjectManager $manager)
    {

        $user = $this->getReference('user');
        $address = new Address();

        $address->setUser($user);
        $address->setName('Eloy');
        $address->setLastName('Lopez Peñamaria');
        $address->setAddress('Calle de la amargura, La coruña');
        $address->setPostalCode(15001);
        $address->setDocId('4534534A');
        $address->setTlf('65888787788');
        $manager->persist($address);
        $manager->flush();

        $this->addReference('address', $address);
    }

    public function getOrder(){

        return 2;
    }

}