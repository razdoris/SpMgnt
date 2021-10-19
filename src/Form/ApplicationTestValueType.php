<?php

namespace App\Form;

use App\Entity\ApplicationTestValue;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ApplicationTestValueType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('unit')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $defaultParameters = array(
            "attr"                =>  array(
                "novalidate"  => "novalidate"
            ),
        );
        $resolver->setDefaults($defaultParameters);
    }
}
