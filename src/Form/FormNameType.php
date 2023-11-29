<?php
// src/Form/FormNameType.php
namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class FormNameType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nameInput', TextType::class, [
                'row_attr' => ['class' => 'form-floating'],
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Votre nom'
                ],
                'constraints' => [
                    new NotBlank(),
                    new Length(['max' => 80]),
                ],
                'label_attr' => ['class' => 'form-label gray'],
                'label' => 'Nom',
            ])
            ->add('firstNameInput', TextType::class, [
                'row_attr' => ['class' => 'form-floating'],                          
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Votre prénom',
                ],
                'constraints' => [
                    new NotBlank(),
                    new Length(['max' => 80]),
                ],
                'label' => 'Prénom',
                'label_attr' => ['class' => 'form-label gray'],

            ])
            ->add('save', SubmitType::class, [
                'label' => 'Enregistrer',
                'attr' => ['class' => 'btn btn-dark p-3 mt-3'],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            

        ]);
    }

    public function getExtendedType()
    {
        return FormNameType::class;
    }
}
