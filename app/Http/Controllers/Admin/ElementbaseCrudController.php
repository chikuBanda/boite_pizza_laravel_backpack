<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ElementbaseRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class ElementbaseCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ElementbaseCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel('App\Models\Elementbase');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/elementbase');
        $this->crud->setEntityNameStrings('elementbase', 'elementbases');
    }

    protected function setupListOperation()
    {
        // TODO: remove setFromDb() and manually define Columns, maybe Filters
        //$this->crud->setFromDb();

        $this->crud->setColumns([
            'nomElem',
            'imgPath'
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
    }

    protected function setupShowOperation()
    {
        $this->crud->set('show.setFromDb', false);

        $this->crud->setColumns([
            'numElem',
            'nomElem'
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
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(ElementbaseRequest::class);

        // TODO: remove setFromDb() and manually define Fields
        // $this->crud->setFromDb();

        $this->crud->addField([
            'name' => 'nomElem',
            'type' => 'text',
            'label' => "Nom"
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

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
