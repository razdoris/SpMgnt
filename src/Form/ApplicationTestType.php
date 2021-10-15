<?php

namespace App\Form;

use App\Entity\ApplicationClub;
use App\Entity\ApplicationTest;
use App\Entity\ApplicationTestValue;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;

class ApplicationTestType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('testName',null,[
                'label'=>'Nom du test'
            ])
            ->add('forAll',null,[
                'label'=>'Test accessible a tous les clubs'
            ])
            ->add('club', EntityType::class,[
                'class'=>ApplicationClub::class,
                'label'=>'selectionner un club (si le test est privé)',
                'choice_label'=>'nom',
                'placeholder' => 'choisissez...'
            ])
            ->add('numberOfValues', null,[
                'label'=>'combien de données sont necessaires aux tests'
            ])
            ->add('abaqueFile', VichImageType::class,[
                'label'=>'abaque',
                'required'=>false
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ApplicationTest::class,
        ]);
    }
}
