<?php

namespace App\DataFixtures;

use App\Entity\PresentationBlogArticle;
use App\Repository\PresentationBlogCategorieRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\ORM\EntityManager;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class PresentationBlogArticleFixture extends Fixture
{

    private PresentationBlogCategorieRepository $cat;

    public function __construct(PresentationBlogCategorieRepository $cat)
    {
        $this->cat=$cat;

    }

    public function load(
        ObjectManager $manager
    )
    {
        for($i=0; $i<100; $i++ )
        {
            $faker = Factory::create('fr_FR');
            $article = new PresentationBlogArticle();
            $category=$this->cat->find(rand(1,3));
            $article
                ->setAuthor($faker->name())
                ->setDate($faker->dateTime())
                ->setPreview($faker->paragraphs(rand(1,2), true))
                ->setCategorie($category)
                ->setContent($faker->paragraphs(rand(3,8), true))
                ->setTitle($faker->words(rand(5,15),true));
            $manager->persist($article);
        }

        $manager->flush();
    }
}
