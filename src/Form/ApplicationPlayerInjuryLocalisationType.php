<?php

namespace App\Form;

use App\Entity\ApplicationPlayerInjuryLocalisation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ApplicationPlayerInjuryLocalisationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('localisation')
            ->add('lateralite')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ApplicationPlayerInjuryLocalisation::class,
        ]);
    }
}
