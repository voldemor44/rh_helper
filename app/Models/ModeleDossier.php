<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $type_dossiers_id
 * @property string $nom
 * @property string $description
 * @property string $created_at
 * @property string $updated_at
 * @property TypeDossier $typeDossier
 */
class ModeleDossier extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'modeles_dossiers';

    /**
     * @var array
     */
    protected $fillable = ['type_dossiers_id', 'nom', 'description', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function typeDossier()
    {
        return $this->belongsTo('App\Models\TypeDossier', 'type_dossiers_id');
    }
}
