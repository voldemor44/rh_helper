<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $created_at
 * @property string $updated_at
 * @property string $statut
 * @property Dossier[] $dossiers
 */
class StatutDossier extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'status_dossiers';

    /**
     * @var array
     */
    protected $fillable = ['created_at', 'updated_at', 'statut'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function dossiers()
    {
        return $this->hasMany('App\Models\Dossier');
    }
}
