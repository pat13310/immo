<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class PaymentFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('numberCard', TextType::class, [
                'required'=>false,
                'row_attr' => ['class' => 'form-floating'],
                'attr' => [
                    'class' => 'form-control mt-2',
                    'placeholder' => '0000 0000 0000 0000'
                ],
                'label_attr' => ['class' => 'form-label gray'],
                'label' => 'Numéro de carte',
            ])
            ->add('expireDate', TextType::class, [
                'required'=>false,
                'row_attr' => ['class' => 'form-floating'],
                'attr' => [
                    
                    'class' => 'form-control mt-2',
                    'placeholder' => 'MM/AA'
                ],
                'label_attr' => ['class' => 'form-label gray'],
                'label' => 'Expiration',
            ])
            ->add('crypto', TextType::class, [
                'required'=>false,
                
                'row_attr' => ['class' => 'form-floating'],
                'attr' => [
                    'maxLength' =>"3",
                    'class' => 'form-control mt-2',
                    'placeholder' => '123'
                ],
                'label_attr' => ['class' => 'form-label gray'],
                'label' => 'Cryptogramme',
            ])
            ->add('codePostal', TextType::class, [
                'required'=>false,
                'row_attr' => ['class' => 'form-floating'],
                'attr' => [
                    
                    'class' => 'form-control mt-2',
                    'placeholder' => ''
                ],
                'label_attr' => ['class' => 'form-label gray'],
                'label' => 'Code postal',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            
        ]);
    }
}
