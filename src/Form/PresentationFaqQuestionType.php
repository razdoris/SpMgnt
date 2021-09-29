<?php

namespace App\Form;

use App\Entity\PresentationFaqQuestion;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PresentationFaqQuestionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('number', NumberType::class,[
                'label'=>"numero d'ordre"
            ])
            ->add('question', null,[
                'label'=>"question"
            ])
            ->add('answer', CKEditorType::class,[
                'label'=>'reponse a la question'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => PresentationFaqQuestion::class,
        ]);
    }
}
