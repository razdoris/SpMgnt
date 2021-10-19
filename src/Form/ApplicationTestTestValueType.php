<?php

namespace App\Form;

use App\Entity\ApplicationTest;
use App\Entity\ApplicationTestTestValue;
use App\Entity\ApplicationTestValue;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ApplicationTestTestValueType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('test', EntityType::class,[
                'class'=>ApplicationTest::class,
                'label'=>'choisissez le test',
                'choice_label'=>'testName',
            ])
            ->add('testValue',EntityType::class,[
                'class'=>ApplicationTestValue::class,
                'label'=>'choisissez la valeur',
                'choice_label'=>'name'
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
