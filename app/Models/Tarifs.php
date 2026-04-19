<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $id
 * @property string $prix
 * @property string $formule
 * @property string $type_entreprise
 * @property integer $limitprojets
 * @property integer $limitemployes
 * @property integer $limitdossiers
 * @property string $created_at
 * @property string $updated_at
 * @property Abonnement[] $abonnements
 */
class Tarifs extends Model
{
    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'string';

    /**
     * Indicates if the IDs are auto-incrementing.
     * 
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var array
     */
    protected $fillable = ['prix', 'formule', 'type_entreprise', 'limitprojets', 'limitemployes', 'limitdossiers', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function abonnements()
    {
        return $this->hasMany('App\Models\Abonnement');
    }
}
