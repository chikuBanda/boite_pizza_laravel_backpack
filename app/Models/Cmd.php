<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Cmd extends Model
{
    use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'cmds';
    protected $primaryKey = 'numCommande';
    public $timestamps = false;
    protected $guarded = ['numCommande'];
    // protected $fillable = [];
    // protected $hidden = [];
    // protected $dates = [];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    public function produits()
    {
        return $this->belongsToMany(
            'App\Models\Produit',
            'lignecommandes',
            'numCommande',
            'codeProduit')->withPivot('prix', 'nb');
    }





    public function formules()
    {
        return $this->belongsToMany(
            'App\Models\Formule',
            'lignecmdforms',
            'numCommande',
            'codeFormule')->withPivot('ligneID', 'prix', 'nb');
    }


    public function client()
    {
        return $this->belongsTo('App\Models\Client', 'numClient');
    }

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | ACCESSORS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
}
