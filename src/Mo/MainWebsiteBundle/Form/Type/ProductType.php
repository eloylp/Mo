<?php
/**
 * Created by PhpStorm.
 * User: lute
 * Date: 8/12/15
 * Time: 23:19
 */

namespace Mo\MainWebsiteBundle\Form\Type;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class ProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name', 'text')
                ->add('price', 'number', array('scale' => 2))
                ->add('budget', 'number', array('scale' => 2))
                ->add('tax', 'number', array('scale' => 2))
                ->add('description', 'textarea')
                ->add('Enviar', 'submit');
    }

    public function getName()
    {
        return 'product';
    }

}