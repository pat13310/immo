<?php

namespace App\Form;

use App\Entity\User;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'row_attr' => ['class' => 'form-floating'],
                'attr' => [
                    'class' => 'form-control mt-2',
                    'placeholder' => 'Ex: dupond'
                ],
                'label_attr' => ['class' => 'form-label gray'],
                'label' => 'Votre nom',
            ])
            ->add('firstName', TextType::class, [
                'row_attr' => ['class' => 'form-floating'],
                'attr' => [
                    'class' => 'form-control mt-1',
                    'placeholder' => 'Ex: jacques'
                ],
                'label_attr' => ['class' => 'form-label gray'],
                'label' => 'Votre prénom',
            ])
            ->add('birthday', TextType::class, [
                'row_attr' => ['class' => 'form-floating'],
                'attr' => [
                    'id' =>'birthday',
                    'class' => 'form-control mt-3',
                    'placeholder' => 'Ex: 04-08-1989'
                ],
                'mapped' => false,
                'label_attr' => ['class' => 'form-label gray'],
                'label' => 'Date de naissance',
            ])


            ->add('email', EmailType::class, [
                'row_attr' => ['class' => 'form-floating'],
                'attr' => [
                    'class' => 'form-control mt-3',
                    'placeholder' => 'Ex: adresse@mail.com'
                ],
                'label_attr' => ['class' => 'form-label gray'],
                'label' => 'Votre adresse mail',
            ])

            ->add('plainPassword', PasswordType::class, [
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'row_attr' => ['class' => 'form-floating'],
                'mapped' => false,
                'attr' => [
                    'autocomplete' => 'new-password',
                    'class' => 'form-control mt-3',
                    'placeholder' => 'Votre mot de passe'
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter a password',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Your password should be at least {{ limit }} characters',
                        // max length allowed by Symfony for security reasons
                        'max' => 128,
                    ]),
                ],
                'label_attr' => ['class' => 'form-label gray'],
                'label' => 'Votre mot de passe',
            ])
            ->add('save', SubmitType::class, [
                'label' => 'Accepter et continuer',
                'attr' => ['class' => 'w-100 btn btn-danger p-3 mt-3'],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
            'action' =>'/register',
        ]);
    }
}
