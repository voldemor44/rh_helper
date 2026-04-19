<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $user_id
 * @property integer $projet_id
 * @property string $created_at
 * @property string $updated_at
 * @property User $user
 * @property Projet $projet
 */
class ProjetUtilisateur extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['user_id', 'projet_id', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function projet()
    {
        return $this->belongsTo('App\Models\Projet');
    }
}
