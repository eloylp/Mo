<?php
/**
 * Created by PhpStorm.
 * User: lute
 * Date: 23/12/15
 * Time: 21:02
 */

namespace Mo\DataBundle\Form\Type;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class MessageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name', 'text')
            ->add('lastName', 'text')
            ->add('email', 'email')
            ->add('company', 'text')
            ->add('subject', 'text')
            ->add('content', 'textarea')
            ->add('ip', 'text')
            ->add('submit', 'submit');

        return $builder;

    }

    public function getName()
    {
        return 'message';
    }

}