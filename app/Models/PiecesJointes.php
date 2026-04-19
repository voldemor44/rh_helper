<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $fiches_remplie_id
 * @property string $nom
 * @property string $path
 * @property string $created_at
 * @property string $updated_at
 * @property FichesRemply $fichesRemply
 */
class PiecesJointes extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['fiches_remplie_id', 'nom', 'path', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function fichesRemply()
    {
        return $this->belongsTo('App\Models\FichesRemply', 'fiches_remplie_id');
    }
}
