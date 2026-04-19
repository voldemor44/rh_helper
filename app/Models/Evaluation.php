<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $projet_id
 * @property integer $user_id
 * @property string $note
 * @property string $created_at
 * @property string $updated_at
 * @property User $user
 * @property Projet $projet
 */
class Evaluation extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['projet_id', 'user_id', 'note', 'created_at', 'updated_at'];

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
