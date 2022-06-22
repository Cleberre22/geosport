<?php

namespace App\Form;

use App\Entity\Club;
use App\Entity\Sport;
use App\Data\SearchData;
use App\Entity\Country;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class SearchForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
       $builder
           ->add('q', TextType::class, [
            'label' => false,
            'required' => false,
            'attr' => [
                'placeholder' => 'Rechercher'
            ]
            ])
            ->add('sport', EntityType::class, [
                'label' => false,
                'required' => false,
                'class' => Sport::class,
                'expanded' => true,
                'multiple' => true
            ])
            ->add('club', EntityType::class, [
                'label' => false,
                'required' => false,
                'class' => Club::class,
                'expanded' => true,
                'multiple' => true
            ])
            ->add('country', EntityType::class, [
                'label' => false,
                'required' => false,
                'class' => Country::class,
                'expanded' => true,
                'multiple' => true
            ])
        ;
    }
   
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => SearchData::class,
            'method' => 'Get',
            'csrf_protection' => false
        ]);
    }

    public function getBlockPrefix()
    {
        return '';
    }

}