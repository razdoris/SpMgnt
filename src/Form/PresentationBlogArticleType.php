<?php

namespace App\Form;

use App\Entity\PresentationBlogArticle;
use App\Entity\PresentationBlogCategorie;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;

class PresentationBlogArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, [
                'label'=>'Titre de l\'article'
            ])
            ->add('preview', null,[
                'label'=>'resumé de l\'article'
            ])
            ->add('content', null, [
                'label'=>'Contenu de l\'article'
            ])
            ->add('imageFile',VichImageType::class,[
                'label'=>'image d\'illustration',
                'required'=>false
            ])
            ->add('categorie', EntityType::class,[
                'class'=>PresentationBlogCategorie::class,
                'label'=>'Categorie de l\'article',
                'choice_label'=>'label',
                'placeholder'=>'séléctionnez...'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => PresentationBlogArticle::class,
        ]);
    }
}
