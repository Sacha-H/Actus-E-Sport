<?php

namespace App\Form;

use App\Entity\Equipe;
use App\Entity\Esport;
use App\Entity\Joueur;
use App\Entity\Article;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;


class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titreArticle')
            ->add('commentaireArticle')
            ->add('photoArticle', FileType::class, [
                'label' => 'Photo',
                'mapped' => false,
                'required' => false,
                'constraints' => [
                    new File([
                        'maxSize' => '2000k',
                        'mimeTypes' => [
                            'image/*',
                        ],
                        'mimeTypesMessage' => 'Veuillez entrer un format de document valide',
                    ])
                ],
            ])
            ->add('dateArticle')
            ->add('esport', EntityType::class, [
                'class' => Esport::class,
                'choice_label' => 'nomEsport',
                
                ])
                ->add('equipe', EntityType::class, [
                    'class' => Equipe::class,
                    'choice_label' => 'nomEquipe',
                ])
                
                
                ->add('joueur', EntityType::class, [
                    'class' => Joueur::class,
                    'choice_label' => 'pseudoJoueur',
  
                        ])

                

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Article::class,
        ]);
    }
}
