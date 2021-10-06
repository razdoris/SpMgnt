<?php

namespace App\Form;

use App\Entity\ApplicationPlayerDisponibility;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\ColorType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ApplicationPlayerDisponibilityType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('label',null,[
                'label'=>'nom de la disponibilité/l\'indisponibilité'
            ])
            ->add('type',ChoiceType::class,[
                'label'=>'type de dispo',
                'choices' => [
                    'disponible'=>'disponible',
                    'indisponible'=>'indisponible',
                    ]
            ])
            ->add('color',ColorType::class,[
                'label'=>'couleur du camembert'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ApplicationPlayerDisponibility::class,
        ]);
    }
}
