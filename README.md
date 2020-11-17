# Form Builder Package
---

With this package you will able to build forms with validation easily.

#### Installation
```bash
composer require alqudiry/form-builder
```

#### Build your first form

##### Create The Form
run this command in the terminal
```bash
php artisan formBuilder:create-form Form
```

this command will create Form class at "app\Forms" the content of the file will be:
```php
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
```

##### Display The Form

to display the form in create or edit function you need to create instance of the class and pass it to the view
```php
$form = new Form();
return view('create', compact('form');
```

display the form in blade file:
```blade
 {!! $form->render('create') !!}
 ```

##### Validate The Form
to validate the form in store method all you need is:
```php
$userForm = new UserForm();
$userForm->validate($request, 'create');
```


