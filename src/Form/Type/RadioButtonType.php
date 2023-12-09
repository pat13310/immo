<?php
// src/Form/Type/RadioButtonType.php

namespace App\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RadioButtonType extends AbstractType
{
    public function getParent()
    {
        return ChoiceType::class;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'expanded' => true,
            'multiple' => false,
            'label_attr' => ['class' => 'sr-only'], // Hide the default label
            'label' => false, // Remove the default label
            'attr' => [
                'class' => 'radio-buttons', // Add a class for styling
            ],
        ]);
    }
}
