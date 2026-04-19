<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $id
 * @property string $avis_recrutement_id
 * @property string $reponses
 * @property string $created_at
 * @property string $updated_at
 * @property AvisRecrutement $avisRecrutement
 * @property PiecesJointe[] $piecesJointes
 */
class FichesRemplies extends Model
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
    protected $fillable = ['avis_recrutement_id', 'reponses', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function avisRecrutement()
    {
        return $this->belongsTo('App\Models\AvisRecrutement');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function piecesJointes()
    {
        return $this->hasMany('App\Models\PiecesJointe', 'fiches_remplie_id');
    }
}
