<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ProduitRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class ProduitCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ProduitCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;


    public function setup()
    {
        $this->crud->setModel('App\Models\Produit');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/produit');
        $this->crud->setEntityNameStrings('produit', 'produits');
    }


    protected function setupListOperation()
    {
        // TODO: remove setFromDb() and manually define Columns, maybe Filters
        // $this->crud->setFromDb();


        $this->crud->setColumns([
            'imgPath',
            'nom',
            'codeProduit',
            'prix',
            'nomCat',
            'remise',
            'date_debut',
            'date_fin',
            'isPromo'
        ]);

        $this->crud->setColumnDetails(
            'codeProduit',
            [
                'label' => 'Code'
            ]
        );

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
            'nomCat',
            [
                'name' => 'catID',
                'type' => 'select',
                'label' => "Category",
                'entity' => 'categories',
                'attribute' => 'nomCat'
            ]
        );
    }

    protected function setupShowOperation()
    {
        $this->crud->set('show.setFromDb', false);

        $this->crud->setColumns([
            'imgPath',
            'codeProduit',
            'nom',
            'prix',
            'nomCat',
            'remise',
            'date_debut',
            'date_fin',
            'isPromo'
        ]);

        $this->crud->setColumnDetails(
            'codeProduit',
            [
                'label' => 'Code'
            ]
        );

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
            'nomCat',
            [
                'name' => 'catID',
                'type' => 'select',
                'label' => "Category",
                'entity' => 'categories',
                'attribute' => 'nomCat'
            ]
        );
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(ProduitRequest::class);

        // TODO: remove setFromDb() and manually define Fields
        // $this->crud->setFromDb();

        $this->crud->addField([
            'name' => 'nom',
            'type' => 'text',
            'label' => "Nom"
        ]);

        $this->crud->addField([
            'name' => 'prix',
            'type' => 'number',
            'label' => "Prix"
        ]);

        $this->crud->addField([
            'name' => 'catID',
            'type' => 'select2',
            'label' => "Category",
            'entity' => 'categories',
            'attribute' => 'id_name'
        ]);

        $this->crud->addField([
            'name' => 'remise',
            'type' => 'number',
            'label' => "Remise",
            'default' => 0
        ]);

        $this->crud->addField([
            'name' => 'date_debut',
            'type' => 'datetime_picker',
            'label' => "Date debut",
        ]);

        $this->crud->addField([
            'name' => 'date_fin',
            'type' => 'datetime_picker',
            'label' => "Date fin",
        ]);

        $this->crud->addField([
            'name' => 'isPromo',
            'type' => 'number',
            'label' => "isPromo",
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

        $this->crud->addField([
            'label'     => 'Elements bases',
            'type'      => 'select2_multiple',
            'name'      => 'elementbases',
            'entity'    => 'elementbases',
            'attribute' => 'nomElem',
            'model'     => "App\Models\Elementbase",
            'pivot'     => true,
            'select_all' => true,
        ]);
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
