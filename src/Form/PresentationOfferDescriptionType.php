<?php

namespace App\Form;

use App\Entity\PresentationContactSubject;
use App\Entity\PresentationOfferDescription;
use App\Entity\PresentationOfferFeature;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;

class PresentationOfferDescriptionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class,[
                'label'=>'Nom de l\'offre'
            ])
            ->add('lowPrice', NumberType::class,[
                'label'=>'Prix Minimal'
            ])
            ->add('hightPrice', NumberType::class,[
                'label'=>'Prix Maximal',
                'required'=>false
            ])
            ->add('periodicity', ChoiceType::class,[
                'label'=>'Choisir la periodicité',
                'choices'=>[
                    'mensuel'=>'mois',
                    'annuel'=>'an'
                ]
            ])
            ->add('imageFile', VichImageType::class,[
                'label'=>'Image d\'illustration',
                'required'=>false
            ])
            ->add('features', EntityType::class,[
                'class'=>PresentationOfferFeature::class,
                'label'=>'Selectionner les options incluses',
                'choice_label'=>'featureName',
                'multiple'=>true,
                'expanded'=>true,
                'attr'=>['class'=>'featureChoice']
            ])
            ->add('contactSubject', EntityType::class,[
                'class'=>PresentationContactSubject::class,
                'label'=>'Sujet du formulaire de contact lié',
                'choice_label'=>'subjectText',
                'multiple'=>false,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => PresentationOfferDescription::class,
        ]);
    }
}
