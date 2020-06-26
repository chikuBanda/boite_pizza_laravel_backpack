<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\FormuleRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class FormuleCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class FormuleCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel('App\Models\Formule');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/formule');
        $this->crud->setEntityNameStrings('formule', 'formules');
    }

    protected function setupListOperation()
    {
        // TODO: remove setFromDb() and manually define Columns, maybe Filters
        // $this->crud->setFromDb();

        $this->crud->setColumns([
            'imgPath',
            'nomFormule',
            'prix', 
            'description', 
        ]);

        $this->crud->setColumnDetails(
            'imgPath', 
            [
                'label' => 'Image',
                'type' => 'image',
                'height' => '50px',
                'width' => '80px'
            ]
        );

        $this->crud->setColumnDetails(
            'nomFormule', 
            [
                'label' => 'Nom',
            ]
        );

        $this->crud->setColumnDetails(
            'prix', 
            [
                'label' => 'Prix',
            ]
        );

        $this->crud->setColumnDetails(
            'description', 
            [
                'label' => 'Description',
            ]
        );
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(FormuleRequest::class);

        // TODO: remove setFromDb() and manually define Fields
        // $this->crud->setFromDb();

        $this->crud->addField([
            'name' => 'nomFormule',
            'type' => 'text',
            'label' => "Nom"
        ]);

        $this->crud->addField([
            'name' => 'prix',
            'type' => 'number',
            'label' => "Prix"
        ]);

        $this->crud->addField([
            'name' => 'description',
            'type' => 'textarea',
            'label' => "Description"
        ]);

        $this->crud->addField([
            'name' => 'imgPath',
            'type' => 'image',
            'label' => "Image",
            'height' => '50px',
            'width' => '50px',
            'upload' => true,
            'crop' => true,
            'aspect_ratio' => 1,
            //'prefix' => 'uploads/img'
        ]);
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }

    protected function setupShowOperation()
    {
        $this->crud->set('show.setFromDb', false);

        $this->crud->setColumns([
            'imgPath',
            'nomFormule',
            'prix', 
            'description', 
        ]);

        $this->crud->setColumnDetails(
            'imgPath', 
            [
                'label' => 'Image',
                'type' => 'image',
                'height' => '200px',
                'width' => '200px'
            ]
        );

        $this->crud->setColumnDetails(
            'nomFormule', 
            [
                'label' => 'Nom',
            ]
        );

        $this->crud->setColumnDetails(
            'prix', 
            [
                'label' => 'Prix',
            ]
        );

        $this->crud->setColumnDetails(
            'description', 
            [
                'label' => 'Description',
            ]
        );
    }
}
