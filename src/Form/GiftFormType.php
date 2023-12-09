<?php

namespace App\Form;

use App\Repository\ExtraRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\Callback;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

class GiftFormType extends AbstractType
{
    public function __construct(
        private ExtraRepository $extraRepository,
        private  Security $security
    ) {
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('gift_code', TextType::class, [
                'required' => false,
                'row_attr' => ['class' => 'form-floating'],
                'attr' => [
                    'class' => 'form-control mt-2',
                    'placeholder' => ''
                ],
                'constraints' => [
                    new Callback([
                        'callback' => [$this, 'validateCodeExists'],
                    ]),
                    //new NotBlank(['message' => 'Le code est absent.']),
                    //new Length(['min' => 6, 'minMessage' => 'Le code doit être sur 6 caractères.'])

                ],
                'label_attr' => ['class' => 'form-label gray'],
                'label' => 'Code',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }

    public function validateCodeExists($value, ExecutionContextInterface $context)
    {
        // Récupérez l'utilisateur actuellement authentifié
        $user = $this->security->getUser();
        $codeExists = false;
        $error = false;

        if (strlen($value) == 0) {
            $context->buildViolation('Le code est absent.')
                ->addViolation();
            $error = true;
            return;
        }

        if (strlen($value) < 6 && !$error) {
            $context->buildViolation('Le code doit être sur 6 caractères.')
                ->addViolation();
            $error = true;
            return;
        }
        // Assurez-vous que l'utilisateur est authentifié
        if (!$user && !$error) {
            $context->buildViolation('L\'utilisateur doit être authentifié.')
                ->addViolation();
            $error = true;
            return;
        }

        // Validez que le code existe dans votre ExtraRepository
        $codeExists = $this->extraRepository->codeExistsForUser($value, $user);
        
        // Si le code n'existe pas, ajoutez une violation de la contrainte avec le message d'erreur approprié
        if (!$codeExists && !$error) {
            $context->buildViolation('Le code ne correspond pas à cet utilisateur.')
                ->addViolation();
        }
    }
}
