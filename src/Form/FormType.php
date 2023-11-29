<?php
// src/Form/Type/FormType.php
namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FormType extends AbstractType
{
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'attr' => ['class' => 'form-control form-floating'],
        ]);
    }

    public function getBlockPrefix()
    {
        return 'app_form';
    }

    public function getParent()
    {
        return TextType::class;
    }
}
