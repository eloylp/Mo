<?php
/**
 * Created by PhpStorm.
 * User: lute
 * Date: 9/12/15
 * Time: 22:31
 */

namespace Mo\DataBundle\Form\Type;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('username', 'text', array("max_length" => 40))
                ->add('email', 'email', array('max_length' => 50))
                ->add('password', 'repeated', array(
                    'type' => 'password',
                    'invalid_message' => 'Passwords must match',
                    'required' => true,
                    'first_options' => array('label' => 'Password'),
                    'second_options' => array('label' => 'Repeat Password')))
                ->add('submit', 'submit');

    }

    public function getName()
    {
        return 'user';
    }


}