<?php

namespace App\Form;

use App\Entity\PresentationBlogArticle;
use App\Entity\PresentationBlogCategorie;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
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
            ->add('preview', CKEditorType::class,[
                'label'=>'Resumé de l\'article'
            ])
            ->add('content', CKEditorType::class, [
                'label'=>'Contenu de l\'article'
            ])
            ->add('imageFile',VichImageType::class,[
                'label'=>'Image d\'illustration',
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
