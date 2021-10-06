<?php

namespace App\Form;

use App\Entity\ApplicationCalendarEventsSort;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ColorType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ApplicationCalendarEventsSortType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('label', TextType::class, [
                'label' => 'nom du type d\'evenement'
            ])
            ->add('icon', TextType::class, [
                'label'=>'nom de l\'icone'
            ])
            ->add('backgroundColor', ColorType::class, [
                'label'=>'couleur de fond',
                'html5'=>true
            ])
            ->add('borderColor',ColorType::class, [
                'label'=>'couleur de bordure'
            ])
            ->add('TextColor',ColorType::class, [
                'label'=>'couleur de text'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ApplicationCalendarEventsSort::class,
        ]);
    }
}
