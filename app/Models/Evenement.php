<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $user_id
 * @property integer $type_evenement_id
 * @property string $created_at
 * @property string $updated_at
 * @property string $titre
 * @property string $description
 * @property TypeEvenement $typeEvenement
 * @property User $user
 */
class Evenement extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['user_id', 'type_evenement_id', 'created_at', 'updated_at', 'titre', 'description', 'start_date', 'end_date', 'start_time', 'end_time'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function typeEvenement()
    {
        return $this->belongsTo('App\Models\TypeEvenement');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
