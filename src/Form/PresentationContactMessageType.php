<?php

namespace App\Form;

use App\Entity\PresentationContactMessage;
use App\Entity\PresentationContactSubject;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PresentationContactMessageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstName', TextType::class, [
                'label'=>'Nom'
            ])
            ->add('lastName', TextType::class, [
                'label'=>'Prénom'
            ])
            ->add('phoneNumber', TextType::class, [
                'label'=>'Téléphone',
                'required'=>false
            ])
            ->add('mailAddress', TextType::class, [
                'label'=>'Addresse électronique'
            ])
            ->add('club', TextType::class, [
                'label'=>'Nom de votre club',
                'required'=>false
            ])
            ->add('division', TextType::class, [
                'label'=>'Division dans laquelle évolue votre club',
                'required'=>false
            ])
            ->add('question', TextareaType::class, [
                'label'=>'Votre question'
            ])
            ->add('subject', EntityType::class, [
                'class' => PresentationContactSubject::class,
                'choice_label'=>'subjectText',
                'label'=>'Sujet de votre message',
                'placeholder' => "Choisissez un sujet..."
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => PresentationContactMessage::class,
        ]);
    }
}
