<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CmdRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class CmdCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class CmdCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel('App\Models\Cmd');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/cmd');
        $this->crud->setEntityNameStrings('cmd', 'cmds');
    }

    protected function setupListOperation()
    {
        // TODO: remove setFromDb() and manually define Columns, maybe Filters
        // $this->crud->setFromDb();

        $this->crud->setColumns([
            'numCommande',
            'numClient',
            'produits',
            'formules'
        ]);

        $this->crud->setColumnDetails(
            'produits',
            [
                'label' => 'produits',
                'type' => "select_multiple",
                'name' => 'produits', // the method that defines the relationship in your Model
                'entity' => 'produits', // the method that defines the relationship in your Model
                'attribute' => "produit_quantity", // foreign key attribute that is shown to user
                'model' => 'App\Models\Produit', // foreign key model
            ]
        );

        $this->crud->setColumnDetails(
            'formules',
            [
                'label' => 'formules',
                'type' => "select_multiple_formule",
                'name' => 'formules', // the method that defines the relationship in your Model
                'entity' => 'formules', // the method that defines the relationship in your Model
                'attribute' => "formule_object", // foreign key attribute that is shown to user
                'model' => 'App\Models\Formule', // foreign key model
            ]
        );
    }

    protected function setupShowOperation()
    {
        // TODO: remove setFromDb() and manually define Columns, maybe Filters
        // $this->crud->setFromDb();

        $this->crud->setColumns([
            'numCommande',
            'numClient',
            'produits',
            'formules'
        ]);

        $this->crud->setColumnDetails(
            'produits',
            [
                'label' => 'produits',
                'type' => "select_multiple",
                'name' => 'produits', // the method that defines the relationship in your Model
                'entity' => 'produits', // the method that defines the relationship in your Model
                'attribute' => "produit_quantity", // foreign key attribute that is shown to user
                'model' => 'App\Models\Produit', // foreign key model
            ]
        );

        $this->crud->setColumnDetails(
            'formules',
            [
                'label' => 'formules',
                'type' => "select_multiple_formule",
                'name' => 'formules', // the method that defines the relationship in your Model
                'entity' => 'formules', // the method that defines the relationship in your Model
                'attribute' => "formule_object", // foreign key attribute that is shown to user
                'model' => 'App\Models\Formule', // foreign key model
            ]
        );
    }


    protected function setupCreateOperation()
    {
        $this->crud->setValidation(CmdRequest::class);

        // TODO: remove setFromDb() and manually define Fields
        $this->crud->setFromDb();
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
