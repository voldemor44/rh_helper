<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $parametre_id
 * @property string $created_at
 * @property string $updated_at
 * @property string $nom
 * @property string $path
 * @property string $type
 * @property Parametre $parametre
 */
class ParametresMedias extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'parametre_media';

    /**
     * @var array
     */
    protected $fillable = ['parametres_id', 'created_at', 'updated_at', 'nom', 'path', 'type'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parametre()
    {
        return $this->belongsTo('App\Models\Parametre');
    }
}
