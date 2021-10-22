<?php

namespace App\Form;

use App\Entity\ApplicationClub;
use App\Entity\ApplicationTest;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
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
                'label'=>'tous'
            ])
            ->add('club', EntityType::class,[
                'class'=>ApplicationClub::class,
                'label'=>'selectionner un club',
                'choice_label'=>'nom',
                'placeholder' => 'choisissez...',
                'required'=>false
            ])
            ->add('numberOfValues', null,[
                'label'=>'combien de données sont necessaires aux tests'
            ])
            ->add('abaqueFile', VichImageType::class,[
                'label'=>'abaque',
                'required'=>false
            ])
            ->add('applicationTestTestValues', CollectionType::class,[
                'entry_type'=>ApplicationTestEmbedTestValueLinkType::class,
                'entry_options'=>[
                    'label'=>false,
                    ],
                "allow_add"=>true,
                "allow_delete"=>true,
                'attr'=>['class'=>'DataChoice'],
                'label'=>'données liées au test',
                'by_reference'=>false,
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
