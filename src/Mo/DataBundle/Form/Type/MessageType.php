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
        $builder->add('name', 'text', array('label' => 'mo.mainwebsite.form.field.name'))
            ->add('lastName', 'text', array('label' => 'mo.mainwebsite.form.field.lastname'))
            ->add('email', 'email', array('label' => 'mo.mainwebsite.form.field.email'))
            ->add('company', 'text', array('label' => 'mo.mainwebsite.form.field.company'))
            ->add('subject', 'text', array('label' => 'mo.mainwebsite.form.field.subject'))
            ->add('content', 'textarea', array('label' => 'mo.mainwebsite.form.field.content'))
            ->add('ip', 'text')
            ->add('submit', 'submit', array('label' => 'mo.mainwebsite.form.field.send'));

        return $builder;

    }

    public function getName()
    {
        return 'message';
    }

}