<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CommentaireRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class CommentaireCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class CommentaireCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        $this->crud->setModel('App\Models\Commentaire');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/commentaire');
        $this->crud->setEntityNameStrings('commentaire', 'commentaires');
    }

    protected function setupListOperation()
    {
        // TODO: remove setFromDb() and manually define Columns, maybe Filters
        // $this->crud->setFromDb();

        $this->crud->setColumns([
            'texte',
            'codeProduit', 
            'numClient', 
            'date_pub'
        ]);

        $this->crud->setColumnDetails(
            'codeProduit',
            [
                'name' => 'codeProduit',
                'type' => 'select',
                'label' => "Produit",
                'entity' => 'produits',
                'attribute' => 'nom'
            ]
        );

        $this->crud->setColumnDetails(
            'numClient',
            [
            'name' => 'numClient',
            'type' => 'select',
            'label' => "Client",
            'entity' => 'clients',
            'attribute' => 'full_name'
        ]);

        $this->crud->setColumnDetails(
            'date_pub',
            [
                'label' => "Produit"
            ]
        );
    }

    protected function setupCreateOperation()
    {
        $this->crud->setValidation(CommentaireRequest::class);

        // TODO: remove setFromDb() and manually define Fields
        // $this->crud->setFromDb();

        $this->crud->addField([
            'name' => 'texte',
            'type' => 'textarea',
            'label' => "texte"
        ]);

        $this->crud->addField([
            'name' => 'codeProduit',
            'type' => 'select2',
            'label' => "Produit",
            'entity' => 'produits',
            'attribute' => 'nom'
        ]);

        $this->crud->addField([
            'name' => 'numClient',
            'type' => 'select2',
            'label' => "Clientt",
            'entity' => 'clients',
            'attribute' => 'nom'
        ]);

        $this->crud->addField([
            'name' => 'date_pub',
            'type' => 'datetime_picker',
            'label' => "Date pub",
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
            'texte',
            'codeProduit', 
            'numClient', 
            'date_pub'
        ]);

        $this->crud->setColumnDetails(
            'codeProduit',
            [
                'name' => 'codeProduit',
                'type' => 'select',
                'label' => "Produit",
                'entity' => 'produits',
                'attribute' => 'nom'
            ]
        );

        $this->crud->setColumnDetails(
            'numClient',
            [
            'name' => 'numClient',
            'type' => 'select',
            'label' => "Client",
            'entity' => 'clients',
            'attribute' => 'full_name'
        ]);

        $this->crud->setColumnDetails(
            'date_pub',
            [
                'label' => "Produit"
            ]
        );
    }

}
