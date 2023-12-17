<?php

namespace App\Form;

use App\Service\JsonService;
use Symfony\Component\Form\AbstractType;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Callback;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

class AccountNameFormType extends AbstractType
{
    private $tab=[];
    public function __construct(
        private  Security $security,
        JsonService $jsonService,
    ) {
       // $this->tab=$jsonService->getCountries('build/data/country.json');
        //dd($this->tab);        
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
           /*  ->add('account', ChoiceType::class, [
                'choices'=>$this->tab,                   
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
            ]) */
            ->add('name', TextType::class, [
                'attr' => [
                    'class' => 'form-control my-2',
                    'placeholder' => ''
                ],
                'constraints' => [
                    new Callback([
                        'callback' => [$this, 'validateChoiceExists'],
                    ]),                   
                ],
                'label' => 'Nom du titulaire du compte',
                
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
    public function validateChoiceExists($value, ExecutionContextInterface $context)
    {
        // Récupérez l'utilisateur actuellement authentifié
        $user = $this->security->getUser();
        $codeExists = false;
        $error = false;

        if (strlen($value) == 0) {
            $context->buildViolation('Aucun nom sélectionné.')
                ->addViolation();
            $error = true;
            return;
        }            
    }
}
