<?php

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => ['web', config('backpack.base.middleware_key', 'admin')],
    'namespace'  => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
    Route::crud('catproduit', 'CatproduitCrudController');
    Route::crud('produit', 'ProduitCrudController');
    Route::crud('imageclient', 'ImageclientCrudController');
    Route::crud('client', 'ClientCrudController');
    Route::crud('boitmsg', 'BoitmsgCrudController');
    Route::crud('cmd', 'CmdCrudController');
    Route::crud('formule', 'FormuleCrudController');
    Route::crud('lignecmdform', 'LignecmdformCrudController');
    Route::crud('cmdformligneproduit', 'CmdformligneproduitCrudController');
    Route::crud('commentaire', 'CommentaireCrudController');
    Route::crud('elementbase', 'ElementbaseCrudController');
    Route::crud('lignecommande', 'LignecommandeCrudController');
    Route::crud('elem_lignecmd', 'Elem_lignecmdCrudController');
    Route::crud('elem_produit', 'Elem_produitCrudController');
    Route::crud('rating', 'RatingCrudController');
    Route::crud('supplement', 'SupplementCrudController');
    Route::crud('supp_lignecmd', 'Supp_lignecmdCrudController');
    Route::crud('favori', 'FavoriCrudController');
    Route::crud('user', 'UserCrudController');
}); // this should be the absolute last line of this file