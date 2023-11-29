<?php

namespace App\Service;
use App\Form\FormNameType;
use App\Form\FormMailType;
use App\Form\FormPhoneType;
use App\Form\FormAddressType;
use App\Form\FormEmergencyType;
use App\Entity\User;
use phpDocumentor\Reflection\Types\Boolean;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;

class Factory
{
    public function createFormType(Request $request): string
    {
        $parameters = $request->request->all();
        $formType = array_keys($parameters);

        $formRes = "";
        switch ($formType) {
            case 'form_name':
                $formRes = FormNameType::class;
                break;
            case 'form_mail':
                $formRes = FormMailType::class;
                break;
            case 'form_tel':
                $formRes = FormPhoneType::class;
                break;
            case 'form_address':
                $formRes = FormAddressType::class;
                break;
            case 'form_emergency':
                $formRes = FormEmergencyType::class;
                break;
            default:
                $formRes = FormNameType::class;
                break;
        }
        return $formRes;
    }

    public function isValid(FormInterface  $form):bool
    {
        return($form instanceof FormInterface && $form->isSubmitted()&&$form->isValid());
    }
        
}
