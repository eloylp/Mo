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
use Mo\DataBundle\Entity\Client;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class LoadClientData extends AbstractFixture implements FixtureInterface, OrderedFixtureInterface, ContainerAwareInterface
{

    private $container;

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    public function load(ObjectManager $manager)
    {

        $security = $this->container->get('mo.security');
        $client = new Client();
        $client->setAddress('Calle de la amargura, La coruña');
        $client->setBirthDate(new \DateTime('1988-01-21'));
        $client->setEmail('eloy@sandboxwebs.com');
        $client->setLastName('Lopez Peñamaria');
        $client->setName('Eloy');
        $client->setPass($security->encodePassword('33553355'));
        $client->setPostalCode(15001);
        $manager->persist($client);
        $manager->flush();

        $this->addReference('client', $client);
    }

    public function getOrder(){

        return 2;
    }

}