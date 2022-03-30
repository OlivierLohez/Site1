<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class CarteIdentiteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('nom', TextType::class, ['attr' => ['class'=> 'form-control']
                                    , 'label_attr' => ['class'=> 'fw-bold']])

        ->add('prenom', TextType::class, ['attr' => ['class'=> 'form-control']
                                        , 'label_attr' => ['class'=> 'fw-bold']])

        ->add('DateNaissance', DateType::class, ['attr' => ['class'=> 'form-control', 'rows'=>'7', 'cols' => '7'],
                                                'years'=>range(1960,2022)
                                            , 'label_attr' => ['class'=> 'fw-bold']])

        ->add('LieuNaissance', TextType::class, ['attr' => ['class'=> 'form-control']
                                              , 'label_attr' => ['class'=> 'fw-bold']])

        ->add('Rue', TextType::class, ['attr' => ['class'=> 'form-control']
                                    ,'label_attr' => ['class'=> 'fw-bold']])

        ->add('Ville', TextType::class, ['attr' => ['class'=> 'form-control']
                                      , 'label_attr' => ['class'=> 'fw-bold']])

        ->add('CP', IntegerType::class, ['attr' => ['class'=> 'form-control']
                                      , 'label_attr' => ['class'=> 'fw-bold']])

        ->add('envoyer', SubmitType::class, ['attr' => ['class'=> 'btn bg-primary text-white m-4' ]
                                          , 'row_attr' => ['class' => 'text-center'],]);
                        
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
