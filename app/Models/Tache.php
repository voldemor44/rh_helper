<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $projet_id
 * @property integer $user_id
 * @property string $contenu
 * @property string $created_at
 * @property string $updated_at
 * @property User $user
 * @property Projet $projet
 */
class Tache extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['id', 'projet_id', 'user_id', 'titre', 'contenu', 'priorite', 'statut', 'date_delai', 'created_at', 'updated_at'];

    protected $keyType = 'string';
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
