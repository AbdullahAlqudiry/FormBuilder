<?php

namespace Alqudiry\FormBuilder;

use Alqudiry\FormBuilder\FormBuilderProvider;

class FormBuilder extends FormBuilderProvider
{
    
    function __construct() { }

    public function render($formType = null)
    {
        $formFields = collect($this->formFields());

        switch($formType) {

            case 'create':
                $formFields = $formFields->merge($this->createFormFields());
            break;

            case 'edit': 
                $formFields = $formFields->merge($this->editFormFields());
            break;

        }

        return view('formBuilder::form', compact('formFields'));
    }

    public function validate($request, $validationType = null)
    {
        $validationRules = collect($this->formValidation());

        switch($validationType) {

            case 'create':
                $validationRules = $validationRules->merge($this->createFormValidation());
            break;

            case 'edit': 
                $validationRules = $validationRules->merge($this->editFormValidation());
            break;

        }

        $validationRules = $validationRules->toArray();
        return $request->validate($validationRules);
    }

}