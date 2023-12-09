<?php

namespace App\Form;

use App\Form\Type\RadioButtonType;
use Symfony\Component\Form\AbstractType;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Callback;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

class PaymentMethodFormType extends AbstractType
{
    public function __construct(
        //private ExtraRepository $extraRepository,
        private  Security $security
    ) {
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('country', ChoiceType::class, [
                'required' => false,
                'row_attr' => ['class' => 'form-floating'],
                'attr' => [
                    'class' => 'form-select my-2',
                    'placeholder' => ''
                ],
                'constraints' => [
                    new Callback([
                        'callback' => [$this, 'validateCodeExists'],
                    ]),                   
                ],
                'label_attr' => ['class' => 'form-label gray'],
                'label' => 'Pays/Région de la facturation',
            ])
            ->add('method', ChoiceType::class, [
             'choices' => [
                    'Compte bancaire en EUR' => 'CB_EUR',
                    'PayPal en EUR' => 'PayPal_EUR',
                    'PayPal en USD' => 'PayPal_USD',
                    // ... ajoutez autant d'options que nécessaire
                ],
                'expanded' => true, // Ceci rend le champ sous forme de boutons radio
                'multiple' => false, // Un seul choix possible
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            
        ]);
    }

    public function validateCodeExists($value, ExecutionContextInterface $context)
    {
        // Récupérez l'utilisateur actuellement authentifié
        $user = $this->security->getUser();
        $codeExists = false;
        $error = false;

        if (strlen($value) == 0) {
            $context->buildViolation('Le code pays est absent.')
                ->addViolation();
            $error = true;
            return;
        }
    }
}
