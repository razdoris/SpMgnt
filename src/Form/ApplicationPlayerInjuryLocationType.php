<?php

namespace App\Form;

use App\Entity\ApplicationPlayerInjuryLocation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ApplicationPlayerInjuryLocationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('location',null,[
                'label'=>"ajouter une localisation possible pour une blessure"
            ])
            ->add('laterality',ChoiceType::class,[
                'label' => 'lateralité',
                'choices' => [
                    'non applicable' => false,
                    'Droit' => 'Droit',
                    'Gauche' => 'Gauche',
                    'les deux' => 'both'
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ApplicationPlayerInjuryLocation::class,
        ]);
    }
}
