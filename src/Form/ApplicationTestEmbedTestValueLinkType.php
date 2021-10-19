<?php

namespace App\Form;

use App\Entity\ApplicationTestTestValue;
use App\Entity\ApplicationTestValue;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ApplicationTestEmbedTestValueLinkType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('testValue',EntityType::class,[
                'class'=>ApplicationTestValue::class,
                'label'=>'choisissez le type de valeur',
                'placeholder'=>'choisissez le type de valeur'

            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ApplicationTestTestValue::class,
        ]);
    }
}
