<?php
/**
 * Created by PhpStorm.
 * User: lute
 * Date: 9/12/15
 * Time: 22:31
 */

namespace Mo\MainWebsiteBundle\Form\Type;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class ClientType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name', 'text', array("max_length" => 40))
                ->add('last_name', 'text', array('max_length' => 70))
                ->add('address', 'textarea', array('max_length' => 120))
                ->add('postal_code', 'text', array('max_length' => 20))
                ->add('birthdate', 'date')
                ->add('email', 'email', array('max_length' => 50))
                ->add('pass', 'repeated', array(
                    'type' => 'password',
                    'invalid_message' => 'Passwords must match',
                    'required' => true,
                    'first_options' => array('label' => 'Password'),
                    'second_options' => array('label' => 'Repeat Password')))
                ->add('submit', 'submit');

    }

    public function getName()
    {
        return 'client';
    }


}