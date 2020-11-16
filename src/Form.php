<?php 

namespace App\Forms;

use Alqudiry\FormBuilder\FormBuilder;
use Illuminate\Validation\Rule;

class Form extends FormBuilder {

    private $model = [
        'id' => null,
    ];

    function __construct($model = [])
    {    
        $this->model = empty($model) ? collect($this->model) : $model;
    }

    /**
     * Form fields
     */
    public function formFields()
    {
        return [
            [
                'id' => 'name', 
                'type' => 'text',
                'title' => 'name', 
                'attributes' => ['class' => 'form-control'],
                'value' => null,
                'parent_class' => 'col-sm-6',
            ],
        ];
    }

    /**
     * Create form fields
     */
    public function createFormFields() 
    {
        return [
        ];
    }

    /**
     * Edit form fields
     */
    public function editFormFields()
    {
        return [

        ];
    }

    /**
     * General form validation
     */
    public function formValidation()
    {
        return [
        ];
    }

    /**
     * create form validation
     */
    public function createFormValidation()
    {
        return [
            'name' => ['required', 'string', 'max:255', 'unique:roles'],
        ];
    }

    /**
     * edit form validation 
     */
    public function editFormValidation()
    {
        return [
            'name' => ['required', 'string', 'max:255', Rule::unique('roles')->ignore($this->model['id']) ]
        ];
    }

} 

?>