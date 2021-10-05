<?php

namespace App\Form;

use App\Entity\ApplicationCalendarEventsSort;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ApplicationCalendarEventsSortType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('label')
            ->add('icon')
            ->add('backgroundColor')
            ->add('borderColor')
            ->add('TextColor')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ApplicationCalendarEventsSort::class,
        ]);
    }
}
