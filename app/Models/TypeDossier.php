<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $created_at
 * @property string $updated_at
 * @property string $type
 * @property Dossier[] $dossiers
 * @property ModelesDossier[] $modelesDossiers
 */
class TypeDossier extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['created_at', 'updated_at', 'type'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function dossiers()
    {
        return $this->hasMany('App\Models\Dossier');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function modelesDossiers()
    {
        return $this->hasMany('App\Models\ModelesDossier', 'type_dossiers_id');
    }
}
