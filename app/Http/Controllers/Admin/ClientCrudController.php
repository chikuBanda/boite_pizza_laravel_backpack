<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ClientRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class ClientCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ClientCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel('App\Models\Client');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/client');
        $this->crud->setEntityNameStrings('client', 'clients');
    }

    protected function setupListOperation()
    {
        // TODO: remove setFromDb() and manually define Columns, maybe Filters
        // $this->crud->setFromDb();

        $this->crud->setColumns([
            'imgPath',
            'numClient', 
            'nom', 
            'prenom', 
            'adresse', 
            'email', 
            'login', 
            'motdepasse', 
            'ca',
            'date_inscr'
        ]);

        $this->crud->setColumnDetails(
            'imgPath', 
            [
                'label' => 'image',
                'type' => 'image',
                'height' => '50px',
                'width' => '80px'
            ]
        );
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(ClientRequest::class);

        // TODO: remove setFromDb() and manually define Fields
        // $this->crud->setFromDb();

        $this->crud->addField([
            'name' => 'nom',
            'type' => 'text',
            'label' => "Nom"
        ]);

        $this->crud->addField([
            'name' => 'prenom',
            'type' => 'text',
            'label' => "Prenom"
        ]);

        $this->crud->addField([
            'name' => 'adresse',
            'type' => 'address_algolia',
            'label' => "Adresse"
        ]);

        $this->crud->addField([
            'name' => 'email',
            'type' => 'email',
            'label' => "Email"
        ]);

        $this->crud->addField([
            'name' => 'login',
            'type' => 'text',
            'label' => "Login",
        ]);

        $this->crud->addField([
            'name' => 'motdepasse',
            'type' => 'password',
            'label' => "Mot de pase",
        ]);

        $this->crud->addField([
            'name' => 'ca',
            'type' => 'number',
            'label' => "Chiffre d'affaires",
        ]);

        $this->crud->addField([
            'name' => 'date_inscr',
            'type' => 'datetime_picker',
            'label' => "Date d'inscription",
        ]);

        $this->crud->addField([
            'name' => 'imgPath',
            'type' => 'image',
            'label' => "image",
            'height' => '50px',
            'width' => '50px',
            'upload' => true,
            'crop' => true,
            'aspect_ratio' => 1,
            //'prefix' => 'uploads/img'
        ]);
    }

    protected function setupShowOperation()
    {
        $this->crud->set('show.setFromDb', false);

        $this->crud->setColumns([
            'imgPath',
            'numClient', 
            'nom', 
            'prenom', 
            'adresse', 
            'email', 
            'login', 
            'motdepasse', 
            'ca',
            'date_inscr'
        ]);

        $this->crud->setColumnDetails(
            'imgPath', 
            [
                'label' => 'image',
                'type' => 'image',
                'height' => '200px',
                'width' => '200px'
            ]
        );

    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
